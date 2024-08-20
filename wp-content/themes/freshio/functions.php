<?php
// Add custom Theme Functions here
add_filter('use_block_editor_for_post', '__return_false');

add_action('init', 'hide_notice');
function hide_notice()
{
    remove_action('admin_notices', 'flatsome_maintenance_admin_notice');
}

// Add Font Awesome 5.15.4
function wpb_load_fa()
{
    wp_enqueue_style('wpb-fa', get_stylesheet_directory_uri() . '/FontAwesome/css/all.css');
    wp_enqueue_style('animation-fa', get_stylesheet_directory_uri() . '/library/css/animate.css');

    wp_enqueue_script('wow-library', get_stylesheet_directory_uri() . '/library/js/wow.min.js', array(), time(), true);
    wp_enqueue_script('leter-library', get_stylesheet_directory_uri() . '/library/js/lettering.js', array(), time(), true);
    wp_enqueue_script('textillate-library', get_stylesheet_directory_uri() . '/library/js/textillate.js', array(), time(), true);
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/library/js/main.js', array(), time(), true);

}
add_action('wp_enqueue_scripts', 'wpb_load_fa');

if (!function_exists('pre')) {
    function pre($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;
    }
}


function add_customize_meta_boxs()
{
    add_meta_box(
        'product_flash_sale',
        'Product Flash Sale',
        'callback_func_video_flash_sale_product_meta_box',
        'product',
        'side'
    );
   
}
add_action('add_meta_boxes', 'add_customize_meta_boxs');
function callback_func_video_flash_sale_product_meta_box($product)
{
    $isFlashSale = get_post_meta($product->ID, 'isFlashSale', true);

?>
    <div class="box-data">
        <div class="box-container">
            <label for="inputFlashSale">Bật Flash SALE</label>
            <div class="mt-10">
                <input type="checkbox" <?= $isFlashSale ? 'checked' : '' ?> name="isFlashSale" id="inputFlashSale"> Flash Sale
            </div>
        </div>
    </div>
    <?php
}

function save_data_meta_box($product_id = 0)
{

    $isFlashSale = isset($_POST['isFlashSale']) ? esc_html($_POST['isFlashSale']) : '';

    update_post_meta($product_id, 'isFlashSale', $isFlashSale);
}

add_action('save_post_product', 'save_data_meta_box');

/* UX Element */
function nkd_ux_builder_title_element()
{
    $title_link_options            = require __DIR__ . '/commons/links.php';
    $title_link_options['options'] = array_merge(
        array(
            'link_text' => array(
                'type'    => 'textfield',
                'heading' => 'Text',
                'default' => '',
            ),
        ),
        $title_link_options['options']
    );

    add_ux_builder_shortcode('nkd_custom_title', array(
        'name'      => __('Custom Title'),
        'category'  => __('Nguyên Khôi Dev'),
        'thumbnail' => '',
        'priority'  => 1,
        'options' => array(
            'style'            => array(
                'type'    => 'select',
                'heading' => 'Style',
                'default' => 'normal',
                'options' => array(
                    'normal'      => 'Normal',
                    'animation'      => 'Animation',
                    'center'      => 'Center',
                    'bold'        => 'Left Bold',
                    'bold-center' => 'Center Bold',
                ),
            ),
            'text'             => array(
                'type'       => 'textfield',
                'heading'    => 'Title',
                'default'    => 'Lorem ipsum dolor sit amet...',
                'auto_focus' => true,
            ),
            'tag_name'         => array(
                'type'    => 'select',
                'heading' => 'Tag',
                'default' => 'h3',
                'options' => array(
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                ),
            ),
            'color'            => array(
                'type'     => 'colorpicker',
                'heading'  => __('Color'),
                'alpha'    => true,
                'format'   => 'rgb',
                'position' => 'bottom right',
            ),
            'width'            => array(
                'type'    => 'scrubfield',
                'heading' => __('Width'),
                'default' => '',
                'min'     => 0,
                'max'     => 1200,
                'step'    => 5,
            ),
            'margin_top'       => array(
                'type'        => 'scrubfield',
                'heading'     => __('Margin Top'),
                'default'     => '',
                'placeholder' => __('0px'),
                'min'         => -100,
                'max'         => 300,
                'step'        => 1,
            ),
            'margin_bottom'    => array(
                'type'        => 'scrubfield',
                'heading'     => __('Margin Bottom'),
                'default'     => '',
                'placeholder' => __('0px'),
                'min'         => -100,
                'max'         => 300,
                'step'        => 1,
            ),
            'size'             => array(
                'type'    => 'slider',
                'heading' => __('Size'),
                'default' => 100,
                'unit'    => '%',
                'min'     => 20,
                'max'     => 300,
                'step'    => 1,
            ),
            'link_options'     => $title_link_options,
            'advanced_options' => require __DIR__ . '/commons/advanced.php',
        ),
    ));
}
add_action('ux_builder_setup', 'nkd_ux_builder_title_element');

function nkd_title_element_func($atts)
{

    extract(shortcode_atts(array(
        'style' => '',
        'text' => 'Lorem ipsum dolor sit amet...',
        'tag_name' => 'h3',
        'color' => '',
        'width' => '',
        'margin_top' => '',
        'margin_bottom' => '',
        'size' => '100',
        'link' => '',
        'target' => '',
        'rel' => '',
        'class' => ''
    ), $atts));
    ob_start();
    $allStyle = [];
    if ($style) {
        switch ($style) {
            case "center":
                $allStyle[] = "text-align: center";
                break;
            case "bold":
                $allStyle[] = "font-weight: bold";
                break;
            case "bold-center":
                $allStyle[] = "font-weight: bold";
                $allStyle[] = "text-align: center";
                break;
        }
    }
    if ($color) {
        $allStyle[] = "color: $color";
    }
    if ($width) {
        $allStyle[] = "max-width: $width";
    }
    if ($margin_top) {
        $allStyle[] = "margin-top: $margin_top";
    }
    if ($margin_bottom) {
        $allStyle[] = "margin-bottom: $margin_bottom";
    }
    if ($size && $size != 100) {
        $allStyle[] = "font-size: $size%";
    }
    if ($style != 'animation') {
        echo "<$tag_name class=\"nkd_title" . ($class ? " $class" : "") . "\"" . (count($allStyle) ? "style=\"" . implode(";", $allStyle) . "\"" : "") . ">";
        if ($link) {
            echo "<a href=\"$link\" " . ($rel ? "rel=\"$rel\"" : "") . ($target ? "target=\"$target\"" : "") . ">text</a>";
        } else {
            echo $text;
        }
        echo "</$tag_name>";
    } else {
        echo "<h2 class=\"nkd_title animation\">" . trim($text) . "</h2>";
    }


    $content = ob_get_clean();
    return $content;
}
add_shortcode('nkd_custom_title', 'nkd_title_element_func');




/* ADD Ux Builder Product Category */
function nkd_custom_ux_builder_product_cat()
{
    add_ux_builder_shortcode('nkd_ux_product_cat', array(
        'name'      => __('Custom Product Cat', 'nkd-ux-product-cat'),
        'category'  => __('Nguyên Khôi Dev'),
        'thumbnail' => '',
        'template'  => '',
        'options' => array(
            'cat' => array(
                'type' => 'select',
                'heading' => 'Category',
                'param_name' => 'cat',
                'full_width' => true,
                'default' => '',
                'config' => array(
                    'multiple' => true,
                    'placeholder' => 'Select...',
                    'termSelect' => array(
                        'post_type' => 'product',
                        'taxonomies' => 'product_cat'
                    ),
                )
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'nkd_custom_ux_builder_product_cat');


function nkd_ux_product_cat_func($atts)
{
    extract(shortcode_atts(array(
        'cat' => ''
    ), $atts));
    ob_start();
    $args = array(
        'hide_empty' => false,
        'taxonomy' => 'product_cat',
    );
    
    if ($cat) 
    {
        $cat = array_map(fn ($value) => (int) trim($value), explode(",", $cat));
        $args['include'] = $cat;
    }
    $terms = get_terms($args);

    if (count($terms)) {
        echo '<div class="owl-carousel block-product">';
        foreach ($terms as $term) {
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image_url    = wp_get_attachment_url($thumbnail_id);
            $term_link = get_term_link($term->term_id, 'product_cat');
    ?>
            <div class="ss_item">
                <a href="<?= $term_link ?>">
                    <div class="ss_img">
                    <img class="img-fluid m-auto object-contain mh-100 w-auto" src="<?= $image_url ?$image_url : get_stylesheet_directory_uri(). '/images/no-image.png'  ?>" alt="season_coll_1_img.png">
                    </div>
                    <div class="ss_info">
                        <div class="ss_name"><?= $term->name ?></div>
                    </div>
                </a>
            </div>
        <?php
        }
        echo '</div>';
        if (!wp_style_is('carousel')) {
            wp_enqueue_style(
                'carousel',
                get_stylesheet_directory_uri() . '/library/css/owl.carousel.min.css'

            );
        }
        if (!wp_style_is('carousel-theme')) {
            wp_enqueue_style(
                'carousel-theme',
                get_stylesheet_directory_uri() . '/library/css/owl.theme.default.min.css'

            );
        }
        if (!wp_script_is('carousel')) {
            wp_enqueue_script(
                'carousel',
                get_stylesheet_directory_uri() . '/library/js/owl.carousel.min.js',
                array('jquery'),
                '1.0',
                true
            );
        }
        if (!wp_script_is('carousel-custome')) {
            wp_enqueue_script(
                'carousel-custome',
                get_stylesheet_directory_uri() . '/library/js/carousel_custom.js',
                array('jquery'),
                '1.0',
                true
            );
        }
    }

    return ob_get_clean();
}
add_shortcode('nkd_ux_product_cat', 'nkd_ux_product_cat_func');
