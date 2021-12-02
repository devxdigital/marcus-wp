<?php
function ns_list_comments( $comment, $args, $depth ){

    global $post;


    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="comment__wrapper">
            <div class="comment__head">
                <div class="comment__avatar">
                    <?php echo get_avatar( $comment->user_id, 60);?>
                </div>

                <div class="comment__reply">
                    <?php
                    comment_reply_link(
                    	array_merge($args, array(
                    		'reply_text' => __( 'Reply', 'wp-starter-theme' ),
                    		'after' => '',
                    		'respond_id' => 'comment-box',
                    		'depth' => $depth,
                    		'max_depth' => $args['max_depth']
                		))
            		); ?>
                </div>
            </div>

            <div class="comment-entry" id="comment-<?php comment_ID(); ?>">

                <div class="comment__meta">
                    <?php printf(
                        '<span class="comment__author">%1$s %2$s</span>',
                        get_comment_author_link(),( $comment->user_id === $post->post_author ) ? '' : '');?>
                    <span class="comment__date"><?php comment_date('M d, Y - H:i');?></span>
                    <span class="comment__perma">
                    	<a href="<?php the_permalink();?>#comment-<?php comment_ID();?>" title="Direct link to this comment">#</a>
                    </span>
            		<span class="comment__edit"><?php edit_comment_link( __( 'Edit', 'wp-starter-theme' ), '<a class="comment-edit-link">', '</a>' ); ?></span>
                </div>

                <div class="commet__text">
                	<?php comment_text(); ?>
                </div>

            </div>

        </div>

    <?php
}



if ( post_password_required() )
	return;

?>

<section class="comments">

	<?php
		$fields =  array(
			'author' => '<p class="left"><input type="text" name="author" class="form-control" value="Your Name..." onfocus="if (this.value == \'Your Name...\') { this.value = \'\'; }" onblur="if (this.value == \'\') { this.value = \'Your Name...\'; }"/></p>',
			'email' => '<p class="left"><input type="text" name="email" class="form-control" value="Your Email..." onfocus="if (this.value == \'Your Email...\') { this.value = \'\'; }" onblur="if (this.value == \'\') { this.value = \'Your Email...\'; }"/></p>'
		);

		$comments_args = array(
			'id_form'           	=> 'commentform',
			'id_submit'         	=> 'submit_comment',
			'logged_in_as'       	=> '',
			'title_reply'       	=> '',
			'title_reply_to'    	=> __( 'Leave a Reply to %s', 'wp-starter-theme' ),
			'cancel_reply_link' 	=> __( 'Cancel Reply', 'wp-starter-theme' ),
			'label_submit'      	=> __( 'Post Comment', 'wp-starter-theme' ),
			'comment_notes_after' 	=> '',
			'comment_notes_before' 	=> '',
			'comment_field' 		=> '<p class="comment-form-comment"><textarea class="form-control" name="comment" aria-required="true" placeholder="'.__('Write a Comment...', 'wp-starter-theme').'"></textarea></p>',
			'fields' =>$fields
		);
	?>


	<h2 class="comments__title">
		<?php
			printf(
				_n( '1 Comment', '%1$s Comments on %2$s', get_comments_number(), 'wp-starter-theme' ),
				number_format_i18n( get_comments_number() ),
				'<em>"' . get_the_title() . '"</em>'
			);
		?>
	</h2>


	<?php if (comments_open()): ?>

		<div id="comment-box">
			<?php if(ns_get_user_data('ID')): ?>
				<div id="ns-user-profile-avatar" class="rounded"><?php echo get_avatar( ns_get_user_data('ID'), 45 );?></div>
			<?php endif;?>
			<?php comment_form($comments_args);?>
		</div>

	<?php else: ?>

		<p class="nocomments"><?php _e( 'Comments are closed.' , 'wp-starter-theme' ); ?></p>

	<?php endif; ?>



	<?php if ( have_comments() ) : ?>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'ns_list_comments', 'style' => 'ol' ) ); ?>
		</ol>


		<?php the_comments_navigation(array(
			'prev_text' => '&larr; Older comments',
			'next_text' => 'Newer comments &rarr;',
		)); ?>


	<?php endif;?>


</section>