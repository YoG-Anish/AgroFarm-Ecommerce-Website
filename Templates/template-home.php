<?php
/*
    Template Name: Home Page
*/
get_header();
?>

<main class="container">
    <!-- Hero Section: Sidebar + Main Banner -->
    <section class="hero-wrapper">
        <aside class="sidebar">
            <div class="sidebar-title">☰ CATEGORIES</div>
            <ul class="category-list">
                <?php
                // 1. Fetch Categories (Polylang automatically filters these by current language)
                $categories = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'number'     => 6,
                    'hide_empty' => false, // Set to false so they show even if you haven't added Nepali products yet
                    'parent'     => 0,
                    'orderby'    => 'name',
                    'order'      => 'ASC'
                ));

                if (!empty($categories) && !is_wp_error($categories)) :
                    foreach ($categories as $category) :
                        $category_link = get_term_link($category);

                        // 2. Get the Thumbnail (Note: You must upload the image to the NEPALI category too!)
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image_url    = wp_get_attachment_image_url($thumbnail_id, 'thumbnail');
                ?>
                        <li>
                            <a href="<?php echo esc_url($category_link); ?>">
                                <?php if ($image_url) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" class="cat-icon">
                                <?php else : ?>
                                    <span class="cat-icon-placeholder">📦</span>
                                <?php endif; ?>
                                <?php echo esc_html($category->name); ?>
                            </a>
                        </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </aside>

        <div class="hero-slider">
            <div class="hero-inner">
                <div class="hero-content">
                    <?php if (get_field('hero_discount_text')): ?>
                        <p class="subtitle"><?php echo esc_html(get_field('hero_discount_text')); ?></p>
                    <?php endif; ?>

                    <h1><?php echo esc_html(get_field('hero_title')); ?></h1>

                    <?php
                    // DYNAMIC SHOP LINK: Finds the translated version of the Shop page
                    $shop_page_id = get_option('woocommerce_shop_page_id');
                    $translated_shop_id = function_exists('pll_get_post') ? pll_get_post($shop_page_id) : $shop_page_id;
                    ?>
                    <a href="<?php echo esc_url(get_permalink($translated_shop_id)) ?>" class="btn-shop">
                        <?php echo esc_html(get_field('hero_button_text')); ?>
                    </a>
                </div>

                <div class="hero-image">
                    <?php
                    $hero_banner = get_field('hero_banner');
                    if ($hero_banner): ?>
                        <img src="<?php echo esc_url($hero_banner['url']); ?>" alt="<?php echo esc_attr($hero_banner['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-bar">
        <div class="feature-item">
            <span class="icon">🚚</span>'
            <div><strong>Free shipping</strong><br><small>On all orders over $49.00</small></div>
        </div>
        <div class="feature-item">
            <span class="icon">💰</span>
            <div><strong>15 days returns</strong><br><small>Moneyback guarantee</small></div>
        </div>
        <div class="feature-item">
            <span class="icon">💳</span>
            <div><strong>Secure checkout</strong><br><small>Protected by Paypal</small></div>
        </div>
        <div class="feature-item">
            <span class="icon">🎁</span>
            <div><strong>Offer & gift here</strong><br><small>On all orders over</small></div>
        </div>
    </section>

    <section class="products-section container">
        <h2>Our Products</h2>
        <p class="subtitle">A highly efficient slip-ring scanner for today's diagnostic requirements.</p>

        <section class="product-section">
    <?php
    // 1. Gather the ACF Field names
    $tab_fields = ['category_tab1', 'category_tab2', 'category_tab3', 'category_tab4', 'category_tab5'];
    $valid_tabs = [];

    // 2. Build a dynamic array of translated categories based on ACF selections
    foreach ($tab_fields as $field_name) {
        $selected_id = get_field($field_name); // Assuming Return Format is "Term ID"
        
        if ($selected_id) {
            // Get translated ID for current language
            $lang_id = function_exists('pll_get_term') ? pll_get_term($selected_id) : $selected_id;
            $term = get_term($lang_id);
            
            if ($term && !is_wp_error($term)) {
                $valid_tabs[] = $term; // Store the full term object
            }
        }
    }
    ?>

    <!-- 1. TAB NAVIGATION -->
    <?php if (!empty($valid_tabs)) : ?>
        <div class="tabs-header">
            <?php
            foreach ($valid_tabs as $index => $term) :
                $active_class = ($index == 0) ? 'active' : '';
            ?>
                <button class="tab-btn <?php echo $active_class; ?>" data-target="tab-<?php echo $term->slug; ?>">
                    <?php echo esc_html($term->name); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- 2. TAB CONTENT PANELS -->
        <?php foreach ($valid_tabs as $index => $term) :
            $active_panel = ($index == 0) ? 'active' : '';
        ?>
            <div class="tab-panel <?php echo $active_panel; ?>" id="tab-<?php echo $term->slug; ?>">
                <div class="product-grid">
                    <?php
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 4,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            ),
                        ),
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post();
                            global $product;
                    ?>
                            <div class="product-card">
                                <div class="product-img-wrapper">
                                    <?php if ($product->is_on_sale()) : ?>
                                        <span class="badge">-
                                            <?php
                                            if ($product->is_type('simple')) {
                                                $regular_price = $product->get_regular_price();
                                                $sale_price = $product->get_sale_price();
                                                if($regular_price > 0) {
                                                    echo round((($regular_price - $sale_price) / $regular_price) * 100) . '%';
                                                }
                                            } else {
                                                echo 'Sale';
                                            }
                                            ?></span>
                                    <?php elseif (date('Y-m-d', strtotime($product->get_date_created())) > date('Y-m-d', strtotime('-7 days'))) : ?>
                                        <span class="badge">NEW</span>
                                    <?php endif; ?>

                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo woocommerce_get_product_thumbnail('medium'); ?>
                                    </a>
                                </div>

                                <div class="product-info">
                                    <div class="stars">
                                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                                        <span>(<?php echo $product->get_review_count(); ?>)</span>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="price-wrap">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    else :
                        echo '<p>No products found in ' . esc_html($term->name) . '</p>';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
    </section>

    <section class="top-categories-section">
        <div class="container">

            <!-- Section Title -->
            <div class="section-heading">
                <h2>Top Categories</h2>
                <p>A highly efficient slip-ring scanner for today's diagnostic requirements.</p>
            </div>

            <!-- Categories Grid -->
            <div class="categories-grid">

                <!-- 1. STATIC CARD: BROWSE ALL -->
                <?php
                // Get total count of all published products
                $total_products = wp_count_posts('product')->publish;
                ?>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="category-card">
                    <div class="icon-blob">
                        <!-- You can use a static icon for "Browse All" or a specific category image -->
                        <span class="placeholder-icon">🍎🥑</span>
                    </div>
                    <h3>Browse all</h3>
                    <span class="item-count">(<?php echo $total_products; ?> item)</span>
                </a>

                <!-- 2. DYNAMIC CARDS: PRODUCT CATEGORIES -->
                <?php
                $categories = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                    'parent'     => 0,
                    'number'     => 3, // Fetches 3 categories to fill the remaining 4 slots
                    'orderby'    => 'count',
                    'order'      => 'DESC'
                ));

                if (! empty($categories) && ! is_wp_error($categories)) :
                    foreach ($categories as $category) :
                        // Get Category Link
                        $category_link = get_term_link($category);

                        // Get Category Thumbnail ID and Image URL
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image_url    = wp_get_attachment_image_url($thumbnail_id, 'thumbnail');
                ?>

                        <a href="<?php echo esc_url($category_link); ?>" class="category-card">
                            <div class="icon-blob">
                                <?php if ($image_url) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                                <?php else : ?>
                                    <span class="placeholder-icon">📦</span>
                                <?php endif; ?>
                            </div>
                            <h3><?php echo esc_html($category->name); ?></h3>
                            <span class="item-count">(<?php echo $category->count; ?> item)</span>
                        </a>

                <?php
                    endforeach;
                endif;
                ?>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container cta-container">
            <h2><?php echo get_field('call_title'); ?></h2>
            <button class="btn-make-call"><?php echo get_field('make_a_call_text'); ?></button>
        </div>
    </section>

    <!-- Main Layout Container -->
    <div class="container main-content-wrapper">

        <!-- 1. Promo Banners Grid -->
        <section class="promo-banners-grid">
            <!-- Banner 1 -->
            <div class="promo-banner orange-banner">
                <span class="hot-sales">HOT SALES</span>
                <h2>Big Sale</h2>
                <p>Mango & juci</p>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-buy-now">Buy Now ⇾</a>
                <!-- Placeholder for image overlay, replace with real image via CSS or IMG tag -->
                <div class="banner-img-placeholder">🍊</div>
            </div>

            <!-- Banner 2 -->
            <div class="promo-banner green-banner">
                <span class="hot-sales">HOT SALES</span>
                <h2>Save 20%</h2>
                <p>Every Order</p>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-buy-now">Buy Now ⇾</a>
                <div class="banner-img-placeholder">🍏</div>
            </div>

            <!-- Banner 3 -->
            <div class="promo-banner orange-banner">
                <span class="hot-sales">HOT SALES</span>
                <h2>Big Sale</h2>
                <p>Mango & juci</p>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-buy-now">Buy Now ⇾</a>
                <div class="banner-img-placeholder">🍊</div>
            </div>
        </section>

        <!-- 2. Product Lists Grid -->
        <section class="product-lists-section">

            <?php
            // 1. Define your 3 field names in an array
            $field_names = ['category_section1', 'category_section2', 'category_section3'];

            foreach ($field_names as $field_name) :

                // 2. Get the Category ID from ACF
                $selected_cat_id = get_field($field_name);

                if ($selected_cat_id) :

                    // 3. POLYLANG FIX: Get the translated ID for the current language
                    // If we are in Nepali, this converts the English ID to the Nepali ID
                    $current_lang_cat_id = function_exists('pll_get_term') ? pll_get_term($selected_cat_id) : $selected_cat_id;

                    // 4. Get the Category Object so we can show the Title
                    $category_obj = get_term($current_lang_cat_id);
            ?>

                    <div class="product-list-column">
                        <!-- Dynamic Title from Category Name -->
                        <h3 class="column-title"><?php echo esc_html($category_obj->name); ?></h3>

                        <div class="swiper small-product-slider">
                            <div class="swiper-wrapper">

                                <?php
                                // 5. Query 9 products from this specific category
                                $args = [
                                    'post_type'      => 'product',
                                    'posts_per_page' => 9,
                                    'tax_query'      => [
                                        [
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'term_id',
                                            'terms'    => $current_lang_cat_id,
                                        ],
                                    ],
                                ];

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    $i = 0;
                                    while ($query->have_posts()) : $query->the_post();
                                        global $product;

                                        // Group 3 items per slide
                                        if ($i % 3 == 0) {
                                            echo '<div class="swiper-slide"><div class="small-products-wrapper">';
                                        }
                                ?>

                                        <div class="small-product-card">
                                            <div class="img-box">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo woocommerce_get_product_thumbnail('thumbnail'); ?>
                                                </a>
                                            </div>
                                            <div class="info-box">
                                                <div class="stars"><?php echo wc_get_rating_html($product->get_average_rating()); ?></div>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <div class="price"><?php echo $product->get_price_html(); ?></div>
                                            </div>
                                        </div>

                                <?php
                                        // Close the slide after 3 items
                                        if ($i % 3 == 2 || ($query->current_post + 1) == $query->post_count) {
                                            echo '</div></div>';
                                        }
                                        $i++;
                                    endwhile;
                                    wp_reset_postdata();
                                else:
                                    echo '<p>No products found in this category.</p>';
                                endif;
                                ?>

                            </div>
                            <!-- Dots -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                <?php endif; // end if selected_cat_id exists 
                ?>
            <?php endforeach; ?>

        </section>
    </div>

    <!-- Brands Carousel Section -->

</main>

<?php get_footer(); ?>