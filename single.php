<?php 
	$categories = get_the_category();
	$tags = get_the_tags();
	get_header(); 
?>

<section class="main-content">
	<div class="entry-block">
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<h4 class="entry-meta">
			<span class="date"><?php _e('เขียนเมื่อ', 'jindatheme') ?> <?php echo get_the_date('H:s, d/m/Y'); ?></span>
			<span class="categories">
				<?php _e('หมวดหมู่', 'jindatheme') ?> 
				<?php echo '<a href="'. esc_url(get_category_link($categories[0]->term_id)) .'" title="'. esc_html($categories[0]->name) .'">'. esc_html($categories[0]->name) .'</a> '; ?>
			</span>
			<span class="tags">
				<?php _e('คำค้น', 'jindatheme') ?>
				<?php the_tags('', ', ', ''); ?>
			</span>
		</h4>
		<article class="entry-content"><?php the_content(); ?></article>
		<!-- comment -->
		<?php 
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
		<!-- comment -->
		<?php endwhile; endif; ?>
	</div>
</section>

<?php get_footer(); ?>
