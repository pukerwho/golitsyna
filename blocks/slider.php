<div class="slider" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="swiper-container swiper-slide swiper-slide-mobile">
			    <div class="swiper-wrapper">
			    	<?php 
	          $custom_query = new WP_Query( array( 'post_type' => 'slider', 'orderby' => 'menu_order' ) );
	          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
	          	<div class="swiper-slide d-flex align-items-center">
	          		<div class="offset-md-1 col-md-6">
		          		<div class="slider__title mb-4">
		          			<?php the_title(); ?>
		          		</div>
		          		<div class="slider__description mb-4">
		          			<?php echo rwmb_meta( 'meta-slider-description' ); ?>
		          		</div>
		          		<div class="slider__button">
		          			<a href="<?php echo rwmb_meta( 'meta-slider-button-link' ); ?>"><?php echo rwmb_meta( 'meta-slider-button' ); ?></a>
		          			
		          		</div>	
	          		</div>
	          		<div class="slider__img">
	          			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
	          		</div>
	          	</div>
	          <?php endwhile; endif; ?>
			    </div>
			    <div class="pc-show">
				    <div class="swiper-button-next swiper-slide-button-next"></div>
		      	<div class="swiper-button-prev swiper-slide-button-prev"></div>	
			    </div>
			  </div>	
			</div>
		</div>
	</div>
	<div class="slider__bg"></div>
</div>