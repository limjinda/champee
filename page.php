<?php get_header(); ?>

<section class="main-content">
	<div class="entry-block">
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<article class="entry-content"><?php the_content(); ?></article>
		<?php endwhile; endif; ?>
	</div>
</section>

<?php get_footer(); ?>
