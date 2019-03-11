<?php
/**
 * WhiteDot functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WhiteDot
 */



//WhiteDot Setup
add_action( 'after_setup_theme', 'whitedot_setup' );

//WhiteDot Content Width
add_action( 'after_setup_theme', 'whitedot_content_width', 0 );

//Main Widget
add_action( 'widgets_init', 'whitedot_widgets_init' );

//Footer Widget
add_action( 'widgets_init', 'whitedot_footer_widgets_init' );

//Woocommerce Product Filter Widget
add_action( 'widgets_init', 'whitedot_woo_product_filter_widgets_init' );

//Enqueue Customizer Google Fonts
add_action( 'wp_enqueue_scripts', 'whitedot_customizer_google_fonts' );

//Enque Js Files
add_action( 'wp_enqueue_scripts', 'whitedot_scripts' );

//Enque Admin CSS Files
add_action( 'admin_enqueue_scripts', 'whitedot_enqueue_custom_admin_style' );

//Enque Customizer Js Files
add_action( 'customize_preview_init', 'whitedot_customize_preview_js' );

//Custom js for Theme Customizer Control
add_action( 'customize_controls_enqueue_scripts', 'whitedot_customizer_control_js' );

//WhiteDot Regidter Customizer Settings
add_action( 'customize_register', 'whitedot_customize_register' ); 

//WhiteDot Customizer CSS to wp_head
add_action( 'wp_head', 'whitedot_customizer_css' );

//Customizer CSS
add_action( 'customize_controls_print_styles', 'whitedot_customizer_styles' );

//Integrating LifterLMS Sidebars
add_filter( 'llms_get_theme_default_sidebar', 'whitedot_llms_sidebar_function' );

if ( class_exists( 'Whitedot_Designer' ) ) {
	if ( whitedot_designer()->is__premium_only() && whitedot_designer()->can_use_premium_code() ) { 
		add_action( 'customize_controls_enqueue_scripts', 'whitedot_customizer_hide_show_control_js' );
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Gutenberg Compatibility.
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Customizer Functions additions.
 */
require get_template_directory() . '/inc/customizer/customizer-functions.php';

/**
 * Customizer Styles additions.
 */
require get_template_directory() . '/inc/customizer/customizer-styles.php';

/**
 * Customizer Custom Controls additions.
 */
require get_template_directory() . '/inc/customizer/custom-controls.php';

/**
 * Header Hooks
 */
require get_template_directory() . '/inc/hooks/header-hooks.php';

/**
 * Footer Hooks
 */
require get_template_directory() . '/inc/hooks/footer-hooks.php';

/**
 * General Hooks
 */
require get_template_directory() . '/inc/hooks/general-hooks.php';

/**
 * Hooks Actions
 */
require get_template_directory() . '/inc/hooks/hooks-actions.php';

/**
 * WhiteDot Setup
 */
require get_template_directory() . '/inc/function-parts/setup.php';

/**
 * WhiteDot Enqueue
 */
require get_template_directory() . '/inc/function-parts/enqueue.php';

/**
 * Meta Box
 */
require get_template_directory() . '/inc/meta-box.php';

/**
 * Theme Options Page
 */
require get_template_directory() . '/inc/options.php';

/**
 * Schema
 */
require get_template_directory() . '/inc/schema.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load LifterLMS compatibility file.
 */
if ( class_exists( 'LifterLMS' ) ) {
	require get_template_directory() . '/inc/lifterlms.php';
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function whitedot_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}else{
		return 35;
	}
}
add_filter( 'excerpt_length', 'whitedot_excerpt_length', 999 );

/**** Remove WordPress Logo ****/
add_action( 'wp_before_admin_bar_render', function() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu('wp-logo');
}, 7 );

/*** Remove Airtable Debugger ****/
function remove_airpress_debugger_toggle( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'airpress_debugger_toggle' );
}
add_action( 'admin_bar_menu', 'remove_airpress_debugger_toggle', 999 );

/*Remove activities*/
function isa_disable_dashboard_widgets() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');// Remove "At a Glance"
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');// Remove "Activity" which includes "Recent Comments"
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');// Remove Quick Draft
    remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
}
add_action('admin_menu', 'isa_disable_dashboard_widgets');

/**** Remove all notices and core updates ****/
function hide_update_notice_to_all_but_admin_users() 
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );
function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

/*new 2.25
function my_demo() {
    echo "<center>Hello com5940";
}
add_action("hello_world","my_demo");
*/

//Excerpt length control
	function set_excerpt_length(){
		return 40;
	}
	add_filter('excerpt_length','set_excerpt_length');

/* Hook membership system to point system */
add_action( 'mycred_update_user_balance', 'mycredpro_update_membership_level', 10, 4 );
function mycredpro_update_membership_level( $user_id, $current_balance, $amount, $type ) {
    $member_id = SwpmMemberUtils::get_logged_in_members_id();
    $field_name = 'membership_level';
   	$membership_level = SwpmMemberUtils::get_member_field_by_id($member_id, $field_name);
    $balance = $current_balance + $amount;
    switch ($membership_level) {
        case 2:
            /* Test whether basic level(code=2) is ready to be promoted to full level(code=3) */
            if ($balance > 50) {
                SwpmMemberUtils::update_membership_level($member_id, 3);
            }
            break;
        case 3:
            /* Test whether full level(code=3) is ready to be promoted to premium level(code=4) */
            if ($balance > 80) {
                SwpmMemberUtils::update_membership_level($member_id, 4);
            }
            break;
        case 4:
            break;
    }        
}