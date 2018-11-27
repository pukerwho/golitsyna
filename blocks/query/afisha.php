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