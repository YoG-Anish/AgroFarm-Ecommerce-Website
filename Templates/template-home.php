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
                <li><a href="#">🍎 Vegetables and Fruits</a></li>
                <li><a href="#">🥩 Fresh Meat</a></li>
                <li><a href="#">🐟 Fish and Seafood</a></li>
                <li><a href="#">🧈 Butter and Cream</a></li>
                <li><a href="#">🫙 Oil and Vinegar</a></li>
                <li><a href="#">🍞 Breads</a></li>
                <li><a href="#">🧃 Apple Juice</a></li>
                <li><a href="#">🥜 Dry Nuts</a></li>
                <li><a href="#">More categories +</a></li>
            </ul>
        </aside>

        <div class="hero-slider">
            <div class="hero-content">
                <p class="subtitle">UP TO 50% OFF TODAY ONLY!</p>
                <h1>Tasty & Healthy Organic Food</h1>
                <button class="btn-shop">SHOP NOW</button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-bar">
        <div class="feature-item">
            <span class="icon">🚚</span>
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

            <!-- 1. TAB NAVIGATION -->
            <div class="tabs-header">
                <button class="tab-btn active" data-target="food-drinks">FOOD & DRINKS</button>
                <button class="tab-btn" data-target="vegetables">VEGETABLES</button>
                <button class="tab-btn" data-target="dried-foods">DRIED FOODS</button>
                <button class="tab-btn" data-target="bread-cake">BREAD & CAKE</button>
                <button class="tab-btn" data-target="fish-meat">FISH & MEAT</button>
            </div>

            <!-- 2. TAB CONTENT: FOOD & DRINKS (Active by default) -->
            <div class="tab-panel active" id="food-drinks">
                <div class="product-grid">

                    <!-- PRODUCT 1 -->
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <span class="badge">-19%</span>
                            <img src="https://images.unsplash.com/photo-1582284540020-8ac90f4b1fa6?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Oranges and Tomatoes">
                        </div>
                        <div class="product-info">
                            <div class="stars">★★★★☆ <span>(24)</span></div>
                            <h3 class="product-title">Carrots Group Scal</h3>
                            <div class="price-wrap">
                                <span class="new-price">$32.00</span>
                                <span class="old-price">$46.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT 2 -->
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <span class="badge">-19%</span>
                            <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Broccoli">
                        </div>
                        <div class="product-info">
                            <div class="stars">★★★★☆ <span>(24)</span></div>
                            <h3 class="product-title">Fresh Broccoli</h3>
                            <div class="price-wrap">
                                <span class="new-price">$32.00</span>
                                <span class="old-price">$46.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT 3 -->
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <span class="badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1550828520-4cb496926fc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Passion Fruit">
                        </div>
                        <div class="product-info">
                            <div class="stars">★★★★★ <span>(12)</span></div>
                            <h3 class="product-title">Orange Fresh Juice</h3>
                            <div class="price-wrap">
                                <span class="new-price">$75.00</span>
                                <span class="old-price">$92.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT 4 -->
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <span class="badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1518977676601-b53f82aba655?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Red Onions">
                        </div>
                        <div class="product-info">
                            <div class="stars">★★★★☆ <span>(8)</span></div>
                            <h3 class="product-title">Poltry Farm Meat</h3> <!-- Text matches your design -->
                            <div class="price-wrap">
                                <span class="new-price">$78.00</span>
                                <span class="old-price">$85.00</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 3. TAB CONTENT: VEGETABLES -->
            <div class="tab-panel" id="vegetables">
                <div class="product-grid">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <span class="badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Broccoli">
                        </div>
                        <div class="product-info">
                            <div class="stars">★★★★★ <span>(50)</span></div>
                            <h3 class="product-title">Only Vegetables Here</h3>
                            <div class="price-wrap">
                                <span class="new-price">$10.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- More products can go here -->
                </div>
            </div>

            <!-- 4. TAB CONTENT: DRIED FOODS (Empty for demo) -->
            <div class="tab-panel" id="dried-foods">
                <div class="product-grid">
                    <h2>Dried Foods Content Here</h2>
                </div>
            </div>

            <!-- 5. TAB CONTENT: BREAD & CAKE (Empty for demo) -->
            <div class="tab-panel" id="bread-cake">
                <div class="product-grid">
                    <h2>Bread Content Here</h2>
                </div>
            </div>

            <!-- 6. TAB CONTENT: FISH & MEAT (Empty for demo) -->
            <div class="tab-panel" id="fish-meat">
                <div class="product-grid">
                    <h2>Fish & Meat Content Here</h2>
                </div>
            </div>

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

                <!-- Category Card 1 -->
                <a href="#" class="category-card">
                    <div class="icon-blob">
                        <!-- Replace with your actual icon image -->
                        <span class="placeholder-icon">🍎🥑</span>
                    </div>
                    <h3>Browse all</h3>
                    <span class="item-count">(235 item)</span>
                </a>

                <!-- Category Card 2 -->
                <a href="#" class="category-card">
                    <div class="icon-blob">
                        <!-- Replace with your actual icon image -->
                        <span class="placeholder-icon">🧴🍃</span>
                    </div>
                    <h3>Vegetables</h3>
                    <span class="item-count">(78 item)</span>
                </a>

                <!-- Category Card 3 -->
                <a href="#" class="category-card">
                    <div class="icon-blob">
                        <!-- Replace with your actual icon image -->
                        <span class="placeholder-icon">🥤</span>
                    </div>
                    <h3>Fruits</h3>
                    <span class="item-count">(45 item)</span>
                </a>

                <!-- Category Card 4 -->
                <a href="#" class="category-card">
                    <div class="icon-blob">
                        <!-- Replace with your actual icon image -->
                        <span class="placeholder-icon">🥪</span>
                    </div>
                    <h3>Meat</h3>
                    <span class="item-count">(15 item)</span>
                </a>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container cta-container">
            <h2>Get A Free Service Or Make A Call</h2>
            <button class="btn-make-call">📞 MAKE A CALL</button>
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
                <a href="#" class="btn-buy-now">Buy Now ⇾</a>
                <!-- Placeholder for image overlay, replace with real image via CSS or IMG tag -->
                <div class="banner-img-placeholder">🍊</div>
            </div>

            <!-- Banner 2 -->
            <div class="promo-banner green-banner">
                <span class="hot-sales">HOT SALES</span>
                <h2>Save 20%</h2>
                <p>Every Order</p>
                <a href="#" class="btn-buy-now">Buy Now ⇾</a>
                <div class="banner-img-placeholder">🍏</div>
            </div>

            <!-- Banner 3 -->
            <div class="promo-banner orange-banner">
                <span class="hot-sales">HOT SALES</span>
                <h2>Big Sale</h2>
                <p>Mango & juci</p>
                <a href="#" class="btn-buy-now">Buy Now ⇾</a>
                <div class="banner-img-placeholder">🍊</div>
            </div>
        </section>

        <!-- 2. Product Lists Grid -->
        <section class="product-lists-section">

            <!-- Column 1: Featured Products -->
            <div class="product-list-column">
                <h3 class="column-title">Featured Products</h3>
                <div class="small-products-wrapper">

                    <!-- Small Product Card 1 -->
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Tomato"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Red Hot Tomato</h4>
                            <div class="price"><span class="new">$129.00</span> <span class="old">$140.00</span></div>
                        </div>
                    </div>

                    <!-- Small Product Card 2 -->
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Papaya"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Vegetables Juices</h4>
                            <div class="price"><span class="new">$145.00</span> <span class="old">$155.00</span></div>
                        </div>
                    </div>

                    <!-- Small Product Card 3 -->
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Berry"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Orange Fresh Juice</h4>
                            <div class="price"><span class="new">$135.00</span> <span class="old">$145.00</span></div>
                        </div>
                    </div>

                </div>
                <!-- Pagination Dots -->
                <div class="dots-pagination">
                    <span class="dot active"></span><span class="dot"></span><span class="dot"></span>
                </div>
            </div>

            <!-- Column 2: Most View Products -->
            <div class="product-list-column">
                <h3 class="column-title">Most View Products</h3>
                <div class="small-products-wrapper">
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Tomato"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Red Hot Tomato</h4>
                            <div class="price"><span class="new">$129.00</span> <span class="old">$140.00</span></div>
                        </div>
                    </div>
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Papaya"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Vegetables Juices</h4>
                            <div class="price"><span class="new">$145.00</span> <span class="old">$155.00</span></div>
                        </div>
                    </div>
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Berry"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Orange Fresh Juice</h4>
                            <div class="price"><span class="new">$135.00</span> <span class="old">$145.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="dots-pagination"><span class="dot active"></span><span class="dot"></span><span class="dot"></span></div>
            </div>

            <!-- Column 3: Bestseller Products -->
            <div class="product-list-column">
                <h3 class="column-title">Bestseller Products</h3>
                <div class="small-products-wrapper">
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Tomato"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Red Hot Tomato</h4>
                            <div class="price"><span class="new">$129.00</span> <span class="old">$140.00</span></div>
                        </div>
                    </div>
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Papaya"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Vegetables Juices</h4>
                            <div class="price"><span class="new">$145.00</span> <span class="old">$155.00</span></div>
                        </div>
                    </div>
                    <div class="small-product-card">
                        <div class="img-box"><img src="https://via.placeholder.com/60" alt="Berry"></div>
                        <div class="info-box">
                            <div class="stars">★★★★☆</div>
                            <h4>Orange Fresh Juice</h4>
                            <div class="price"><span class="new">$135.00</span> <span class="old">$145.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="dots-pagination"><span class="dot active"></span><span class="dot"></span><span class="dot"></span></div>
            </div>

        </section>
    </div>

    <!-- Brands Carousel Section -->
    <section class="brands-section">
        <div class="container brands-wrapper">
            <img src="https://via.placeholder.com/150x80?text=Brand+1" alt="Brand Logo">
            <img src="https://via.placeholder.com/150x80?text=Brand+2" alt="Brand Logo">
            <img src="https://via.placeholder.com/150x80?text=Brand+3" alt="Brand Logo">
            <img src="https://via.placeholder.com/150x80?text=Brand+4" alt="Brand Logo">
            <img src="https://via.placeholder.com/150x80?text=Brand+5" alt="Brand Logo">
        </div>
    </section>
</main>

<?php get_footer(); ?>