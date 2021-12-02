<article <?php post_class('content__row pe-1'); ?>>
	<div class="card blog-post-loop">
		<?php
			if (has_post_thumbnail()) {
				the_post_thumbnail('post-loop', array('class' => 'w-100 img-fluid'));
			}
		?>
		<div class="card-body mb-4 entry-summary">
			<h1 class="card-title text-uppercase content__title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); ?>
			<div class="row my-3 d-flex align-items-xl-end align-items-lg-end align-items-md-end align-items-sm-center align-items-center">
				<div class="col-6">
					<?php get_template_part('templates/partials/entry-meta-loop'); ?>
				</div>
				<div class="col-6 text-end">
					<a href="<?php the_permalink(); ?>" class="btn btn-theme text-uppercase" style="font-size: 13px;"><span class="d-none d-sm-none d-md-line d-lg-inline d-xl-inline">Learn</span> More</a>
				</div>
			</div>
		</div>
	</div>
</article>