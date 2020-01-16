<?php 
global $forclient_options;
$title = $forclient_options['sections-project-title'];
$content = $forclient_options['sections-project-content'];
$list = $forclient_options['sections-project-list'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_project', $page_details ); 
?>
<section id="section-project" class="<?php if(@$forclient_options['sections-project-background-type'] == 1) echo @$forclient_options['sections-project-background'] . ' ';?><?php if(@$forclient_options['sections-project-color-type'] == 1) echo @$forclient_options['sections-project-color'];?>">
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_project', $page_details ); ?>
			<?php if ($title) : ?>				
				<div class="title-wrapper wow fadeInDown">
					<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
				</div>
			<?php endif; ?>
			<?php if ($content) : ?>				
				<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
			<?php endif; ?>
			<?php if (@$list) : ?>
				<div class="row projects">
					<?php $delay = 500;?>
					<?php foreach ($list as $post_id) : ?>
						<?php if (has_post_thumbnail( $post_id )) : ?>
							<?php $link = get_post_meta( $post_id, '_forclient_project_url', true ); ?>
							<?php $gallery_images = get_post_meta( $post_id, '_forclient_project_gallery_images', true ); ?>
							<div class="col-lg-4 col-md-6 mb-4">
								<div class="project-unit text-center position-relative wow fadeInUp" data-wow-delay="<?php echo $delay?>ms">
									<img class="img-fluid img-project" src="<?php echo aq_resize(get_the_post_thumbnail_url( $post_id ), 350, 215, true); ?>" alt="<?php echo get_the_title( $post_id ); ?>">
									<div class="overlay smooth">
										<div class="recent-work-inner d-flex  justify-content-center align-items-center h-100">
											<a class="gallery-preview" data-fancybox="gallery-<?php echo $post_id?>" data-caption="<?php echo get_the_title( $post_id ); ?>" href="<?php echo get_the_post_thumbnail_url( $post_id )?>"><i class="fa fa-plus"></i></a>
										<?php if ($link): ?>
											<a class="link-preview" href="<?php echo esc_url(do_shortcode( $link )); ?>" target="_blank"><i class="fa fa-chain"></i></a>
										<?php endif; ?>
										</div>
										<h4 class="title-project"><?php echo get_the_title( $post_id ); ?></h4>
	                            	</div>
								</div>
								<div class="d-none">
									<?php if(@$gallery_images) : ?>
										<?php foreach($gallery_images as $attachment_id => $url) : ?>
											<a data-fancybox="gallery-<?php echo $post_id?>" data-caption="<?php echo get_the_title( $post_id ); ?>" href="<?php echo wp_get_attachment_url( $attachment_id )?>"></a>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
							<?php $delay = $delay + 200 ?>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			<?php endif; ?>
			<?php do_action( 'action_after_project', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_project', $page_details  ); ?>