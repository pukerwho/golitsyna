<div class="container">
	<div class="row text-center mb-5">
		<div class="col-md-12">
			<h2 class="text-uppercase font-italic font-weight-bold">Фотогалерея</h2>
		</div>
	</div>
	<div class="row mb-5">
		<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'photoalbums', 'posts_per_page' => 4 ) );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
	  	<div class="col-md-3">
				<a href="<?php the_permalink(); ?>">
					<div class="photoalbum" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');">
						<div class="photoalbum__bg"></div>
						<div class="photoalbum__title">
							<?php the_title(); ?>	
						</div>
					</div>
				</a>
			</div>
		<?php endwhile; endif; ?>
	</div>
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="morebutton">
				<div class="morebutton__inner">
					Больше фотоальбомов	
				</div>
			</div>
		</div>
	</div>
</div>