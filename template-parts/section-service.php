<?php 
global $forclient_options;
$title = $forclient_options['sections-service-title'];
$content = $forclient_options['sections-service-content'];
$slides = $forclient_options['sections-service-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_service', $page_details ); 
?>
<section id="section-service" class="<?php if(@$forclient_options['sections-service-background-type'] == 1) echo @$forclient_options['sections-service-background'] . ' ';?><?php if(@$forclient_options['sections-service-color-type'] == 1) echo @$forclient_options['sections-service-color'];?>">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<?php do_action( 'action_before_service', $page_details ); ?>
					<?php if ($title) : ?>				
						<div class="title-wrapper wow fadeInDown">
							<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
						</div>
					<?php endif; ?>
					<?php if ($content) : ?>				
						<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>
					<?php if($slides) : ?>
						<div class="row services">
						<?php $delay = 500;?>
						<?php foreach($slides as $slide) : ?>
							<div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
								<div class="service-unit smooth h-100 text-center position-relative bg-white wow fadeInUp"  data-wow-delay="<?php echo $delay?>ms">
								<?php if ($slide['attachment_id']) : ?>
									<div class="img-part position-relative">										
										<!-- photo_attachment_id -->
										<img class="img-fluid img-service img-service-one smooth" src="<?php echo wp_get_attachment_url( $slide['attachment_id'] ) ?>" width="<?php echo $slide['width'] ?>" height="<?php echo $slide['height'] ?>" alt="<?php echo strip_tags(do_shortcode( $slide['title'] )) ?>">
										<img class="img-fluid img-service img-service-two smooth" src="<?php echo wp_get_attachment_url( $slide['photo_attachment_id'] ) ?>" width="<?php echo $slide['photo_width'] ?>" height="<?php echo $slide['photo_height'] ?>" alt="<?php echo strip_tags(do_shortcode( $slide['title'] )) ?>">
									</div>
								<?php endif; ?>
								<?php if ($slide['title']) : ?>
									<h3 class="title-part"><?php echo do_shortcode( $slide['title'] ) ?></h3>
								<?php endif; ?>
								<?php if ($slide['description']) : ?>
									<div class="description-part"><?php echo do_shortcode( $slide['description'] ) ?></div>
								<?php endif; ?>
								<?php if ($slide['link_title'] AND $slide['link_url']) : ?>
									<span class="link_title-part"><?php echo do_shortcode( $slide['link_title'] ) ?></span>
								<?php endif; ?>
								<?php if ($slide['link_url']) : ?>
									<a href="<?php echo esc_url(do_shortcode($slide['link_url'])); ?>" class="hidden-link">Read More</a>
								<?php endif; ?>
								</div>
							</div>
							<?php $delay = $delay + 200 ?>
						<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php do_action( 'action_after_service', $page_details ); ?>
				</div>
			</div>
		</div>
	
	</div>
</section>
<?php do_action( 'action_below_service', $page_details  ); ?>