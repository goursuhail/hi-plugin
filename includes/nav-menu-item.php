<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'my_navigation');

function my_navigation(){


    Container::make( 'nav_menu_item', __( 'Menu Settings' ) )
        ->add_fields( array(
            Field::make( 'color', 'crb_color', __( 'Color' ) ),
        ));

}


?>