<div class="afisha">
	<div class="container">
		<div class="row text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
    <div class="col-md-12">
      <div class="line"></div>
      <h2 class="text-uppercase font-weight-bold my-5">Афиша</h2>
      <div class="line"></div>
    </div>
  </div>
		<?php 
		  $custom_query_afisha = new WP_Query( array( 'post_type' => 'afisha', 'posts_per_page' => 4, 'orderby' => 'menu_order' ) );
		  if ($custom_query_afisha->have_posts()) : while ($custom_query_afisha->have_posts()) : $custom_query_afisha->the_post(); ?>
			<div class="row ticket mb-1">
				<div class="col-md-9 d-flex align-items-center">
					<div class="day">
						<div class="day__num">
							<span><?php echo rwmb_meta( 'meta-afisha-day' ); ?></span>
							<div>
								<p><?php echo rwmb_meta( 'meta-afisha-month' ); ?></p>
								<p><?php echo rwmb_meta( 'meta-afisha-year' ); ?></p>
							</div>
						</div>
					</div>
					<div class="name">
						<p>
							<span>
								<?php echo rwmb_meta( 'meta-afisha-place' ); ?>
							</span>
							<span>
								// <?php echo rwmb_meta( 'meta-afisha-city' ); ?>
							</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="buy" data-number="<?php the_id(); ?>">
						<span>Подробнее</span>
					</div>
				</div>
				<div class="ticket__info" data-open="<?php the_id(); ?>">
					<div class="ticket__info__close">
						<i class="far fa-times-circle"></i>
					</div>
					<div class="ticket__bg-info"></div>
					<div class="ticket__grid lead">
						<div class="mb-3">
							<span class="font-weight-bold">Место проведения:</span> <?php echo rwmb_meta( 'meta-afisha-place' ); ?>
						</div>
						<div class="mb-3">
							<span class="font-weight-bold">Город:</span> <?php echo rwmb_meta( 'meta-afisha-city' ); ?>
						</div>
						<div class="mb-5">
							<?php the_content(); ?>
						</div>
						<?php if(rwmb_meta( 'meta-afisha-link' )): ?>
							<div class="morebutton">
								<a href="<?php echo rwmb_meta( 'meta-afisha-link' ); ?>">
									<div class="morebutton__inner">
										Купить билет
									</div>	
								</a>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<div class="row my-5">
			<div class="col-md-12">
				<div class="morebutton">
					<div class="morebutton__inner loadmore__afisha">
						Полная афиша	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>