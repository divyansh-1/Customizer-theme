<?php
register_nav_menus( array(
		'Mainmenu' => __( 'Main Menu', 'snvinfotech' ),
		'Footermenu' => __( 'Footer Menu', 'snvinfotech' ),
	) );

function custom_header_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Blog Sidebar', 'custom_header' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'custom_header' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );   
}
add_action( 'widgets_init', 'custom_header_widgets_init' );

/**
 * Disable default Editor
 */
add_filter('use_block_editor_for_post', '__return_false');

add_filter( 'use_widgets_block_editor', '__return_false' );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}
// Add Thumbnail Support
add_theme_support('post-thumbnails');

// Add a Customizer section for the header
function custom_header_customizer_section($wp_customize) {
    $wp_customize->add_section('custom_header_section', array(
        'title' => __('Header', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name

        // Priority use for showing the posotion of the tab
        // 'priority' => 1,  
    ));

    // Add a setting for the header image
    $wp_customize->add_setting('custom_header_image');

    // Add a control for the header image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_image', array(
        'label' => __('Header Logo', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name
        'section' => 'custom_header_section',  // Have the Section in the customizer
        'settings' => 'custom_header_image',
    )));
}
// Hook into the Customizer and add the custom section and control
add_action('customize_register', 'custom_header_customizer_section');


// General panel
function customizer_panel($wp_customize) {

    // Parent General Panel
    $wp_customize->add_panel( 'general_panel',
        array (
            'priority' => 1,
            'title' => __('General', 'custom_header')
        )
    );

    // Logo Section
    $wp_customize->add_section( 'general_secion',
        array (
            'priority' => 1,
            'title' => __('Logo', 'custom_header'),
            'panel'  => 'general_panel'
        )
    );

    // Add a Setting for the Main Logo
    $wp_customize->add_setting( 'main_logo_image',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Main Logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_image',
        array(
            'label' => __('Main Logo', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name
            'section' => 'general_secion',  // Have the Section in the customizer
            'settings' => 'main_logo_image',
            'description' => 'This Logo is used for Main Logo',
        )
    ));

    // Add a Setting for the Footer Logo
    $wp_customize->add_setting( 'footer_logo_image',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Footer Logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'white_image',
        array(
            'label' => __('Footer Logo', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name
            'section' => 'general_secion',  // Have the Section in the customizer
            'settings' => 'footer_logo_image',
            'description' => 'This Logo is used for Footer Logo',
        )
    ));

    // Add a Setting for the Mobile Logo
    $wp_customize->add_setting( 'mobile_logo_image',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Mobile Logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mobile_image',
        array(
            'label' => __('Mobile Logo', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name
            'section' => 'general_secion',  // Have the Section in the customizer
            'settings' => 'mobile_logo_image',
            'description' => 'This Logo is used for Mobile version of Website',
        )
    ));

    // Contact Info Section
    $wp_customize->add_section( 'contact_section',
        array (
            'title' => __('Contact Info', 'custom_header'),
            'panel'  => 'general_panel'
        )
    );

    // Add a Setting for the Phone No.
    $wp_customize->add_setting( 'phone_num',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Phone No.
    $wp_customize->add_control( 'phone_number',
        array(
            'label' => __( 'Phone Number' ),
            'description' => __( 'Please enter only the phone number' ),
            'section' => 'contact_section',
            'settings' => 'phone_num',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'phone_no',
                'placeholder' => __( 'Enter Phone number' ),
            ),
        )          
    );

    // Add a Setting for the Fax Number
    $wp_customize->add_setting( 'fax_num',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Fax No.
    $wp_customize->add_control( 'fax_number',
        array(
            'label' => __( 'Fax Number' ),
            'description' => __( 'Please enter only the Fax number' ),
            'section' => 'contact_section',
            'settings' => 'fax_num',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'phone_no',
            ),
        )          
    );

    // Add a Setting for the Email Id
    $wp_customize->add_setting( 'email_id',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Email Id
    $wp_customize->add_control( 'email_id',
        array(
            'label' => __( 'Email Id' ),
            'description' => __( 'Please enter only the Mail Id' ),
            'section' => 'contact_section',
            'settings' => 'email_id',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'mail_id',
                'placeholder' => __( 'Enter Mail Id' ),
            ),
        )          
    );

    // Add a Setting for the Address
    $wp_customize->add_setting( 'address',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Address
    $wp_customize->add_control( 'address',
        array(
            'label' => __( 'Address' ),
            'section' => 'contact_section',
            'settings' => 'address',
            'type' => 'textarea',
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'address',
                'placeholder' => __( 'Enter message...' ),
            ),
        )
    );

    // Add a Setting for the Facebook
    $wp_customize->add_setting( 'facebook',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the facebook
    $wp_customize->add_control( 'facebook',
        array(
            'label' => __( 'Facebook' ),
            'section' => 'contact_section',
            'settings' => 'facebook',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'facebook',
            ),
        )          
    );

    // Add a Setting for the Twitter
    $wp_customize->add_setting( 'twitter',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Twitter
    $wp_customize->add_control( 'twitter',
        array(
            'label' => __( 'Twitter' ),
            'section' => 'contact_section',
            'settings' => 'twitter',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'twitter',
            ),
        )          
    );

    // Add a Setting for the Linkedin
    $wp_customize->add_setting( 'linkedin',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Linkedin
    $wp_customize->add_control( 'linkedin',
        array(
            'label' => __( 'Linkedin' ),
            'section' => 'contact_section',
            'settings' => 'linkedin',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'linkedin',
            ),
        )          
    );

    // Add a Setting for the Youtube
    $wp_customize->add_setting( 'youtube',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Add a control for the Youtube
    $wp_customize->add_control( 'youtube',
        array(
            'label' => __( 'Youtube' ),
            'section' => 'contact_section',
            'settings' => 'youtube',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'youtube',
            ),
        )          
    );

    // Add a Setting for the Pinterest
    $wp_customize->add_setting( 'pinterest',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

   // Add a control for the Pinterest
   $wp_customize->add_control( 'pinterest',
        array(
            'label' => __( 'Pinterest' ),
            'section' => 'contact_section',
            'settings' => 'pinterest',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'pinterest',
            ),
        )          
    );

    // Add a Setting for the Instagram
    $wp_customize->add_setting( 'instagram',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

   // Add a control for the Instagram
   $wp_customize->add_control( 'instagram',
        array(
            'label' => __( 'Instagram' ),
            'section' => 'contact_section',
            'settings' => 'instagram',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'instagram',
            ),
        )          
    );

    // Typography Section
    $wp_customize->add_section('typography_section', array(
        'title' => __('Typography', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name
        'panel' => 'general_panel'
    ));

    // Parent Theme Color Panel
    $wp_customize->add_panel( 'color_panel',
        array (
            'priority' => 2,
            'title' => __('Theme Color', 'custom_header')
        )
    );

    // Theme Color Section
    $wp_customize->add_section('header_color_section', array(
        'title' => __('Header Color', 'custom_header'),   // Change This "your-theme-text-domain" to Your theme name
        'panel' => 'color_panel'
    ));

    // Add a Setting for the Title Color
    $wp_customize->add_setting( 'title_color',
        array(
            'default' => '#333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Title Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', 
        array(
            'label'      => __( 'Title Color', 'custom_header' ),
            'section'    => 'header_color_section',
            'settings'   => 'title_color',
        ) ) 
    );

    // Add a Setting for the Body Color
    $wp_customize->add_setting( 'body_color',
        array(
            'default' => '#333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Body Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color', 
        array(
            'label'      => __( 'Body Color', 'custom_header' ),
            'section'    => 'header_color_section',
            'settings'   => 'body_color',
        ) ) 
    );

    // Add a Setting for the Link Color
    $wp_customize->add_setting( 'link_color',
        array(
            'default' => '#333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Link Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', 
        array(
            'label'      => __( 'Link Color', 'custom_header' ),
            'section'    => 'header_color_section',
            'settings'   => 'link_color',
        ) ) 
    );

    // Add a Setting for the Link Hover Color
    $wp_customize->add_setting( 'link_hover_color',
        array(
            'default' => '#333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Link Hover Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', 
        array(
            'label'      => __( 'Link Hover Color', 'custom_header' ),
            'section'    => 'header_color_section',
            'settings'   => 'link_hover_color',
        ) ) 
    );

    // Add a Setting for the Button Color
    $wp_customize->add_setting( 'button_color',
        array(
            'default' => '#333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Button Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_color', 
        array(
            'label'      => __( 'Button Color', 'custom_header' ),
            'section'    => 'header_color_section',
            'settings'   => 'button_color',
        ) ) 
    );

    // Add a Setting for the Button Hover Color
    $wp_customize->add_setting( 'btn_hover_color',
        array(
            'default' => '#333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    // Button Hover Color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_hover_color', 
        array(
            'label'      => __( 'Button Hover Color', 'custom_header' ),
            'section'    => 'header_color_section',
            'settings'   => 'btn_hover_color',
        ) ) 
    );
    
    // Font Size Section
    $wp_customize->add_section( 'font_section',
        array (
            'title' => __('Font Size', 'custom_header'),
            'panel'  => 'general_panel'
        )
    );

    // Add a setting for font size
    $wp_customize->add_setting('font_size_h1', array(
        'default' => '16px', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a setting for H1 font Weight
    $wp_customize->add_setting('font_weight_h1', array(
        'default' => '400', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a control for the H1 Font
    $wp_customize->add_control( 'fontsize_h1',
        array(
            'label' => __( 'H1 FontSize' ),
            'description' => esc_html__( 'Font Size for H1' ),
            'section' => 'font_section',
            'priority' => 1, // Optional. Order priority to load the control. Default: 10
            'settings'   => 'font_size_h1',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
        )
    );
    $wp_customize->add_control( 'fontweight_h1',
        array(
            'label' => __( 'H1 FontWeight' ),
            'description' => esc_html__( 'Font Weight for H1' ),
            'section' => 'font_section',
            'settings'   => 'font_weight_h1',
            'priority' => 2, // Optional. Order priority to load the control. Default: 10
            'type' => 'select',
            'choices' => array( // Optional.
                '' => __( 'Select the Font Weight' ),
                100 => __( '100' ),
                200 => __( '200' ),
                300 => __( '300' ),
                400 => __( '400' ),
                500 => __( '500' ),
                600 => __( '600' ),
                700 => __( '700' ),
                800 => __( '800' ),
                900 => __( '900' ),
            )
        )
    );

    // Add a setting for font size
    $wp_customize->add_setting('font_size_h2', array(
        'default' => '16px', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a setting for font Weight
    $wp_customize->add_setting('font_weight_h2', array(
        'default' => '400', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a control for the H2 Font
    $wp_customize->add_control( 'fontsize_h2',
        array(
            'label' => __( 'H2 FontSize' ),
            'description' => esc_html__( 'Font Size for H2' ),
            'section' => 'font_section',
            'priority' => 3, // Optional. Order priority to load the control. Default: 10
            'settings'   => 'font_size_h2',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
        )
    );
    $wp_customize->add_control( 'fontweight_h2',
        array(
            'label' => __( 'H2 FontWeight' ),
            'description' => esc_html__( 'Font Weight for H2' ),
            'section' => 'font_section',
            'settings'   => 'font_weight_h2',
            'priority' => 4, // Optional. Order priority to load the control. Default: 10
            'type' => 'select',
            'choices' => array( // Optional.
                '' => __( 'Select the Font Weight' ),
                100 => __( '100' ),
                200 => __( '200' ),
                300 => __( '300' ),
                400 => __( '400' ),
                500 => __( '500' ),
                600 => __( '600' ),
                700 => __( '700' ),
                800 => __( '800' ),
                900 => __( '900' ),
            )
        )
    );

    // Add a setting for font size
    $wp_customize->add_setting('font_size_h3', array(
        'default' => '16px', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a setting for font Weight
    $wp_customize->add_setting('font_weight_h3', array(
        'default' => '400', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a control for the H3 Font
    $wp_customize->add_control( 'fontsize_h3',
        array(
            'label' => __( 'H3 FontSize' ),
            'description' => esc_html__( 'Font Size for H3' ),
            'section' => 'font_section',
            'priority' => 5, // Optional. Order priority to load the control. Default: 10
            'settings'   => 'font_size_h3',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
        )
    );
    $wp_customize->add_control( 'fontweight_h3',
        array(
            'label' => __( 'H3 FontWeight' ),
            'description' => esc_html__( 'Font Weight for H3' ),
            'section' => 'font_section',
            'settings'   => 'font_weight_h3',
            'priority' => 6, // Optional. Order priority to load the control. Default: 10
            'type' => 'select',
            'choices' => array( // Optional.
                '' => __( 'Select the Font Weight' ),
                100 => __( '100' ),
                200 => __( '200' ),
                300 => __( '300' ),
                400 => __( '400' ),
                500 => __( '500' ),
                600 => __( '600' ),
                700 => __( '700' ),
                800 => __( '800' ),
                900 => __( '900' ),
            )
        )
    );

     // Add a setting for font size
     $wp_customize->add_setting('font_size_h4', array(
        'default' => '16px', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a setting for font Weight
    $wp_customize->add_setting('font_weight_h4', array(
        'default' => '400', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a control for the H2 Font
    $wp_customize->add_control( 'fontsize_h4',
        array(
            'label' => __( 'H4 FontSize' ),
            'description' => esc_html__( 'Font Size for H4' ),
            'section' => 'font_section',
            'priority' => 7, // Optional. Order priority to load the control. Default: 10
            'settings'   => 'font_size_h4',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
        )
    );
    $wp_customize->add_control( 'fontweight_h4',
        array(
            'label' => __( 'H4 FontWeight' ),
            'description' => esc_html__( 'Font Weight for H4' ),
            'section' => 'font_section',
            'settings'   => 'font_weight_h4',
            'priority' => 8, // Optional. Order priority to load the control. Default: 10
            'type' => 'select',
            'choices' => array( // Optional.
                '' => __( 'Select the Font Weight' ),
                100 => __( '100' ),
                200 => __( '200' ),
                300 => __( '300' ),
                400 => __( '400' ),
                500 => __( '500' ),
                600 => __( '600' ),
                700 => __( '700' ),
                800 => __( '800' ),
                900 => __( '900' ),
            )
        )
    );

     // Add a setting for font size
     $wp_customize->add_setting('font_size_h5', array(
        'default' => '16px', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a setting for font Weight
    $wp_customize->add_setting('font_weight_h5', array(
        'default' => '400', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a control for the H2 Font
    $wp_customize->add_control( 'fontsize_h5',
        array(
            'label' => __( 'H5 FontSize' ),
            'description' => esc_html__( 'Font Size for H5' ),
            'section' => 'font_section',
            'priority' => 9, // Optional. Order priority to load the control. Default: 10
            'settings'   => 'font_size_h5',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
        )
    );
    $wp_customize->add_control( 'fontweight_h5',
        array(
            'label' => __( 'H5 FontWeight' ),
            'description' => esc_html__( 'Font Weight for H5' ),
            'section' => 'font_section',
            'settings'   => 'font_weight_h5',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'select',
            'choices' => array( // Optional.
                '' => __( 'Select the Font Weight' ),
                100 => __( '100' ),
                200 => __( '200' ),
                300 => __( '300' ),
                400 => __( '400' ),
                500 => __( '500' ),
                600 => __( '600' ),
                700 => __( '700' ),
                800 => __( '800' ),
                900 => __( '900' ),
            )
        )
    );

     // Add a setting for font size
     $wp_customize->add_setting('font_size_h6', array(
        'default' => '16px', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a setting for font Weight
    $wp_customize->add_setting('font_weight_h6', array(
        'default' => '400', // Set a default value
        'transport' => 'postMessage', // Allows live preview
    ));

    // Add a control for the H2 Font
    $wp_customize->add_control( 'fontsize_h6',
        array(
            'label' => __( 'H6 FontSize' ),
            'description' => esc_html__( 'Font Size for H6' ),
            'section' => 'font_section',
            'priority' => 11, // Optional. Order priority to load the control. Default: 10
            'settings'   => 'font_size_h6',
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
        )
    );
    $wp_customize->add_control( 'fontweight_h6',
        array(
            'label' => __( 'H6 FontWeight' ),
            'description' => esc_html__( 'Font Weight for H6' ),
            'section' => 'font_section',
            'settings'   => 'font_weight_h6',
            'priority' => 12, // Optional. Order priority to load the control. Default: 10
            'type' => 'select',
            'choices' => array( // Optional.
                '' => __( 'Select the Font Weight' ),
                100 => __( '100' ),
                200 => __( '200' ),
                300 => __( '300' ),
                400 => __( '400' ),
                500 => __( '500' ),
                600 => __( '600' ),
                700 => __( '700' ),
                800 => __( '800' ),
                900 => __( '900' ),
            )
        )
    );

}
add_action('customize_register', 'customizer_panel');


// Apply the font size to the style


function custom_add_inline_styles() {
    $fontsize_h1 = get_theme_mod('font_size_h1', '16px');  // Get the font size from Customizer or use default if not set
    $fontweight_h1 = get_theme_mod('font_weight_h1', '400'); 

    $fontsize_h2 = get_theme_mod('font_size_h2', '16px');  // Get the font size from Customizer or use default if not set
    $fontweight_h2 = get_theme_mod('font_weight_h2', '400');
    
    $fontsize_h3 = get_theme_mod('font_size_h3', '16px');  // Get the font size from Customizer or use default if not set
    $fontweight_h3 = get_theme_mod('font_weight_h3', '400');

    $fontsize_h4 = get_theme_mod('font_size_h4', '16px');  // Get the font size from Customizer or use default if not set
    $fontweight_h4 = get_theme_mod('font_weight_h4', '400');

    $fontsize_h5 = get_theme_mod('font_size_h5', '16px');  // Get the font size from Customizer or use default if not set
    $fontweight_h5 = get_theme_mod('font_weight_h5', '400');

    $fontsize_h6 = get_theme_mod('font_size_h6', '16px');  // Get the font size from Customizer or use default if not set
    $fontweight_h6 = get_theme_mod('font_weight_h6', '400');

    $body_color = get_theme_mod('body_color', '#333');
    $title_color = get_theme_mod('title_color', '#333');
    $link_color = get_theme_mod('link_color', '#333');
    $link_hover_color = get_theme_mod('body_color', '#333');
    $button_color = get_theme_mod('body_color', '#333');
    $btn_hover_color = get_theme_mod('body_color', '#333');

    // Output inline styles
    echo '<style>
        p {
            color: '. $body_color .';
        }
        h1 {
            font-size: ' . $fontsize_h1 . ';
            font-weight: ' . $fontweight_h1 .';
            color: '. $title_color .';
        }
        h2 {
            font-size: ' . $fontsize_h2 . ';
            font-weight: ' . $fontweight_h2 .';
        }
        h3 {
            font-size: ' . $fontsize_h3 . ';
            font-weight: ' . $fontweight_h3 .';
        }
        h4 {
            font-size: ' . $fontsize_h4 . ';
            font-weight: ' . $fontweight_h4 .';
        }
        h5 {
            font-size: ' . $fontsize_h5 . ';
            font-weight: ' . $fontweight_h5 .';
        }
        h6 {
            font-size: ' . $fontsize_h6 . ';
            font-weight: ' . $fontweight_h6 .';
        }
        a {
            color: '. $link_color .';
        }
        a:hover {
            color: '. $link_hover_color .';
        }
    </style>';
}

add_action('wp_head', 'custom_add_inline_styles');
