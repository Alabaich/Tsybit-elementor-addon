<?php

class Services extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Services';
    }

    public function get_title()
    {
        return esc_html__('Customer Reviews', 'elementor-addon');
    }

    public function get_icon()
    {
        return '0xe849';
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
            'repeater_field',
            [
                'label' => esc_html__('Review', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'reviewText',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__('Link Two', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ],

                ],
            ]
        );

        $this->add_control(
            'direction',
            [
                'label' => esc_html__('Direction', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('RTL', 'elementor-addon'),
                'label_off' => esc_html__('LTR', 'elementor-addon'),
                'return_value' => 'rtl',
                'default' => 'ltr',
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
        $unique_id = uniqid('splide_');
        $direction = $settings['direction'] === 'rtl' ? 'rtl' : 'ltr';
?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css"
>
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js
"></script>


        <style>
            .servicesContainer{
                width: 100%;
                padding: 5px 0;
            }

            .servicesContainer .oneService{
                display: flex;
                color: #2C2D2C;
                text-align: left;
font-size: 16px;
font-style: normal;
font-weight: 200;
line-height: 138.696%; /* 22.191px */
width: auto;
padding: 10px 15px;
max-width: 600px;
justify-content: center;
align-items: center;
gap: 10px;
border-radius: 15px;
background: #FFF;
box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.25);
transition: all 300ms linear ;
            }

            .servicesContainer .oneService:hover{
box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.4);
            }
        </style>


        <div class="servicesContainer">
  <div id="<?php echo esc_attr($unique_id); ?>" class="splide firstBlockPartners">
    <div class="splide__track featuredProductsInner">
      <ul class="splide__list featuredProductsInnerList">
      <?php
                foreach ($settings['repeater_field'] as $item) :
                ?>
          <li class="splide__slide partnersSplide">
          <?php if (!empty($item['reviewText'])) : ?>
            <a href="<?php echo esc_html($item['link']['url']); ?>" class="oneService">
            <?php echo $item['reviewText']; ?> ↗
            </a>
                        <?php endif; ?>  
          </li>
          <?php
                endforeach;
                ?>
      </ul>
    </div>
  </div>
</div>


        <script>
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('#<?php echo esc_attr($unique_id); ?>', {
      type: 'loop',
      drag: 'free',
      focus: 'center',
      arrows: false,
      pagination: false,
      gap: 25,
      perPage: 4,
      direction: '<?php echo esc_js($direction); ?>',
      autoScroll: {
        speed: 1,
      },
      breakpoints: {
        640: {
          perPage: 2,
        },
      },
    }).mount(window.splide.Extensions);
  });
</script>

<?php
    }
}
