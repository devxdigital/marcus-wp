<?php
/**
 * This is the template for search form
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) );?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'wp-starter-theme') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'wp-starter-theme') ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-starter-theme') ?>" />
</form>