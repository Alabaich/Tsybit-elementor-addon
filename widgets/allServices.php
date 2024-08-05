<?php

class allServices extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'allServices';
    }

    public function get_title()
    {
        return esc_html__('All our Services', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
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
            'buttonText',
            [
                'label' => esc_html__('Button text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'buttonUrl',
            [
                'label' => esc_html__('Url for button', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'services',
            [
                'label' => esc_html__('Services', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'serviceTitle',
                        'label' => esc_html__('Service Title', 'elementor-addon'),
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
            .allServices {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .allServices .textSide a {
                display: inline-flex;
                align-items: center;
                text-align: center;
                background: #2C2D2C;
                color: #F0F0F3;
                padding: 15px 25px;
                border-radius: 25px;
                font-weight: 500;
                gap: 10px;
                transition: all 300ms linear;
            }

            .allServices .richTextCentered a:hover {
                background-color: #F0F0F3;
                color: #2C2D2C;
            }

            .allServices .allServicesBlocks {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 25px;
                margin: 20px 100px 0px;
            }

            .allServices .allServicesBlocks .oneServiceBlock {
                background-color: #fff;
                border-radius: 25px;
                padding: 25px;
            }

            .allServices .allServicesBlocks .oneServiceBlock h3 {
                font-size: 18px;
            }
        </style>

        <div class="allServices pageWidth">
            <div class="textSide">
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

                <?php if (!empty($settings['buttonText'])) : ?>
                    <a class="link" href="<?php echo $settings['buttonUrl']['url']; ?>">
                        <?php echo $settings['buttonText']; ?> <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.74253 1.18198H3.37857M9.74253 1.18198V7.54594M9.74253 1.18198L4.17406 6.75045M1.25725 9.66726L2.58307 8.34144" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                <?php endif; ?>

                <div class="allServicesBlocks">
                    <?php foreach ($settings['services'] as $service) : ?>
                        <div class="oneServiceBlock">
                            <h3><?php echo esc_html($service['serviceTitle']); ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

<?php
    }
}
