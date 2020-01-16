<?php 
global $forclient_options;
if (is_home()) $page_id = get_option( 'page_for_posts' );
else $page_id = get_the_ID();

$from_theme_option = $forclient_options['archive-page-sections'];
$from_page_option = get_post_meta( $page_id, '_forclient_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];

?><?php get_header() ?>
<section id="archive" class="page-content <?php if(@$forclient_options['sections-content-background-type'] == 1) echo @$forclient_options['sections-content-background'] . ' ';?><?php if(@$forclient_options['sections-content-color-type'] == 1) echo @$forclient_options['sections-content-color'];?>">
	<div class="content-wrap">
		<div class="container">
			<?php if ( have_posts() ) :?>
				<div class="row blogs">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-lg-4 col-md-6 mb-4">							
							<?php get_template_part( 'content', get_post_format() ) ?>
						</div>
					<?php endwhile;?>						
				</div>
				<div class="pagination-wrapper">
				<?php
					the_posts_pagination( array(
						'show_all' => false,
						'screen_reader_text' => " ",
						'prev_text'          => 'Prev',
						'next_text'          => 'Next',
					) );
				?>
				</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>			
		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>