=== OnList ===
Contributors:  tradesouthwest
Donate link: https://paypal.me/tradesouthwest
Tags: directory, classifieds, listings, ecommerce, responsive, forms, metabox, real estate, business directory, listing, classified ads, catalog
Requires at least: 4.1
Tested up to: 5.2
Requires PHP: 5.6
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Plugin URI: http://themes.tradesouthwest.com/plugins/

Fast and easy setup to get online listing site or directory started.

== Description ==
Create a basic yet stylable directory type listing with custom categories. All field names can be changed to fit the purpose of your website. Fields are by default named Country, Address, State, City, ZipCode, Phone, Email, Website and Other. Map included for each listing and uses the Address and Zip Code fields to calculate the location. Simply add a google Maps API key into the control panel and away you go. 

Supports a Featured Image that shows in main page listings and on archive and single lists. Other images can be added in the standard editor so lister has full control of images and can even create a gallery. Supports Comments and uses theme comment form. Supports Excerpts. Set number of listings on a page. Set number of characters on excerpt. Set text for 'read more' link. Includes default categories for all USA States that can be enabled. (Listings Categories can be anything... food, music, plays. OnList only provides the states since most use this type of plugin for listing by locations.) Set size of maps box. Also has a before and after content editor so you can make the OnList meld with your current theme. Includes two shortcodes, one to list the main page and another to create a Categories page with. Category Widget can be added to any sidebar and this plugin supports nav menu entries.

Please note: You must have a google Maps API Key for Maps to work. (See Q. and A. below) 
Custom Untheme available upon request. This is the "Untheme" by Tania Rascia and is too basic for most but will provide an undiluted base to build something nice to fully customize for developers.
Demo at https://leadspilot.com/test/business-directory/

== Features == 
* Most basic of settings to start a directory, with little to none configuration.
* Custom meta data for every listing.
* Categories can be added.
* USA States are included but can be excluded as categories.
* Only two fields: Address and Zipcode is all that is needed to show map.
* Set size of map box on page.
* Add any label to field "Other" to fit. (Specialist In, UPC, Certification Number, etc.)
* Change any field name to make OnList versatile.
* Before and After Content widgets included.
* Supports comments.
* Supports Featured Image.
* Supports Excerpts.


== Screenshots ==
1. Listing fields
2. Admin Page with settings
3. Admin Page Three
4. Editor meta boxes
5. Basic listing page
6. Single listing page
7. Single listing with images

== Installation ==
This section describes how to install the plugin and get it working.
1. Upload `onlist.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings and configure OnList setting.
4. Add shortcode to a page to display listsings [onlist-listings]
5. Optional, add shortcode to page or use widget to display categories [onlist-categories]

== Frequently Asked Questions ==

Q.: How do I let other people add a listing?
A.: This plugin uses normal WordPress login and user functions. So just use it like you would a blog. Have People register and then they will have their own listing admin area without the administrative rights. (they can not change the plugin settings.)

Q.: Where is the controls for this plugin?
A.: You will find the setup under menu page "OnList Settings. 

Q.: Can I change the listing style?
A.: If you know CSS then you can use any CSS editor to add a selctor in your Customizer or and other stylesheet. Using the Inspector on your browser it is easy to look up the selector name. Most all of OnList selectors start with onlist-.

Q.: How do I get an API key to use the maps?
A.: To get an API Key, Visit: https://developers.google.com/maps/documentation/javascript/get-api-key. Upi will be
required to have a Google account in order to create the key but the proccess is simpler than pie. No programming 
experience or coding required. Just copy the number and paste it into the plugin field.

Q.: I just loaded a new theme and can not see the listings?
A.: Go to Settings > Permalinks and hit "Save Changes." This refreshes your posts to recognize the onlist post. It
 is also possible that you have changed the permalink settings. Try to keep settings as "Post name" permalink.
 
== Upgrade Notice ==
Coming soon: lots of options
n/a

== Changelog ==
1.0.6
* removed whitespace
* fixed zipcode element name
* added place holder for some inputs
* fixed PSR4 standard in comments
* fixed widget id and title
* reworked single and archive template

1.0.5
* changed min version PHP tag
* fixed widget callout
* reset widget title color

1.0.4
* cleaned up white space

1.0.3
* repaired category errors
* added default values to options
* style changes to title

1.0.2
* hide posts from non-authors
* add notes to instruction page

1.0.1
* fixed admin fields rendering

1.0.0
* initial release 