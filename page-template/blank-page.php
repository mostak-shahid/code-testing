<?php 
global $forclient_options;
$from_theme_option = $forclient_options['general-page-sections'];
$from_page_option = get_post_meta( get_the_ID(), '_forclient_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
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
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>


<?php
if ($forclient_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
?>
<?php wp_footer(); ?> 
<?php if ($forclient_options['misc-settings-css']) : ?>
  <style>
    <?php echo $forclient_options['misc-settings-css'] ?>    
  </style>
<?php endif; ?>
<?php if ($forclient_options['misc-settings-js']) : ?>
  <script>
    <?php echo $forclient_options['misc-settings-js'] ?> 
  </script>
<?php endif; ?>
</body>
</html>