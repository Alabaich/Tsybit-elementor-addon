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
                        'name' => 'name',
                        'label' => esc_html__('Name', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'reviewText',
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
            .reviewBlock .review {
                background-color: #fff;
                margin: 20px;
                border-radius: 25px;
            }

            .reviewBlock .review .rowContainer {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        </style>

        <div class="greyBg richText pageWidth">
            <div class="richTextCentered">
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
                <div class="reviewBlock">
                    <?php
                    foreach ($settings['repeater_field'] as $item) :
                    ?>
                        <div class="review">
                            <div class="rowContainer">
                                <?php if (!empty($item['image']['url'])) : ?>
                                    <div class="image">
                                        <img src="<?php echo $item['image']['url']; ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item['name'])) : ?>
                                    <div class="name">
                                        <p><?php echo $item['name']; ?> </p>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item['placeOfWork'])) : ?>
                                    <div class="placeOfWork">
                                        <p><?php echo $item['placeOfWork']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($item['reviewText'])) : ?>
                                <div class="reviewText">
                                    <p><?php echo $item['reviewText']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <a class="link">
                    <?php echo $settings['link']; ?> ↗
                </a>
            </div>
        </div>

<?php
    }
}
