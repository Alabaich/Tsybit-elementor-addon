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
                height: 80vh;
            }

            .h1cont {
            position: relative;
        }

        .heroShadowTextContainer h1 {
            color: #F9F9F9;
            font-family: Montserrat;
            text-align: center;
            font-size: 82px;
            font-style: normal;
            font-weight: 900;
            line-height: 107.473%;
            text-shadow: 6px 6px 16px rgba(0, 0, 0, 0.20), -2.5px -2.5px 6px #FFF, 3px 3px 6px rgba(174, 174, 192, 0.40);
            transition: text-shadow 0.1s ease-out; /* Smooth transition for shadow movement */
        }

        .heroShadowTextContainer h1.bg {
            position: absolute;
            font-family: Montserrat;
            top: 0;
            left: 0;
            z-index: -1;
            font-size: 82px;
            font-weight: 900;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientBorder 2s infinite;
        }

        @keyframes gradientBorder {
            0% {
                text-shadow:
                    0 0 1px rgb(170, 153, 238),
                    0 0 2px rgb(135, 116, 212),
                    0 0 3px rgb(132, 119, 185);
            }

            50% {
                text-shadow:
                    0 0 1px rgba(255, 255, 255, 1),
                    0 0 2px rgba(255, 255, 255, 1),
                    0 0 3px rgb(255, 255, 255);
            }

            100% {
                text-shadow:
                    0 0 1px rgb(170, 153, 238),
                    0 0 2px rgb(135, 116, 212),
                    0 0 3px rgb(132, 119, 185);
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

        <script>
        document.addEventListener('mousemove', function(event) {
            const x = event.clientX; // Mouse X position
            const y = event.clientY; // Mouse Y position
            const windowWidth = window.innerWidth; // Window width
            const windowHeight = window.innerHeight; // Window height
            const shadowX = ((x / windowWidth) - 0.5) * -20; // Inverted shadow X offset
            const shadowY = ((y / windowHeight) - 0.5) * -20; // Inverted shadow Y offset

            const textShadow = `
                ${shadowX}px ${shadowY}px 6px rgba(0, 0, 0, 0.25),
                ${-shadowX}px ${-shadowY}px 6px rgba(255, 255, 255, 0.25)
            `;
            
            document.getElementById('dynamic-shadow').style.textShadow = textShadow;
        });
    </script>

<?php
    }
}
