<?php 
global $forclient_options;
$title = $forclient_options['sections-eform-title'];
$content = $forclient_options['sections-eform-content'];
$shortcode = $forclient_options['sections-eform-shortcode'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_eform', $page_details ); 
?>
<section id="section-eform" class="<?php if(@$forclient_options['sections-eform-background-type'] == 1) echo @$forclient_options['sections-eform-background'] . ' ';?><?php if(@$forclient_options['sections-eform-color-type'] == 1) echo @$forclient_options['sections-eform-color'];?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_eform', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($shortcode) : ?>
					<div class="form-wrapper wow fadeInUpBig">
						<?php echo do_shortcode( $shortcode ); ?>
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_eform', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_eform', $page_details  ); ?>