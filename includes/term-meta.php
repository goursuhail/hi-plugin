<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'my_term_meta');

function my_term_meta(){

    Container::make('term_meta', __('Categories'))
        ->where('term_taxonomy', '=', 'category' )
        ->add_fields( array(
           Field::make('color', 'crb_color_category', __('Title color')),
            Field::make('image', 'crb_img_category', __('Thumbnail'))
        ));

}

?>