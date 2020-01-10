<?php
function mos_home_url_replace($data) {
    $replace_fnc = str_replace('home_url()', home_url(), $data);
    $replace_br = str_replace('{{home_url}}', home_url(), $replace_fnc);
    return $replace_br;
}
/*Variables*/
$template_parts = array(
    'Enabled'  => array(),
    'Disabled' => array(),
);
/*Variables*/