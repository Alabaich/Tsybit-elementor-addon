<?php

class richText extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'richText';
    }

    public function get_title()
    {
        return esc_html__('Rich Text', 'elementor-addon');
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
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::Link,
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
            .richText .bottomTitle {
                font-weight: 500;
            }

            .richText .richTextCentered {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .richTextCentered * {
                max-width: 800px;
            }

            @media screen and (max-width: 600px) {
                .richText .richTextCentered {
                    padding: 0px;
                }

                .richText .upperTitle {
                    justify-content: center;
                    font-size: 10px;
                }

                .richText h2 {
                    text-align: center;
                }

                .richText .bottomTitle {
                    font-size: 1em;
                    justify-content: center;
                    text-align: center;
                }

                .richText .regularText {
                    text-align: center;
                }
            }
        </style>

            <div class="greyBg richText pageWidth">
                <div class="richTextCentered">
                    <p class="upperTitle"><?php echo $settings['upperTitle']; ?></p>
                    <h2><?php echo $settings['title']; ?></h2>
                    <h3 class="bottomTitle">
                        <?php echo $settings['subtitle']; ?>
                    </h3>
                    <p class="regularText">
                        <?php echo $settings['regularText']; ?>
                    </p>
                    <a class="link">
                        <?php echo $settings['link']; ?> ↗
                    </a>
                </div>
            </div>

<?php
    }
}