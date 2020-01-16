<?php
function mos_home_url_replace($data) {
    $replace_fnc = str_replace('home_url()', home_url(), $data);
    $replace_br = str_replace('{{home_url}}', home_url(), $replace_fnc);
    return $replace_br;
}
function mos_post_list($post_type='post'){
    $output = array();
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $output[get_the_ID()] = get_the_title();
        }
    }
    wp_reset_postdata();
    return $output;
}
/*Variables*/
$template_parts = array(
    'Enabled'  => array(),
    'Disabled' => array(
        'banner' => 'Home Banner',
        'content' => 'Page Content',
        'welcome' => 'Welcome Section',
        'service' => 'Service Section',
        'eform' => 'Email Form',
        'help' => 'Help Section',
        'project' => 'Project Section',
        'partner' => 'Partners Section',
        'blog' => 'Blog Section',
        'about' => 'About Section',
    ),
);
/*Variables*/