<div class="col-md-3 mb-4">
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
				<a href="<?php echo rwmb_meta( 'meta-disco-itunes-link' ); ?>">iTunes</a>
			</div>
			<div class="buttons__light">
				<a href="<?php echo rwmb_meta( 'meta-disco-playmarket-link' ); ?>">Play Market</a>
			</div>
		</div>
	</div>
</div>