<?php 
/**
 * @since ver: 1.0.6
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package onlist
 * @subpackage admin/onlist-editor-page
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

$onlist_options = get_option('onlistadmin');
$onlist_configs = get_option('onlistinfo');
$onlist_lists   = get_option('onlistlists');

//admin options
$onlist_ppp       = $onlist_options['onlist_perpg'];               //listing/pg
$onlist_before_content = $onlist_configs['onlist_before_content'];
$onlist_after_content  = $onlist_configs['onlist_after_content'];
$onlist_options_1 = 'block';                                // map display/not 
$onlist_options_2 = 480;                                    // map w
$onlist_options_3 = 320;                                   // map h
$onlist_options_4 = $onlist_options['onlist_gapikey'];    // gmaps key
$onlist_othername = $onlist_options['onlist_othername']; //other field
$onlist_introline = $onlist_options['onlist_introline']; //read more

//listing fields Labels
$onlist_acountry = $onlist_lists['onlist_acountry'];
$onlist_aaddress = $onlist_lists['onlist_aaddress'];
$onlist_acity = $onlist_lists['onlist_acity'];
$onlist_astate = $onlist_lists['onlist_astate'];
$onlist_azip = $onlist_lists['onlist_azip']; 

// listing fields Values
$onlist_country = onlist_get_custom_field( 'onlist_country' );
$onlist_address = onlist_get_custom_field( 'onlist_address' );
$onlist_city    = onlist_get_custom_field( 'onlist_city' );
$onlist_state   = onlist_get_custom_field( 'onlist_state' );
$onlist_zipcode = onlist_get_custom_field( 'onlist_zipcode' );
$onlist_phone   = onlist_get_custom_field( 'onlist_phone' );
$onlist_email   = onlist_get_custom_field( 'onlist_email' );
$onlist_website = onlist_get_custom_field( 'onlist_website' );
$onlist_other   = onlist_get_custom_field( 'onlist_other' );
?>

<div class="onlist-editor-fields">
<table class="alignleft">
<tr><td><?php if( $onlist_acountry != '' ) : ?><p><label><?php 
echo esc_html( $onlist_acountry ); ?></label><br>
<input id="onlist_country" name="onlist_country" type="text" 
       placeholder="<?php esc_attr_e( 'Not required', 'onlist' ); ?>" 
       value="<?php echo esc_attr( $onlist_country ); ?>" /></p>
<?php endif; ?></td></tr>

<tr><td><?php 
if( $onlist_aaddress != '' ) : ?><p><label><?php 
echo esc_html( $onlist_aaddress );  ?></label><br>
<input id="onlist_address" name="onlist_address" type="text" 
       value="<?php echo esc_attr( $onlist_address ); ?>" /></p>
<?php endif; ?></td></tr>

<tr><td><?php 
if( $onlist_acity != '' ) : ?><p><label><?php 
echo esc_html( $onlist_acity );  ?></label><br>
<input id="onlist_city" name="onlist_city" type="text" 
       value="<?php echo esc_attr( $onlist_city ); ?>" /></p>
<?php endif; ?></td></tr>

<tr><td><?php 
if( $onlist_astate != '' ) : ?><p><label><?php 
echo esc_html( $onlist_astate );  ?></label><br>
<input id="onlist_state" name="onlist_state" type="text" 
       value="<?php echo esc_attr( $onlist_state ); ?>" /></p>
<?php endif; ?></td></tr>

<tr><td><?php 
if( $onlist_azip != '' ) : ?><p><label><?php 
echo esc_html( $onlist_azip );  ?></label><br>
<input id="onlist_zipcode" name="onlist_zipcode" type="text" 
       value="<?php echo esc_attr( $onlist_zipcode ); ?>" 
       placeholder="<?php echo esc_attr( $onlist_azip );  ?>" /></p>
<?php endif; ?></td></tr>
</table>

<table class="alignright">
<tr><td><p><label><?php echo esc_html__( 'IMPORTANT ', 'onlist' ); ?></label><br>
<small id="onlist_info"> 
    <?php echo esc_html__( 'You must add a Listing Category. ---->',
                      'onlist' ); ?></small></p>
                      <p><?php //onlist_manage_terms( 'onlist-taxonomy' ); ?></p>
                      </td></tr>
                      
<tr><td><p><label><?php echo esc_html__( 'Phone ', 'onlist' ); ?></label><br>
<input id="onlist_phone" 
       name="onlist_phone" type="text"  
       value="<?php echo esc_html( $onlist_phone ); ?>" /></p></td></tr>

<tr><td><p><label><?php echo esc_html__( 'EMail ', 'onlist' ); ?></label><br>
<input id="onlist_email" 
       name="onlist_email" type="text"  
       value="<?php echo esc_html( $onlist_email ); ?>" /></p></td></tr>

<tr><td><p><label><?php echo esc_html__( 'Website ', 'onlist' ); ?></label><br>
<input id="onlist_website" 
       name="onlist_website" type="text"  
       value="<?php echo esc_html( $onlist_website ); ?>" /></p></td></tr>
	
<tr><td><p><label><?php if( $onlist_othername != '' ) { 
echo esc_html( $onlist_othername ); } else { esc_html_e( 'Other ', 
'onlist' ); } ?></label><br>
<input id="onlist_other" 
       name="onlist_other" type="text"  
       value="<?php echo esc_html( $onlist_other ); ?>" /></p></td></tr>

</table>                      
<table id="NonceRow"><tbody>
<tr><td><?php  wp_nonce_field( 'onlist_public_nonce_onlist_post', 'onlist_public_nonce' ); ?></td></tr>
</tbody></table>
</div> 
