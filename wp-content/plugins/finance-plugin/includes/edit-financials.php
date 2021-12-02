<?php
if ( ! defined( 'ABSPATH' ) ) // Or some other WordPress constant
exit;

if( wp_verify_nonce( @$_REQUEST['_wpnonce'] ) ){
    if(isset($_FILES['input_file'])){
        $data = wp_upload_bits($_FILES['input_file']['name'], null, file_get_contents($_FILES['input_file']['tmp_name']) );

        update_option('finance_plugin_audited_financials_file', $data['url'] );
    }
}

$financial_doc_url = get_option('finance_plugin_audited_financials_file');

?>
<div class="wrap">
    <section>
    <br>

        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field(); ?>
            <div class="tablenav top">
                <h1 class="wp-heading-inline">Audited Financials</h1>
            </div>
            <h3>Update Audited Financials document</h3>                
            <br /><br />
            <div>

            <table class="wp-list-table widefat fixed striped table-view-list" style="max-width: 600px;">
                <tr>
                    <td>
                        <label for="input-file">Document</label>
                    </td>
                    <td>
                        <input type="file" name="input_file" id="input-file" />
                    </td>
                    <td>
                        <div style="display: flex;justify-content: center; align-items:center;">
                            <a href="<?php echo $financial_doc_url; ?>" target="_blank">
                                <svg height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#929292" id="icon-70-document-file-pdf"><path d="M21,26 L21,28.0025781 C21,29.1090746 20.1057238,30 19.0025781,30 L3.99742191,30 C2.89092539,30 2,29.1012878 2,27.9926701 L2,5.00732994 C2,3.89833832 2.8992496,3 4.0085302,3 L14,3 L14,9.00189865 C14,10.1132936 14.8980806,11 16.0059191,11 L21,11 L21,13 L12.0068483,13 C10.3462119,13 9,14.3422643 9,15.9987856 L9,23.0012144 C9,24.6573979 10.3359915,26 12.0068483,26 L21,26 L21,26 Z M15,3 L15,8.99707067 C15,9.55097324 15.4509752,10 15.990778,10 L21,10 L15,3 L15,3 Z M11.9945615,14 C10.8929956,14 10,14.9001762 10,15.992017 L10,23.007983 C10,24.1081436 10.9023438,25 11.9945615,25 L29.0054385,25 C30.1070044,25 31,24.0998238 31,23.007983 L31,15.992017 C31,14.8918564 30.0976562,14 29.0054385,14 L11.9945615,14 L11.9945615,14 Z M25,19 L25,17 L29,17 L29,16 L24,16 L24,23 L25,23 L25,20 L28,20 L28,19 L25,19 L25,19 Z M12,18 L12,23 L13,23 L13,20 L14.9951185,20 C16.102384,20 17,19.1122704 17,18 C17,16.8954305 16.1061002,16 14.9951185,16 L12,16 L12,18 L12,18 Z M13,17 L13,19 L15.0010434,19 C15.5527519,19 16,18.5561352 16,18 C16,17.4477153 15.5573397,17 15.0010434,17 L13,17 L13,17 Z M18,16 L18,23 L20.9951185,23 C22.102384,23 23,22.1134452 23,20.9940809 L23,18.0059191 C23,16.8980806 22.1061002,16 20.9951185,16 L18,16 L18,16 Z M19,17 L19,22 L21.0010434,22 C21.5527519,22 22,21.5562834 22,21.0001925 L22,17.9998075 C22,17.4476291 21.5573397,17 21.0010434,17 L19,17 L19,17 Z" id="document-file-pdf"/></g></g></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td><td> <input type="submit" value="Upload document" /></td><td></td>
                </tr>
            </table>
            </div>
        </form>
    </section>
</div>