=== Plugin Name ===
Contributors: 11818739
Donate link: 
Tags: WordPress, Voting, Posts, Custom Post Type, WordPress Voting Plugin
Requires at least: 3.8.1
Tested up to: 3.8.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin that allows WordPress users to add voting functionality to their website.

== Description ==

This voting plugin for WordPress allows users to add voting functionality to any template or custom post type they can think off. 

It has several layers of protection against fake voters which means you can have more confidence in your voting statistics.

Includes shortcode to display top voted posts.

For support please contact me via my [Website](http://www.webcanvasdesign.co.uk/) 

== Installation ==

1. Upload `/wcd-voting/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?=function_exists('wcd_votes') ? wcd_votes() : ''?>` in your post template (single.php) to display the voting button

Note: To echo a list of top voted posts, place '[wcd_show_top_votes]' in your sidebar or anywhere you wish to display a list of top voters


== Change log ==

1.0.0 Released plugin
1.0.1 Fixed Readme.txt
1.0.2 Updated functions.php with correct variable name

