<div class="videos">
	<div class="container">
		<div class="row text-center mb-5">
			<div class="col-md-12">
				<div class="line"></div>
				<h2 class="text-uppercase font-weight-bold my-5">Видео</h2>
				<div class="line"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="swiper-container swiper-video">
			    <div class="swiper-wrapper">
			    	<?php 
	          $custom_query = new WP_Query( array( 'post_type' => 'videos' ) );
	          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
	          	<div class="swiper-slide">
	          		<?php echo rwmb_meta( 'meta-video-iframe' ); ?>
	          	</div>
	          <?php endwhile; endif; ?>
			    </div>
			    <div class="swiper-button-next swiper-video-button-next"></div>
	      	<div class="swiper-button-prev swiper-video-button-prev"></div>
			  </div>	
			</div>
		</div>
	</div>	
</div>
