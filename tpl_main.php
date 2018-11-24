<?php
/*
Template Name: Главная
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'blocks/slider', 'default' ); ?>


<!-- 
<div class="welcome">
	<div class="cover">
		<div class="cover__bg"></div>
		<div class="cover__content">
			<div class="container relative">
				<div class="row">
					<div class="col-md-12">
						<div class="cover__content__main text-uppercase mb-4">
							Cайт скоро заработает
						</div>
						<div id="countdown" class="cover__content__text text-uppercase">
							<p>
								Премьера клипа
							</p>
						</div>
					</div>
					<a id="play-video" class="video-play-button" href="#">
					  <span></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="tv">
		<div class="screen mute" id="tv"></div>
	</div>
</div> -->

<div class="my-5 pb-5">
	<?php get_template_part( 'blocks/audioplayer', 'default' ); ?>	
</div>
<div class="my-5 pb-5">
	<?php get_template_part( 'blocks/photoalbums', 'default' ); ?>	
</div>
<div class="my-5 pb-5">
	<?php get_template_part( 'blocks/video', 'default' ); ?>	
</div>
<div class="mb-5 pb-5">
	<?php get_template_part( 'blocks/disco', 'default' ); ?>	
</div>
<div class="mb-5 pb-5">
	<?php get_template_part( 'blocks/bio', 'default' ); ?>	
</div>
<div class="my-5 pb-5">
	<?php get_template_part( 'blocks/afisha', 'default' ); ?>	
</div>
<div class="mb-5 pb-5">
	<?php get_template_part( 'blocks/radio', 'default' ); ?>	
</div>
<div class="mb-5 pb-5">
	<?php get_template_part( 'blocks/contact', 'default' ); ?>	
</div>

<?php get_footer(); ?>