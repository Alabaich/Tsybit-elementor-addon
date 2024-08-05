<?php

class Projects extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Projects';
    }

    public function get_title()
    {
        return esc_html__('Brands Slider', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-carousel';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hello', 'world'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'titleSection',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'upperTitle',
            [
                'label' => esc_html__('Upper Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sliderSection',
            [
                'label' => esc_html__('Slider', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'urlBrandPage',
                        'label' => esc_html__('Url to Brand Page', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'logo',
                        'label' => esc_html__('Choose logo', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'subtitle',
                        'label' => esc_html__('Subtitle', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Content Tab End

        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>


        <style>
            .regularText {
                color: #2c2d2c;
                font-size: 16px;
                font-weight: 400;
            }

            .ourBrands {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
                padding: 50px 150px;
            }

            .ourBrands .textContainerCentered {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .brandsSlider {
                width: 100vw;
                overflow: visible;
                padding: 15px;
            }

            .brandsSlider .splide__track .splide__list .splide__slide a {
                display: flex;
                flex-direction: row;
            }
            .brandsSlider .splide__track .splide__list .splide__slide .textSide {
                display: flex;
                flex-direction: column;
            }

            .slideOurBrands {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
            }

            .slideOurBrands p {
                text-align: center;
            }

            .ourBrands .bigImg {
                width: 100%;
                height: 400px;
                display: flex;
                justify-content: center;
                align-items: end;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .ourBrands .bigImg img {
                padding-bottom: 25px;
            }

            .ourBrands .subtitle {
                text-align: center;
            }

            @media screen and (max-width: 600px) {
                .ourBrands {
                    padding: 15px;
                }

                .ourBrands * {
                    text-align: center;
                }

                .ourBrands .bigImg {
                    height: 180px;
                }
            }
        </style>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css">

        <div class="pageWidth">
            <div class="ourBrands">
                <div class="textContainerCentered">
                    <?php if (!empty($settings['upperTitle'])) : ?>
                        <p class="upperTitle">
                            <?php echo $settings['upperTitle']; ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($settings['title'])) : ?>
                        <h2>
                            <?php echo $settings['title']; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['subtitle'])) : ?>
                        <h4 class="subtitle">
                            <?php echo $settings['subtitle']; ?>
                        </h4>
                    <?php endif; ?>

                    <?php if (!empty($settings['description'])) : ?>
                        <p class="regularText">
                            <?php echo $settings['description']; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="brandsSlider">
                    <section class="splide" aria-label="Our Brands" id="uniqIdForThisSection">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                foreach ($settings['repeater_field'] as $item) :
                                ?>
                                    <li class="splide__slide">
                                        <?php if (!empty($item['urlBrandPage']['url'])) : ?>
                                            <a href="<?php echo esc_url($item['urlBrandPage']['url']); ?>" class="slideOurBrands">
                                            <?php else : ?>
                                                <a class="slideOurBrands">
                                                <?php endif; ?>
                                                <div class="bigImg" style="background-image: url(<?php echo esc_url($item['image']['url']); ?>);">
                                                    <img src="<?php echo esc_html($item['logo']['url']); ?>" alt="" class="logoForBrand">
                                                </div>
                                                <div class="textSide">
                                                    <h5><?php echo esc_html($item['title']); ?></h5>
                                                    <p class="regularText"><?php echo esc_html($item['subtitle']); ?></p>
                                                </div>
                                                </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Splide('#uniqIdForThisSection', {
                    gap: 25,
                    type: 'loop',
                    padding: '20%',
                    pagination: false,
                    arrows: false,
                    breakpoints: {
                        640: {
                            padding: '5%',
                            gap: 10,
                        },
                    }
                }).mount();
            });
        </script>

<?php
    }
}
