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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css"
>
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js
"></script>

        <style>
            .mainReviewContainer {
                display: flex;
                justify-content: center;
                text-align: center;
                align-items: center;
                flex-direction: column;
                gap: 25px;
            }

            .mainReviewContainer .reviewBlock {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 25px;
                width: 100%;
            }

            .mainReviewContainer .reviewBlock .review {
                background-color: #fff;
                justify-content: space-between;
                padding: 20px;
                border-radius: 25px;
                width: 400px;
            }

            .mainReviewContainer .reviewBlock .review .rowContainer {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 10px;
            }

            .mainReviewContainer .reviewBlock .review .rowContainer img {
                border-radius: 23px;
                height: 45px;
                width: 45px;
                object-fit: cover;
            }

            .reviewBlock .review .rowContainer .columnContainer {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            @media screen and (max-width: 600px) {
                .pageWidth .mainReviewContainer .richTextCentered h3 {
                    font-size: 13px;
                    font-weight: lighter
                }

                .mainReviewContainer .reviewBlock {
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                    text-align: left;
                }

                .mainReviewContainer .reviewBlock .review {
                    width: 100%;
                }
            }
        </style>

        <style>
            .servicesContainer{
                width: 100vw;
                padding: 25px 0;
            }

            .servicesContainer .oneService{
                display: flex;
width: auto;
padding: 20px 25px;
justify-content: center;
align-items: center;
gap: 10px;
border-radius: 15px;
background: #FFF;
box-shadow: 0px 0px 1px 0px rgba(0, 0, 0, 0.25);
            }
        </style>


        <div class="servicesContainer">
  <div id="partnersSplide" class="splide firstBlockPartners">
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
    new Splide('#partnersSplide', {
      type: 'loop',
      drag: 'free',
      focus: 'center',
      arrows: false,
      pagination: false,
      perPage: 7,
      gap: 25,
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
