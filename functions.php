<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-04-21
 * Time: 6:42 PM
 */


function lightmatter_scripts() {
    wp_deregister_script('jquery'); // Get rid of existing wordpress jquery 1.1.1
    wp_register_script( 'jquery', get_template_directory_uri() . '/vendor/jquery/jquery-2.1.3.min.js', array(), false, true);
    wp_register_script( 'materialize', get_template_directory_uri() . '/vendor/materialize/js/materialize.min.js', array('jquery'), false, true);
    wp_register_script( 'actions', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'materialize' );
    wp_enqueue_script( 'actions' );
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'lightmatter_scripts' ); // 100 means load 100th priority, definitely last in this case

function lightmatter_widgets_init() {

    register_sidebar(array(
        'name' => 'Slider Widget Area',
        'id'   => 'slider-widget-area',
        'description'   => 'Main page slider widget area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>'
    ));

}

add_action( 'widgets_init', 'lightmatter_widgets_init');

// Auto-install plugin script
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

function my_theme_register_required_plugins() {
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'                  => 'Light Matter Slider Widget', // The plugin name.
            'slug'                  => 'light-matter-slider-widget', // The plugin slug (typically the folder name).
            'source'                => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
            'required'              => true, // If false, the plugin is only 'recommended' instead of required.
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'          => '', // If set, overrides default API URL and points to an external URL.
        ),
    );

    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
}