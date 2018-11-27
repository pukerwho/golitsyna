<div class="videos">
	<div class="container">
		<div class="row text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
			<div class="col-md-12">
				<div class="line"></div>
				<h2 class="text-uppercase font-weight-bold my-5">Видео</h2>
				<div class="line"></div>
			</div>
		</div>
		<div class="row mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
			<div class="col-md-12">
				<div class="swiper-container swiper-video">
			    <div class="swiper-wrapper">
			    	<?php 
	          $custom_query = new WP_Query( array( 'post_type' => 'videos' ) );
	          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
	          	<div class="swiper-slide">
	          		<iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo rwmb_meta( 'meta-video-iframe' ); ?>?showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	          	</div>
	          <?php endwhile; endif; ?>
			    </div>
			    <div class="swiper-button-next swiper-video-button-next"></div>
	      	<div class="swiper-button-prev swiper-video-button-prev"></div>
			  </div>	
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="morebutton">
					<a href="https://www.youtube.com/channel/UCOA68HRE0i7Od3QkHsjv7zw" target="_blank">
						<div class="morebutton__inner">
							Смотреть все видео
						</div>	
					</a>
				</div>
			</div>
		</div>
	</div>	
</div>
