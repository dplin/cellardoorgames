<?php
/*
Author: Ole Fredrik Lie
Contributor: Derek Lin
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php');

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walkers
require_once('library/menu-walker.php');
require_once('library/offcanvas-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

// Add Header image
require_once('library/custom-header.php');

// Add Admin Branding
require_once('library/admin-branding.php');

// Advanced Custom Fields
if (function_exists('acf_add_options_page')){
  // Adding Page Settings option page
  acf_add_options_sub_page(array(
    'page_title'    => 'Page Settings',
    'menu_title'    => 'Page Settings',
    'menu_slug'   => 'page-settings',
    'capability'    => 'edit_pages',
    'parent_slug' => 'edit.php?post_type=page',
    'position'      => false,
    'icon_url'      => false,
  ));
}

?>
