<?php

class latestProjects extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'latestProjects';
    }

    public function get_title()
    {
        return esc_html__('Our Latest Projects', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-carousel-loop';
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
            'regularText',
            [
                'label' => esc_html__('Regular Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'linkText',
            [
                'label' => esc_html__('Link text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => esc_html__('Slides', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'slideUpperTitle',
                        'label' => esc_html__('Slide Upper Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'slideLogo',
                        'label' => esc_html__('Slide Logo', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'slideTitle',
                        'label' => esc_html__('Slide Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'slideRegularText',
                        'label' => esc_html__('Slide Regular Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'slideDescription',
                        'label' => esc_html__('Slide Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'slideLinkText',
                        'label' => esc_html__('Slide Link Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'slideLinkUrl',
                        'label' => esc_html__('Slide Link Url', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ],
                ],
                'title_field' => '{{{ slide_title }}}',
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

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css">

        <style>
            .pageWidth .latestProjectsContainer {
                display: flex;
                justify-content: center;
                text-align: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
                margin: 100px 0px 100px 0px;
            }

            .pageWidth .latestProjectsContainer .swiper-container {
                width: 100%;
                height: auto;
                overflow: hidden;
            }

            .swiper-wrapper {
                display: flex;
            }

            .swiper-slide {
                width: 100%;
            }

            .pageWidth .latestProjectsContainer .swiper-container .swiper-wrapper .swiper-slide {
                text-align: center;
                background-color: #fff;
            }

            .swiper-pagination {
                bottom: 10px;
                padding: 50px;
                position: relative;
            }

            .swiper-pagination-bullet {
                background: #2c2d2c;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                opacity: 0.5;
            }

            .swiper-pagination-bullet-active {
                background: #2c2d2c;
                width: 10px;
                height: 10px;
                opacity: 1;
            }

            .ourBrands {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
                padding: 50px 150px;
            }

            .brandsSlider {
                width: 100vw;
                overflow: visible;
                padding: 15px;
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
        </style>

        <div class="pageWidth">
            <div class="latestProjectsContainer">
                <?php if (!empty($settings['upperTitle'])) : ?>
                    <p class="upperTitle"><?php echo $settings['upperTitle']; ?></p>
                <?php endif; ?>

                <?php if (!empty($settings['title'])) : ?>
                    <h2><?php echo $settings['title']; ?></h2>
                <?php endif; ?>

                <?php if (!empty($settings['subtitle'])) : ?>
                    <h3 class="bottomTitle">
                        <?php echo $settings['subtitle']; ?>
                    </h3>
                <?php endif; ?>

                <?php if (!empty($settings['regularText'])) : ?>
                    <p class="regularText">
                        <?php echo $settings['regularText']; ?>
                    </p>
                <?php endif; ?>

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
                                                <h5><?php echo esc_html($item['title']); ?></h5>
                                                <p class="regularText"><?php echo esc_html($item['subtitle']); ?></p>
                                                </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </section>
                </div>



                <?php if (!empty($settings['link']['url']) && !empty($settings['linkText'])) : ?>
                    <a class="link" href="<?php echo esc_url($settings['link']['url']); ?>">
                        <?php echo esc_html($settings['linkText']); ?>
                    </a>
                <?php endif; ?>

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
