<?php
add_filter('show_admin_bar', false, PHP_INT_MAX);
//show_admin_bar( false );
function disable_mytheme_action() {
	define('DISALLOW_FILE_EDIT', TRUE);
	define('DISALLOW_FILE_MODS',true);
}
//add_action('init','disable_mytheme_action');
require_once('functions/theme-init/plugin-update-checker.php');
$themeInit = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/mostak-shahid/update/master/forclient.json',
	__FILE__,
	'forclient'
);
require_once('functions/theme-functions.php');
require_once('functions/scripts.php');
require_once('functions/setup.php');
require_once('functions/shortcodes.php');
require_once('functions/widgets.php');
require_once('functions/custom-comments.php');
require_once('functions/theme-filter-hooks.php');
require_once('functions/ajax.php');
require_once('functions/vc-templates.php');

require_once('inc/theme-options/ReduxCore/framework.php'); 
//require_once('inc/theme-options/sample/sample-config.php');
require_once('functions/theme-options.php');
require_once('inc/theme-options/loader.php');

require_once('inc/metabox/init.php'); 
require_once('inc/metabox/custom-cmb2-fields.php'); 
require_once('inc/metabox/extensions/cmb-field-sorter/cmb-field-sorter.php');
require_once('functions/metaboxes.php'); 
require_once('inc/TGM-Plugin-Activation-develop/plugin-management.php');

require_once('functions/aq_resizer.php');
require_once('functions/Mobile_Detect.php');
require_once('functions/bs4navwalker.php');
require_once('functions/breadcrumb.php');
if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {    
    // WP > 5 beta
    add_filter('use_block_editor_for_post_type', '__return_false', 100);    
} else {    
    // WP < 5 beta
    add_filter('gutenberg_can_edit_post_type', '__return_false');    
}



function order_tracking_func() {
	$output = array();
	$html = '<div class="w-100 pt-4"><div class="mt-2 pt-4 border-top"><div class="pt-2">';
	$data = array();
    if ( isset($_REQUEST) ) {
		$value = explode('=', $_REQUEST['form_data']);
		$data[$value[0]] = $value[1]; 
		$order = get_page_by_title( $value[1], OBJECT,'courierorder' );

		$args = array(
			'post_type' => 'courierorder',
			'posts_per_page' => 1,
			'meta_key'  => '_mos_courier_receiver_number',
			'meta_value'  => $value[1],
		);
		$query = new WP_Query( $args );

		if ($order) {
			$html .= '<table class="table table-borderless table-sm">';
			$html .= '<tr><th>CL No</th><td class="text-right">'.$value[1].'</td></tr>';
			$html .= '<tr><th>Mechant Order ID</th><td class="text-right">'.$order->ID.'</td></tr>';
			$html .= '<tr><th>Zone</th><td class="text-right">'.get_post_meta( $order->ID, '_mos_courier_delivery_zone', true ).'</td></tr>';
			$html .= '<tr><th>Booking Date</th><td class="text-right">'.get_post_meta( $order->ID, '_mos_courier_booking_date', true ).'</td></tr>';
			$html .= '<tr><th>Delivery Date</th><td class="text-right">'.get_post_meta( $order->ID, '_mos_courier_delivery_date', true ).'</td></tr>';
			$html .= '<tr><th>Current Status</th><td class="text-right">'.get_post_meta( $order->ID, '_mos_courier_delivery_status', true ).'</td></tr>';
			$html .= '<tr><th>Receiver Name</th><td class="text-right">'.get_post_meta( $order->ID, '_mos_courier_receiver_name', true ).'</td></tr>';
			$html .= '<tr><th>Remarks</th><td class="text-right">'.get_post_meta( $order->ID, '_mos_courier_remarks', true ).'</td></tr>';
			$html .= '</table>';
		} elseif ( $query->have_posts() ) {
			while ( $query->have_posts() ) : $query->the_post();
				$html .= '<table class="table table-borderless table-sm">';
				$html .= '<tr><th>CL No</th><td class="text-right">'.get_the_title().'</td></tr>';
				$html .= '<tr><th>Mechant Order ID</th><td class="text-right">'.get_the_ID().'</td></tr>';
				$html .= '<tr><th>Zone</th><td class="text-right">'.get_post_meta( get_the_ID(), '_mos_courier_delivery_zone', true ).'</td></tr>';
				$html .= '<tr><th>Booking Date</th><td class="text-right">'.get_post_meta( get_the_ID(), '_mos_courier_booking_date', true ).'</td></tr>';
				$html .= '<tr><th>Delivery Date</th><td class="text-right">'.get_post_meta( get_the_ID(), '_mos_courier_delivery_date', true ).'</td></tr>';
				$html .= '<tr><th>Current Status</th><td class="text-right">'.get_post_meta( get_the_ID(), '_mos_courier_delivery_status', true ).'</td></tr>';
				$html .= '<tr><th>Receiver Name</th><td class="text-right">'.get_post_meta( get_the_ID(), '_mos_courier_receiver_name', true ).'</td></tr>';
				$html .= '<tr><th>Remarks</th><td class="text-right">'.get_post_meta( get_the_ID(), '_mos_courier_remarks', true ).'</td></tr>';
				$html .= '</table>';
		    endwhile;			 
		    wp_reset_postdata();
		} else {
			$html .= '<h5 id="no-order" class="text-color-2 text-center font-18 font-md-16 mb-0">Sorry! Found Nothing. </h5>';
		}
		$html .= '</div></div></div>'; 	
		echo json_encode($html);   
    }
	die();
} 
add_action( 'wp_ajax_order_tracking', 'order_tracking_func' );
add_action( 'wp_ajax_nopriv_order_tracking', 'order_tracking_func' );