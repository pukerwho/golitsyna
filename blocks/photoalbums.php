<div class="container">
	<div class="row text-center mb-5">
		<div class="col-md-12">
			<div class="line"></div>
			<h2 class="text-uppercase font-weight-bold my-5">Фотогалерея</h2>
			<div class="line"></div>
		</div>
	</div>
	<div class="row mb-5">
		<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'photoalbums', 'posts_per_page' => 4 ) );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
	  	<div class="col-md-3">
				<div class="photoalbum" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');">
					<div class="photoalbum__bg"></div>
					<div class="photoalbum-info">
						<div class="photoalbum__title">
							<?php the_title(); ?>
						</div>
						<div class="photoalbum__button">
							<p>
								Смотреть больше
							</p>
						</div>
					</div>
				</div>
<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

<div class="photoalbum__gallery">
	<div class="photoalbum__gallery__close">
		<i class="far fa-times-circle"></i>
	</div>
	<div class="fotorama" data-nav="thumbs" data-width="100%" data-auto="false">
	  <?php 
			$images = rwmb_meta( 'meta-images', array( 'size' => 'full' ));
			foreach ( $images as $image ) {
			  echo '<img src="', $image['url'], '">';
			} 
		?>
	  
	</div>
</div>
<!-- 2. Add images to <div class="fotorama"></div>. -->


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