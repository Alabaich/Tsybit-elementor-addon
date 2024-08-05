<?php

class Form extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Form';
    }

    public function get_title()
    {
        return esc_html__('Form And Contacts', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
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

        </style>

        <div class="pageWidth formAndContactsContainer">
            <div class="formContainer">
                <?php echo do_shortcode('[wpforms id="150"]'); ?>
            </div>
            <div class="contactsContainer">
            <div class="buttons">
                <a href="<?php echo esc_html($settings['linkOne']['url']); ?> ↗" class="buttonOne"><?php echo $settings['linkOneText']; ?><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
  <path d="M9.81797 1.18198H3.45401M9.81797 1.18198V7.54594M9.81797 1.18198L4.2495 6.75045M1.33269 9.66726L2.65851 8.34144" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
                <a href="<?php echo esc_html($settings['linkTwo']['url']); ?> ↗" class="buttonTwo"><?php echo $settings['linkTwoText']; ?><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
  <path d="M9.66733 1.18198H3.30337M9.66733 1.18198V7.54594M9.66733 1.18198L4.09887 6.75045M1.18205 9.66726L2.50788 8.34144" stroke="#808080" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
            </div>
            <p class="bigText"><b></b></p>
            <p class="description"></p>
            <a href="" class="contactInfo"></a>
            <a href="" class="contactInfo"></a>
            <ul><li><a href="" class="socLink"></a></li>
            <li><a href="" class="socLink"></a></li></ul>
            <p class="commentBottom"></p>
            </div>


        </div>

<?php
    }
}
