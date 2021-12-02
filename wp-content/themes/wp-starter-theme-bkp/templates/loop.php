<article <?php post_class('content__row'); ?>>
	<div class="card blog-post-loop">
		<?php
			if (has_post_thumbnail()) {
				the_post_thumbnail('post-loop', array('class' => 'w-100 img-fluid'));
			}
		?>
		<div class="card-body mb-4 entry-summary">
			<h1 class="card-title text-uppercase content__title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); ?>
			<div class="row my-3 d-flex align-items-end">
				<div class="col-6">
					<?php get_template_part('templates/partials/entry-meta-loop'); ?>
				</div>
				<div class="col-6 text-end">
					<a href="<?php the_permalink(); ?>" class="btn btn-theme text-uppercase" style="font-size: 13px;">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</article>