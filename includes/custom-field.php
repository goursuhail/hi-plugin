<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

class my_custom_field {
    public function __construct()
    {


        add_action( 'carbon_fields_register_fields', [$this , 'my_post_custom_fields'] );
    }

    public function my_post_custom_fields(){
        Container::make( 'post_meta', 'Custom Data' )
            ->where( 'post_type', '=', 'page' )
            ->add_fields( array(
                Field::make( 'text', 'extra_field' , __('Extra Field') ),
                Field::make( 'file', 'my_file' , __('Extra File') ),
                Field::make( 'select', 'crb_color' )
                    ->add_options( array('red', 'blue', 'green') )
                    ->set_help_text( 'Pick a color' )
                    ->set_required(true),

            ));
    }

}
new my_custom_field();