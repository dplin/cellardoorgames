<?php
    /******************************************************* Back End Config (Admin) *********************************************/

    // Remove the Admin bar on top.
    show_admin_bar(false);

    // Set Permalink
    add_action('init', 'dl_set_permalink');

    // Hide WP Upgrade Message
    add_action('admin_menu', 'dl_hidenag');

    // Enable "Home" in menu
    add_filter('wp_page_menu_args', 'dl_home_page_menu_args');

    // Enable Post-Thumbnail in post ONLY and add additional sizes.  Note: 'true' enables hard cropping so each image is exactly those dimensions and automatically cropped
    add_image_size('310 x 180', 310, 180, true); // 310 pixels wide by 140 pixels high
    add_image_size('636 x 297', 636, 297, true); // 636 pixels wide by 297 pixels high
    add_image_size('260 x 222', 260, 222, true); //260 pixels wide by 222 pixels high

    // Change WYSIWYG editor font style
    add_editor_style('css/custom-editor.css');

    // Change the home page to front-page.php instead of the default Blog
    dl_set_front_page();

    // Restrict upload file type
    //add_filter('wp_handle_upload_prefilter', 'dl_wp_handle_upload_prefilter');

    /****************************************************** Admin Branding *******************************************************/

    // Hide unwanted menu items - Disable Pre-built post type (Post, Comments)
    add_action('admin_menu', 'dl_remove_menu_pages', 999);

    // Hide theme editor submenu (Not needed if Theme menu is removed in "dl_remove_menu_pages()")
    //add_action('admin_init', 'dl_remove_theme_editor_menu', 102);

    // Remove Dashboard widgets
    add_action('admin_menu', 'disable_default_dashboard_widgets');

    // Remove default "Welcome to Wordpress" from Dashboard
    remove_action('welcome_panel', 'wp_welcome_panel');

    // Custom welcome message in Dashboard
    add_action('welcome_panel', 'dl_custom_welcome_panel');

    // Custom css style for Dashboard
    add_action('admin_head', 'dl_custom_dashboard_css');

    // Set "screen option" to single column layout
    add_filter('get_user_option_screen_layout_dashboard', 'force_single_column_layout_dashboard' );

    // Remove columns from POSTS list (Not needed if Posts menu page is removed in "dl_remove_menu_pages()")
    //add_filter('manage_edit-post_columns', 'dl_post_columns_filter', 10, 1 );

    // Remove columns from Pages list
    add_filter('manage_pages_columns', 'dl_pages_columns_filter');

    // Remove "deactivation" link from Plugins page
    add_filter('plugin_action_links', 'disable_plugin_deactivation', 10, 4);

    // Remove items from Admin Toolbar
    add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

    // Hide Help tab
    add_action('admin_head', 'hide_help_tab');

    // Add custom admin Footer
    add_filter('admin_footer_text', 'dl_custom_admin_footer');

    // Remove WP version in Admin footer.
    add_filter('update_footer', 'dl_custom_admin_footer_version', 9999);

    // Custom login page stylesheet
    add_action('login_head', 'dl_custom_login_css');

    // Custom login logo URL
    add_filter('login_headerurl', 'custom_loginlogo_url');


  /******************* Admin Branding ******************/

  function dl_remove_menu_pages() {
    global $submenu;

    // Top level
    //remove_menu_page('edit.php');                           // Posts
    //remove_menu_page('edit-comments.php');                  // Comments
    //remove_menu_page('themes.php');                       // Appearance
    //remove_menu_page('tools.php');                        // Tools
    //remove_menu_page('edit.php?post_type=acf-field-group');               // Custom Fields (ACF)


/*    unset($submenu['themes.php'][5]);  // Theme
    unset($submenu['themes.php'][6]);  // Customize
    unset($submenu['themes.php'][7]);  // Widgets
    unset($submenu['themes.php'][10]); // Menu*/

    // Sub-menus
    //remove_submenu_page('themes.php', 'theme-editor.php');           // Appearance -> Customize
    //remove_submenu_page('themes.php', 'themes.php');              // Appearance -> Theme
    remove_submenu_page('plugins.php', 'plugin-editor.php');          // Plugins -> Editor
    remove_submenu_page('users.php', 'users.php');                // Users -> All Users
    remove_submenu_page('users.php', 'user-new.php');             // Users -> New
    remove_submenu_page('options-general.php', 'options-writing.php');      // Settings -> Writing
    remove_submenu_page('options-general.php', 'options-reading.php');    // Settings -> Reading
    remove_submenu_page('options-general.php', 'options-discussion.php'); // Settings -> Discussion
    remove_submenu_page('options-general.php', 'options-media.php');      // Settings -> Media
    remove_submenu_page('options-general.php', 'options-permalink.php');    // Settings -> Permalink
  }

  function dl_remove_theme_editor_menu() {
    remove_submenu_page('themes.php', 'theme-editor.php');      // Appearance -> Editor
  }

  function disable_default_dashboard_widgets() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
  }

  function dl_custom_welcome_panel() {
    echo
    '<div class="welcome-panel-content" style="padding-bottom:23px;">'
    .'<h3>Welcome to ' . get_bloginfo() . '!</h3>'
    .'</div>';
  }

  function dl_custom_dashboard_css() {
    echo '<style>
        #dashboard-widgets div.empty-container {
          border:none !important;
        }
      </style>'
    ;
  }

  function force_single_column_layout_dashboard() {
    return 1;
  }

  function dl_post_columns_filter( $columns ) {
    unset($columns['author']);
    unset($columns['tags']);
    unset($columns['categories']);
    unset($columns['tags']);
    return $columns;
  }

  function dl_pages_columns_filter($columns) {
    unset($columns['author']);
    unset($columns['comments']);
    return $columns;
  }

  function disable_plugin_deactivation( $actions, $plugin_file, $plugin_data, $context ) {
    // Remove edit link for all plugins
    if ( array_key_exists( 'edit', $actions ) )
      unset( $actions['edit'] );
    // Remove deactivate link for important plugins (ACF)
    if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, array(
      'advanced-custom-fields/acf.php',
      'advanced-custom-fields-contact-form-7-field/acf-cf7.php',
      'acf-repeater/acf-repeater.php'
    )))
      unset( $actions['deactivate'] );
    return $actions;
  }

  function custom_loginlogo_url($url) {
    return get_site_url();
  }

  function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('site-name');
    $wp_admin_bar->remove_menu('wpseo-menu');   // WP SEO plugin link
  }

  function hide_help_tab() {
    echo '<style type="text/css">
        #contextual-help-link-wrap { display: none !important; }
    </style>';
  }

  function dl_custom_admin_footer() {
    echo '&reg; '.date("Y").' - <a href="' . get_site_url() . '">' . get_bloginfo() . '</a>';
  }

  function dl_custom_admin_footer_version() {return '';}

  function dl_remove_wp_version() {return '';}

  function dl_custom_login_css() {
      echo "<link href='". get_stylesheet_directory_uri() . "/css/wp-admin.css' rel='stylesheet' type='text/css'/>";
  }

  function dl_set_permalink(){
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
  }

  function dl_hidenag() {
    remove_action('admin_notices', 'update_nag', 3);
  }


  function dl_home_page_menu_args($args) {
    $args['show_home'] = true;
    return $args;
  }

  function dl_set_front_page() {
    // Create "Home" page if it doesn't exisit
    if (!get_page_by_title('Home')){
      // Create a Home page
      $home_page  = array(
        'post_title'        => 'Home',
        'post_type'         => 'page',
        'post_name'         => '',
        'post_content'      => '',
        'post_status'       => 'publish',
        'comment_status'  => 'closed',
        'ping_status'       => 'closed',
        'post_author'       => 1,
        'menu_order'      => 0,
        'guid'                => site_url()
      );
      wp_insert_post($home_page, false);
    }

    // Set static front page
    $home_page = get_page_by_title('Home');
    update_option( 'page_on_front', $home_page->ID );         // Make sure a page called "Home" exist
    update_option( 'show_on_front', 'page' );
    //$blog_page   = get_page_by_title( 'Blog' );           // Make sure a page called "Blog" exist.  NOTE: Not needed since this theme doesn't support Blog.
    //update_option( 'page_for_posts', $blog_page->ID );
  }

  function dl_wp_handle_upload_prefilter($file) {
    // This bit is for the flash uploader
    if ($file['type']=='application/octet-stream' && isset($file['tmp_name'])) {
    $file_size = getimagesize($file['tmp_name']);
    if (isset($file_size['error']) && $file_size['error']!=0) {
      $file['error'] = "Unexpected Error: {$file_size['error']}";
      return $file;
    } else {
      $file['type'] = $file_size['mime'];
    }
    }
    list($category,$type) = explode('/',$file['type']);
    if ('image'!=$category || !in_array($type,array('jpg','jpeg','gif','png'))) {
    $file['error'] = "Sorry, you can only upload a .GIF, a .JPG, or a .PNG image file.";
    } else if ($post_id = (isset($_REQUEST['post_id']) ? $_REQUEST['post_id'] : false)) {
    if (count(get_posts("post_type=attachment&post_parent={$post_id}"))>0)
      $file['error'] = "Sorry, you cannot upload more than one (1) image.";
    }
    return $file;
  }

?>
