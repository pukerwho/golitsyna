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
				    echo '<div class="photoalbum__grid__item"><a href="', $image['full_url'], '" data-lightbox="image-1" data-title="', $title_img,'"><img src="', $image['url'], '"></a></div>';
				} 
			?>
		</div>
	</div>
</div>