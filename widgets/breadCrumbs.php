<?php


class Bread_Crumbs extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Bread Crumbs';
    }

    public function get_title()
    {
        return esc_html__('Bread Crumbs', 'elementor-addon');
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
                        'name' => 'url',
                        'label' => esc_html__('URL', 'your-text-domain'),
                        'type' => \Elementor\Controls_Manager::URL,
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
            .breadcrumbs {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .breadcrumbsInner {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .bradcrumb {
                color: var(--red);
            }

            .ifBreadCrumb {
                padding-top: 25px !important;
                padding-bottom: 25px !important;
            }
        </style>
        <div class="breadcrumbs pageWidth">
            <div class="breadcrumbsInner">
                <?php foreach ($settings['blocks'] as $index => $block): ?>
                    <?php if ($index > 0): ?>
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.3188 10.4999L11.4408 5.62191C11.4001 5.58127 11.3679 5.53302 11.3459 5.47992C11.3239 5.42682 11.3126 5.36991 11.3126 5.31243C11.3126 5.25495 11.3239 5.19804 11.3459 5.14494C11.3679 5.09184 11.4001 5.04359 11.4408 5.00295C11.4408 5.00295 11.4408 5.00295 11.4408 5.00295L11.529 5.09123L16.3188 10.4999ZM16.3188 10.4999L3.62524 10.4999C3.50921 10.4999 3.39793 10.546 3.31588 10.6281C3.23384 10.7101 3.18774 10.8214 3.18774 10.9374C3.18774 11.0535 3.23384 11.1647 3.31588 11.2468C3.39793 11.3288 3.50921 11.3749 3.62524 11.3749L16.3188 11.3749M16.3188 10.4999L16.3188 11.3749M16.3188 11.3749L11.4408 16.2529C11.4408 16.2529 11.4408 16.2529 11.4408 16.2529C11.4001 16.2936 11.3679 16.3418 11.3458 16.3949C11.3238 16.448 11.3125 16.5049 11.3125 16.5624C11.3125 16.6199 11.3238 16.6769 11.3458 16.73C11.3679 16.7831 11.4001 16.8313 11.4408 16.872L11.5291 16.7835L11.4407 16.8719C11.4813 16.9125 11.5296 16.9448 11.5827 16.9668C11.6358 16.9888 11.6927 17.0002 11.7502 17.0002C11.8077 17.0002 11.8647 16.9888 11.9178 16.9668C11.9709 16.9448 12.0191 16.9126 12.0597 16.8719L16.3188 11.3749ZM17.6847 11.2469C17.6847 11.2469 17.6847 11.2469 17.6847 11.247L12.0598 16.8719L17.6847 11.2469ZM17.6847 11.2469C17.7254 11.2063 17.7576 11.1581 17.7796 11.105C17.8017 11.0519 17.813 10.9949 17.813 10.9374C17.813 10.8799 17.8017 10.823 17.7796 10.7699C17.7576 10.7168 17.7254 10.6686 17.6847 10.6279M17.6847 11.2469L17.6847 10.6279M17.6847 10.6279L12.0597 5.00295L17.6847 10.6279ZM17.6847 10.6279L17.6847 10.6279L17.6847 10.6279M17.6847 10.6279L17.6847 10.6279"
                                fill="#D61919" stroke="#D61919" stroke-width="0.25" />
                        </svg>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($block['url']['url']); ?>" class="bradcrumb">
                        <?php echo esc_html($block['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

        </div>



        <?php
    }

}






