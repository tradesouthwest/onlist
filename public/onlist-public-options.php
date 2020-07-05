<?php
defined( 'ABSPATH' ) or die( 'X' );
//option groups 
$onlist_options = get_option('onlistadmin');
$onlist_configs = get_option('onlistinfo');
$onlist_lists   = get_option('onlistlists');

//listing fields
$onlist_acountry = $onlist_lists['onlist_acountry'];
$onlist_aaddress = $onlist_lists['onlist_aaddress'];
$onlist_acity    = $onlist_lists['onlist_acity'];
$onlist_astate   = $onlist_lists['onlist_astate'];
$onlist_azip     = $onlist_lists['onlist_azip']; 
$onlist_country = onlist_get_custom_field( 'onlist_country' );
$onlist_address = onlist_get_custom_field( 'onlist_address' );
$onlist_city    = onlist_get_custom_field( 'onlist_city' );
$onlist_state   = onlist_get_custom_field( 'onlist_state' );
$onlist_zipcode = onlist_get_custom_field( 'onlist_zipcode' );
$onlist_phone   = onlist_get_custom_field( 'onlist_phone' );
$onlist_email   = onlist_get_custom_field( 'onlist_email' );
$onlist_website = onlist_get_custom_field( 'onlist_website' );
$onlist_other   = onlist_get_custom_field( 'onlist_other' );

//admin options
$onlist_ppp            = $onlist_options['onlist_perpg']; //listing/pg
$onlist_before_content = $onlist_configs['onlist_before_content'];
$onlist_after_content  = $onlist_configs['onlist_after_content'];
$onlist_othername = $onlist_options['onlist_othername']; //other field

if( $onlist_options['onlist_introline'] != '' ) { 
$options_introline =  $onlist_options['onlist_introline']; } else { 
$options_introline = "&gt;"; }  //read more 
