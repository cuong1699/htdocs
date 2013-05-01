<?php
/*
Plugin Name: Tích hợp facebook
Plugin URI: http://lat.vn
Description: Kết nôi Website của bạn với facebook để SEO tốt hơn.
Author: Cuong Nghiem
Version: 1.0
Author URI: http://cuongnghiem.com


function sfc_version() {
	return '1.3';
}
*/
// prevent parsing errors on PHP 4 or old WP installs
if ( !version_compare(PHP_VERSION, '5', '<') && version_compare( $wp_version, '3.2.999', '>' ) ) {
	include 'sfc-base.php';
} else {
	add_action('admin_notices', create_function( '', "echo '<div class=\"error\"><p>".__('Plugin yêu cầu PHP5 và Wordpres 3.3 vui lòng update để cài đặt plugin', 'sfc') ."</p></div>';" ) );
}

// plugin row links
/*
add_filter('plugin_row_meta', 'sfc_donate_link', 10, 2);
function sfc_donate_link($links, $file) {
	if ($file == plugin_basename(__FILE__)) {
		$links[] = '<a href="'.admin_url('options-general.php?page=sfc').'">'.__('Settings', 'sfc').'</a>';
		$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=otto%40ottodestruct%2ecom">'.__('Donate', 'sfc').'</a>';
	}
	return $links;
}
*/
// action links
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'sfc_settings_link', 10, 1);
function sfc_settings_link($links) {
	$links[] = '<a href="'.admin_url('options-general.php?page=sfc').'">'.__('Tùy Chỉnh', 'sfc').'</a>';
	return $links;
}

