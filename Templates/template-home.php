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
                // 1. Fetch WooCommerce Product Categories
                $categories = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'number' => 6,
                    'hide_empty' => false, // Shows category even if it has 0 products
                    'parent'     => 0,     // Only get top-level (Parent) categories
                    'orderby'    => 'name',
                    'order'      => 'ASC'
                ));

                if (! empty($categories) && ! is_wp_error($categories)) :
                    foreach ($categories as $category) :
                        // 2. Get the Category Link
                        $category_link = get_term_link($category);

                        // 3. Get the Category Thumbnail (Featured Image)
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image_url    = wp_get_attachment_image_url($thumbnail_id, 'thumbnail');
                ?>

                        <li>
                            <a href="<?php echo esc_url($category_link); ?>">
                                <?php if ($image_url) : ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" class="cat-icon">
                                <?php else : ?>
                                    <!-- Fallback if no image is uploaded -->
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
                <!-- Content Area -->
                <div class="hero-content">
                    <?php if (get_field('hero_discount_text')): ?>
                        <p class="subtitle"><?php echo esc_html(get_field('hero_discount_text')); ?></p>
                    <?php endif; ?>

                    <h1><?php echo esc_html(get_field('hero_title')); ?></h1>

                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_shop_page_id'))) ?>" class="btn-shop">
                        <?php echo esc_html(get_field('hero_button_text')); ?>
                    </a>
                </div>

                <!-- Image Area -->
                <div class="hero-image">
                    <?php
                    $hero_banner = get_field('hero_banner');
                    if ($hero_banner): ?>
                        <img src="<?php echo esc_url($hero_banner['url']); ?>" alt="<?php echo esc_attr($hero_banner['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Static Slider Dots to match design
            <div class="slider-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
            </div> -->
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
            // 1. Define the category slugs you want to show as tabs
            // Make sure these slugs match exactly what is in WooCommerce > Categories
            $tab_categories = array(
                'fruits' => 'Fruits',
                'vegetable'  => 'Vegetables',
                'dried-foods' => 'Dried Fruit',
                'bread-cake'  => 'Bread & Cake',
                'fish-meat'   => 'Fish & Meat'
            );
            ?>

            <!-- 1. TAB NAVIGATION -->
            <div class="tabs-header">
                <?php
                $count = 0;
                foreach ($tab_categories as $slug => $name) :
                    $active_class = ($count == 0) ? 'active' : '';
                ?>
                    <button class="tab-btn <?php echo $active_class; ?>" data-target="<?php echo $slug; ?>">
                        <?php echo esc_html($name); ?>
                    </button>
                <?php
                    $count++;
                endforeach;
                ?>
            </div>

            <!-- 2. TAB CONTENT PANELS -->
            <?php
            $panel_count = 0;
            foreach ($tab_categories as $slug => $name) :
                $active_panel = ($panel_count == 0) ? 'active' : '';
            ?>
                <div class="tab-panel <?php echo $active_panel; ?>" id="<?php echo $slug; ?>">
                    <div class="product-grid">
                        <?php
                        // Query Products for this specific category
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 4,
                            'product_cat'    => $slug, // Filter by slug
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
                                        <!-- Badge Logic: Sale or New -->
                                        <?php if ($product->is_on_sale()) : ?>
                                            <span class="badge">-
                                                <?php
                                                // Calculate percentage if it's a simple product
                                                if ($product->is_type('simple')) {
                                                    $percentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
                                                    echo $percentage . '%';
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
                                        <!-- Stars Rating -->
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
                            echo '<p>No products found in ' . $name . '</p>';
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php
                $panel_count++;
            endforeach;
            ?>
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
    // Define your specific category slugs and their display titles
    $sections = [
        'featured-product'      => 'Featured Products',
        'most-viewed-product'   => 'Most Viewed Products',
        'bestseller-products'   => 'Bestseller Products'
    ];

    foreach ($sections as $slug => $title) :
        // Setup Query to fetch products from these specific categories
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => 9, // Allows up to 3 slides (3 items per slide)
            'tax_query'      => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $slug,
                ],
            ],
        ];

        $query = new WP_Query($args);
        ?>

        <div class="product-list-column">
            <h3 class="column-title"><?php echo esc_html($title); ?></h3>
            
            <!-- Swiper Container -->
            <div class="swiper small-product-slider">
                <div class="swiper-wrapper">
                    
                    <?php 
                    if ($query->have_posts()) : 
                        $i = 0;
                        while ($query->have_posts()) : $query->the_post();
                            global $product;
                            
                            // Every 3 products, start a new Swiper Slide
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
                                    <div class="stars">
                                        <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                                    </div>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="price">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                            // Close the slide after 3 products OR at the end of the total results
                            if ($i % 3 == 2 || ($query->current_post + 1) == $query->post_count) {
                                echo '</div></div>';
                            }
                            $i++;
                        endwhile; 
                        wp_reset_postdata();
                    else:
                        echo '<p>No products in this category.</p>';
                    endif; 
                    ?>

                </div>
                <!-- Swiper Pagination (Dots) -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

    <?php endforeach; ?>

</section>
    </div>

    <!-- Brands Carousel Section -->
    
</main>

<?php get_footer(); ?>