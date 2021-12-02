<?php
add_action( 'widgets_init', 'ns_register_sidebar' );


function ns_register_sidebar() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'ns_sidebar',
        'description'   => __( 'Located in blog templates.', 'wp-starter-theme'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget js-col-eq-height mb-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="">',
        'after_title' => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Footer 1',
        'id'            => 'if_footer1',
        'description'   => __( 'Located in the footer (left).', 'wp-starter-theme'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget js-col-eq-height mb-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="">',
        'after_title' => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Footer 2',
        'id'            => 'if_footer2',
        'description'   => __( 'Located in the footer (middle left).', 'wp-starter-theme'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget js-col-eq-height mb-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="">',
        'after_title' => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Footer 3',
        'id'            => 'if_footer3',
        'description'   => __( 'Located in the footer (middle right).', 'wp-starter-theme'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget js-col-eq-height mb-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="">',
        'after_title' => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Footer 4',
        'id'            => 'if_footer4',
        'description'   => __( 'Located in the footer (right).', 'wp-starter-theme'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget js-col-eq-height mb-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="">',
        'after_title' => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Pages',
        'id'            => 'if_page',
        'description'   => __( 'Located in page templates.', 'wp-starter-theme'),
        'before_widget' => '<div id="%1$s" class="sidebar_widget js-col-eq-height mb-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="">',
        'after_title' => '</h5>'
    ));
}
