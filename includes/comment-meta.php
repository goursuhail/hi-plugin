<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'my_comment');

function my_comment(){

    Container::make('comment_meta', __('Comment information'))
    ->add_fields( array(
       Field::make('text', 'crb_comment_rating', __('Comment rationg')),
        Field::make('text', 'crb_comment_box', __('Additional comment information'))

    ));



}


?>