<?php


class Product_Types extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Product Types';
    }

    public function get_title()
    {
        return esc_html__('Product Types', 'elementor-addon');
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
        return ['hero', 'section'];
    }
    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Subtitle', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'blocks',
            [
                'label' => esc_html__('Blocks', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'your-text-domain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Block Title', 'your-text-domain'),
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__('URL', 'your-text-domain'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'default' => [
                            'url' => '',
                        ],
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'your-text-domain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => '',
                        ],
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                    '{{WRAPPER}} h1' => 'color: {{VALUE}};',
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
            .detailedProductTypesContainer {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 25px;
            }

            .detailedProductTypesContainer p {
                text-align: center;
                max-width: 800px;
            }

            .detailedProductType .title{
                max-width: 190px;
            }

            .detailedProductType {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 50px;
                flex-wrap: wrap;
            }

            .detailedProductType .detailedProductBlock p {
                text-align: center;
                font-size: 24px;
            }

            .detailedProductBlock img {
                height: 240px;
                width: 190px;
                max-height: 240px;
                max-width: 190px;
                object-fit: contain;
            }
        </style>

        <div class="detailedProductTypesContainer pageWidth">
            <h2>
                <?php echo $settings['title']; ?>
            </h2>
            <p>
                <?php echo $settings['subtitle']; ?>
            </p>
            <div class="detailedProductType">
                <?php foreach ($settings['blocks'] as $block): ?>
                    <a href="<?php echo esc_url($block['link']['url']); ?>" class="detailedProductBlock">
                        <img src="<?php echo esc_url($block['image']['url']); ?>"
                            alt="<?php echo esc_attr($block['title']); ?>" />
                        <p class="title">
                            <?php echo esc_html($block['title']); ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>




        <?php
    }

}





