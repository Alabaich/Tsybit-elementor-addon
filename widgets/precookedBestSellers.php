<?php
class Precooked_Best_Sellers extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'precooked_best_sellers';
    }

    public function get_title()
    {
        return esc_html__('Precooked Best Sellers', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['recepies', 'slider'];
    }
    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_count',
            [
                'label' => __('Number of Posts', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10, // Default number of posts to display
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Subtitle', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => esc_html__('Title Left', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'subtitle2',
            [
                'label' => esc_html__('Subtitle Left', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Subtitle', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Button', 'elementor-addon'),
            ]
        );

        // URL Control for Button Link
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://example.com', 'elementor-addon'),
                'default' => [
                    'url' => 'https://example.com',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $posts_count = $settings['posts_count'];

        // Query latest posts from the 'products' post type
        $query_args = array(
            'post_type' => 'product', // Change 'recipe' to 'product'
            'posts_per_page' => $posts_count,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $products_query = new WP_Query($query_args);


        // Check if there are posts
        if ($products_query->have_posts()) {
?>
            <style>
                .sliderBigActive {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    gap: 25px;
                    width: 100%;
                    padding: 150px 0;
                }

                .sliderBigActive h2,
                .sliderBigActive p {
                    max-width: 800px;
                    text-align: center;
                }

                .sliderBigActive .splide {
                    width: 100%;
                }

                .sliderBigActive .splide__list {
                    display: flex;
                    align-items: center;
                }

                .sliderBigActive .slideBig {
                    border-radius: 50px;
                    display: flex;
                    width: 100%;
                    height: 100%;
                    padding: 50px;
                    justify-content: end;
                    align-items: start;
                    flex-direction: column;
                }

                .sliderBigActive .inner {
                    display: flex;
                    justify-content: start;
                    align-items: start;
                    flex-direction: column;
                    gap: 10px;
                }

                .sliderBigActive .productPrep {
                    height: 500px;
                    transition: all linear 300ms;
                }

                .sliderBigActive .is-active {
                    height: 600px;
                }

                .sliderBigActive .inner h2 {
                    color: white;
                    text-align: start;
                }

                .sliderBigActive .inner .price {
                    color: white;
                    font-size: 40px;
                    font-weight: 700;
                    text-align: start;
                }

                .sliderBigActive .inner .description p {
                    color: white;
                    text-align: start;
                }

                .splide .splide__pagination {
                    display: none;
                }
            </style>


            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css">
            <div class="sliderBigActive">
                <h2>
                    <?php echo $settings['title']; ?>
                </h2>
                <p>
                    <?php echo $settings['subtitle']; ?>
                </p>

                <section class="splide" aria-label="..." id="sliderBigActive">
                    <div class="splide__track">
                        <ul class="splide__list">


                            <?php while ($products_query->have_posts()) :
                                $products_query->the_post(); ?>
                                <?php
                                // Retrieve the post ID and rating meta field
                                $post_id = get_the_ID();
                                $rating = get_post_meta($post_id, 'rating', true);
                                $thumbnail_url = get_the_post_thumbnail_url( null, 'full' );
                                ?>
                                <li class="productPrep splide__slide realOne">
                                    <a href="<?php the_permalink(); ?>" class="slideBig" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 40.5%, rgba(0, 0, 0, 0.85) 100%), url('<?php echo esc_url($thumbnail_url); ?>'), lightgray 50% / cover no-repeat;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;">
                                        <div class="inner">
                                            <h2>
                                                <?php the_title(); ?>
                                            </h2>
                                            <p class="price">$
                                                <?php echo get_field('price'); ?> <?php echo get_field('price_currency'); ?>
                                            </p>
                                            <div class="rating">
                                                <?php
                                                for ($i = 1; $i <= $rating; $i++) {
                                                    echo '
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
                                                         <path d="M3.5538 13.84L4.7238 8.78203L0.799805 5.38003L5.9838 4.93003L7.9998 0.160034L10.0158 4.93003L15.1998 5.38003L11.2758 8.78203L12.4458 13.84L7.9998 11.158L3.5538 13.84Z" fill="#F79E81" />
                                                     </svg>';
                                                }
                                                ?>
                                            </div>
                                            <div class="description">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </section>
            </div>



            <script>
                new Splide('#sliderBigActive', {
                    type: 'loop',
                    padding: '5rem',
                    gap: "25px",
                }).mount();
            </script>


<?php
            // Reset the global post object
            wp_reset_postdata();
        } else {
            echo esc_html__('No recipes found.', 'elementor-addon');
        }
    }
}
