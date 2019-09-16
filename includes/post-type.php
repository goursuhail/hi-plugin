<?php


class world{


    function __construct()
    {

        add_action( 'init', [$this, 'custom_post_type'] );

        add_action('init', [$this, 'custom_taxonomy_type']);

        add_action('add_meta_boxes', [ $this, 'my_meta_box']);

        add_action('save_post', [ $this, 'update_meta']);

        add_action('wts_section_add_form_fields', [$this, 'my_add_meta_taxonomy'] );

        add_action('edited_wts_section', [$this, 'update_taxonomy_fields'] );

        add_action('wts_section_edit_form_fields', [$this, 'my_edit_meta_taxonomy']);


    }

    function custom_post_type()
    {

        $labels = array(
            "name" => __( "Students" ),
            "singular_name" => __( "Student" ),
            "menu_name" => __( "My Student"),
            "add_new_item" => __( "Add New Student"),
            "new_item" => __( "New Student" ),
            "all_items" => __("All Students"),
            "search_items" => __("Search Student")

        );

        $args = array(

            "label" => __( "Students" ),
            "labels" => $labels,
            "description" => "",
            "public" => false,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "wts_student", "with_front" => true ),
            "query_var" => true,
            "menu_icon" => "dashicons-admin-users",
            "supports" => array( "title", "editor", "thumbnail" ),


        );

        register_post_type("wts_student", $args);


    }

    function custom_taxonomy_type(){

        $taxonomy_labels = array(

            "name" => __("Sections"),
            "singular_name" => __("Section", ""),
            "add_new_item" => __("Add New Section"),
            "search_items" => __("Search Section"),
            "update_item" => __("Update Section"),
            "edit_item" => __("Edit Section"),
            "view_item" => __("View Section"),
            "menu_name" => __("Sections"),
            "separate_items_with_commas" => __("Separate sections with commmas"),
            "choose_from_most_used" => __("Choose from the most used Sections"),

        );

            $args = array(

                "label" => __("Sections"),
                "labels" => $taxonomy_labels,
                "public" => true,
                "publicly_queryable" => true,
                "hierarchical" => false,
                "show_ui" => true,
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "query_var" => true,
                "rewrite" => array( 'slug' => 'status', 'with_front' => true, ),
                "show_admin_column" => false,
                "show_in_rest" => true,
                "rest_base" => "status",
                "rest_controller_class" => "WP_REST_Terms_Controller",
                "show_in_quick_edit" => false,


            );

        register_taxonomy("wts_section", "wts_student", $args);

    }

    function my_meta_box(){

        add_meta_box('mymetabox', 'Student Fields', [ $this, 'my_meta_box_html'], 'wts_student' );

    }

    function my_meta_box_html(){

        $post_id = $_GET['post'];

        $address = get_post_meta( $post_id, 'key1', true);

        $city = get_post_meta( $post_id, 'key2', true);

        $state = get_post_meta( $post_id, 'key3', true);

        $section = get_post_meta( $post_id, 'key4', true);


        $array_section = array(

                                "Section A" => 1,
                                "Section B" => 2,
                             "Section C" => 3,
                            "Section D" => 4,
        
        
        );

        ?>

        <div class="fields">

            <label for="field-1">Address</label>
            <input type="text" id="field-1" name="address" value="<?php echo $address; ?>">
            <label for="field-2">City</label>
            <input type="text" id="field-2" name="city" value="<?php echo $city; ?>">
            <label for="field-3">State</label>
            <input type="text" id="field-3" name="state" value="<?php echo $state; ?>">
            <label for="field-4">Section</label>
            <select id="field-4" name="section">

            <?php

            foreach ($array_section as $key => $value){

                if ($value == $section){
            ?>

                    <option selected value="<?php echo $value; ?>"><?php echo $key; ?></option>

            <?php
                }else {
                    ?>

                    <option value="<?php echo $value; ?>"><?php echo $key; ?></option>

                    <?php

                }
            }

            ?>
            </select>

        </div>

<?php

    }

    function update_meta($post_id){


        update_post_meta( $post_id, 'key1', sanitize_text_field($_POST['address']) );
        update_post_meta( $post_id, 'key2', sanitize_text_field($_POST['city']) );
        update_post_meta( $post_id, 'key3', sanitize_text_field($_POST['state']) );
        update_post_meta( $post_id, 'key4', sanitize_text_field($_POST['section']) );




    }









    function my_add_meta_taxonomy(){

        ?>

        <div class="taxonomy-field">
            <label for="taxonomy-field-1">F Name</label>
            <input type="text" id="taxonomy-field-1" name="f_name">
            <label for="taxonomy-field-2">M Name</label>
            <input type="text" id="taxonomy-field-2" name="m_name">
        </div>
<?php

    }


    function my_edit_meta_taxonomy(){

        $term_id = $_GET['tag_ID'];

        $father = get_term_meta($term_id, 'taxo1', true);

        $mother = get_term_meta($term_id, 'taxo2', true);




        ?>

        <div class="taxonomy-edit-field">
            <label for="taxonomy-edit-field-1">F Name</label>
            <input type="text" id="taxonomy-edit-field-1" name="father_name" value="<?php echo $father; ?>">
            <label for="taxonomy-edit-field-2">M Name</label>
            <input type="text" id="taxonomy-edit-field-2" name="mother_name" value="<?php echo $mother; ?>">
        </div>




        <?php
    }

    function update_taxonomy_fields($term_id){


        update_term_meta($term_id, 'taxo1', $_POST['father_name']);
        update_term_meta($term_id, 'taxo2', $_POST['mother_name']);

    }


}

new world();

?>