<?php


class Plugin{

    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'my_enqueue_script'] );

        add_shortcode('AJMERCODE', [$this, 'worldfunction']);

        $this->includes();

    }


    function my_enqueue_script(){

        $arr = [
          'ajaxurl' => admin_url('admin-ajax.php')
        ];

        wp_enqueue_script('myjs', HIP_URL.'/assets/js/myhip'.HIP_SCRIPT_SUFFIX.'.js', ['jquery', 'jquery-color'], HIP_VERSION, true);
        wp_localize_script('myjs', 'obj', $arr);

        wp_enqueue_style('mycss', HIP_URL.'/assets/css/myhip'.HIP_SCRIPT_SUFFIX.'.css', HIP_VERSION);

    }

    function worldfunction($atts){


        $default = [

            'total' => 4,
            'cols' => 3
        ];

        $atts = shortcode_atts($default, $atts, 'AJMERCODE' );



        $args = array(

            'numberposts' => $atts['total'],
            'post_type' => 'employee'

        );

        $latestposts = get_posts($args);

        if (count($latestposts ) ){
            ?>
            <div class="container">
                <div class="row">
                    <?php

                    foreach ($latestposts as $post){
                        ?>

                        <div class="grid-col-<?php echo $atts['cols']; ?>"> <!--employee 1 -->
                            <div class="row-1">
                                <div class="col-image">
                                    <?php echo get_the_post_thumbnail($post->ID); ?>
                                </div>
                                <div class="col-detail">
                                    <div class="form-group">
                                        <label><strong>Name</strong></label>
                                        <span><p id="para"><?php echo get_the_title($post->ID); ?></p></span>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Designation</strong></label>
                                        <span><p id="para"><?php echo get_field('designation', $post->ID); ?></p></span>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>City</strong></label>
                                        <span><p id="para"><?php echo get_field('city', $post->ID); ?></p></span>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Mobile</strong></label>
                                        <span><p id="para"><?php echo get_field('mobile', $post->ID); ?></p></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }

                    ?>
                </div>
            </div>
            <?php
        }

    }

    function includes(){

        require_once HIP_PATH.'/includes/post-type.php';
        require_once HIP_PATH.'/includes/setting.php';
        require_once HIP_PATH.'/includes/setting-test.php';
        require_once HIP_PATH.'/includes/ajax.php';
        require_once HIP_PATH.'/includes/category-template.php';
    }


}

new Plugin();