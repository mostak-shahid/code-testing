				    			<div class="post-<?php echo get_the_ID();?> blog-unit h-100 position-relative wow fadeInUp"  data-wow-delay="<?php echo $delay?>ms">
				    				<?php if (!is_single()) : ?>
				    				<?php if (has_post_thumbnail()) : ?>
				    					<div class="img-part"><img class="img-fluid img-blog" src="<?php echo aq_resize(get_the_post_thumbnail_url(),350,270,true) ?>" alt="<?php echo get_the_title() ?>" width="350" height="270"></div>
				    					<?php endif; ?>
				    				<div class="meta-part d-table w-100">
				    					<div class="d-table-cell text-left"><?php echo get_the_author_meta('display_name') ?></div>
				    					<div class="d-table-cell text-right"><?php echo get_the_date('j M Y') ?></div>
				    				</div>
				    				<?php endif; ?>
				    				<h3 class="title-part smooth"><?php echo get_the_title() ?></h3>
			    					<div class="content">
										<?php if (is_single()) : ?>
											<?php the_content()?>
										<?php else : ?>
											<?php echo wp_trim_words(get_the_content(), 30, ''); ?>	
											<?php if(is_search()) : ?>
												<p class="text-capitalize"><span class="badge badge-info"><?php echo get_post_type() ?></span></p>
											<?php endif; ?>
											<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
										<?php endif; ?>						
									</div>				    				
				    			</div>

