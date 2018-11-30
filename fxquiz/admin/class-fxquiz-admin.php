<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Fxquiz
 * @subpackage Fxquiz/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fxquiz
 * @subpackage Fxquiz/admin
 * @author     Shriya Jain <#>
 */
class Fxquiz_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fxquiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fxquiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fxquiz-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fxquiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fxquiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fxquiz-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the options for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function fxquiz_options_page() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fxquiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fxquiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_menu_page(
        $this->plugin_name,
        ucwords($this->plugin_name),
        'manage_options',
        'fxquiz',
        array($this, 'fxquiz_options_page_html'),
        'dashicons-awards',
        20
    );

		//to create sub menu
            add_submenu_page('fxquiz', __("Add new quiz","fxquiz"), __("Add New", "fxquiz"), 'administrator', 'fxquiz&tag=add', array($this, 'fxquiz_new'), 'dashicons-add');

	}	
	/**
	 * Defining the callback for the fxquiz_options_page.
	 *
	 * @since    1.0.0
	 */
	public function fxquiz_options_page_html()
	{
	echo '<a href="' . esc_url(admin_url()) . 'admin.php?page=fxquiz&amp;tag=add">'.__("Add New Quiz","fxquiz").'</a>';
	}

	public function fxquiz_new(){


	}

function fxquiz_settings_init()
{
    // register a new setting for "reading" page
    register_setting('reading', 'wporg_setting_name');
 
    // register a new section in the "reading" page
    add_settings_section(
        'fxquiz_settings_field',
        'fxQuiz Settings Section',
        'fxquiz_settings_init_cb',
        'fxquiz'
    );
 
    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'fxquiz_settings_field',
        'Fxquiz Setting',
        'fxquiz_settings_init_cb2',
        'fxquiz',
        'wporg_settings_section'
    );


}
 

/**
 * callback functions
 */
 
// section content cb
function fxquiz_settings_init_cb()
{
    echo '<p>WPOrg Section Introduction.</p>';
}
 
// field content cb
function fxquiz_settings_init_cb2()
{
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('wporg_setting_name');
    // output the field
    ?>
    <input type="text" name="wporg_setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}
}
