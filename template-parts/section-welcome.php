<?php 
global $forclient_options;
$title = $forclient_options['sections-welcome-title'];
$content = $forclient_options['sections-welcome-content'];
$media = $forclient_options['sections-welcome-media'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_welcome', $page_details ); 
?>
<section id="section-welcome" class="<?php if(@$forclient_options['sections-welcome-background-type'] == 1) echo @$forclient_options['sections-welcome-background'] . ' ';?><?php if(@$forclient_options['sections-welcome-color-type'] == 1) echo @$forclient_options['sections-welcome-color'];?>">
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_welcome', $page_details ); ?>
			<div class="row align-items-center">
			<?php if ($media) : ?>
				<div class="col-lg-6">
					<img class="img-fluid img-welcome mb-5 mb-lg-0 wow fadeInLeftBig" src="<?php echo wp_get_attachment_url( $media['id'] ); ?>" alt="<?php echo strip_tags(do_shortcode( $title )) ?>" width="<?php echo $media['width'] ?>" height="<?php echo $media['height'] ?>">
				</div>
			<?php endif; ?>
				<div class="col-lg-<?php if ($media) echo 6; else echo 12 ?>">
					<?php if ($title) : ?>				
						<div class="title-wrapper wow fadeInDown">
							<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
						</div>
					<?php endif; ?>
					<?php if ($content) : ?>				
						<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>					
				</div>
			</div>
			<?php do_action( 'action_after_welcome', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_welcome', $page_details  ); ?>
