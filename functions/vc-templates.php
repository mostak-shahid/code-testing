<?php
/*for more details
https://kb.wpbakery.com/docs/inner-api/vc_map/
https://github.com/proteusthemes/visual-composer-elements
*/
/*
function bartag_func( $atts = array(), $content = '' ) {
	$atts = shortcode_atts( array(
		'foo' => 'something',
		'color' => '#FFF'
	), $atts, 'bartag' );	
	return '<div style="color:'.$atts['color'].'" data-foo="'.$atts['foo'].'">'.$content.'</div>';
}
add_shortcode( 'bartag', 'bartag_func' );
add_action( 'vc_before_init', 'your_name_integrateWithVC' );
function your_name_integrateWithVC() {
	vc_map( array(
		"name" => __( "Bar tag test", "my-text-domain" ),
		"base" => "bartag",
		"class" => "",
		"category" => __( "Content", "my-text-domain"),
		// 'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		// 'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		'icon'     => get_template_directory_uri() . '/images/mos-vc.png',
				
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Text", "my-text-domain" ),
				"param_name" => "foo",
				"value" => __( "Default param value", "my-text-domain" ),
				"description" => __( "Description for foo param.", "my-text-domain" )
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Text color", "my-text-domain" ),
				"param_name" => "color",
				"value" => '#FF0000', //Default Red color
				"description" => __( "Choose text color", "my-text-domain" )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "my-text-domain" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "my-text-domain" ),
				"description" => __( "Enter your content.", "my-text-domain" )
			)
		)
	));
}
*/
function mos_map_func( $atts = array(), $content = '' ) {
	$html = '';
	$atts = shortcode_atts( array(
		'url' => '',
	), $atts, 'mos-map' );	
	$html .= '<div class="embed-responsive embed-responsive-21by9">';
		$html .= '<iframe class="embed-responsive-item" src="'.$atts['url'].'"></iframe>';
	$html .= '</div>';
	return $html;
}
add_shortcode( 'mos-map', 'mos_map_func' );
add_action( 'vc_before_init', 'mos_map_vc' );
function mos_map_vc() {
	vc_map( array(
		"name" => __( "Mos Map", "my-text-domain" ),
		"base" => "mos-map",
		"class" => "",
		"category" => __( "Content", "my-text-domain"),
		'icon'     => get_template_directory_uri() . '/images/mos-vc.png',
				
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __( "MAP URL", "my-text-domain" ),
				"admin_label" => false,
				"param_name" => "url",
				"description" => __( "Embed Map URL of Google MAP.", "my-text-domain" )
			),
		)
	));
}

function mos_counter_func( $atts = array(), $content = '' ) {
	$html = '';
	$atts = shortcode_atts( array(
		'image' => '',
		'number' => 0,
		'text' => '',
		'link' => '',
	), $atts, 'mos-counter' );	
	$html .= '<div class="card text-center h-100 border-0 rounded-0 bg-secondary position-relative mos-counter-unit">';
	if ($atts['image']){
		$html .= '<img src="'.wp_get_attachment_url( $atts['image'] ).'" class="card-img-top rounded-0" alt="'.$atts['text'].'">';
	}
		$html .= '<div class="card-body">';
		if ($atts['number']){
			$html .= '<h5 class="card-title"><span class="counter">'.$atts['number'].'</span>+</h5>';
		}
		if ($atts['text']){
			$html .= '<div class="card-text">'.$atts['text'].'</div>';
		}
		$html .= '</div>';

	if ($atts['link']){
		$html .= '<a class="hidden-link" href="'.$atts['link'].'">Read More</a>';
	}
	$html .= '</div>';
	return $html;
}
add_shortcode( 'mos-counter', 'mos_counter_func' );
add_action( 'vc_before_init', 'mos_counter_vc' );
function mos_counter_vc() {
	vc_map( array(
		"name" => __( "Mos Counter", "my-text-domain" ),
		"base" => "mos-counter",
		"class" => "",
		"category" => __( "Content", "my-text-domain"),
		// 'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		// 'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		'icon'     => get_template_directory_uri() . '/images/mos-vc.png',
				
		"params" => array(
			array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => __( "Text", "my-text-domain" ),
				"param_name" => "text",
			),
			array(
				"type" => "attach_image",
				"heading" => __( "Image", "my-text-domain" ),
				"param_name" => "image",
			),
			array(
				"type" => "textfield",
				"admin_label" => true,
				"class" => "mos-count-vc-number",
				"heading" => __( "Number", "my-text-domain" ),
				"param_name" => "number",
				"value" => 0,
			),
			array(
				"type" => "vc_link",
				"admin_label" => false,
				"class" => "mos-count-vc-link",
				"heading" => __( "Link", "my-text-domain" ),
				"param_name" => "link",
			),
		)
	));
}
/*Custom components*/
// Create multi dropdown param type
vc_add_shortcode_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
function dropdown_multi_settings_field( $param, $value ) {
   $param_line = '';
   $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="select2 wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
   foreach ( $param['value'] as $text_val => $val ) {
       if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
                    $text_val = $val;
                }
                $text_val = __($text_val, "js_composer");
                $selected = '';

                if(!is_array($value)) {
                    $param_value_arr = explode(',',$value);
                } else {
                    $param_value_arr = $value;
                }

                if ($value!=='' && in_array($val, $param_value_arr)) {
                    $selected = ' selected="selected"';
                }
                $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
            }
   $param_line .= '</select>';

   return  $param_line;
}
/*Custom components*/
?>