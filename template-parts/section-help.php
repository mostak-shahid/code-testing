<?php 
global $forclient_options;
$title = $forclient_options['sections-help-title'];
$content = $forclient_options['sections-help-content'];
$slides = $forclient_options['sections-help-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_help', $page_details ); 
?>
<section id="section-help" class="<?php if(@$forclient_options['sections-help-background-type'] == 1) echo @$forclient_options['sections-help-background'] . ' ';?><?php if(@$forclient_options['sections-help-color-type'] == 1) echo @$forclient_options['sections-help-color'];?>">
	<svg class="btm-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="1928.999px" height="162.982px" viewBox="0 0 1928.999 162.982" enable-background="new 0 0 1928.999 162.982"
		 xml:space="preserve">
		<path d="M0,107.442c0,0,169.018-160.622,349.873,9.481c33.492-23.981,145.13-94.254,290.818,3.346
		c15.071-38.482,108.29-126.6,216.021-119.908c107.731,6.693,154.619,55.772,200.949,114.89
		c17.862-11.154,72.007-27.328,121.686,13.385c44.656-29.559,161.876-73.061,285.236,22.866
		c21.211-31.79,103.824-58.002,152.945-16.174c21.211-24.539,154.061-128.275,311.471-24.539c0,42.795,0,52.193,0,52.193H0V107.442z"
		/>
	</svg>
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_help', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (@$slides) : ?>
					<div class="row helps">
						<?php $delay = 500;?>
						<?php foreach ($slides as $slide):?>
							<div class="col-lg-4 col-md-6 mb-4">
								<div class="help-unit smooth h-100 text-center position-relative wow fadeInUp"  data-wow-delay="<?php echo $delay?>ms">
									<?php if ($slide['attachment_id']) : ?>
										<div class="img-part">
											<img class="img-fluid img-help" src="<?php echo wp_get_attachment_url( $slide['attachment_id'] ) ?>" width="<?php echo $slide['width'] ?>" height="<?php echo $slide['height'] ?>" alt="<?php echo strip_tags(do_shortcode( $slide['title'] )) ?>">
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
		<?php do_action( 'action_after_help', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_help', $page_details  ); ?>