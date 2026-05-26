<?php
class Agrofarm_Product_Columns_Widget extends \Elementor\Widget_Base {

    public function get_name() { return 'agrofarm_product_columns'; }
    public function get_title() { return 'Agrofarm Product Columns'; }
    public function get_icon() { return 'eicon-post-list'; }
    public function get_categories() { return [ 'general' ]; }

    protected function register_controls() {
        $this->start_controls_section('section_content', ['label' => 'Settings']);

        // Generate a list of WooCommerce categories for the dropdowns
        $categories = get_terms( ['taxonomy' => 'product_cat', 'hide_empty' => false] );
        $options = [];
        foreach ( $categories as $cat ) { $options[$cat->term_id] = $cat->name; }

        for ( $i = 1; $i <= 3; $i++ ) {
            $this->add_control("title_$i", [
                'label' => "Column $i Title",
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => "Column $i",
            ]);
            $this->add_control("cat_$i", [
                'label' => "Select Category $i",
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $options,
            ]);
        }

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="product-lists-section">
            <?php for ( $i = 1; $i <= 3; $i++ ) : 
                $original_id = $settings["cat_$i"];
                if ( ! $original_id ) continue;

                // Polylang: Get translated Category ID
                $cat_id = function_exists('pll_get_term') ? pll_get_term($original_id) : $original_id;
                $cat_obj = get_term($cat_id);
                ?>
                <div class="product-list-column">
                    <h3 class="column-title"><?php echo esc_html($settings["title_$i"]); ?></h3>
                    
                    <div class="swiper small-product-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $query = new WP_Query([
                                'post_type' => 'product',
                                'posts_per_page' => 9,
                                'tax_query' => [['taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $cat_id]]
                            ]);

                            if ( $query->have_posts() ) : $count = 0;
                                while ( $query->have_posts() ) : $query->the_post();
                                    global $product;
                                    if ( $count % 3 == 0 ) echo '<div class="swiper-slide"><div class="small-products-wrapper">';
                                    ?>
                                    <div class="small-product-card">
                                        <div class="img-box"><?php echo woocommerce_get_product_thumbnail(); ?></div>
                                        <div class="info-box">
                                            <h4><?php the_title(); ?></h4>
                                            <div class="price"><?php echo $product->get_price_html(); ?></div>
                                        </div>
                                    </div>
                                    <?php
                                    if ( $count % 3 == 2 || ($query->current_post + 1) == $query->post_count ) echo '</div></div>';
                                    $count++;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php endfor; ?>
        </section>
        <?php
    }
}