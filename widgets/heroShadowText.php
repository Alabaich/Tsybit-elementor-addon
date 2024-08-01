<?php

class heroShadowText extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'heroShadowText';
    }

    public function get_title()
    {
        return esc_html__('Hero Shadow Text', 'elementor-addon');
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
                'type' => \Elementor\Controls_Manager::WYSIWYG,
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

::selection {
    background: black; /* Background color for selected text */
    color: white; /* Text color for selected text */
}

::-moz-selection {
    background: black; /* Background color for selected text in Firefox */
    color: white; /* Text color for selected text in Firefox */
}

            .heroShadowTextContainer{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .h1cont{
                position: relative;
            }


            .heroShadowTextContainer h1{
                color: #F9F9F9;
text-align: center;
leading-trim: both;
text-edge: cap;
text-shadow: 6px 6px 16px rgba(0, 0, 0, 0.20), -2.5px -2.5px 6px #FFF, 3px 3px 6px rgba(174, 174, 192, 0.40);
-webkit-text-stroke-width: 1;
-webkit-text-stroke-color: #000;
font-family: Montserrat;
font-size: 82px;
font-style: normal;
font-weight: 900;
line-height: 107.473%; /* 88.128px */
        }

            .heroShadowTextContainer h1.bg{
                position: absolute;
                top: 0;
                z-index: -1;
            font-family: Montserrat, sans-serif;
            font-size: 82px;
            font-weight: 900;
            color: #F9F9F9; /* Text color */
            text-align: center;
            display: inline-block;
            background: linear-gradient(97deg, rgba(116, 86, 234, 0.25) 27.69%, rgba(86, 145, 234, 0.25) 32.98%, #FFF 39.18%, #F2F6FA 59.01%, rgba(116, 86, 234, 0.25) 64.79%, rgba(86, 145, 234, 0.25) 68.55%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow:
                0 0 1px rgba(116, 86, 234, 0.25),
                0 0 2px rgba(116, 86, 234, 0.25),
                0 0 3px rgba(116, 86, 234, 0.25),
                0 0 4px rgba(86, 145, 234, 0.25),
                0 0 5px rgba(86, 145, 234, 0.25),
                0 0 6px rgba(86, 145, 234, 0.25),
                0 0 7px rgba(116, 86, 234, 0.25);
            animation: gradientBorder 3s linear infinite;
        }

        @keyframes gradientBorder {
            0% {
                text-shadow: 
                    0 0 1px rgba(116, 86, 234, 0.25),
                    0 0 2px rgba(116, 86, 234, 0.25),
                    0 0 3px rgba(116, 86, 234, 0.25),
                    0 0 4px rgba(86, 145, 234, 0.25),
                    0 0 5px rgba(86, 145, 234, 0.25),
                    0 0 6px rgba(86, 145, 234, 0.25),
                    0 0 7px rgba(116, 86, 234, 0.25);
            }
            100% {
                text-shadow: 
                    0 0 1px rgba(116, 86, 234, 0.25),
                    0 0 2px rgba(116, 86, 234, 0.25),
                    0 0 3px rgba(116, 86, 234, 0.25),
                    0 0 4px rgba(86, 145, 234, 0.25),
                    0 0 5px rgba(86, 145, 234, 0.25),
                    0 0 6px rgba(86, 145, 234, 0.25),
                    0 0 7px rgba(116, 86, 234, 0.25);
                background-position: 100% 0%;
            }
        }


        </style>
        <div class="heroShadowTextContainer pageWidth">
            <div class="h1cont">
            <h1>
            Your One-Stop Digitalization Solution.
        </h1>        <h1 class="bg">
            Your One-Stop Digitalization Solution.
        </h1>
            </div>

        </div>


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

                <?php if (!empty($settings['regularText'])) : ?>
                    <p class="regularText">
                        <?php echo $settings['regularText']; ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($settings['link']['url'])) : ?>
                    <a class="link" href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo !empty($settings['link']['is_external']) ? 'target="_blank"' : ''; ?>>
                        <?php echo esc_html($settings['link']['url']); ?> ↗
                    </a>
                <?php endif; ?>

            </div>
        </div>

<?php
    }
}
