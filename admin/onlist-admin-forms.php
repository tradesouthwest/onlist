<?php 
/** get the value of the setting
 * @uses $options = get_option('onlist_{option-name}');
 */
defined( 'ABSPATH' ) or die( 'X' );

//name for 'Other' field
function onlist_acountry_field()
{
$options = get_option('onlistlists'); 
$onlist_acountry = $options['onlist_acountry']; 
if( $onlist_acountry == '' ) { $onlist_acountry = __( 'Country', 'onlist' ); } 
?>
    <label class="olmin"><?php esc_html_e( 'Set a name for &#39;Country&#39; field.', 'onlist' ); ?></label>
    <input type="text" name="onlistlists[onlist_acountry]" 
           value="<?php echo esc_attr( $onlist_acountry ); ?>" 
           size="35"/>
    <?php
}

//name for 'Address' field
function onlist_aaddress_field()
{
$options = get_option('onlistlists');
$onlist_aaddress = $options['onlist_aaddress'];
if ( $onlist_aaddress == '' ) $onlist_aaddress = __( 'Address', 'onlist' );  
?>
    <label class="olmin"><?php esc_html_e( 'Set a name for &#39;Address&#39; field.',
                             'onlist' ); ?></label>   
    <input type="text" name="onlistlists[onlist_aaddress]" 
           value="<?php echo esc_attr( $onlist_aaddress ); ?>" 
           size="35" placeholder="<?php esc_attr_e( 
           'Best to reserve for location', 'onlist' ); ?>" />
    <?php
}
//name for 'City' field
function onlist_acity_field() 
{
$options = get_option('onlistlists');
$onlist_acity = $options['onlist_acity'];
if ( $onlist_acity == '' ) $onlist_acity = __( 'City', 'onlist' );  
?>
    <label class="olmin"><?php esc_html_e( 'Set a name for &#39;City&#39; field.',
                             'onlist' ); ?></label>
    <input type="text" name="onlistlists[onlist_acity]" 
           value="<?php echo esc_attr( $onlist_acity ); ?>" 
           size="35"/>
    <?php
}
//name for 'State' field
function onlist_astate_field()
{
$options = get_option('onlistlists');
$onlist_astate = $options['onlist_astate'];
if ( $onlist_astate == '' ) $onlist_astate = __( 'State', 'onlist' );  
?>
    <label class="olmin"><?php esc_html_e( 'Set a name for &#39;State&#39; field.',
                             'onlist' ); ?></label>
    <input type="text" name="onlistlists[onlist_astate]" 
           value="<?php echo esc_attr( $onlist_astate ); ?>" 
           size="35"/>
    <?php
}
//name label and placeholder for 'Zip' field
function onlist_azip_field()
{
$options = get_option('onlistlists');
$onlist_azip = $options['onlist_azip'];
if ( $onlist_azip == '' ) $onlist_azip = __( 'Zip', 'onlist' );  
?>
    <label class="olmin"><?php esc_html_e( 'Set a name for &#39;ZipCode&#39; field.',
                             'onlist' ); ?></label>
    <input type="text" name="onlistlists[onlist_azip]" 
           value="<?php echo esc_attr( $onlist_azip ); ?>" 
           size="35" placeholder="<?php esc_attr_e( 
           'Best to reserve for location', 'onlist' ); ?>" />
    <?php
}
 
//output the number of posts field
function onlist_admin_perpg()
{
$options = get_option('onlistadmin');
?>
    <label class="olmin"><?php esc_html_e( 'Set # of listings on page',
                             'onlist' ); ?></label>
    <input type="number" name="onlistadmin[onlist_perpg]" 
           value="<?php echo esc_attr( $options['onlist_perpg'] ); ?>" 
           min="1" max="100" />
    <?php
}

//excerpt length selector
function onlist_admin_excerpt()
{
    $options = get_option('onlistadmin');
    if( $options['onlist_excerpt'] == '' ) 
        $options['onlist_excerpt'] = 225;
?>
    <label class="olmin"><?php esc_html_e( 'Set # characters in excerpt',
                             'onlist' ); ?></label>
    <input type="number" name="onlistadmin[onlist_excerpt]" 
           value="<?php echo esc_attr( $options['onlist_excerpt'] ); ?>" 
           min="0" max="500" />
    <?php
}

//checkbox
function onlist_admin_deflocations() {
$options = get_option('onlistadmin');
?>
    <p><input type="hidden" name="onlistadmin[onlist_deflocations]" 
    value="no" />
    <input name="onlistadmin[onlist_deflocations]" value="yes" type="checkbox"
    <?php if ( $options['onlist_deflocations'] == "yes") 
    echo 'checked="checked"'; ?> /> 	
    <?php esc_html_e( 'Check to use default USA States.', 'onlist' ); ?></p>
    <small><?php esc_html_e( 'To remove these, after once installing, you
    may delete what you do not want in the Listings Categories page. Remember, 
    you can use the Listings Categories for any genre of category you want. 
    The USA States is only a default usage of listing structure. You may add as 
    many sub-categories as you like.', 
     'onlist' ); ?></small>
<?php  
} 

//read more link text
function onlist_admin_introline() {
$options = get_option('onlistadmin');
if( $options['onlist_introline'] != '' ) { 
$options_introline =  $options['onlist_introline']; } else { 
$options_introline = "&gt;"; } 
?>
    <label class="olmin"><?php esc_html_e( 'Set text for listing link.', 
    'onlist' ); ?></label> 
    <input name="onlistadmin[onlist_introline]" type="text" 
    value="<?php echo esc_attr( $options_introline ); ?>" 
    id="onlistCountry" /> <br>
    <small><?php esc_html_e( 'Text for link to listing. Remove any text from
    this field and no text will show.', 'onlist' ); ?></small>
<?php  
} 

//name for 'Other' field
function onlist_admin_other()
{
$options = get_option('onlistadmin');
?>
    <label class="olmin">
    <?php esc_html_e( 'Set a name for &#39;Other&#39; field.', 'onlist' ); ?></label>
    <input type="text" name="onlistadmin[onlist_othername]" 
           value="<?php echo esc_attr( $options['onlist_othername'] ); ?>" 
           size="35"/>
    <?php
}

//checkbox
function onlist_admin_showmap() {
$options = get_option('onlistadmin');
?>
    <p><input type="hidden" name="onlistadmin[onlist_showmap]" 
    value="yes" />
    <input name="onlistadmin[onlist_showmap]" value="no" type="checkbox"
    <?php if ( $options['onlist_showmap'] == "no") 
    echo 'checked="checked"'; ?> /> 	
    <?php esc_html_e( 'Check to Remove Maps on single pages.', 'onlist' ); ?></p>
    <small><?php esc_html_e( 'By default the maps will show using the address field and zipcode field of your listings.', 
     'onlist' ); ?></small> 
<?php  
} 

//output the number field for map width
function onlist_admin_mapwidth()
{
$options = get_option('onlistadmin');
if($options['onlist_mapwidth'] == '' )  $options['onlist_mapwidth'] = 480;
?>
    <label class="olmin"><?php esc_html_e( 'Set width of map on page',
                             'onlist' ); ?></label>
    <input type="number" name="onlistadmin[onlist_mapwidth]" 
           value="<?php echo esc_attr( $options['onlist_mapwidth'] ); ?>" 
           min="10" max="1600" />
    <?php
}

//output the number field for map width
function onlist_admin_mapheight()
{
$options = get_option('onlistadmin');
if($options['onlist_mapheight'] == '' )  $options['onlist_mapheight'] = 360;
?>
    <label class="olmin"><?php esc_html_e( 'Set height of map on page',
                             'onlist' ); ?></label>
    <input type="number" name="onlistadmin[onlist_mapheight]" 
           value="<?php echo esc_attr( $options['onlist_mapheight'] ); ?>" 
           min="10" max="1400" />
    <?php
}

//output field for gmaps key
function onlist_admin_gapikey()
{
$options = get_option('onlistadmin');
?>
    <label class="olmin"><?php esc_html_e( 'Enter your GoogleMaps API Key.',
                             'onlist' ); ?></label>
    
    <input type="text" name="onlistadmin[onlist_gapikey]" 
           value="<?php echo esc_attr( $options['onlist_gapikey'] ); ?>" 
           size="32"/>
    <?php
}


//read more text field
function onlist_before_content_textarea() 
{ 
$options = get_option('onlistinfo');
?>
<div class="field">
            <label for="onlist_before_content"></label>
            
<textarea name="onlistinfo[onlist_before_content]" id="onlist_beforeContent" cols="35" rows="5"><?php echo esc_textarea( $options['onlist_before_content'] ); ?></textarea>
        </div>
<?php 
}
function onlist_after_content_textarea() 
{ 
$options = get_option('onlistinfo'); ?>
<div class="field">
            <label for="onlist_after_content"></label>
            
<textarea name="onlistinfo[onlist_after_content]" id="onlist_afterContent" cols="35" rows="5"><?php echo esc_textarea( $options[ 'onlist_after_content' ] );?></textarea>
        </div>
<?php 
}



function onlist_info_1() 
{
?>
<div class="wrap">
<h2><?php esc_html_e( 'Admin form tips', 'onlist' ); ?></h2>
<dl>
<dt><b><?php esc_html_e( 'User Levels', 'onlist' ); ?></b></dt>
<dd><span class="warning"><?php esc_html_e( 'Upon install of OnList, change user roles to &#39;Author&#39;!', 'onlist' ); ?></span></dd>

<dt><b><?php esc_html_e( 'Listings Shortcodes', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'Main Listing Page [onlist-listings]', 'onlist' ); ?></dd>
<dd><?php esc_html_e( 'A Categories Page [onlist-categories]', 'onlist' ); ?></dd>

<dt><b><?php esc_html_e( 'Listings Per Page', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'Can over-ride WP default posts per page setting.', 'onlist' ); ?></dd>

<dt><b><?php esc_html_e( 'Images For Listings', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'All image placement uses the WP native Media Library. You can make galleries and there are many options that a custom media library would not provide. One nice advantage of Media Library is that you can insert an image ANYPLACE within your post/listing. Suggestion would be to put your images at the bottom of the content.', 'onlist' ); ?></dd>

<dt><b><?php esc_html_e( 'Default Locations', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'Listings Categories can be anything... food, music, plays. OnList only provides the states since most use this plugin for listing by locations.', 'onlist' ); ?></dd>

<dt><b><?php esc_html_e( 'Show Maps on Page', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'Toggles whether or not Maps show on pages', 'onlist' ); ?></dd>

<dt><b><?php esc_html_e( 'Set Field Name', 'onlist' ); ?></b></dt>
<dd></dd>
<dt><b><?php esc_html_e( 'Google Maps Key', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'For an API Visit: ', 'onlist' ); ?><a href="<?php echo esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ); ?>" target="_blank">https://developers.google.com/maps/documentation/javascript/get-api-key.</a> </dd>
<dd><small><?php esc_html_e( 'link opens in new window', 'onlist' ); ?></small></dd>

<dt><b><?php esc_html_e( 'Before Content', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'Copy or write HTML into the textarea that will either match your theme or that you want to use to
display before the listing. Before and After Content are only effective on the Single Template (single listings).', 'onlist' ); ?></dd>

<dt><b><?php esc_html_e( 'After Content', 'onlist' ); ?></b></dt>
<dd><?php esc_html_e( 'Both before and after textareas can be as simple as a clearfix element or you might use a section of your current theme to offset or create areas around the OnList section.', 'onlist' ); ?></dd>

<dt><b></b></dt>
<dd></dd>

</dl>
</div>
 <p><?php esc_html_e( 'For custom configuration of OnList please email 
    Larry @ ', 'larryslist' ); ?> <a href="mailto:support@tradesouthwest.com">
    support@tradesouthwest.com</a><br></p>
    
<?php 
}

function onlist_filter_checkbox($input) 
{
    $vals = array( "yes", "no", true, false, 1, 0 );
        if( in_array($input, $vals ) ) 
            return $val;
} 