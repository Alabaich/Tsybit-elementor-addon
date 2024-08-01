<?php
class Best_Sellers extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'best_sellers';
    }

    public function get_title()
    {
        return esc_html__('Best Sellers', 'elementor-addon');
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
            'post_type'      => 'product', // Change 'recipe' to 'product'
            'posts_per_page' => $posts_count,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $products_query = new WP_Query($query_args);
    

        // Check if there are posts
        if ($products_query->have_posts()) {
            ?>
            <style>
                .bestSellers {
                    width: 100%;
                    overflow: hidden;
                    flex-direction: column;
                    gap: 50px;
                    padding-top: 150px;
                    padding-bottom: 150px;
                }

                .bestSellers,
                .bestSellersInnerContainer,
                .bestSellersTitlesInner,
                .bestSellersTitles {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .bestSellersTitles {
                    flex-direction: column;
                    gap: 15px;
                }

                .bestSellersInnerContainer {
                    width: 100%;
                    gap: 50px;
                }

                .bestSellersTitlesInner {
                    max-width: 25%;
                    align-items: start;
                    flex-direction: column;
                    gap: 25px;
                }

                .bestSellersContainer {
                    max-width: 70%;
                }

                .bestSellers .splide__pagination {
                    display: none;
                }

                .bestSellers .splide__arrow {
                    padding: 10px;
                    background: rgba(44, 45, 44, 0.50);
                    height: 4em;
                    width: 4em;
                }

                .bestSellers .splide__arrow svg {
                    fill: #fff;
                    height: 4em;
                    width: 4em;
                }

                .priceAndRating {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .bestSellerCard,
                .slideBestSeller {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    width: 320px;
                    height: 100%;
                }

                .bestSellerCard .imageContainer {
                    border-radius: 25px;
                    background: var(--white);
                    padding: 10px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .bestSellersTitlesInner .button {
                    border: 1px solid #2c2d2c;
                    color: #2c2d2c;
                    border-radius: 25px;
                    transition: all linear 250ms;
                    padding: 10px 35px;
                }

                .bestSellersTitlesInner .button:hover {
                    background: #2c2d2c;
                    color: #fff;
                }

                .bestSellerCard .imageContainer img {
                    border-radius: 25px;
                    overflow: hidden;
                    object-fit: cover;
                    max-height: 100%;
                    max-width: 100%;
                }

                .bestSellerCard .informationContainer {
                    display: flex;
                    justify-content: start;
                    align-items: start;
                    flex-direction: column;
                    width: 100%;
                    padding: 0 10px;
                    gap: 10px;
                }

                .priceAndRating {
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .bestSellerCard .price span {
                    color: var(--white);
                }

                .bestSellerCard .informationContainer .thePreviousPrice {
                    text-decoration: line-through;
                }

                @media screen and (min-width: 1600px) {
                    .bestSellers {
                        padding: 50px 10%;
                    }
                }

                @media screen and (max-width: 650px) {
                    .bestSellers {
                        padding: 30px 15px;
                        gap: 10px;
                    }

                    .bestSellersTitlesInner {
                        display: none;
                    }

                    .bestSellersContainer,
                    .bestSellersContainer {
                        width: 100%;
                        max-width: 100%;
                    }
                }
            </style>


            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
            <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css">
            <div class="bestSellers pageWidth">
                <div class="bestSellersTitles">
                    <h2><?php echo $settings['title']; ?></h2>
                    <p><?php echo $settings['subtitle']; ?></p>
                </div>
                <div class="bestSellersInnerContainer">
                    <div class="bestSellersTitlesInner">
                        <h3><?php echo $settings['title2']; ?></h3>
                        <p><?php echo $settings['subtitle2']; ?>
                        </p>
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="button bodySmallLight">
                            <?php echo esc_html($settings['button_text']); ?>
                        </a>
                    </div>
                    <div class="bestSellersContainer">
                        <section class="splide" aria-label="..." id="uniqIdForThisSection">
                            <div class="splide__track">
                                <ul class="splide__list">
                                <?php while ($products_query->have_posts()): $products_query->the_post(); ?>
                            <?php
                            // Retrieve the post ID and rating meta field
                            $post_id = get_the_ID();
                            $rating = get_post_meta($post_id, 'rating', true);
                            ?>
                                    <li class="bestSellerCard splide__slide realOne">
                                        <a href="<?php the_permalink(); ?>" class="slideBestSeller">
                                            <div class="imageContainer">
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="lazyload" loading="lazy" height="300px" width="300px">
                                            </div>
                                            <div class="informationContainer">
                                                <p class="bodyLarge"><?php the_title(); ?></p>
                                                <p class="labelLight"><?php echo get_field('vendor'); ?></p>
                                                <div class="priceAndRating">
                                                    <div class="thePriceContainerForProductContainer">
                                                        <p class="bodyLarge"><?php echo get_field('price'); ?> <?php echo get_field('price_currency'); ?></p>
                                                    </div>

                                                    <div class="rating">
                                                        <?php
                                                        // Loop to display stars based on the rating value
                                                        for ($i = 1; $i <= $rating; $i++) {
                                                            echo '
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
                                                                    <path d="M3.5538 13.84L4.7238 8.78203L0.799805 5.38003L5.9838 4.93003L7.9998 0.160034L10.0158 4.93003L15.1998 5.38003L11.2758 8.78203L12.4458 13.84L7.9998 11.158L3.5538 13.84Z" fill="#F79E81" />
                                                                </svg>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    new Splide('#uniqIdForThisSection', {
                        type: 'loop',
                        autoWidth: true,
                        focus: 0,
                        omitEnd: true,
                        gap: 25,
                    }).mount();
                });
            </script>


            <?php
            // Reset the global post object
            wp_reset_postdata();
        } else {
            echo esc_html__('No recipes found.', 'elementor-addon');
        }
    }
}
