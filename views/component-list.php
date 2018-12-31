<section class="main-content">
	<ul class="post-listing">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<li class="post-item">
				<figure>
					<a href="<?php the_permalink(); ?>" class="cover-wrapper" title="<?php the_title(); ?>">
						<img data-src="<?php echo has_post_thumbnail() ? the_post_thumbnail_url('grid') : 'https://www.placehold.it/600x450' ?>" class="img-fluid lazyload" alt="post image" />
					</a>
					<figcaption>
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h3>
						<p class="post-desc"><?php echo mb_strimwidth( wp_strip_all_tags( get_the_content() ), 0, 200, '...', 'UTF-8' ); ?></p>
					</figcaption>
				</figure>
			</li>
		<?php endwhile; endif; ?>
	</ul>
	<!-- pagination -->
	<div class="pagination-block">
		<div class="pagination-col text-right">
			<?php previous_posts_link( __('ย้อนกลับ', 'jindatheme') ) ?>
		</div>
		<div class="pagination-col">
			<?php next_posts_link( __('หน้าถัดไป', 'jindatheme') ) ?>
		</div>
	</div>
</section>
