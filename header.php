<?php 
global $forclient_options;
if (is_home()) $page_id = get_option( 'page_for_posts' );
elseif (is_front_page()) $page_id = get_option('page_on_front');
else $page_id = get_the_ID();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="Md. Mostak Shahid">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<input id="loader-status" type="hidden" value="<?php echo $forclient_options['misc-page-loader'] ?>">
<?php if ($forclient_options['misc-page-loader']) : ?>
    <div class="se-pre-con">
    <?php if ($forclient_options['misc-page-loader-image']['url']) : ?>
        <img class="img-responsive animation <?php echo $forclient_options['misc-page-loader-image-animation'] ?>" src="<?php echo do_shortcode( $forclient_options['misc-page-loader-image']['url'] ); ?>">
    <?php else : ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
    <?php endif; ?>
    </div>
<?php endif; ?>
	<header id="main-header" class="<?php if (is_front_page()) echo 'fixed-top'; else echo 'position-sticky'; ?>">
		<div class="content-wrap">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light navbar-custom-bg">			
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<span class="<?php if($forclient_options['logo']['id']) echo 'd-md-none';?>">
						<?php if (has_site_icon()) : ?>
							<img class="img-responsive img-fluid img-logo smooth" src="<?php echo get_site_icon_url(32)?>" width="32" height="32" alt="<?php echo bloginfo( 'name' ); ?> - Logo">
						<?php else : ?>
							<?php echo bloginfo( 'name' ); ?>
						<?php endif; ?>
						</span>
						<?php if($forclient_options['logo']['id']) : ?>
							<span class="d-none d-md-inline-block">
								<img class="img-responsive img-fluid img-logo smooth" src="<?php echo $forclient_options['logo']['url']?>" width="<?php echo $forclient_options['logo']['width']?>" height="<?php echo $forclient_options['logo']['height']?>" alt="<?php echo bloginfo( 'name' ); ?> - Logo">
							</span>
						<?php endif ?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div id="collapsibleNavbar" class="navbar-collapse collapse">
						<?php
						wp_nav_menu([
							'menu'            => 'mainmenu',
							'theme_location'  => 'mainmenu',
							'container'       => false,
							'container_id'    => 'collapsibleNavbar',
							'container_class' => 'collapse navbar-collapse',
							'menu_id'         => false,
							'menu_class'      => 'navbar-nav ml-auto mr-auto',
							'depth'           => 2,
							'fallback_cb'     => 'bs4navwalker::fallback',
							//'walker'          => new bs4navwalker()
							]);
						?>
						<div class="header-call">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
								<path class="svg-theme-bg" d="M17.5,0C27.165,0,35,7.835,35,17.5S27.165,35,17.5,35S0,27.165,0,17.5  S7.835,0,17.5,0z"/>
								<path class="svg-white-bg" d="M24.969,21.623c-0.043-0.128-0.312-0.316-0.81-0.565c-0.135-0.078-0.327-0.185-0.575-0.32  c-0.249-0.135-0.474-0.259-0.677-0.373c-0.203-0.114-0.393-0.224-0.57-0.33c-0.028-0.021-0.117-0.083-0.266-0.186  c-0.149-0.103-0.275-0.18-0.378-0.23c-0.103-0.049-0.204-0.074-0.304-0.074c-0.142,0-0.319,0.101-0.532,0.304  c-0.213,0.202-0.409,0.422-0.586,0.661c-0.178,0.238-0.366,0.458-0.565,0.66c-0.199,0.202-0.362,0.304-0.49,0.304  c-0.064,0-0.144-0.018-0.24-0.053c-0.096-0.035-0.169-0.066-0.219-0.091c-0.05-0.025-0.135-0.074-0.256-0.15  c-0.121-0.074-0.188-0.115-0.202-0.122c-0.973-0.54-1.808-1.158-2.504-1.854c-0.696-0.696-1.314-1.53-1.854-2.504  c-0.007-0.014-0.048-0.081-0.123-0.203c-0.075-0.121-0.124-0.205-0.149-0.256c-0.025-0.049-0.055-0.122-0.09-0.218  c-0.036-0.096-0.053-0.176-0.053-0.24c0-0.128,0.101-0.291,0.304-0.491c0.202-0.198,0.423-0.387,0.66-0.564  c0.238-0.178,0.458-0.373,0.661-0.586c0.202-0.214,0.304-0.391,0.304-0.532c0-0.099-0.025-0.201-0.075-0.304  c-0.05-0.104-0.126-0.229-0.229-0.378c-0.103-0.149-0.165-0.238-0.187-0.266c-0.106-0.177-0.216-0.368-0.33-0.57  c-0.114-0.203-0.238-0.428-0.373-0.677c-0.135-0.247-0.241-0.44-0.32-0.575c-0.249-0.497-0.437-0.767-0.565-0.809  c-0.05-0.021-0.124-0.032-0.224-0.032c-0.192,0-0.442,0.035-0.751,0.106c-0.309,0.072-0.552,0.146-0.73,0.224  c-0.355,0.149-0.732,0.582-1.13,1.3c-0.362,0.667-0.543,1.329-0.543,1.983c0,0.191,0.012,0.378,0.037,0.558  c0.025,0.182,0.069,0.385,0.133,0.614c0.064,0.227,0.116,0.396,0.154,0.506c0.039,0.11,0.112,0.306,0.219,0.591  c0.106,0.284,0.17,0.459,0.192,0.523c0.249,0.696,0.543,1.317,0.884,1.864c0.561,0.91,1.326,1.849,2.296,2.819  c0.97,0.97,1.909,1.736,2.819,2.297c0.547,0.34,1.169,0.634,1.865,0.883c0.064,0.021,0.238,0.086,0.522,0.193  c0.284,0.106,0.481,0.179,0.591,0.218c0.11,0.04,0.279,0.091,0.506,0.155c0.228,0.064,0.432,0.108,0.613,0.134  c0.181,0.024,0.368,0.037,0.56,0.037c0.653,0,1.314-0.182,1.982-0.543c0.717-0.398,1.151-0.775,1.3-1.131  c0.078-0.177,0.153-0.42,0.224-0.729c0.071-0.31,0.106-0.56,0.106-0.751C25.002,21.747,24.991,21.673,24.969,21.623z"/>
							</svg>
							<?php echo do_shortcode( '[phone index=1]' ); ?>
						</div>
					</div>
				</nav>				
			</div>
		</div>
	</header>
	<?php 
	if (@get_post_meta($page_id, '_forclient_banner_enable', true ) OR is_404()) :
		$banner_img = get_post_meta( get_the_ID(), '_forclient_banner_cover', true ); 
		$banner_mp4 = get_post_meta( get_the_ID(), '_forclient_banner_mp4', true ); 
		$banner_webm = get_post_meta( get_the_ID(), '_forclient_banner_webm', true ); 
		$banner_shortcode = get_post_meta( get_the_ID(), '_forclient_banner_shortcode', true ); 
		?>
		<section id="page-title" <?php if(@$forclient_options['sections-title-background-type'] == 1) echo 'class="'.@$forclient_options['sections-title-background'].'"';?> <?php if ($banner_img) : ?>style="background-image:url(<?php echo $banner_img ?>)"<?php endif; ?>>
			<?php if ($banner_shortcode) : ?>
				<div class="shortcode-output"><?php echo do_shortcode( $banner_shortcode ); ?></div>
			<?php elseif ($banner_mp4 OR $banner_webm) : ?>
				<div class="video-output">
					<video id="banner-video" autoplay loop muted playsinline <?php if ($banner_img) : ?> style="background-image:url(<?php echo $banner_img ?>)" <?php endif; ?>>
					<?php if($banner_mp4) : ?>
						<source src="<?php echo $banner_mp4 ?>">
					<?php endif; ?>
					<?php if($banner_webm) : ?>
						<source src="<?php echo $banner_webm ?>">
					<?php endif; ?>
					</video>					
				</div>
			<?php endif; ?>
			<div class="content-wrap">
				<div class="container">
					<?php 
					if (is_home()) :
						$page_for_posts = get_option( 'page_for_posts' );
					$title = get_the_title($page_for_posts);
					elseif (is_404()) :
						$title = '404 Page';
					else :
						$title = get_the_title();
					endif; 
					?>
					<span class="heading"><?php echo $title ?></span>
					<?php if (@get_post_meta($page_id, '_forclient_breadcrumb_enable', true )) : ?>
						<div class="d-flex justify-content-center"><?php mos_breadcrumbs(); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif ?>
