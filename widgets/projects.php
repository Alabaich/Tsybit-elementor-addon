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
        $this->add_control(
            'link',
            [
                'label' => esc_html__('LinkOne', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'linkText',
            [
                'label' => esc_html__('Link Text', 'elementor-addon'),
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
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'linkTitle',
                        'label' => esc_html__('Title Link', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'linkUrl',
                        'label' => esc_html__('Link Url', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::URL,
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

            .brandsSlider .splide__track .splide__list .splide__slide {
                display: flex;
                flex-direction: row;
                padding: 20px;
                background-color: #fff;
                border-radius: 25px;
            }

            .brandsSlider .textSide {
                display: flex;
                align-items: start;
                flex-direction: column;
                justify-content: center;
                text-align: left;
                gap: 10px;
                min-width: 50%;
            }

            .ourBrands .sliderOurBrands {
                display: flex;
                align-items: center;
                text-align: center;
                gap: 25px;
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

            .ourBrands .projectImage {
                max-width: 49%;
            }

            @media screen and (max-width: 600px) {
                .ourBrands {
                    padding: 15px;
                }

                .ourBrands .projectImage {
                max-width: 100%;
            }

                .ourBrands * {
                    text-align: center;
                }

                .ourBrands .bigImg {
                    height: 180px;
                }

                .ourBrands .sliderOurBrands {
                    flex-direction: column;
                }

                .ourBrands .brandsSlider .textSide {
                    align-items: center;
                }
            }

            .ourBrands .buttonTwo {
                text-align: center;
                display: block;
                margin: 25px;
                color: #2c2d2c;
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
                                        <div class="sliderOurBrands">
                                            <div class="textSide">
                                                <h5><?php echo esc_html($item['title']); ?></h5>
                                                <img src="<?php echo esc_html($item['logo']['url']); ?>" alt="" class="logoForBrand">
                                                <p class="regularText"><?php echo esc_html($item['subtitle']); ?></p>
                                                <p><?php echo esc_html($item['description']); ?></p>
                                                <a href="<?php echo esc_url($item['linkUrl']['url']); ?>" class="button"><?php echo esc_html($item['linkTitle']); ?></a>
                                            </div>
                                            <img src="<?php echo esc_html($item['image']['url']); ?>" alt="" class="projectImage">
                                        </div>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </section>
                    <a href="<?php echo esc_html($settings['link']['url']); ?>" class="buttonTwo">
                        <?php echo $settings['linkText']; ?> ↗
                    </a>
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
