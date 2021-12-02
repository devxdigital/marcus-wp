<div class="row">

	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>

		<div id="sidebar-search" class="sidebar_widget col-sm-5 col-md-12 js-col-eq-height">
			<h2 class="sidebar__title">Search</h2>
			<?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
		</div>

		<div id="sidebar-archives" class="sidebar_widget col-sm-5 col-md-12 js-col-eq-height">
			<h2 class="sidebar__title">Archives</h2>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>

		<div id="sidebar-meta" class="sidebar_widget col-sm-5 col-md-12 js-col-eq-height">
			<h2 class="sidebar__title">Meta</h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div>

	<?php endif; ?>

</div>
