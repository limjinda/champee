<?php 
	$author = get_userdata(1);
?>

<section class="sidebar-wrapper">
	<figure class="author-block">
		<?php echo get_avatar( $author->user_email, 150, '', $author->display_name, array('class' => 'author-image') ); ?>
		<figcaption>
			<h2 class="author-name"><?php echo $author->display_name; ?></h2>
			<p><?php echo $author->description; ?></p>
		</figcaption>
	</figure>
	<ul class="social-list">
		<?php if ( get_field('enable_facebook', 'option') ): ?>
		<li><a target="_blank" title="link to facebook" href="<?php the_field('facebook_url', 'option'); ?>" class="social-btn facebook"><i class="icon icon-facebook"></i></a></li>
		<?php endif ?>
		<?php if ( get_field('enable_twitter', 'option') ): ?>
		<li><a target="_blank" title="link to twitter" href="<?php the_field('twitter_url', 'option'); ?>" class="social-btn twitter"><i class="icon icon-twitter"></i></a></li>
		<?php endif ?>
		<?php if ( get_field('enable_instagram', 'option') ): ?>
		<li><a target="_blank" title="link to instagram" href="<?php the_field('instagram_url', 'option'); ?>" class="social-btn instagram"><i class="icon icon-instagram"></i></a></li>
		<?php endif ?>
		<?php if ( get_field('enable_github', 'option') ): ?>
		<li><a target="_blank" title="link to github" href="<?php the_field('github_url', 'option'); ?>" class="social-btn github"><i class="icon icon-github"></i></a></li>
		<?php endif ?>
		<?php if ( get_field('enable_linkedin', 'option') ): ?>
		<li><a target="_blank" title="link to linkedin" href="<?php the_field('linkedin_url', 'option'); ?>" class="social-btn linkedin"><i class="icon icon-linkedin"></i></a></li>
		<?php endif ?>
	</ul>
	
	<div class="short-dashed"></div>

	<nav class="left-navigation">
		<?php wp_nav_menu( array(
			'container' => false,
			'theme_location' => 'navigation',
		) ); ?>
	</nav>
	
</section>
