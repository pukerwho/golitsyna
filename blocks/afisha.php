<div class="afisha">
	<div class="container">
		<div class="row text-center mb-5">
    <div class="col-md-12">
      <div class="line"></div>
      <h2 class="text-uppercase font-weight-bold my-5">Афиша</h2>
      <div class="line"></div>
    </div>
  </div>
		<?php 
		  $custom_query = new WP_Query( array( 'post_type' => 'afisha', 'posts_per_page' => 5 ) );
		  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
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
								<?php the_title(); ?>
							</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="buy">
						<a href="#">Купить билет</a>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<div class="row my-5">
			<div class="col-md-12">
				<div class="morebutton">
					<div class="morebutton__inner">
						Полная афиша	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>