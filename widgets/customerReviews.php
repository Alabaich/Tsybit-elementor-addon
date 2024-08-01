<?php

class customerReviews extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'customerReviews';
    }

    public function get_title()
    {
        return esc_html__('Customer Reviews', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-star-o0xe933';
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
            'repeater_field',
            [
                'label' => esc_html__('Review', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'placeOfWork',
                        'label' => esc_html__('Place of work', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__('Name', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'Review Text',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
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
        </style>

        <div class="greyBg richText pageWidth">
            <div class="richTextCentered">
                <p class="upperTitle"><?php echo $settings['upperTitle']; ?></p>
                <h2><?php echo $settings['title']; ?></h2>
                <h3 class="bottomTitle">
                    <?php echo $settings['subtitle']; ?>
                    <div class="reviewBlock">
                        <div class="review">
                            <div class="name">
                                <p>Sarah L.</p>
                            </div>
                            <div class="placeOfWork">
                                <p>Owner of Sarah's Boutique</p>
                            </div>
                            <div class="reviewText">
                                <p>As a small business owner, finding a reliable and talented web design team was crucial. The all-stack web design team exceeded my expectations! They were professional, responsive, and created a stunning, user-friendly website for my business. From initial consultation to final launch, every step was seamless. Highly recommended!</p>
                            </div>
                        </div>
                    </div>
                </h3>
                <a class="link">
                    <?php echo $settings['link']; ?> ↗
                </a>
            </div>
        </div>

<?php
    }
}
