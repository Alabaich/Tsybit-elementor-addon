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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.css">

        <script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.js"></script>

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

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="imageWithText <?php if ('yes' === $settings['switch_position']) {
                                                            echo 'right';
                                                        } else {
                                                            echo 'left';
                                                        } ?> wow fadeInUp pageWidthFG">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="left">
                                <div class="informationBlock">
                                    <p class="upperTitle"><?php echo $settings['upperTitle']; ?></p>
                                    <h3 class="title"><?php echo $settings['title']; ?></h3>
                                    <p class="regularText"><?php echo $settings['description']; ?></p>
                                    <?php if ($settings['url'] != "") {
                                    ?>
                                        <a class="blueButton" href="<?php echo esc_url($settings['url']); ?>">
                                            <?php echo esc_html($settings['textForButton']); ?>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="right">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
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
                var swiper = new Swiper('.swiper-container', {
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            });
        </script>

<?php
    }
}
