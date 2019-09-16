<?php

class Category{

    function __construct()
    {
        add_shortcode('WORLDTOUR', [$this, 'dropdown_category_ajax']);
    }


    function dropdown_category_ajax(){
        //echo home_url();

        $args = array(
            'show_option_all'    => '',
            'show_option_none'   => '',
            'option_none_value'  => '-1',
            'orderby'            => 'ID',
            'order'              => 'ASC',
            'show_count'         => 0,
            'hide_empty'         => 1,
            'child_of'           => 0,
            'exclude'            => '',
            'include'            => '',
            'echo'               => 1,
            'selected'           => 0,
            'hierarchical'       => 0,
            'name'               => 'cat',
            'id'                 => '',
            'class'              => 'postform',
            'depth'              => 0,
            'tab_index'          => 0,
            'taxonomy'           => 'category',
            'hide_if_empty'      => false,
            'value_field'	     => 'term_id'
        );
?>
        <div class="container">
        <div id="category-drop">
                <?php wp_dropdown_categories( $args ); ?>
            <button id="btn-submit">View</button>

        </div>
        <div id="category-post">

        </div>
        </div>

<?php
    }

}
new Category();
?>