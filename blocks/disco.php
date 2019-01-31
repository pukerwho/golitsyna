<div class="disco">
	<div class="container">
		<div class="row text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
			<div class="col-md-12">
				<div class="line"></div>
				<h2 class="text-uppercase font-weight-bold my-5">Дискография</h2>
				<div class="line"></div>
			</div>
		</div>
		<div class="row mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			  $custom_query_disco = new WP_Query( array( 'post_type' => 'disco', 'posts_per_page' => 4, 'orderby' => 'menu_order' ) );
			  if ($custom_query_disco->have_posts()) : while ($custom_query_disco->have_posts()) : $custom_query_disco->the_post(); ?>
				<div class="col-sm-6 col-lg-3 mb-4">
					<div class="disc">
						<div class="disc__img mb-4" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
						<div class="disc__title text-uppercase font-weight-bold text-center mb-4">
							<?php the_title(); ?>
						</div>
						<div class="disc__year text-center pb-4">
							Год выпуска: <?php echo rwmb_meta( 'meta-disco-year' ); ?>
						</div>
						<div class="buttons pb-4">
							<div class="buttons__dark">
								<a href="<?php echo rwmb_meta( 'meta-disco-itunes-link' ); ?>" target="_blank">iTunes</a>
							</div>
							<div class="buttons__light">
								<a href="<?php echo rwmb_meta( 'meta-disco-playmarket-link' ); ?>" target="_blank">Play Market</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="morebutton">
					<div class="morebutton__inner loadmore__disco">
						Еще альбомы
					</div>
				</div>
			</div>
		</div>
	</div>
</div>