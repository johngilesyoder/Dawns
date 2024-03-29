<?php
/*
Plugin Name: GigPress
Plugin URI: http://gigpress.com
Description: GigPress is a live performance listing and management plugin built for musicians and performers.
Version: 2.1.14
Author: Derek Hogue
Author URI: http://amphibian.info

Copyright 2007-2010 DEREK HOGUE

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

global $wpdb, $gpo;
$gpo = get_option('gigpress_settings');

// Define useful constants
define('GIGPRESS_SHOWS', $wpdb->prefix . 'gigpress_shows');
define('GIGPRESS_TOURS', $wpdb->prefix . 'gigpress_tours');
define('GIGPRESS_ARTISTS', $wpdb->prefix . 'gigpress_artists');
define('GIGPRESS_VENUES', $wpdb->prefix . 'gigpress_venues');
define('GIGPRESS_VERSION', '2.1.15');
define('GIGPRESS_DB_VERSION', '1.5');
define('GIGPRESS_RSS', get_bloginfo('url') . '/?feed=gigpress');
define('GIGPRESS_ICAL', get_bloginfo('url') . '/?feed=gigpress-ical');
define('GIGPRESS_WEBCAL', str_replace('http://', 'webcal://', GIGPRESS_ICAL));
define('GIGPRESS_URL', ($gpo['shows_page']) ? esc_url($gpo['shows_page']) : get_bloginfo('url'));
define('GIGPRESS_NOW', substr(current_time('mysql'), 0, 10));
define('GIGPRESS_DEBUG', '');

// Pull in all of our required files
require('admin/db.php');
require('admin/new.php');
require('admin/shows.php');
require('admin/artists.php');
require('admin/venues.php');
require('admin/tours.php');
require('admin/settings.php');
require('admin/import-export.php');

require('output/gigpress_shows.php');
require('output/gigpress_related.php');
require('output/gigpress_sidebar.php');
require('output/feed.php');
require('output/ical.php');


global $gp_countries;
$gp_countries = array("US" => "United States", "CA" => "Canada", "AF" => "Afghanistan", "AX" => "Aland Islands", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "IO" => "British Indian Ocean Territory", "BN" => "Brunei Darussalam", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo", "CD" => "Congo (DR)", "CK" => "Cook Islands", "CR" => "Costa Rica", "CI" => "Cote D'Ivoire", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands (Malvinas)", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard and McDonald Islands", "VA" => "Holy See (Vatican City State)", "HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KP" => "Korea (North)", "KR" => "Korea (South)", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Laos", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macau", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "MX" => "Mexico", "FM" => "Micronesia", "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territory (Occupied)", "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RU" => "Russian Federation", "RW" => "Rwanda", "BL" => "Saint Barthelemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "MF" => "Saint Martin (French)", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa", "SM" => "San Marino", "ST" => "Sao Tome and Principe", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and South Sandwich Islands", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "UK" => "United Kingdom", "UM" => "United States Minor Outlying Islands", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VE" => "Venezuela", "VN" => "Vietnam", "VG" => "Virgin Islands (British)", "VI" => "Virgin Islands (US)", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe");


function gigpress_admin_menu() {
	
	global $gpo;
	
	$add = __("Add a show", "gigpress");
	$shows = __("Shows", "gigpress");
	$artists = __("Artists", "gigpress");
	$venues = __("Venues", "gigpress");
	$tours = __("Tours", "gigpress");
	$settings = __("Settings", "gigpress");
	$export = __("Import/Export", "gigpress");
	
	add_menu_page("GigPress &rsaquo; $add", "GigPress", $gpo['user_level'], __FILE__, "gigpress_add", WP_PLUGIN_URL . "/gigpress/images/gigpress-icon-16.png");
	// By setting the unique identifier of the submenu page to be __FILE__,
	// we let it be the first page to load when the top-level menu item is clicked
	add_submenu_page(__FILE__, "GigPress &rsaquo; $add", $add, $gpo['user_level'], __FILE__, "gigpress_add");
	add_submenu_page(__FILE__, "GigPress &rsaquo; $shows", $shows, $gpo['user_level'], "gigpress-shows", "gigpress_admin_shows");
	add_submenu_page(__FILE__, "GigPress &rsaquo; $artists", $artists, $gpo['user_level'], "gigpress-artists", "gigpress_artists");
	add_submenu_page(__FILE__, "GigPress &rsaquo; $venues", $venues, $gpo['user_level'], "gigpress-venues", "gigpress_venues");
	add_submenu_page(__FILE__, "GigPress &rsaquo; $tours", $tours, $gpo['user_level'], "gigpress-tours", "gigpress_tours");
	add_submenu_page(__FILE__, "GigPress &rsaquo; $settings", $settings, 'manage_options', "gigpress-settings", "gigpress_settings");
	add_submenu_page(__FILE__, "GigPress &rsaquo; $export", $export, $gpo['user_level'], "gigpress-import-export", "gigpress_import_export");
	
	if(GIGPRESS_DEBUG) {
		require('admin/debug.php');
		add_submenu_page(__FILE__, "GigPress &rsaquo; Debug", 'Debug', 'manage_options', "gigpress-debug", "gigpress_debug");
	}	

}


function gigpress_admin_head()	{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('gigpress-admin-js', WP_PLUGIN_URL . '/gigpress/scripts/gigpress-admin.js', 'jquery');
	wp_enqueue_style('gigpress-admin-css', WP_PLUGIN_URL . '/gigpress/css/gigpress-admin.css');
}


function gigpress_admin_footer() {
	
	return (__("You're using", "gigpress").' <a href="http://gigpress.com">GigPress '.GIGPRESS_VERSION.'</a>. '. __("Like it?", "gigpress") . ' <a href="http://gigpress.com/donate">' . __("Make a donation", "gigpress") . '</a>.');
}


function gigpress_js() {
	global $gpo;
	if ( $gpo['load_jquery'] == 1) {
		wp_enqueue_script('jquery');
	}
	if ( $gpo['disable_js'] != 1) {
		wp_enqueue_script('gigpress-js', WP_PLUGIN_URL . '/gigpress/scripts/gigpress.js', 'jquery');
	}
}


function gigpress_head() {
	
	global $gpo;
	
	if($gpo['disable_css'] != 1) {
		// Default stylesheet
		echo('<link type="text/css" rel="stylesheet" href="' . WP_PLUGIN_URL . '/gigpress/css/gigpress.css" media="all" />
');
	}
	
	// If there's a custom stylesheet, load it.
	// First check the child theme.
	if(file_exists(get_stylesheet_directory()."/gigpress.css")) {
		echo('<link type="text/css" rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/gigpress.css" media="all" />
');
	// If not, check the parent theme.
	} elseif(file_exists(get_template_directory()."/gigpress.css")) {
		echo('<link type="text/css" rel="stylesheet" href="' . get_template_directory_uri() . '/gigpress.css" media="all" />
');
	}
	
	if ( $gpo['rss_head'] == 1 ) {
	// Adds auto-discovery of our RSS feed
	echo('<link href="'.GIGPRESS_RSS.'" rel="alternate" type="application/rss+xml" title="'.$gpo['rss_title'].'" />
');
	}
}


function gigpress_template($path) {

	// Look for our template in the following locations:
	// 1) Child theme directory
	// 2) Parent theme directory
	// 3) wp-content directory
	// 4) Default template directory
	
	if(file_exists(get_stylesheet_directory() . '/gigpress-templates/' . $path . '.php')) {
		$load = get_stylesheet_directory() . '/gigpress-templates/' . $path . '.php';
	} elseif(file_exists(get_template_directory() . '/gigpress-templates/' . $path . '.php')) {
		$load = get_template_directory() . '/gigpress-templates/' . $path . '.php';
	} elseif(file_exists(WP_CONTENT_DIR . '/gigpress-templates/' . $path . '.php')) {
		$load = WP_CONTENT_DIR . '/gigpress-templates/' . $path . '.php';
	} else {
		$load = WP_PLUGIN_DIR . '/gigpress/templates/'  . $path . '.php';
	}
	return $load;
}


function gigpress_get_O_offset($offset) {
	
	$first = substr($offset, 0, 1);
	$length = strlen($offset);
	
	switch($first) {
		// Deal with GMT first
		case '0':
			return '+0000';
			break;
		// Negative offset ($length is either 2 or 3)
		case '-':
			return ($length == 3) ? $offset.'00' : '-0'.substr($offset, 1, 2).'00';
			break;
		// Positive offset ($length is either 1 or 2)
		default:
			return ($length == 2) ? '+'.$offset.'00' : '+0'.$offset.'00';
	}
}


function gigpress_target($link = '') {

	global $gpo;
	if($gpo['target_blank'] == 1 && strpos($link, $_SERVER['SERVER_NAME']) === FALSE) {
		return ' target="_blank"';
	}
	
}


function gigpress_prepare($show, $scope = 'public') {
	
	// This function takes an array for one show ($show)
	// and returns a new array containing the show data
	// prepared for various outputs based on context and GigPress settings
	
	global $wpdb, $gp_countries, $gpo;
	
	$showdata = array();
	
	$showdata['address_plain'] = ($show->venue_address) ? wptexturize($show->venue_address) : '';
	$showdata['address_url'] = ($show->venue_address) ? 'http://maps.google.com/maps?&amp;q='. urlencode($show->venue_address). ',' . urlencode($show->venue_city) . ',' . urlencode($show->venue_country) : '';
	$showdata['address'] = ($show->venue_address) ? '<a href="' . $showdata['address_url'] . '" class="gigpress-address"' . gigpress_target($showdata['address_url']) . '>' . wptexturize($show->venue_address) . '</a>' : '';
	$showdata['city'] = ($show->show_related && $gpo['relatedlink_city'] == 1 && $scope == 'public') ? '<a href="' . gigpress_related_link($show->show_related, "url") . '">' . wptexturize($show->venue_city) . '</a>' : wptexturize($show->venue_city);	
	$showdata['country'] = ($gpo['country_view'] == 'long') ? wptexturize($gp_countries[$show->venue_country]) : $show->venue_country;
	$showdata['venue'] = ($show->venue_url) ? '<a href="' . esc_url($show->venue_url) . '"' . gigpress_target($show->venue_url) . '>' . wptexturize($show->venue_name) . '</a>' : wptexturize($show->venue_name);
	$showdata['venue_id'] = $show->venue_id;
	$showdata['venue_plain'] = wptexturize($show->venue_name);
	$showdata['venue_phone'] = wptexturize($show->venue_phone);
	$showdata['venue_url'] = ($show->venue_url) ? esc_url($show->venue_url) : '';	

	// Shield these fields when we're calling this function from the venues admin screen
	if($scope != 'venue') {
		$timeparts = explode(':', $show->show_time);
		$showdata['admittance'] = (!empty($show->show_ages) && $show->show_ages != 'Not sure') ? wptexturize($show->show_ages) : '';
		$showdata['artist'] = wptexturize($show->artist_name);
		$showdata['artist_id'] = $show->artist_id;
		$showdata['calendar_summary'] = $show->artist_name . ' ' . __("at", "gigpress") . ' ' . $show->venue_name;
		$showdata['calendar_details'] = '';
			if($show->tour_name) $showdata['calendar_details'] .= $gpo['tour_label'] . ': ' . $show->tour_name . '. ';
			if($show->show_price) $showdata['calendar_details'] .= __("Price", "gigpress") . ': ' . $show->show_price . '. ';
			if($show->show_tix_phone) $showdata['calendar_details'] .= __("Box office", "gigpress") . ': ' . $show->show_tix_phone . '. ';
			if($show->show_venue_phone) $showdata['calendar_details'] .= __("Venue phone", "gigpress") . ': ' . $show->venue_phone . '. ';
			if($show->show_notes) $showdata['calendar_details'] .= __("Notes", "gigpress") . ': ' . $show->show_notes . ' ';
			$showdata['calendar_details'] .= $showdata['admittance'];
			$showdata['calendar_details_ical'] = str_replace(array(";",",","\n","\r"), array('\;','\,',' ',' '), $showdata['calendar_details']);
		$showdata['calendar_location'] = $show->venue_name . ", ";
			if($show->venue_address) $showdata['calendar_location'] .= $show->venue_address . ", ";
			$showdata['calendar_location'] .= $show->venue_city . ", " . $show->venue_country;
		$show->venue_city . ", " . $show->venue_country;
		$showdata['calendar_location_ical'] = str_replace(",", "\,", $showdata['calendar_location']);
		$showdata['calendar_start'] = ($timeparts[2] == '01') ? str_replace('-', '', $show->show_date) : str_replace(array('-',':',' '), array('','','T'), get_gmt_from_date($show->show_date . ' ' . $show->show_time)) . 'Z';
		if($timeparts[2] == '01') {
			$showdata['calendar_end'] = ($show->show_expire == $show->show_date) ? $showdata['calendar_start'] : date('Ymd', strtotime($show->show_expire . '+1 day'));	
		} else {
			$showdata['calendar_end'] = ($show->show_expire == $show->show_date) ? $showdata['calendar_start'] : str_replace(array('-',':',' '), array('','','T'), get_gmt_from_date($show->show_expire . ' ' . $show->show_time)) . 'Z';		
		}
		$showdata['date'] = ($show->show_related && $gpo['relatedlink_date'] == 1 && $scope == 'public') ? '<a href="' . gigpress_related_link($show->show_related, "url") . '">' . mysql2date($gpo['date_format'], $show->show_date) . '</a>' : mysql2date($gpo['date_format'], $show->show_date);
		$showdata['date_long'] = mysql2date($gpo['date_format_long'], $show->show_date);		
		$showdata['date_mysql'] = $show->show_date;		
		$showdata['end_date'] = ($show->show_date != $show->show_expire) ? mysql2date($gpo['date_format'], $show->show_expire) : '';
		$showdata['end_date_long'] = ($show->show_date != $show->show_expire) ? mysql2date($gpo['date_format_long'], $show->show_expire) : '';
		$showdata['end_date_mysql'] = $show->show_expire;		
		$showdata['ical'] = '<a href="' . GIGPRESS_ICAL . '&amp;show_id=' . $show->show_id . '">' . __("Download iCal", "gigpress") . '</a>';
		$showdata['id'] = $show->show_id;
		$showdata['iso_date'] = $show->show_date."T".$show->show_time;
		$showdata['iso_end_date'] = $show->show_expire."T".$show->show_time;
		$showdata['notes'] = wptexturize($show->show_notes);
		$showdata['price'] = wptexturize($show->show_price);
		$showdata['related_id'] = ($show->show_related) ? $show->show_related : 0;
		$showdata['related_url'] = ($show->show_related) ? gigpress_related_link($show->show_related, 'url') : '';
		$showdata['related_edit'] = ($show->show_related) ? gigpress_related_link($show->show_related, 'edit') : '';
		$showdata['related_link'] = ($show->show_related) ? gigpress_related_link($show->show_related, 'view') : '';
		$showdata['rss_date'] = mysql2date('D, d M Y', $show->show_date, false). " ". $show->show_time." " . gigpress_get_O_offset(get_option('gmt_offset'));
		$showdata['status'] = $show->show_status;
		switch($showdata['status']) {
			case 'active': $showdata['ticket_link'] = ($show->show_tix_url && $show->show_expire >= GIGPRESS_NOW) ? '<a href="' . esc_url($show->show_tix_url)  . '"' . gigpress_target($show->show_tix_url) . ' class="gigpress-tickets-link">' . __("Buy tickets", "gigpress") . '</a>' : '';
			break;
			case 'soldout' : $showdata['ticket_link'] = '<strong class="gigpress-soldout">' . __("Sold Out", "gigpress") . '</strong>';
			break;
			case 'cancelled' : $showdata['ticket_link'] = '<strong class="gigpress-cancelled">' . __("Cancelled", "gigpress") . '</strong>';
			break;
		}
		$showdata['ticket_url'] = ($show->show_tix_url) ? esc_url($show->show_tix_url) : '';
		$showdata['ticket_phone'] = wptexturize($show->show_tix_phone);
		$showdata['time'] = ($timeparts[2] == '01') ? '' : date($gpo['time_format'], mktime($timeparts[0], $timeparts[1]));
		$showdata['tour'] = wptexturize($show->tour_name);
		$showdata['tour_id'] = $show->tour_id;
		if($showdata['related_url']) { $showdata['permalink'] = $showdata['related_url']; }
			elseif($gpo['shows_page']) { $showdata['permalink'] = esc_url($gpo['shows_page']); }
			else { $showdata['permalink'] = get_bloginfo('home'); }
		
		// Google Calendar
		$showdata['gcal'] = '<a href="http://www.google.com/calendar/event?action=TEMPLATE'
			. '&amp;text=' . urlencode($showdata['calendar_summary'])
			. '&amp;dates=' . $showdata['calendar_start'] . '/' . $showdata['calendar_end']
			. '&amp;sprop=website:' . urlencode(GIGPRESS_URL)
			. '&amp;sprop=name:' . urlencode($show->artist_name)
			. '&amp;location=' . urlencode($showdata['calendar_location'])
			. '&amp;details=' . urlencode($showdata['calendar_details'])
			. '&amp;trp=true;'
			. '"' . gigpress_target() . '>' . __("Add to Google Calendar", "gigpress") . '</a>';	
	}
		
	return $showdata;
}


function gigpress_related_link($postid, $format) {

	if($postid == 0) return;
	
	global $gpo;
	
	switch($format) {
		case 'url':
			$link = get_permalink($postid);
			$output = $link;
			break;
		case 'edit':
			$link = get_bloginfo('wpurl') . '/wp-admin/post.php?action=edit&amp;post=' . $postid;
			$output = '<a href="' . $link . '">' . $gpo['related'] . '</a>';
			break;
		case 'view':
			$link = get_permalink($postid);
			$output = '<a href="' . $link . '">' . $gpo['related'] . '</a>';
			break;
	}
		
	return $output;
}


function gigpress_exclude_shows($query) {
	// Excludes the Related Post category from normal listings
	global $wp_query, $gpo;
	
	$categories = array($gpo['related_category']);
	
	if( is_object($wp_query) && !is_category() && !is_single() && !is_tag() && !is_admin() && !is_search() ) { 
		$wp_query->set('category__not_in', $categories); 
	}
}


function gigpress_check_excerpt($excerpt) {
	// This let's us skip adding Related Show info to the_content()
	// when displayed as an excerpt
	global $is_excerpt; $is_excerpt = TRUE;
	return $excerpt;
}


function gigpress_remove_related($postID) {
	// Remove the post relation if it's deleted in WP
	global $wpdb;
	$cleanup = $wpdb->update(GIGPRESS_SHOWS, array('show_related' => 0), array('show_related' => $postID), array('%d', '%d'));
	return $postID;
	
}


function add_gigpress_feeds() {
	
	// Tell WP about the shows feed
	add_feed('gigpress','gigpress_feed');
	
	// Add the iCal export as a feed as well, even though it's not technically a feed
	add_feed('gigpress-ical','gigpress_ical');

}


function gigpress_admin_pagination($total_records, $records_per_page, $args) {
	
	$total_pages = ceil($total_records / $records_per_page);
	$current_page = (isset($_GET['gp-page'])) ? $_GET['gp-page'] : 1;
	$r = array();
	
	if($total_pages > 1) {
		$r['output'] = '<div class="tablenav-pages">';
		$page_links = paginate_links( array(
			'total' => $total_pages,
			'current' => $current_page,
			'base' => 'admin.php?%_%',
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',					
			'format' => 'gp-page=%#%',
			'add_args' => $args
		) );
		// Lifted from edit.php!
		$r['output'] .= sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s' ) . '</span>%s',
		number_format_i18n( ( $current_page - 1 ) * $records_per_page + 1 ),
		number_format_i18n( min( $current_page * $records_per_page, $total_records ) ),
		number_format_i18n( $total_records ),
		$page_links);
		$r['output'] .= '</div>';
		$r['offset'] = ($current_page - 1) * $records_per_page;
		$r['records_per_page'] = $records_per_page;		
		return $r;
	}
}


function gigpress_db_in($value, $strip_tags = TRUE) {
	$value = stripslashes(trim($value));
	if($strip_tags == TRUE) {
		$value = sanitize_text_field($value, TRUE);
	} else {
		$value = wp_kses_post($value);
	}
	return $value;
}


function gigpress_db_out($value) {
	return htmlspecialchars(stripslashes(trim($value)), ENT_QUOTES);
}


function gigpress_intl() {
	load_plugin_textdomain('gigpress', NULL, '/gigpress/langs/');
}


function register_gigpress_settings() {
	register_setting('gigpress','gigpress_settings');
}


function gigpress_favorites($actions) {
	global $gpo;
	$level = "level_" . $gpo['user_level']; 
	$actions['admin.php?page=gigpress/gigpress.php'] = array('Add a show', $level);
    return $actions;
}


function enable_custom_menu_order($flag) {
	return TRUE;
}

function custom_menu_order($menu_order) {
	
	// Add a new separator to the menu array
	global $menu;
	$menu[] = array('', 'read', 'separator-gp', '', 'wp-menu-separator');
	
	// Remove the current instance of GigPress
	$current_position = array_search('gigpress/gigpress.php', $menu_order);
	unset($menu_order[$current_position]);
	
	// Create a new array to hold the menu order
	$new_menu_order = array();
	
	// Replicate the existing order,
	// inserting GigPress and separator where desired
	foreach($menu_order as $menu_item) {
		$new_menu_order[] = $menu_item;
		if($menu_item == 'edit-comments.php')
		{
			$new_menu_order[] = 'separator-gp';
			$new_menu_order[] = 'gigpress/gigpress.php';		
		}
	}

	return $new_menu_order;
}


function add_upload_ext($mimes='') {
	$mimes['csv']='text/csv';
	return $mimes;
}

function gigpress_reorder_artists() {
	
	global $wpdb;
	$wpdb->show_errors();
	
	$sql = "UPDATE " . GIGPRESS_ARTISTS . " SET artist_order = CASE artist_id ";
	foreach($_REQUEST['artist'] as $order => $artist) {
		$sql .= $wpdb->prepare("WHEN %d THEN %d ", $artist, $order);
	}
	$sql .= " END";
	
	$update_order = $wpdb->query($sql);
	
	if($update_order !== FALSE) {
		_e("Artist order updated.", "gigpress");
	}
	
	die();
}


function gigpress_export() {

	check_admin_referer('gigpress-action');
	global $wpdb;
	require_once(WP_PLUGIN_DIR . '/gigpress/lib/parsecsv.lib.php');

	$further_where = '';
	switch($_POST['scope']) {
		case 'upcoming':
			$further_where = " AND show_expire >= '" . GIGPRESS_NOW . "'";
			break;
		case 'past':
			$further_where = " AND show_expire < '" . GIGPRESS_NOW . "'";
			break;
	}
	if(isset($_POST['artist_id']) && $_POST['artist_id'] != '-1') {
		$further_where .= ' AND s.show_artist_id = ' . $wpdb->prepare('%d', $_POST['artist_id']) . ' ';
	}
	if(isset($_POST['tour_id']) && $_POST['tour_id'] != '-1') {
		$further_where .= ' AND s.show_tour_id = ' . $wpdb->prepare('%d', $_POST['tour_id']) . ' ';
	}
	
	$name = 'gigpress-export-' . date('Y-m-d') . '.csv';
	
	$fields = array(
		"Date", "Time", "End date", "Artist", "Venue", "Address", "City", "Country", "Venue phone", "Venue URL", "Admittance", "Price", "Ticket URL", "Ticket phone", "Notes", "Tour", "Status", "Related ID", "Related URL"
	);
	
	$shows = $wpdb->get_results("
		SELECT show_date, show_time, show_expire, artist_name, venue_name, venue_address, venue_city, venue_country, venue_phone, venue_url, show_ages, show_price, show_tix_url, show_tix_phone, show_notes, tour_name, show_status, show_related FROM ". GIGPRESS_VENUES ." as v, " . GIGPRESS_ARTISTS . " as a, " . GIGPRESS_SHOWS . " as s LEFT JOIN " . GIGPRESS_TOURS . " as t ON s.show_tour_id = t.tour_id WHERE show_status != 'deleted' AND s.show_artist_id = a.artist_id AND s.show_venue_id = v.venue_id" . $further_where . " ORDER BY show_date DESC,show_time DESC
		", ARRAY_A);
	
	if($shows) {
		$export_shows = array();
		foreach ( $shows as $show ) {
			$show['show_time'] = ( $show['show_time']{7} == 1 ) ? '' : $show['show_time'];
			$show['show_expire'] = ( $show['show_date'] == $show['show_expire'] ) ? '' : $show['show_expire'];
			$show['show_related_url'] = ( $show['show_related'] ) ? gigpress_related_link($show['show_related'], 'url') : '';
			$export_shows[] = $show;
		}
	
		$export = new parseCSV();
		$export->output($name, stripslashes_deep($export_shows), $fields, ',');
	} else {
		echo('<p>' . __('Nothing to export.', 'gigpress') . '</p>');
	}
	
}


function gigpress_export_nopriv() {
	echo('<p>' . __('You are not authorized to do that. Try logging-in first.', 'gigpress') . '</p>');
}


function fetch_gigpress_artists() {
	global $wpdb;
	$artists = $wpdb->get_results("
		SELECT * FROM ". GIGPRESS_ARTISTS ." 
		ORDER BY artist_order ASC,artist_name ASC");
	return ($artists !== FALSE) ? $artists : FALSE;
}


function fetch_gigpress_tours() {
	global $wpdb;
	$tours = $wpdb->get_results("
		SELECT * FROM ". GIGPRESS_TOURS ." 
		WHERE tour_status = 'active' 
		ORDER BY tour_name ASC");
	return ($tours !== FALSE) ? $tours : FALSE;
}


function fetch_gigpress_venues() {
	global $wpdb;
	$venues = $wpdb->get_results("
		SELECT * FROM ". GIGPRESS_VENUES ." 
		ORDER BY venue_name ASC");
	return ($venues !== FALSE) ? $venues : FALSE;
}


register_activation_hook(__FILE__,'gigpress_install');
register_uninstall_hook(__FILE__, 'gigpress_uninstall');

add_action('init','add_gigpress_feeds');
add_action('init','gigpress_intl');
add_action('admin_init', 'register_gigpress_settings'); 
add_action('admin_menu', 'gigpress_admin_menu');
add_action('delete_post', 'gigpress_remove_related');
if(strpos($_SERVER['QUERY_STRING'], 'gigpress') !== FALSE) {
	add_action('admin_init','gigpress_admin_head');
	add_action('admin_footer_text', 'gigpress_admin_footer');
}
if($gpo['category_exclude'] == 1) {
	add_action('pre_get_posts','gigpress_exclude_shows');
}
add_action('template_redirect', 'gigpress_js');
add_action('wp_head', 'gigpress_head');
add_action('admin_post_gigpress_export', 'gigpress_export');
add_action('admin_post_nopriv_gigpress_export', 'gigpress_export_nopriv');
add_action('wp_ajax_gigpress_reorder_artists', 'gigpress_reorder_artists');

add_filter('custom_menu_order', 'enable_custom_menu_order');
add_filter('menu_order', 'custom_menu_order');
add_filter('upload_mimes','add_upload_ext');
add_filter('favorite_actions', 'gigpress_favorites');
if($gpo['related_position'] != "nowhere") {
	add_filter('get_the_excerpt', 'gigpress_check_excerpt', 1);
	add_filter('the_content', 'gigpress_show_related_auto');
}

add_action('widgets_init', 'gigpress_load_widgets');

add_shortcode('gigpress_shows','gigpress_shows');
add_shortcode('gigpress_menu','gigpress_menu');
add_shortcode('gigpress_upcoming','gigpress_upcoming');
add_shortcode('gigpress_archive','gigpress_archive');
add_shortcode('gigpress_related_shows','gigpress_show_related');

// We're forced to bed, but we're free to dream.

?>