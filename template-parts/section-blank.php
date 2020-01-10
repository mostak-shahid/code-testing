<?php 
global $forclient_options;
$title = $forclient_options['sections-blank-title'];
$content = $forclient_options['sections-blank-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blank', $page_details ); 
?>
<section id="section-blank" class="<?php if(@$forclient_options['sections-blank-background-type'] == 1) echo @$forclient_options['sections-blank-background'] . ' ';?><?php if(@$forclient_options['sections-blank-color-type'] == 1) echo @$forclient_options['sections-blank-color'];?>">
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_blank hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_blank', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
		<?php 
		/*
		* action_after_blank hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_blank', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_blank', $page_details  ); ?>