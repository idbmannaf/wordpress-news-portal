<?php
/*
Plugin Name: DemoDashboard Widget by Mannaf
Plugin URI: https://github.com/idbnewsmannaf
Description:
Version: 1.0
Author: Mannaf
Author URI: https://github.com/idbnewsmannaf
License: GPLv2 or later
Text Domain: dashboardwidget
Domain Path: /languages/
*/

function ddw_load_textdomain() {
	load_plugin_textdomain( 'dashboardwidget', false, plugin_dir_path( __FILE__ ) . "/languages" );
}

add_action( 'plugins_loaded', 'ddw_load_textdomain' );

function ddw_dashboard_widget() {
	if ( current_user_can( 'edit_dashboard' ) ) {
		wp_add_dashboard_widget( 'demodashboardwidget',
			__( 'Dashboard Widget', 'dashboardwidget' ),
			'ddw_dashboardwidget_output',
			'ddw_dashboardwidget_configure'
		);
	} else {
		wp_add_dashboard_widget( 'demodashboardwidget',
			__( 'Dashboard Widget', 'dashboardwidget' ),
			'ddw_dashboardwidget_output'
		);
	}

}

add_action( 'wp_dashboard_setup', 'ddw_dashboard_widget' );

function ddw_dashboardwidget_output() {
	$number_of_posts = get_option( 'dashboardwidget_nop', 5 );
	$feeds           = array(
		array(
			'url'          => 'http://newsrss.bbc.co.uk/rss/sportonline_uk_edition/boxing/rss.xml',
			'items'        => $number_of_posts,
			'show_summary' => 0,
			'show_author'  => 0,
			'show_date'    => 0,
		)
	);
	wp_dashboard_primary_output( 'dashboardwidget', $feeds );
}

function ddw_dashboardwidget_configure() {
	$number_of_posts = get_option( 'dashboardwidget_nop', 5 );
	if ( isset( $_POST['dashboard-widget-nonce'] ) && wp_verify_nonce( $_POST['dashboard-widget-nonce'], 'edit-dashboard-widget_demodashboardwidget' ) ) {
		if ( isset( $_POST['ddw_nop'] ) && $_POST['ddw_nop'] > 0 ) {
			$number_of_posts = sanitize_text_field( $_POST['ddw_nop'] );
			update_option( 'dashboardwidget_nop', $number_of_posts );
		}
	}
	?>
    <p>
        <label>Number of Posts:</label><br/>
        <input type="text" name="ddw_nop" id="ddw_nop" class="widefat" value="<?php echo $number_of_posts; ?>">
    </p>
	<?php
}