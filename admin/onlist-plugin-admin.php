<?php
/**
 * @since ver: 1.0.6
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package onlist
 * @subpackage admin/onlist-plugin-admin
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' ); 

    add_action( 'admin_menu', 'onlist_add_options_page' );  
    add_action( 'admin_init', 'onlist_register_admin_options' );
     
/**
 * Add an options page under the Settings submenu
 * $page_title, $menu_title, $capability, $menu_slug, $function-to-render, $icon_url, $position
 * @since  1.0.0
 */
function onlist_add_options_page() 
{
    add_menu_page(
        __( 'OnList Settings', 'onlist' ),
        __( 'OnList Settings', 'onlist' ),
        'manage_options',
        'onlist',
        'onlist_options_page',
        'dashicons-admin-tools' 
    );
}
/** register a new sections and fields in the "onlist admin" page
 */
function onlist_register_admin_options() 
{
    register_setting( 'onlist_adminPg', 'onlistadmin' );
    register_setting( 'onlist_infoPg',  'onlistinfo'  );
    register_setting( 'onlist_listsPg', 'onlistlists' );

/**
 * listings section
 */        
    add_settings_section(
        'onlist_listings_section',
        'OnList Listings Section',
        'onlist_listings_section_cb',
        'onlist_listsPg'
    ); 
    add_settings_field(
        'onlist_acountry',
        __('Name for Country Field', 'onlist'),
        'onlist_acountry_field',
        'onlist_listsPg',
        'onlist_listings_section'
    );
    add_settings_field(
        'onlist_aaddress',
        __('Name for Address Field', 'onlist'),
        'onlist_aaddress_field',
        'onlist_listsPg',
        'onlist_listings_section'
    );
    add_settings_field(
        'onlist_acity',
        __('Name for City Field', 'onlist'),
        'onlist_acity_field',
        'onlist_listsPg',
        'onlist_listings_section'
    );
    add_settings_field(
        'onlist_astate',
        __('Name for State Field', 'onlist'),
        'onlist_astate_field',
        'onlist_listsPg',
        'onlist_listings_section'
    );
    add_settings_field(
        'onlist_azip',
        __('Name for ZipCode Field', 'onlist'),
        'onlist_azip_field',
        'onlist_listsPg',
        'onlist_listings_section'
    );
/*    add_settings_field(
        'onlist_featured',
        __('Select Featured Listing', 'onlist'),
        'onlist_featured_listing',
        'onlist_listsPg',
        'onlist_listings_section'
    );
*/
/**
 * Options section
 */ 
    add_settings_section(
        'onlist_options_section',
        'OnList Settings Section',
        'onlist_options_section_cb',
        'onlist_adminPg'
    ); 
/** register new fields in the "onlist_options_section" section
 *  $id, $title, $callback, $page, $section = 'default', $args = array() 
 */
    add_settings_field(
        'onlist_perpg',
        __('Listings Per Page', 'onlist'),
        'onlist_admin_perpg',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_excerpt',
        __('Excerpt Length', 'onlist'),
        'onlist_admin_excerpt',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_intorline',
        __('Read Listing Text', 'onlist'),
        'onlist_admin_introline',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_othername',
        __('Set Field Name', 'onlist'),
        'onlist_admin_other',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_deflocations',
        __('Default Locations', 'onlist'),
        'onlist_admin_deflocations',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_showmap',
        __('Show Maps on Page', 'onlist'),
        'onlist_admin_showmap',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_mapwidth',
        __('Map Width', 'onlist'),
        'onlist_admin_mapwidth',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_mapheight',
        __('Map Height', 'onlist'),
        'onlist_admin_mapheight',
        'onlist_adminPg',
        'onlist_options_section'
    );
    add_settings_field(
        'onlist_gapikey',
        __('Google Maps Key', 'onlist'),
        'onlist_admin_gapikey',
        'onlist_adminPg',
        'onlist_options_section'
    );
/**
 * info section
 */
    add_settings_section(
        'onlist_info_section',
        'OnList Information Section',
        'onlist_info_section_cb',
        'onlist_infoPg'
    ); 
    add_settings_field(
        'onlist_before_content',
        __('Before Single Content', 'onlist'),
        'onlist_before_content_textarea',
        'onlist_infoPg',
        'onlist_info_section'
    );
    add_settings_field(
        'onlist_after_content',
        __('After Single Content', 'onlist'),
        'onlist_after_content_textarea',
        'onlist_infoPg',
        'onlist_info_section'
    );
    add_settings_field(
        'onlist_info',
        __('Information', 'onlist'),
        'onlist_info_1',
        'onlist_infoPg',
        'onlist_info_section'
    );
   
}

//callbacks for all form parts
//include_once( plugin_dir_path( __FILE__ ) . 'onlist-admin-forms.php' );   

// section content cb
function onlist_listings_section_cb()
{    
    print( '<h4>' );
    esc_html_e( 'Modify Field Names from Here. 
    Erase or leave blank to remove field.', 'onlist' );
    print( '</h4>' ); 
}

// section content cb
function onlist_options_section_cb()
{    
  
}

// section content cb
function onlist_info_section_cb()
{    
   echo '<h4>'. esc_html__( 'OnList Information and Configuration Instructions', 
   'onlist' ) .'</h4>'; 
   $onlist_date = get_option( 'onlist_date_plugin_activated' ); 
   echo '<p>' . esc_html__( 'This plugin last activated on: ', 
   'onlist' ) . '<code>'. esc_html($onlist_date) .'</code></p>';
}
        
//render admin page
function onlist_options_page() 
{
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) return;
    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'onlist_messages', 'onlist_message', 
                        __( 'Settings Saved', 'onlist' ), 'updated' );
    }
    // show error/update messages
    settings_errors( 'onlist_messages' );
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'onlist_listsPg';
    ?>
    <div class="wrap">
    
    <h1><div id="icon-options-general" class="icon32"></div>
    <?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <h2 class="nav-tab-wrapper">
    <a href="?page=onlist&tab=onlist_listsPg" 
       class="nav-tab <?php echo $active_tab == 'onlist_listsPg' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'Listings', 'onlist' ); ?></a>
    <a href="?page=onlist&tab=onlist_adminPg" 
       class="nav-tab <?php echo $active_tab == 'onlist_adminPg' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'OnList Options', 'onlist' ); ?></a>
    <a href="?page=onlist&tab=onlist_infoPg" 
       class="nav-tab <?php echo $active_tab == 'onlist_infoPg' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'Configuration', 'onlist' ); ?></a></h2>
       
    <form action="options.php" method="post">
    <?php
    if( $active_tab == 'onlist_listsPg' ) { 
        settings_fields( 'onlist_listsPg' );
        do_settings_sections( 'onlist_listsPg' ); 
    } 
    elseif( $active_tab == 'onlist_adminPg' ) {
        settings_fields( 'onlist_adminPg' );
        do_settings_sections( 'onlist_adminPg' );
    } 
    else {     
    settings_fields( 'onlist_infoPg' );
    do_settings_sections( 'onlist_infoPg' ); 
    }
    submit_button( 'Save Settings' ); ?>
    </form>
    
    </div>
<?php
}  
//default content for listing locations    
function onlist_check_locations_term() 
{ 
    $options = get_option('onlistadmin');
    
    if ( $options['onlist_deflocations'] == 'yes' ) 
    { 
        $object_id = '';
        $terms = $states;
        $taxonomy = 'onlist-taxonomy';
        $append = true;
        $states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');

    wp_set_object_terms( $object_id, $terms, $taxonomy, $append );  
    } 
} 