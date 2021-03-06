<div class="container">
  <div class="row text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
		<div class="col-md-12">
			<div class="line"></div>
			<h2 class="text-uppercase font-weight-bold my-5">Моя история</h2>
			<div class="line"></div>
		</div>
	</div>
	<div class="row" data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
		<div class="col-md-9">
			<div class="biography__one lead">
				<?php echo get_option('biography_one'); ?>
			</div>
			<div class="biography__two lead mt-5">
				<?php echo get_option('biography_two'); ?>
			</div>
			<div class="biography__button text-center">
				<span>Читать дальше</span>
			</div>
		</div>
		<div class="col-md-3 pc-show">
			<div class="biography__img" data-aos="fade-left" data-aos-anchor-placement="center-bottom" data-aos-duration="1000" data-aos-delay="1300">
				<img src="<?php bloginfo('template_url'); ?>/img/biography_img.jpg" alt="">
			</div>			
		</div>
	</div>
</div>
