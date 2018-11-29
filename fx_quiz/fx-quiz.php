<?php 
/*
 Plugin Name:  Fx Quiz
 Plugin URI:   #
 Description:  This plugin adds quizes to the website using a shortcode
 Version:      1.0.1
 Author:       Shriya Jain
 Author URI:   #
 License:      GPL2
 License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain:  fxquiz
 Domain Path:  /languages

 Fx Quiz is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
 any later version. 

 Fx Quiz is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Fx Quiz. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

/**
 * @DateOfCreation		29-November-2018
 * @ShortDescription	This function adds a new admin menu on plugin activation
 */
function fxquiz_install() {
	fxquiz_adminmenu(); 		// trigger our function that adds a new admin menu representing our custom menu
	flush_rewrite_rules(); // clear the permalinks
}
register_activation_hook( __FILE__, 'fxquiz_install' );

/**
 * @DateOfCreation		29-November-2018
 * @ShortDescription	This function shows the functionality which has been 
 *						implemented when plugin is deactivated
 */
function fxquiz_deactivation() {
	flush_rewrite_rules(); // clear the permalinks 
}
register_deactivation_hook( __FILE__, 'fxquiz_deactivation' );

/**
 * @DateOfCreation		29-November-2018
 * @ShortDescription	This function add a new admin menu 
 */
function fxquiz_adminmenu()
{
	add_menu_page(
		'Fx Quiz',
		'Fx Quiz ',
		'manage_options',
		'fxquiz',
		'fxquiz_options_page_html',
		"dashicons-awards",
		130
	);
}
add_action('admin_menu', 'fxquiz_adminmenu');

/**
 * @DateOfCreation		29-November-2018
 * @ShortDescription	This function is callable function for fxquiz_adminmenu function
 */
function fxquiz_options_page_html()
{
	echo "<h2>Welcome To Fx Quiz</h2>";
}