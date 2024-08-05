<?php

class Projects extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Projects';
    }

    public function get_title()
    {
        return esc_html__('Projects', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-image';
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

        $this->end_controls_section();

        $this->start_controls_section(
            'sliderSection',
            [
                'label' => esc_html__('Slider', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Photos', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
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
        .masonry {
            /* Masonry container */
            -webkit-column-count: 4;
            -moz-column-count: 4;
            column-count: 4;
            -webkit-column-gap: 1em;
            -moz-column-gap: 1em;
            column-gap: 1em;
            margin: 1.5em;
            padding: 0;
            -moz-column-gap: 1.5em;
            -webkit-column-gap: 1.5em;
            column-gap: 1.5em;
            font-size: .85em;
        }

        .item {
            display: inline-block;
            margin: 0 0 1.5em;
            width: 100%;
            box-sizing: border-box;
        }

        .item img {
            max-width: 100%;
            width: 100%;
        }

        @media only screen and (max-width: 600px) {
            .masonry {
                -moz-column-count: 1;
                -webkit-column-count: 1;
                column-count: 1;
            }
        }

        @media only screen and (min-width: 600px) and (max-width: 768px) {
            .masonry {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }

        @media only screen and (min-width: 769px) {
            .masonry {
                -moz-column-count: 3;
                -webkit-column-count: 3;
                column-count: 3;
            }
        }

        .projectsContainer .richTextCentered{
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 15px;
        }

        .projectsContainer .richTextCentered *{
            width: 100%;
            max-width: 800px;
            text-align: center;
        }

        .projectsContainer .line{
            height: 1px;
            max-width: 600px;
            background-color: #2C2D2C;
        }

        .projectsContainer .buttonContainer{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 25px;
        }

        .projectsContainer .button{
            background: #006;
            padding: 15px;
            color: #fff;
        }

        .projectsContainer .button:hover{
            background: rgb(4, 4, 72);
        }
    </style>


<div class="pageWidthFG projectsContainer grid">
        <div class="greyBg">
            <div class="richTextCentered">
            <p class="upperTitle">
                        <?php echo esc_html($settings['upperTitle']); ?>
                    </p>
                    <h2>
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                    <h4 class="regularText">
                        <?php echo esc_html($settings['subtitle']); ?>
                    </h4>
                <div class="line"></div>
            </div>

            <div class="masonry">
            <?php
                                foreach ($settings['repeater_field'] as $item) :
                                ?>
                                    <div class="item"><img src="<?php echo esc_url($item['image']['url']); ?>" alt=""></div>
                                <?php
                                endforeach;
                                ?>
            </div>
            <div class="buttonContainer">
                <a href="" class="button">More</a>
            </div>
            
        </div>
    </div>

<?php
    }
}