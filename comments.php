<div id="comments" class="comments-area">
	
	<h2 class="comments-title">
		<?php if ( have_comments() ) : ?>
			<i class="icon icon-chat"></i> 
			<?php
				printf( _nx( 'ความคิดเห็นเกี่ยวกับ %2$s', '%1$s ความเห็นเกี่ยวกับ %2$s', get_comments_number(), '', 'jindatheme' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		<?php endif; ?>
	</h2>

	<ol class="comment-list">
    <?php
      wp_list_comments( array(
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 40,
        'reply_text'  => __('ตอบกลับ', 'jindatheme')
      ) );
    ?>
  </ol>

  <?php get_template_part('views/component', 'comment-form'); ?>

</div>
