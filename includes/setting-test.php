<?php

function student_setting_init(){

    // register new setting for "student_page" page

    register_setting('student', 'student_options');

    // register a new section for "student_page" page

    add_settings_section(

        'student_section_id',
        __('Student setting options', 'clg_student'),
        'wts_sections_developers_cb',
        'student_page'

    );

    // register a new field in the "student_section_id" section , inside the "student_page" page

    add_settings_field(


        'student_field_id',
        __('Section Name'),
        'wts_field_developers_cb',
        'student_page',
        'student_section_id',
        [
            'label_for' => 'student_field_id',
            'class' => 'student_row',
            'student_custom_data' => 'custom'
        ]

    );

    add_settings_field(

            'student_field_category_id',
        __('Category Name'),
        'wts_student_category_cb',
        'student_page',
        'student_section_id',
        [
            'label_for' => 'student_field_category_id',
            'class' => 'student_row_category',
            'student_category_custom_data' => 'custom'
        ]
    );

    add_settings_field(
      'student_text_field_id',
    __('Choose Gender'),
        'wts_student_text_field_cb',
        'student_page',
        'student_section_id',
        [
                'label_for' => 'student_text_field_id',
            'class_field' => 'description',
            'student_text_field_custom_data' => 'custom'
        ]
    );

    add_settings_field(

            'student_new_field_id',
            __('First Name'),
        'student_new_field_cb',
        'student_page',
        'student_section_id',
        [
                'label_for' => 'student_new_field_id',
            'class' => 'description',
            'student_new_field_custom_data' => 'custom'
        ]

    );
    add_settings_field(

        'student_new2_field2_id',
        __('Last Name'),
        'student_new_field_cb',
        'student_page',
        'student_section_id',
        [
            'label_for' => 'student_new2_field2_id',
            'class' => 'description',
            'student_new2_field2_custom_data' => 'custom'
        ]

    );

  add_settings_field(

          'student_city_field_id',
      __('Choose City'),
      'student_city_field_cb',
      'student_page',
      'student_section_id',
      [
          'label_for' => 'student_city_field_cb',
          'class' => 'description',
          'student_city_field_custom_data' => 'custom',
          'options' => [
                  'ajmer' => 'Ajmer',
                  'jaipur' => 'Jaipur'
          ]
      ]

  );

}

// register our function "student_setting_init" to the "admin_init" action hook


add_action('admin_init', 'student_setting_init');


// section, callback function define below "wts_sections_developers_cb"

function wts_sections_developers_cb( $args ){

    ?>

    <p <?php echo esc_attr( $args['id'] ); ?>><?php esc_html_e( 'Follow the student union')?></p>

    <?php
}

function wts_field_developers_cb( $args ){

    $options = get_option('student_options');

    //print_r($options);

    ?>

    <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['student_custom_data'] ); ?>"
            name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"

    >
        <option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? (selected( $options[ $args['label_for'] ], 'red', false ) ) : (''); ?>>
            <?php  esc_html_e('Section A'); ?>
        </option>
        <option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? (selected( $options[ $args['label_for'] ], 'blue', false ) ) : (''); ?>>
            <?php  esc_html_e('Section B'); ?>
        </option>

    </select>
    <p class="description">
        <?php esc_html_e('you can choose any section'); ?>
    </p>
    <p class="description">
        <?php esc_html_e('We have two sections for you'); ?>
    </p>

    <?php
}


function wts_student_category_cb($args){

    $category_options = get_option('student_options');

    //print_r($category_options);

    ?>

    <div id="<?php echo esc_attr( $args['label_for'] ); ?>"
         data-custom="<?php echo esc_attr( $args['student_category_custom_data'] ); ?>"
         name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >
        <input name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="radio"  value="white" <?php echo isset( $category_options[ $args['label_for'] ] ) ? (checked( $category_options[ $args['label_for'] ], 'white', false ) ) : (''); ?>>Obc
        <input name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="radio"  value="black" <?php echo isset( $category_options[ $args['label_for'] ] ) ? (checked( $category_options[ $args['label_for'] ], 'black', false ) ) : (''); ?>>General
        <input name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="radio"  value="yellow" <?php echo isset( $category_options[ $args['label_for'] ] ) ? (checked( $category_options[ $args['label_for'] ], 'yellow', false ) ) : (''); ?>>Sc

    </div>

    <p class="description">
    <?php esc_html_e('Choose your category here'); ?>
    </p>

    <?php

}

function wts_student_text_field_cb( $args ){

    $text_field = get_option('student_options');

    ?>
    <div id="<?php echo esc_attr( $args['label_for'] ); ?>"
     data-custom="<?php echo esc_attr( $args['student_text_field_custom_data'] ); ?>"
         name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >
        <input  name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="checkbox" value="pink" <?php echo isset( $text_field[ $args['label_for'] ] ) ? (checked( $text_field[ $args['label_for'] ], 'pink', false ) ) : (''); ?>>Male
        <input  name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="checkbox" value="gray" <?php echo isset( $text_field[ $args['label_for'] ] ) ? (checked( $text_field[ $args['label_for'] ], 'gray', false ) ) : (''); ?>>Female
        <input  name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="checkbox" value="dark" <?php echo isset( $text_field[ $args['label_for'] ] ) ? (checked( $text_field[ $args['label_for'] ], 'dark', false ) ) : (''); ?>>Other

    </div>
    <p class="<?php echo esc_attr( $args['class_field'] ); ?>">
        <?php esc_html_e('Choose your gender here'); ?>
    </p>


    <?php
}

function student_new_field_cb($args){

$get_field = get_option('student_options');

//print_r($get_field);

    ?>

    <div id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['student_new_field_custom_data'] ); ?>"
         name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >

        <input name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"   type="text" value="<?php echo $get_field[$args['label_for']]; ?>">

    </div>


    <?php

}

function student_new2_field2_cb($args){

    $new_field = get_option('student_options');

    ?>

    <div id="<?php echo esc_attr( $args['label_for'] ); ?>"
         data-custom="<?php echo esc_attr( $args['student_new2_field2_custom_data'] ); ?>"
         name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >

        <input name="student_options[<?php echo esc_attr( $args['label_for'] ); ?>]"  type="text" value="<?php echo $new_field[$args['label_for']]; ?>">

    </div>

    <?php
}


function student_city_field_cb($args){

    $get_city = get_option('student_options');

    ?>

    <div id="<?php echo esc_attr($args['label_for'] ); ?>"
        data-custom="<?php echo esc_attr($args['student_city_field_custom_data'] ); ?>"
        name="student_options[<?php echo esc_attr($args['label_for'] ); ?>]"
    >
        <input name="student_options[<?php echo esc_attr($args['label_for'] ); ?>]" type="radio" value="ajmer" <?php echo isset($get_city[$args['label_for'] ] ) ? (checked($get_city[$args['label_for'] ], 'ajmer', false ) ) : ('') ?>>Ajmer
        <input name="student_options[<?php echo esc_attr($args['label_for'] ); ?>]" type="radio" value="jaipur" <?php echo isset($get_city[$args['label_for'] ] ) ? (checked($get_city[$args['label_for'] ], 'jaipur', false ) ) : ('') ?>>Jaipur

    </div>



    <?php
}
?>



// Top level menu
<?php
function student_option_page(){

    add_menu_page(

        'WTS Student',
        'WTS Options',
        'manage_options',
        'student_page',
        'student_option_page_cb'


    );
}

add_action('admin_menu', 'student_option_page');


function student_option_page_cb(){

    // check user capabilities

    if (! current_user_can('manage_options' ) ){

        return;
    }

    // add error/message

    if (isset( $_GET['settings-updated'] ) ){

        // add settings saved message with the class of "updated"
        add_settings_error('student_messages', 'student_message', __('Setting Saved'), 'updated');

    }

    // show error/update messages
    settings_errors( 'student_messages' );
    ?>

    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('student');

            do_settings_sections('student_page');

            submit_button('Save Settings');


            ?>
        </form>
    </div>


<?php

}
?>