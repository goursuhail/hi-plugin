<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon-fields-register-fields', 'my_user_meta');


function my_user_meta(){

    Container::make('user_meta', 'address')
        ->add_fields( array(
           Field::make('text', 'my_code', 'City and Post code'),
            Field::make('text', 'crb_street', 'Street Name')


        ));
}
?>