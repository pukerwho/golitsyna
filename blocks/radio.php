<div class="container">
  <div class="row text-center mb-5">
		<div class="col-md-12">
			<div class="line"></div>
			<h2 class="text-uppercase font-weight-bold my-5">Заказать песню</h2>
			<div class="line"></div>
		</div>
	</div>
	<div class="row">
		<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'radio') );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			<div class="col-md-3">
				<div class="radio">
					<a href="<?php echo rwmb_meta( 'meta-radio-link' ); ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></a>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>