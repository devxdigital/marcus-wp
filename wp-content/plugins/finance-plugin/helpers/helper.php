<?php

class FinancePluginHelper {

    function __construct(){

    }


    static function get_investors( $user_id ){
        $investor_ids = get_user_meta( $user_id, 'assigned_investors', true );
        if( $investor_ids != false ){
            $investor_ids = json_decode( $investor_ids, true );
        } else {
            $investor_ids = array();
        }

        return array_values( $investor_ids );
    }

    static function get_investor_accounts( $user_id ){
        $acc_ids = get_user_meta( $user_id, 'accounts_ims', true );
        if( $acc_ids != false ){
            $acc_ids = json_decode( $acc_ids, true );
        } else {
            $acc_ids = array();
        }

        return $acc_ids;
    }

    static function get_investors_to_add( $investors, $assigned_ids ){
        $assigned = array();
        $to_add = array();
        foreach( $investors as $investor ){
            if( in_array( $investor->ID, array_values( $assigned_ids ) ) ){
                $assigned[] = $investor;
            } else {
                $to_add[] = $investor;
            }
        }
        return array( $assigned, $to_add );
    }

    static function get_and_save_ims_accounts( $user_id ){
        $accounts = FinancePluginHelper::get_ims_accounts( $user_id );
        update_user_meta( $user_id, 'accounts_ims', json_encode( $accounts ) );
    }

    static function get_ims_accounts( $user_id ){
        $personId = get_the_author_meta('person_id', $user_id );
        $resp = FinancePluginHelper::request( 'https://dev2.ignitefunding.com/Old_Portal_Code/ignite_query.php', array('action=ims_accounts', 'id='.$personId ));
        $accts = array();
        if( $resp ){
            $accts = json_decode( $resp, true );
        }

        return $accts;
    }

    static function pull_investor_data( $user_id ){
        $ids = get_user_meta( $user_id, 'accounts_ims', true );
        if( !json_decode( $ids, true ) ){
            return;
        }
        $personId = get_the_author_meta('person_id', $user_id );
        if( $ids ){
            $ids = implode(',', json_decode( $ids, true ) );
        }

        $resp = FinancePluginHelper::request( 'https://dev2.ignitefunding.com/Old_Portal_Code/ignite_query.php', array('action=ims_query', 'accts='.$ids ));
        $account_data = $resp? json_decode( $resp, true ) : array();
        //$accdata = FinancePluginHelper::filter_by_person_id( $account_data, $personId );
        $accdata = $account_data;
        $accdata = FinancePluginHelper::map_data( $accdata );

        update_user_meta( $user_id, 'ims_account_data', json_encode( $accdata ) );
    }

    static function get_investor_data( $user_id ){
        $investor_data = get_user_meta( $user_id, 'ims_account_data', true );
        if( !$investor_data ){
            FinancePluginHelper::pull_investor_data( $user_id );
            $investor_data = get_user_meta( $user_id, 'ims_account_data', true );
        }
        $data = $investor_data? json_decode( $investor_data, true ) : array();


        return $data;
    }

    static function filter_by_person_id( $data, $person_id ){
        if( !$data ){
            return array();
        }
        foreach( $data as $key => $account ){
            if( array_key_exists('cp_get_investor_account_details', $account ) && @$account['cp_get_investor_account_details'][1] ){
                foreach( @$account['cp_get_investor_account_details'][1] as $akey => $acct ){
                    if( $acct['PersonID'] != $person_id ){
                        unset( $data[ $key ]['cp_get_investor_account_details'][1][ $akey ] );
                    }
                }
                if( count( @$data[ $key ]['cp_get_investor_account_details'] [1]) < 1 ){
                    unset( $data[ $key ] );
                } else {
                    $data[ $key ]['cp_get_investor_account_details'][1] = array_values( $data[ $key ]['cp_get_investor_account_details'][1] );
                    $data[ $key ]['account_id'] = $key;
                }
            }
            
        }

        return $data;
    }
    static function map_data( $data ){
        $ndata = array();
        foreach( $data as $key => $account ){
            $ndata[] = array(
                'acc_id' => $key, 
                'account_details' => @$account['cp_get_investor_account_details'][1],
                'account_data' => @$account['cp_get_investor_account_details'][0][0],
                'ria_data' => @$account['cp_get_investor_account_details'][2][0]
            );
        }

        return $ndata;
    }

    static function get_primary_account( $data, $user_id ){
        $personId = get_the_author_meta('person_id', $user_id );

        $found = false;
        if( array_key_exists( 'account_details', $data[0] ) ){
            foreach( $data[0]['account_details'] as $acc ){
                if( $acc['SignerType'] == 'Primary' ){
                    $found = $acc;
                }
            }
        }        
        return $found;
    }

    static function get_authorized_account( $data, $user_id ){
        $personId = get_the_author_meta('person_id', $user_id );
        $found = false;
        if( array_key_exists( 'account_details', $data[0] ) ){
            foreach( $data[0]['account_details'] as $acc ){
                if( $acc['PersonID'] == $personId ){
                    $found = $acc;
                }
            }
            if( !$found ){
                foreach( $data[0]['account_details'] as $acc ){
                    if( $acc['SignerType'] == 'Secondary'){
                        $found = $acc;
                    }
                }
            }
        }        
        return $found;
    }


    //statements
    static function pull_investor_statements( $acct_id, $sdate, $edate ){
        $resp = FinancePluginHelper::request( 'https://dev2.ignitefunding.com/Old_Portal_Code/ignite_query.php', array('action=ims_statements', 'accts='.$acct_id.'&sdate='.$sdate.'&edate='.$edate ));
        $account_data = $resp? json_decode( $resp, true ) : array();

        if( $account_data && count( $account_data ) ){
            $result = array(
                'info' => @array_values( $account_data )[0]['cp_get_statement_overview'][0][0],
                'info_investments' => @array_values( $account_data )[0]['cp_get_statement_overview'][1],
                'investments' => @array_values( $account_data )[0]['cp_get_statement_investment_allocation'][0],
                'investment_transactions' => @FinancePluginHelper::map_transactions_to_ids( array_values( $account_data )[0]['cp_get_statement_investment_allocation'][1] ),
            );
        } else {
            $result = array();
        }

        if( !$result['info_investments'] ){
            $result['info_investments'] = array();
        }
        if( !$result['investments'] ){
            $result['investments'] = array();
        }
        if( !$result['investment_transactions'] ){
            $result['investment_transactions'] = array();
        }

        return $result;
    }

    static function map_transactions_to_ids( $transactions ){
        $obj = array();
        if( $transactions && count( $transactions ) ){
            foreach( $transactions as $trans ){
                if( !array_key_exists( $trans['loan_sys_id'], $obj ) ){
                    $obj[ $trans['loan_sys_id'] ] = array();
                }
    
                $obj[ $trans['loan_sys_id'] ][] = $trans;
            }
        }

        return $obj;
    }


    static function request( $url, $params ){
        $params = '?'.implode('&', $params ).'&code=1468';
        $url = $url.$params;

        $curl = curl_init( $url );
        curl_setopt( $curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt( $curl, CURLOPT_CAINFO, '' );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        $response = curl_exec( $curl );
        curl_close( $curl );

        // $response = Requests::request( $url, array() );

        return $response;
    }

    static function currency( $price ){
        return '$'.number_format( (float)$price, 2, '.', ',');
    }
    
    static function cache( $user_id, $cache_name, $delay, $args ){
        $content = get_user_meta( $user_id, $cache_name, true );
        if( !$content ){
            return false;
        } else {
            $data = json_decode( $content, true );
            if( time() - $data['date'] > $delay || $data['args'] != $args ){
                return false;
            } else {
                $data = $data['data'];
            }
        }

        return $data;
    }
}