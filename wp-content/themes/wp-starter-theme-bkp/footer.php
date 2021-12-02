    </div>
</div>


<footer class="footer text-light">
    <div class="container">
        <div class="row ps-xl-0 ps-lg-0 ps-md-0 ps-sm-0 ps-4">
		    <div class="col-sm-2">
                <?php if ( is_active_sidebar( 'if_footer1' ) ) : ?>
                    <?php dynamic_sidebar( 'if_footer1' ); ?>
                <?php endif; ?>
            </div>
		    <div class="col-sm-2">
                <?php if ( is_active_sidebar( 'if_footer2' ) ) : ?>
                    <?php dynamic_sidebar( 'if_footer2' ); ?>
                <?php endif; ?>
            </div>
		    <div class="col-sm-2">
                <?php if ( is_active_sidebar( 'if_footer3' ) ) : ?>
                    <?php dynamic_sidebar( 'if_footer3' ); ?>
                <?php endif; ?>
            </div>
		    <div class="col-sm-6">
                <?php if ( is_active_sidebar( 'if_footer4' ) ) : ?>
                    <?php dynamic_sidebar( 'if_footer4' ); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer__copyright">
            <?php
            $copyright_text = nsof_get_option('copyright_text', $GLOBALS['th_opt']);

            if(isset($copyright_text) && !empty($copyright_text)){
                echo str_replace(array('%year%', '%name%'), array(date('Y'), get_bloginfo('name')), $copyright_text);
            }?>
        </div>

    </div>

    <div class="helper">
    	<div class="d-block d-sm-none">XS</div>
    	<div class="d-none d-sm-block d-md-none">SM</div>
    	<div class="d-none d-md-block d-lg-none">MD</div>
    	<div class="d-none d-lg-block d-xl-none">LG</div>
    	<div class="d-none d-xl-block">XL</div>
    </div>
</footer>


<?php wp_footer();?>

</body>
</html>