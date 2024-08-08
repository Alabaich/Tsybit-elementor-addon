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
        return 'eicon-t-letter-bold0xe94e';
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
                text-align: center;
                align-items: center;
                gap: 10px;
                margin: 100px 0px 100px 0px;
            }

            .richText .richTextCentered .link {
                color: #2c2d2c;
            }

            .richTextCentered * {
                max-width: 800px;
            }

            @media screen and (max-width: 600px) {
                .richText .richTextCentered {
                    padding: 0px;
                }

                .richText .richTextCentered {
                    margin: 50px 0px 50px 0px;
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

        <div class="richText pageWidth">
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

                <?php if (!empty($settings['link']['url']) && !empty($settings['linkText'])) : ?>
                    <a class="link" href="<?php echo esc_url($settings['link']['url']); ?>">
                        <?php echo esc_html($settings['linkText']); ?> <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.74253 0.883641H3.37857M9.74253 0.883641V7.2476M9.74253 0.883641L4.17406 6.45211M1.25725 9.36892L2.58307 8.0431" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                <?php endif; ?>

            </div>
        </div>

<?php
    }
}
