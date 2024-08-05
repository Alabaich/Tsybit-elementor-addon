<?php

class servicesWidget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'servicesWidget';
    }

    public function get_title()
    {
        return esc_html__('Services And Prices', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-paypal-button';
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
            'services',
            [
                'label' => esc_html__('Review', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'serviceTitle',
                        'label' => esc_html__('Service Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'estimatedPrice',
                        'label' => esc_html__('Estimated Price', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'linkText',
                        'label' => esc_html__('Link text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__('Link', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ],
                ],
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
            .servicesMainSection {
                display: flex;
                justify-content: center;
                text-align: center;
                align-items: center;
                flex-direction: column;
                gap: 25px;
                margin: 100px 0px 100px 0px;
            }

            .servicesMainSection .link {
                color: #2c2d2c;
            }

            .servicesMainSection .servicesBlock {
                flex-wrap: wrap;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 25px;
            }

            .servicesMainSection .servicesBlock .oneServiceBlock {
                background-color: #fff;
                padding: 20px;
                border-radius: 25px;
                width: 400px;
            }

            .servicesMainSection .servicesBlock .oneServiceBlock a {
                display: inline-flex;
                border: 1px solid #2c2d2c;
                border-radius: 25px;
                padding: 10px 10px;
                transition: ease-in 300ms;
            }

            .servicesMainSection .servicesBlock .oneServiceBlock a:hover {
                color: #fff;
            }
        </style>

        <div class="pageWidth">
            <div class="servicesMainSection">
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

                    <?php if (!empty($settings['regularText'])) : ?>
                        <p class="regularText">
                            <?php echo $settings['regularText']; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="servicesBlock">
                    <?php foreach ($settings['services'] as $service) : ?>
                        <div class="oneServiceBlock">
                            <h3><?php echo $service['serviceTitle']; ?></h3>
                            <p><?php echo $service['description']; ?></p>
                            <p><?php echo $service['estimatedPrice']; ?></p>
                            <a href="<?php echo $service['link']['url']; ?>"><?php echo $service['linkText']; ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if (!empty($settings['link']['url']) && !empty($settings['linkText'])) : ?>
                    <a class="link" href="<?php echo esc_url($settings['link']['url']); ?>">
                        <?php echo esc_html($settings['linkText']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

<?php
    }
}
