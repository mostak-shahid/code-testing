<?php 
global $forclient_options;
$title = $forclient_options['sections-blog-title'];
$content = $forclient_options['sections-blog-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blog', $page_details ); 
?>
<section id="section-blog" class="<?php if(@$forclient_options['sections-blog-background-type'] == 1) echo @$forclient_options['sections-blog-background'] . ' ';?><?php if(@$forclient_options['sections-blog-color-type'] == 1) echo @$forclient_options['sections-blog-color'];?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_blog', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					?>
					<?php $delay = 500;?>
				    <div class="row blogs">
				    	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				    		<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				    			<div class="blog-unit h-100 position-relative wow fadeInUp"  data-wow-delay="<?php echo $delay?>ms">
				    				<?php if (has_post_thumbnail()) : ?>
				    					<div class="img-part"><img class="img-fluid img-blog" src="<?php echo aq_resize(get_the_post_thumbnail_url(),350,270,true) ?>" alt="<?php echo get_the_title() ?>" width="350" height="270"></div>
				    				<?php endif; ?>
				    				<div class="meta-part d-table w-100">
				    					<div class="d-table-cell text-left"><?php echo get_the_author_meta('display_name') ?></div>
				    					<div class="d-table-cell text-right"><?php echo get_the_date('j M Y') ?></div>
				    				</div>
				    				<h3 class="title-part smooth"><?php echo get_the_title() ?></h3>
				    				<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
				    			</div>
				    		</div>
				        	<?php $delay = $delay + 200 ?>
				    	<?php endwhile; ?>
				    </div>
				<?php endif;
				wp_reset_postdata();
				?>
		<?php do_action( 'action_after_blog', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_blog', $page_details  ); ?>