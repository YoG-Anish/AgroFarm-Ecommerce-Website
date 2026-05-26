<?php
class Agrofarm_Testimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() { return 'agrofarm_testimonial_slider'; }
    public function get_title() { return 'Agrofarm Testimonials'; }
    public function get_icon() { return 'eicon-testimonial-carousel'; }
    public function get_categories() { return [ 'general' ]; }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label' => 'Content']);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('client_name', [
            'label' => 'Client Name',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'John Doe',
        ]);

        $repeater->add_control('client_designation', [
            'label' => 'Designation',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Happy Customer',
        ]);

        $repeater->add_control('client_image', [
            'label' => 'Client Image',
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);

        $repeater->add_control('testimonial_text', [
            'label' => 'Feedback',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'The organic vegetables from Broccoli are always fresh!',
        ]);

        $this->add_control('testimonials', [
            'label' => 'Testimonials',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ client_name }}}',
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                <?php foreach ( $settings['testimonials'] as $item ) : ?>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="client-thumb">
                                <img src="<?php echo esc_url($item['client_image']['url']); ?>" alt="">
                            </div>
                            <p class="feedback">"<?php echo esc_html($item['testimonial_text']); ?>"</p>
                            <h4 class="name"><?php echo esc_html($item['client_name']); ?></h4>
                            <span class="designation"><?php echo esc_html($item['client_designation']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <?php
    }
}