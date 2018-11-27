<div class="photoalbums">
<div class="container">
	<div class="row text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
		<div class="col-md-12">
			<div class="line"></div>
			<h2 class="text-uppercase font-weight-bold my-5">Фотогалерея</h2>
			<div class="line"></div>
		</div>
	</div>
	<div class="row mb-5" data-aos="fade-right" data-aos-anchor-placement="center-bottom">
		<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  $custom_query_photoalbums = new WP_Query( array( 'post_type' => 'photoalbums', 'posts_per_page' => 4, 'orderby' => 'menu_order' ) );
		  if ($custom_query_photoalbums->have_posts()) : while ($custom_query_photoalbums->have_posts()) : $custom_query_photoalbums->the_post(); ?>
	  	<div class="col-md-3 mb-4">
				<div class="photoalbum" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');">
					<div class="photoalbum__bg"></div>
					<div class="photoalbum-info">
						<div class="photoalbum__title">
							<?php the_title(); ?>
						</div>
						<div class="photoalbum__button" data-number="<?php the_id(); ?>">
							<p>
								Смотреть больше
							</p>
						</div>
					</div>
				</div>
				<div class="photoalbum__gallery" data-open="<?php the_id(); ?>">
					<div class="photoalbum__gallery__close">
						<i class="far fa-times-circle"></i>
					</div>
					<div class="photoalbum__bg-gallery"></div>
					<div class="photoalbum__grid">
						<?php 
							$images = rwmb_meta( 'meta-images', array( 'size' => 'large' ) );
							$title_img = get_the_title();
							foreach ( $images as $image ) {
							    echo '<div class="photoalbum__grid__item"><a href="', $image['full_url'], '" data-lightbox="', $title_img,'" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
							} 
						?>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="morebutton">
				<div class="morebutton__inner loadmore">
					Больше фотоальбомов	
				</div>
			</div>
		</div>
	</div>
</div>
</div>