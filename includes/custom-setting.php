<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'my_settings');
function my_settings(){
    Container::make( 'theme_options', __( 'WTS Employee', 'my-textdomain' ) )
        ->set_page_file('emplyoee-settings-page')
        ->set_icon( 'dashicons-admin-users' )
        ->set_page_menu_title( 'Employee Options' )
        ->set_page_menu_position( 20 )
        ->add_fields( array(
            Field::make( 'text', 'extra_field' , __('Extra Field') ),
            Field::make( 'file', 'my_file' , __('Extra File') ),
            Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
            Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
            Field::make( 'text', 'crb_facebook_link', __( 'Facebook Link' ) ),
            Field::make( 'text', 'crb_twitter_link', __( 'Twitter Link' ) ),
            Field::make( 'textarea', 'crb_footer_text', __( 'Footer Text' ) ),
            Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script' ) ),
            Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script' ) ),
            Field::make( 'select', 'crb_content_align', __( 'Text alignment' ) )
                ->add_options( array(
                    'left' => __( 'Left' ),
                    'center' => __( 'Center' ),
                    'right' => __( 'Right' ),
                ) )
        ));
}



