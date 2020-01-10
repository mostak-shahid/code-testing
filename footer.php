<?php 
global $forclient_options;
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
  <?php get_template_part( 'template-parts/section', 'widgets' ); ?>
  <footer id="footer" class="<?php if(@$forclient_options['sections-footer-background-type'] == 1) echo @$forclient_options['sections-footer-background'] . ' ';?><?php if(@$forclient_options['sections-footer-color-type'] == 1) echo @$forclient_options['sections-footer-color'];?>">
    <div class="content-wrap">
      <div class="container">
        <?php echo do_shortcode( $forclient_options['sections-footer-content'] ); ?>
        <div class="row align-items-center">
          <div class="col-md-2 text-center text-md-left"><?php echo do_shortcode('[site-identity]'); ?></div>
          <div class="col-md-8 text-center"><?php echo do_shortcode('[copyright-symbol]')?> 2016 - <?php echo do_shortcode('[this-year]')?> <?php echo do_shortcode('[site-name]')?>. All right reserved. Developed by <a class="theme-credit" href="https://www.mdmostakshahid.me" target="_blank">Md. Mostak Shahid</a></div>
          <!-- <div class="col-md-2 text-center text-md-right">Social Links</div> -->
        </div>
      </div>
    </div>
  </footer>
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