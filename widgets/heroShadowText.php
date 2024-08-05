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
            'linkOne',
            [
                'label' => esc_html__('LinkOne', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'linkOneText',
            [
                'label' => esc_html__('Link Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'linkTwo',
            [
                'label' => esc_html__('Link Two', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'linkTwoText',
            [
                'label' => esc_html__('Link Two Text', 'elementor-addon'),
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
            animation: gradientBorder 6s infinite;
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


.heroShadowTextContainer .buttons a{
    display: flex;
padding: 15px 25px;
justify-content: center;
align-items: center;
gap: 10px;
border-radius: 25px;

}

.heroShadowTextContainer .buttons{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
}

.heroShadowTextContainer .buttons .buttonOne{
    background: #2C2D2C;
    color: #FFF;
    color: #F0F0F3;

text-align: center;



font-family: Montserrat;
font-size: 18px;

font-weight: 500;

}

.heroShadowTextContainer .buttons .buttonTwo{
    background: #F9F9F9;
    color: #808080;

text-align: center;


font-family: Montserrat;
font-size: 18px;
font-weight: 300;
box-shadow: -2px -2px 4px 0px #FFF, 2px 2px 4px 0px rgba(174, 174, 192, 0.40);


}

.heroShadowTextContainer .regularText{
    text-align: center;
    color: #808080;
text-align: center;
font-family: Montserrat;
font-size: 20px;
font-weight: 300;
min-width: 800px;
}

@media screen and (max-width: 600px) {
    .heroShadowTextContainer h1 {
            font-size: 48px;
        }

        .heroShadowTextContainer h1.bg {
            font-size: 48px;
        }
}

        </style>
        <div class="heroShadowTextContainer pageWidth">

            <?php if (!empty($settings['upperTitle'])) : ?>
                    <p class="upperTitle"><?php echo $settings['upperTitle']; ?></p>
                <?php endif; ?>

            <div class="h1cont">
                <h1 id="dynamic-shadow">
                    <?php echo $settings['title']; ?>
                </h1>        
                <h1 class="bg">
                    <?php echo $settings['title']; ?>
                </h1>
            </div>
            
            <?php if (!empty($settings['regularText'])) : ?>
                    <p class="regularText">
                        <?php echo $settings['regularText']; ?>
                    </p>
            <?php endif; ?>
            <div class="buttons">
                <a href="<?php echo esc_html($settings['linkOne']['url']); ?> ↗" class="buttonOne"><?php echo $settings['linkOneText']; ?></a>
                <a href="<?php echo esc_html($settings['linkTwo']['url']); ?> ↗" class="buttonTwo"><?php echo $settings['linkTwoText']; ?></a>
            </div>

        </div>

        <script>
document.addEventListener('DOMContentLoaded', function() {
            const textElement = document.getElementById('dynamic-shadow');
            if (textElement) {
                let lastExecution = 0;
                const throttle = 50; // Throttle rate in milliseconds

                document.addEventListener('mousemove', function(event) {
                    const now = Date.now();
                    if (now - lastExecution >= throttle) {
                        lastExecution = now;
                        const x = event.clientX; // Mouse X position
                        const y = event.clientY; // Mouse Y position
                        const windowWidth = window.innerWidth; // Window width
                        const windowHeight = window.innerHeight; // Window height
                        const shadowX = ((x / windowWidth) - 0.5) * -20; // Inverted shadow X offset
                        const shadowY = ((y / windowHeight) - 0.5) * -20; // Inverted shadow Y offset

                        const textShadow = `
                            ${shadowX}px ${shadowY}px 10px rgba(0, 0, 0, 0.25),
                            ${-shadowX}px ${-shadowY}px 10px rgba(255, 255, 255, 0.25)
                        `;
                        
                        textElement.style.textShadow = textShadow;
                    }
                });
            } else {
                console.error('Element with ID "dynamic-shadow" not found.');
            }
        });
    </script>

<?php
    }
}
