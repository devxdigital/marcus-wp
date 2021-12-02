<?php

function nsof_post_selector_admin_form_field( $value, $field_name ) {
	?>
	<input type="hidden" value="<?php echo esc_attr( $value ) ?>" name="<?php echo $field_name ?>" class="nsof-input" />
	<a href="#" class="nsof-select-posts button button-secondary">
		<span class="nsof-current-count"><?php echo esc_html( nsof_post_selector_count_posts( $value ) )?></span>
		<?php esc_html_e( 'Build posts query', 'wp-starter-theme' ) ?>
	</a>
	<?php
}

function nsof_post_selector_process_query($query){
	$query = wp_parse_args($query,
		array(
			'post_status' => 'publish',
			'posts_per_page' => 10,
		)
	);

	if(!empty($query['post_type'])) {
		if($query['post_type'] == '_all') $query['post_type'] = nsof_post_selector_all_post_types();
		$query['post_type'] = explode(',', $query['post_type']);
	}

	if(!empty($query['post__in'])) {
		$query['post__in'] = explode(',', $query['post__in']);
		array_map('intval', $query['post__in']);
	}

	if(!empty($query['tax_query'])) {
		$tax_queries = explode(',', $query['tax_query']);

		$query['tax_query'] = array();
		foreach($tax_queries as $tq) {
			list($tax, $term) = explode(':', $tq);

			if( empty($tax) || empty($term) ) continue;
			$query['tax_query'][] = array(
				'taxonomy' => $tax,
				'field' => 'slug',
				'terms' => $term
			);
		}
	}

	if ( ! empty( $query['sticky'] ) ) {
		switch($query['sticky']){
			case 'ignore' :
				$query['ignore_sticky_posts'] = 1;
				break;
			//TODO: Revisit this. Not sure if it makes sense to have this as an option in a separate dropdown, but am
			//TODO: trying to stay as close as possible to Page Builder Post Loop widget post selection options.
			//TODO: It's probably better in the long run to make this work well and just cope with issues that come up in
			//TODO: Page Builder Post Loop migrations until it dies.
			case 'only' :
				$post_in = empty( $query['post__in'] ) ? array() : $query['post__in'];
				$query['post__in'] = array_merge( $post_in, get_option( 'sticky_posts' ) );
				break;
			case 'exclude' :
				$query['post__not_in'] = get_option( 'sticky_posts' );
				break;
		}
		unset( $query['sticky'] );
	}

	if ( ! empty( $query['additional'] ) ) {
		$query = wp_parse_args( $query['additional'], $query );
		unset( $query['additional'] );
	}

	return $query;
}

function nsof_post_selector_form_fields(){
	$return = array();

	// The post type field
	$return['post_type'] = '';
	$return['post_type'] .= '<label><span>' . __('Post type', 'wp-starter-theme') . '</span>';
	$return['post_type'] .= '<select name="post_type">';
	$return['post_type'] .= '<option value="_all">' . __('All', 'wp-starter-theme') . '</option>';
	foreach( get_post_types( array( 'public' => true  ), 'objects' ) as $id => $type ) {
		if(!empty($type->labels->name)) {
			$post_types[$id] = $type->labels->name;
			$return['post_type'] .= '<option value="' . $id . '">' . $type->labels->name . '</option>';
		}
	}
	$return['post_type'] .= '</select></label>';

	// The field for specifying individual posts
	$return['post__in'] = '';
	$return['post__in'] .= '<label><span>' . __('Post in', 'wp-starter-theme') . '</span>';
	$return['post__in'] .= '<input type="text" name="post__in" class="" />';
	$return['post__in'] .= ' <a href="#" class="nsof-select-posts button button-secondary">' . __('Select posts', 'wp-starter-theme') . '</a>';
	$return['post__in'] .= '</label>';

	// The taxonomy field
	$return['tax_query'] = '';
	$return['tax_query'] .= '<label><span>' . __('Taxonomies', 'wp-starter-theme') . '</span>';
	$return['tax_query'] .= '<input type="text" name="tax_query" class="" placeholder="search" />';
	$return['tax_query'] .= '</label>';


	// The order by field
	$return['orderby'] = '';
	$return['orderby'] .= '<label><span>' . __('Order by', 'wp-starter-theme') . '</span>';
	$return['orderby'] .= '<select name="orderby">';
	$orderby = array(
		'none' => __('No order', 'wp-starter-theme'),
		'ID' => __('Post ID', 'wp-starter-theme'),
		'author' => __('Author', 'wp-starter-theme'),
		'title' => __('Title', 'wp-starter-theme'),
		'date' => __('Published date', 'wp-starter-theme'),
		'modified' => __('Modified date', 'wp-starter-theme'),
		'parent' => __('By parent', 'wp-starter-theme'),
		'rand' => __('Random order', 'wp-starter-theme'),
		'comment_count' => __('Comment count', 'wp-starter-theme'),
		'menu_order' => __('Menu order', 'wp-starter-theme'),
		'meta_value' => __('By meta value', 'wp-starter-theme'),
		'meta_value_num' => __('By numeric meta value', 'wp-starter-theme'),
		'post__in' => __('By include order', 'wp-starter-theme'),
	);
	foreach($orderby as $id => $v) {
		$return['orderby'] .= '<option value="' . $id . '">' . $v . '</option>';
	}
	$return['orderby'] .= '</select>';
	$return['orderby'] .= '<input type="hidden" name="order" />';
	$return['orderby'] .= '<span class="nsof-order-button nsof-order-button-desc"></span>';
	$return['orderby'] .= '</label>';

	$return['posts_per_page'] = '';
	$return['posts_per_page'] .= '<label><span>' . __('Posts per page', 'wp-starter-theme') . '</span>';
	$return['posts_per_page'] .= '<input type="number" name="posts_per_page" class="" />';
	$return['posts_per_page'] .= '</label>';


	$return['sticky'] = '';
	$return['sticky'] .= '<label><span>' . __('Sticky posts', 'wp-starter-theme') . '</span>';
	$return['sticky'] .= '<select name="sticky">';
	$sticky = array(
		'' => __('Default', 'wp-starter-theme'),
		'ignore' => __('Ignore sticky', 'wp-starter-theme'),
		'exclude' => __('Exclude sticky', 'wp-starter-theme'),
		'only' => __('Include sticky', 'wp-starter-theme'),
	);
	foreach($sticky as $id => $v) {
		$return['sticky'] .= '<option value="' . $id . '">' . $v . '</option>';
	}
	$return['sticky'] .= '</select></label>';

	$return['additional'] = '';
	$return['additional'] .= '<label><span>' . __('Additional', 'wp-starter-theme') . '</span>';
	$return['additional'] .= '<input type="text" name="additional" class="" />';
	$return['additional'] .= '<small>' . __('Additional query arguments. See <a href="http://codex.wordpress.org/Function_Reference/query_posts" target="_blank">query_posts</a>.', 'wp-starter-theme') . '</small>';
	$return['additional'] .= '</label>';

	return $return;
}

/**
 * Just return a comma separated list of all available post types.
 *
 * @return string
 */
function nsof_post_selector_all_post_types(){
	$post_types = array();
	foreach( get_post_types( array( 'public' => true  ), 'objects' ) as $id => $type ) {
		$post_types[] = $id;
	}

	return implode(',', $post_types);
}

/**
 * Tells us how many posts this query has
 *
 * @param $query
 * @return int
 */
function nsof_post_selector_count_posts($query){
//	if( empty($query) ) return 0;

	$query = wp_parse_args(
		nsof_post_selector_process_query($query),
		array(
			'post_status' => 'publish',
			'posts_per_page' => 10,
		)
	);
	$posts = new WP_Query($query);
	return $posts->found_posts;
}

/**
 * The get posts ajax action
 */
function nsof_post_selector_get_posts_action(){
	if ( empty( $_REQUEST['_nsof_nonce'] ) || !wp_verify_nonce( $_REQUEST['_nsof_nonce'], 'nsof_action' ) ) return;
	$query = stripslashes( $_POST['query'] );
	$query = wp_parse_args(
		nsof_post_selector_process_query($query),
		array(
			'post_status' => 'publish',
			'posts_per_page' => 10,
		)
	);

	if(!empty($_POST['ignore_pagination'])) {
		$query['posts_per_page'] = 100;
	}

	$posts = new WP_Query($query);

	// Create the result
	$result = array(
		'found_posts' => $posts->found_posts,
		'posts' => array()
	);

	foreach($posts->posts as $post) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );

		$result['posts'][] = array(
			'title' => $post->post_title,
			'id' => $post->ID,
			'thumbnail' => !empty($thumbnail) ? $thumbnail[0] : NSOF_URI.'/assets/css/img/thumbnail-placeholder.png',
			'editUrl' => admin_url( 'post.php?post=' . $post->ID . '&action=edit')
		);
	}

	header('content-type: application/json');
	echo json_encode($result);

	exit();
}
add_action('wp_ajax_nsof_get_posts', 'nsof_post_selector_get_posts_action');

/**
 * The action handler for searching posts by title
 */
function nsof_post_selector_post_search_action(){
	if ( empty( $_REQUEST['_nsof_nonce'] ) || !wp_verify_nonce( $_REQUEST['_nsof_nonce'], 'nsof_action' ) ) return;
	$term = !empty($_GET['term']) ? stripslashes($_GET['term']) : '';
	$type = !empty($_GET['type']) ? stripslashes($_GET['type']) : '_all';
	if($type == '_all') $type = explode(',', nsof_post_selector_all_post_types());

	$results = array();
	$r = new WP_Query( array('s' => $term, 'post_status' => 'publish', 'posts_per_page' => 20, 'post_type' => $type) );
	foreach($r->posts as $post) {
//			$thumbnail = wp_get_attachment_image_src($post->ID);

		$results[] = array(
			'label' => $post->post_title,
			'value' => $post->ID,
		);
	}

	header('content-type:application/json');
	echo json_encode($results);
	exit();

}
add_action('wp_ajax_nsof_selector_search_posts', 'nsof_post_selector_post_search_action');

/**
 * The action handler for searching taxonomy terms
 */
function nsof_post_selector_search_taxonomy_terms(){
	if ( empty( $_REQUEST['_nsof_nonce'] ) || !wp_verify_nonce( $_REQUEST['_nsof_nonce'], 'nsof_action' ) ) return;
	global $wpdb;
	$term = !empty($_GET['term']) ? stripslashes($_GET['term']) : '';
	$term = trim($term, '%');

	$return = array();

	$query = $wpdb->prepare("
		SELECT terms.term_id, terms.slug, terms.name, termtaxonomy.taxonomy
		FROM $wpdb->terms AS terms
		JOIN $wpdb->term_taxonomy AS termtaxonomy ON terms.term_id = termtaxonomy.term_id
		WHERE
			terms.name LIKE '%s'
	", '%'.$term.'%');

	foreach($wpdb->get_results($query) as $result) {
		$return[] = array(
			'label' => $result->taxonomy.': '.$result->name,
			'value' => $result->taxonomy.':'.$result->slug,
		);
	}

	header('content-type:application/json');
	echo json_encode($return);
	exit();
}
add_action('wp_ajax_nsof_search_terms', 'nsof_post_selector_search_taxonomy_terms');