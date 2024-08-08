<?php

class portfolio1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'portfolio1';
    }

    public function get_title()
    {
        return esc_html__('Portfolio', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-site-logo';
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

        $this->add_control(
            'portfolio',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'number',
                        'label' => esc_html__('Choose number 1-4', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'default' => 4,
                        'min' => 1,
                        'max' => 4,
                        'step' => 1,
                    ],
                    [
                        'name' => 'logo',
                        'label' => esc_html__('Choose Logo', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__( 'Description', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                    ],
                    [
                        'name' => 'time',
                        'label' => esc_html__( 'How long its take', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'date',
                        'label' => esc_html__( 'Date', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'badge1',
                        'label' => esc_html__( 'Show Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'textdomain' ),
                        'label_off' => esc_html__( 'Hide', 'textdomain' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ],
                    [
                        'name' => 'badge2',
                        'label' => esc_html__( 'Date', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'badge2Color',
                        'label' => esc_html__('Badge2 Background Color', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .badge2' => 'background: {{VALUE}};',
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
            .portfolioContainer {
                position: relative;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                width: 100%;
                grid-column-gap: 25px;
                grid-row-gap: 25px;
            }

            .portfolioContainer .logo{
                width: 100%;
                max-height: 50px;
                object-fit: contain;
            }

            .portfolioContainer .oneProject{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 600px;
                position: relative;
                border-radius: 35px;box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.25);
            }

            .portfolioContainer .badge1 {
                position: absolute;
                display: flex;
                justify-content: center;
                background-color: #2c2d2c;
                border-radius: 0px 0px 10px 10px;
                color: #fff;
                padding: 30px 10px;
                box-shadow: 0px 4px 5px #2c2d2c;
                top: 0px;
                right: 40px;
                max-width: 100px;
                text-align: center;
            }

            .portfolioContainer .descriptionContainer{
                display: flex;
padding: 25px;
flex-direction: column;
justify-content: center;
align-items: flex-start;
gap: 25px;
border-radius: 20px;
background: rgba(255, 255, 255, 0.75);
backdrop-filter: blur(2.5594329833984375px);
            }

            .portfolioContainer .badge2{
                display: flex;
                max-width: 140px;
padding: 25px 12px;
flex-direction: column;
justify-content: center;
align-items: center;
position: absolute;
right: 155px;
top: 0;
border-radius: 0px 0px 6.399px 6.399px;
box-shadow: 0px 5.119px 5.119px 0px rgba(0, 0, 0, 0.25);
text-align: center;
            }

            @media screen and (max-width: 600px) {
                .portfolioContainer .oneProject{
                    grid-column: span 1;
                }

                .portfolioContainer{
                    grid-template-columns: repeat(1, 1fr);
                }
            }

            .portfolioContainer .timeAndDate{
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
            }
            @media screen and (max-width: 600px) {
                .portfolioContainer .oneProject{
                    grid-column: span 4 !important;
                }
            }
        </style>

        <div class="portfolioContainer pageWidth">
            <?php foreach ($settings['portfolio'] as $item) : ?>
                <div style="grid-column: span <?php echo esc_attr($item['number']); ?>; background-image: url('<?php echo esc_url($item['image']['url']); ?>'); background-size: cover; background-position: center center;" class="oneProject">
                <?php if ( 'yes' === $item['badge1'] ) : ?>
                    <div class="badge1">Award Winner 2024</div>
                <?php endif; ?>
                <?php if (!empty($item['badge2'])) : ?>
                    <div class="badge2" style="background-color: <?php echo esc_attr($item['badge2Color']); ?>;">
                        <?php echo esc_html($item['badge2']); ?> 
                    </div>
                <?php endif; ?>
                    <div class="descriptionContainer">
                        <img src="<?php echo esc_url($item['logo']['url']); ?>" alt="" class="logo">
                        <div class="regularText">
                            <?php echo $item['description']; ?> 
                        </div>
                        <div class="timeAndDate">
                            <div class="time">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
  <path d="M7.41333 1.77295C6.31008 1.77295 5.23161 2.1001 4.31429 2.71303C3.39697 3.32596 2.68201 4.19715 2.25982 5.21642C1.83762 6.23569 1.72716 7.35726 1.94239 8.43931C2.15762 9.52136 2.68889 10.5153 3.469 11.2954C4.24912 12.0755 5.24304 12.6068 6.32509 12.822C7.40714 13.0373 8.52872 12.9268 9.54799 12.5046C10.5673 12.0824 11.4384 11.3674 12.0514 10.4501C12.6643 9.5328 12.9915 8.45432 12.9915 7.35107C12.9897 5.8722 12.4015 4.45439 11.3557 3.40866C10.31 2.36294 8.89221 1.77469 7.41333 1.77295ZM7.41333 12.2729C6.43988 12.2729 5.48828 11.9843 4.67889 11.4435C3.86949 10.9026 3.23864 10.1339 2.86611 9.23459C2.49359 8.33524 2.39612 7.34561 2.58603 6.39086C2.77594 5.43611 3.2447 4.55912 3.93304 3.87078C4.62138 3.18245 5.49837 2.71368 6.45312 2.52377C7.40787 2.33386 8.3975 2.43133 9.29685 2.80385C10.1962 3.17638 10.9649 3.80723 11.5057 4.61663C12.0465 5.42603 12.3352 6.37762 12.3352 7.35107C12.3338 8.65599 11.8147 9.90705 10.892 10.8298C9.96931 11.7525 8.71825 12.2715 7.41333 12.2729ZM10.804 7.35107C10.804 7.4381 10.7694 7.52156 10.7079 7.58309C10.6463 7.64463 10.5629 7.6792 10.4758 7.6792H7.41333C7.32631 7.6792 7.24285 7.64463 7.18131 7.58309C7.11978 7.52156 7.08521 7.4381 7.08521 7.35107V4.28857C7.08521 4.20155 7.11978 4.11809 7.18131 4.05655C7.24285 3.99502 7.32631 3.96045 7.41333 3.96045C7.50036 3.96045 7.58382 3.99502 7.64535 4.05655C7.70689 4.11809 7.74146 4.20155 7.74146 4.28857V7.02295H10.4758C10.5629 7.02295 10.6463 7.05752 10.7079 7.11905C10.7694 7.18059 10.804 7.26405 10.804 7.35107Z" fill="black"/>
</svg><?php echo $item['time']; ?> 
                            </div>
                            <div class="date">
                            <?php echo $item['date']; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}
