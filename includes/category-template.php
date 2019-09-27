<?php

class Category{

    function __construct()
    {
        add_shortcode('WORLDTOUR', [$this, 'dropdown_category_ajax']);
        add_action('wp_ajax_hi_cate', [$this, 'ajax_category']);
        add_action('wp_ajax_nopriv_hi_cate', [$this, 'ajax_category']);
    }

    function ajax_category(){

        $cat_id = $_POST['select'];
        
        $args = array (
            'cat' => $cat_id,
            'posts_per_page' => 3,
            'order' => 'DESC'
        );


        $posts = get_posts( $args );

        ob_start ();

        foreach ( $posts as $post ) {
            global $post;
            setup_postdata( $post ); ?>

            <div id="post-<?php echo $post->ID; ?> <?php post_class(); ?>">
                <h3 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <div id="post-content">
                    <?php the_excerpt(); ?>
                </div>

            </div>

        <?php } wp_reset_postdata();

        $response = ob_get_contents();
        ob_end_clean();

        wp_send_json($response);
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
            <div class="preloader">
            <img src="<?php echo HIP_URL.'/assets/img/loader.gif'; ?>">
            </div>
        </div>
        <div id="category-post">

        </div>
        </div>

<?php
    }

}
new Category();
?>