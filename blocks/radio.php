<div class="container">
  <div class="row text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
		<div class="col-md-12">
			<div class="line"></div>
			<h2 class="text-uppercase font-weight-bold my-5">Заказать песню</h2>
			<div class="line"></div>
		</div>
	</div>
	<div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
		<div class="col-md-12">
			<div class="radio__grid">
				<?php 
			  $custom_query = new WP_Query( array( 'post_type' => 'radio', 'posts_per_page' => 15, 'orderby' => 'menu_order') );
			  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="radio__item">
						<a href="<?php echo rwmb_meta( 'meta-radio-link' ); ?>" target="_blank"><img data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></a>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>