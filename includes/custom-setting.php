<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('admin_menu' , 'employee_option_page');
function employee_option_page(){

    add_menu_page(

        'WTS Employee',
        'Employee WTS',
        'manage_options',
        'employee_page',
        'employee_option_page_cb'


    );
}

function employee_option_page_cb()
{
    add_action('carbon_fields_register_fields', 'my_settings');
}

function my_settings(){
    die('fdadsf');
    Container::make( 'theme_options', __( 'Social Links' ) )
        ->set_page_parent( 'employee_page' ) // reference to a top level container
        ->add_fields( array(
            Field::make( 'text', 'crb_facebook_link', __( 'Facebook Link' ) ),
            Field::make( 'text', 'crb_twitter_link', __( 'Twitter Link' ) ),
        ) );
}