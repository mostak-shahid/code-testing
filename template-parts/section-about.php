<?php 
global $forclient_options;
$title = $forclient_options['sections-about-title'];
$content = $forclient_options['sections-about-content'];
$slides = $forclient_options['sections-about-slides'];
$media = $forclient_options['sections-about-media'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_about', $page_details ); 
?>
<section id="section-about" class="<?php if(@$forclient_options['sections-about-background-type'] == 1) echo @$forclient_options['sections-about-background'] . ' ';?><?php if(@$forclient_options['sections-about-color-type'] == 1) echo @$forclient_options['sections-about-color'];?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_about', $page_details ); ?>
			<div class="row align-items-center">
				<div class="col-lg-<?php if ($media) echo 6; else echo 12 ?>">
					<?php if ($title) : ?>				
						<div class="title-wrapper wow fadeInDown">
							<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
						</div>
					<?php endif; ?>
					<?php if ($content) : ?>				
						<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>	
					<?php if(@$slides) : ?>
						<div class="row slides">
							<?php $delay = 500;?>
							<?php foreach ($slides as $slide) : ?>
								<div class="col-lg-6 mb-4">
									<div class="slide-unit h-100 text-center wow fadeInUp" data-wow-delay="<?php echo $delay?>ms">										
										<?php if ($slide['link_title']) : ?>
											<div class="counter-part">
												<span class="counter"><?php echo do_shortcode( $slide['link_title'] ) ?></span>
												<?php if ($slide['link_url']) : ?>
													<span class="symbol"><?php echo do_shortcode( $slide['link_url'] ) ?></span>	
												<?php endif; ?>
											</div>											
										<?php endif; ?>
										<?php if ($slide['title']) : ?>
											<div class="title-part"><?php echo do_shortcode( $slide['title'] ) ?></div>
										<?php endif; ?>
									</div>
								</div>
								<?php $delay = $delay + 200 ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>				
				</div>
			<?php if ($media) :?>
				<div class="col-lg-6">
					<img class="img-fluid img-about mt-5 mt-lg-0 wow fadeInRightBig" src="<?php echo wp_get_attachment_url($media['id']) ?>" alt="<?php echo strip_tags(do_shortcode( $title )); ?>" width="<?php echo $media['width'] ?>" height="<?php echo $media['height'] ?>">
				</div>
			<?php endif ?>
			</div>
		<?php do_action( 'action_after_about', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>
<script>
jQuery(document).ready(function($) {
	$('.counter').counterUp({
	    delay: 20,
	    time: 1000
	});
});
</script>