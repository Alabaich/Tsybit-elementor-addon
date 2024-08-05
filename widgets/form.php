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
            .formAndContactsContainer {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 25px;

            }

            .formAndContactsContainer .formContainer,
            .formAndContactsContainer .contactsContainer {
                display: flex;
                max-width: 50%;
                width: 48%;
            }

            .formAndContactsContainer .formContainer {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
                background: #fff;
                border-radius: 25px;
                padding: 25px;
            }

            .formAndContactsContainer .formContainer .wpforms-container{
                width: 100%;
                margin: 0;
            }

            .formAndContactsContainer .formContainer .wpforms-field-row,
            .formAndContactsContainer .formContainer .wpforms-field-medium{
                width: 100%;
                max-width: 100%;
            }

            

            .formAndContactsContainer .contactsContainer{
                justify-content: start;
                align-items: start;
                gap: 25px;
                flex-direction: column;
            }

            .formAndContactsContainer
        </style>

        <div class="pageWidth formAndContactsContainer">
            <div class="formContainer">
                <h2>Contact Form</h2>
                <?php echo do_shortcode('[wpforms id="150"]'); ?>
            </div>
            <div class="contactsContainer">
                <div class="buttons">
                    <a href="<?php echo esc_html($settings['linkOne']['url']); ?> ↗"
                        class="buttonOne"><?php echo $settings['linkOneText']; ?><svg xmlns="http://www.w3.org/2000/svg"
                            width="11" height="11" viewBox="0 0 11 11" fill="none">
                            <path
                                d="M9.81797 1.18198H3.45401M9.81797 1.18198V7.54594M9.81797 1.18198L4.2495 6.75045M1.33269 9.66726L2.65851 8.34144"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                    <a href="<?php echo esc_html($settings['linkTwo']['url']); ?> ↗"
                        class="buttonTwo"><?php echo $settings['linkTwoText']; ?><svg xmlns="http://www.w3.org/2000/svg"
                            width="11" height="11" viewBox="0 0 11 11" fill="none">
                            <path
                                d="M9.66733 1.18198H3.30337M9.66733 1.18198V7.54594M9.66733 1.18198L4.09887 6.75045M1.18205 9.66726L2.50788 8.34144"
                                stroke="#808080" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                </div>
                <p class="bigText"> <?php echo $settings['title']; ?></p>
                <p class="description"><?php echo $settings['regularText']; ?></p>
                <a href="tel:+16476739996" class="contactInfo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 20 20" fill="none">
                        <path
                            d="M19.1403 14.5444C18.9785 15.7741 18.3745 16.9029 17.4413 17.72C16.508 18.537 15.3092 18.9863 14.0689 18.9841C6.86284 18.9841 1.00001 13.1213 1.00001 5.91536C0.997785 4.675 1.44715 3.47625 2.26418 2.54298C3.08121 1.60972 4.21002 1.00578 5.43979 0.843959C5.75077 0.805988 6.06569 0.869608 6.33754 1.02532C6.60938 1.18104 6.82358 1.4205 6.94815 1.70795L8.86492 5.98706V5.99795C8.96029 6.21799 8.99968 6.45823 8.97957 6.6972C8.95946 6.93617 8.88047 7.16644 8.74966 7.36745C8.73332 7.39195 8.71608 7.41464 8.69793 7.43733L6.80839 9.67717C7.48815 11.0585 8.93299 12.4906 10.3324 13.1722L12.5414 11.2926C12.5631 11.2744 12.5858 11.2574 12.6095 11.2418C12.8103 11.1078 13.0414 11.0261 13.2818 11.0039C13.5222 10.9817 13.7643 11.0198 13.9863 11.1147L13.9981 11.1202L18.2736 13.036C18.5616 13.1602 18.8016 13.3742 18.9578 13.646C19.1141 13.9179 19.1781 14.2331 19.1403 14.5444Z"
                            stroke="#2C2D2C" />
                    </svg> + 1 (647) 673 996</a>
                <a href="mailto:enjoyable.design@gmail.com" class="contactInfo"><svg xmlns="http://www.w3.org/2000/svg"
                        width="32" height="33" viewBox="0 0 32 33" fill="none">
                        <path
                            d="M29 9.90869V23.9087C29 24.4391 28.7893 24.9478 28.4142 25.3229C28.0391 25.698 27.5304 25.9087 27 25.9087H5C4.46957 25.9087 3.96086 25.698 3.58579 25.3229C3.21071 24.9478 3 24.4391 3 23.9087V9.90869M29 9.90869C29 9.37826 28.7893 8.86955 28.4142 8.49448C28.0391 8.11941 27.5304 7.90869 27 7.90869H5C4.46957 7.90869 3.96086 8.11941 3.58579 8.49448C3.21071 8.86955 3 9.37826 3 9.90869M29 9.90869L17.138 18.1207C16.8036 18.3521 16.4066 18.476 16 18.476C15.5934 18.476 15.1964 18.3521 14.862 18.1207L3 9.90869"
                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> enjoyable.design@gmail.com</a>
                <ul>
                    <li><a href="www.facebook.com" class="socLink"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                                height="33" viewBox="0 0 32 33" fill="none">
                                <path
                                    d="M28.5549 16.4842C28.5549 9.31947 22.7401 3.50464 15.5754 3.50464C8.41066 3.50464 2.59583 9.31947 2.59583 16.4842C2.59583 22.7663 7.06078 27.997 12.9795 29.2041V20.378H10.3835V16.4842H12.9795V13.2393C12.9795 10.7342 15.0172 8.69645 17.5223 8.69645H20.7672V12.5903H18.1713C17.4574 12.5903 16.8733 13.1744 16.8733 13.8883V16.4842H20.7672V20.378H16.8733V29.3988C23.428 28.7498 28.5549 23.2205 28.5549 16.4842Z"
                                    fill="#2C2D2C" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="www.instagram.com" class="socLink">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path
                                    d="M17.8162 16.7994C17.8083 17.2106 17.6786 17.6102 17.4434 17.9475C17.2082 18.2849 16.8781 18.5448 16.495 18.6944C16.112 18.8439 15.6931 18.8764 15.2915 18.7876C14.89 18.6988 14.5238 18.4928 14.2395 18.1957C13.9551 17.8986 13.7654 17.5238 13.6943 17.1187C13.6233 16.7137 13.6741 16.2966 13.8403 15.9205C14.0065 15.5443 14.2806 15.226 14.628 15.0058C14.9753 14.7856 15.3802 14.6735 15.7914 14.6837C16.3377 14.704 16.8546 14.9362 17.2326 15.3311C17.6106 15.7261 17.8199 16.2527 17.8162 16.7994Z"
                                    fill="#2C2D2C" />
                                <path
                                    d="M19.3127 10.2969H12.2713C11.5746 10.2969 10.9064 10.5737 10.4137 11.0663C9.92107 11.559 9.64429 12.2272 9.64429 12.9239V20.1237C9.64429 20.4687 9.71224 20.8103 9.84426 21.129C9.97628 21.4477 10.1698 21.7373 10.4137 21.9813C10.6577 22.2252 10.9473 22.4187 11.266 22.5508C11.5847 22.6828 11.9264 22.7507 12.2713 22.7507H19.3127C19.6577 22.7507 19.9993 22.6828 20.3181 22.5508C20.6368 22.4187 20.9264 22.2252 21.1704 21.9813C21.4143 21.7373 21.6078 21.4477 21.7398 21.129C21.8718 20.8103 21.9398 20.4687 21.9398 20.1237V12.9369C21.9412 12.5909 21.8742 12.2481 21.7429 11.928C21.6115 11.6079 21.4182 11.3169 21.1742 11.0717C20.9301 10.8264 20.6401 10.6317 20.3207 10.4988C20.0012 10.3658 19.6587 10.2972 19.3127 10.2969ZM15.7914 20.321C15.0943 20.3367 14.4084 20.1444 13.8212 19.7686C13.2339 19.3928 12.7719 18.8505 12.4942 18.211C12.2165 17.5714 12.1356 16.8637 12.2619 16.178C12.3882 15.4923 12.7159 14.8598 13.2033 14.3612C13.6906 13.8626 14.3155 13.5205 14.9981 13.3786C15.6808 13.2367 16.3902 13.3014 17.0359 13.5644C17.6816 13.8275 18.2343 14.2769 18.6234 14.8555C19.0125 15.434 19.2204 16.1154 19.2206 16.8126C19.2259 17.2682 19.1414 17.7203 18.9719 18.1432C18.8024 18.5661 18.5513 18.9514 18.2329 19.2772C17.9144 19.6031 17.5349 19.8629 17.116 20.042C16.697 20.2211 16.247 20.3159 15.7914 20.321ZM19.6022 13.3055C19.5165 13.3055 19.4317 13.2885 19.3528 13.2553C19.2738 13.2222 19.2023 13.1736 19.1423 13.1124C19.0824 13.0512 19.0352 12.9787 19.0036 12.8991C18.972 12.8195 18.9567 12.7344 18.9584 12.6488C18.9584 12.4746 19.0276 12.3075 19.1508 12.1844C19.2739 12.0612 19.441 11.992 19.6152 11.992C19.7893 11.992 19.9564 12.0612 20.0796 12.1844C20.2027 12.3075 20.2719 12.4746 20.2719 12.6488C20.2745 12.7415 20.257 12.8337 20.2207 12.919C20.1843 13.0043 20.1299 13.0808 20.0613 13.1432C19.9926 13.2056 19.9113 13.2523 19.8229 13.2804C19.7345 13.3084 19.641 13.317 19.549 13.3055H19.6022Z"
                                    fill="#2C2D2C" />
                                <path
                                    d="M15.7914 3.50456C12.349 3.48735 9.0408 4.83832 6.5945 7.26028C4.14819 9.68225 2.7642 12.9768 2.74699 16.4192C2.72978 19.8616 4.08075 23.1698 6.50272 25.6161C8.92468 28.0624 12.2192 29.4464 15.6616 29.4636C17.3661 29.4721 19.0556 29.1449 20.6336 28.5005C22.2116 27.856 23.6473 26.9071 24.8586 25.7079C26.0698 24.5087 27.0331 23.0826 27.6932 21.5111C28.3534 19.9396 28.6975 18.2535 28.7061 16.549C28.7146 14.8445 28.3873 13.155 27.7429 11.577C27.0985 9.99898 26.1496 8.56335 24.9503 7.35206C23.7511 6.14078 22.325 5.17756 20.7535 4.5174C19.182 3.85724 17.4959 3.51308 15.7914 3.50456ZM23.6739 19.9912C23.6775 20.5735 23.5655 21.1507 23.3444 21.6894C23.1232 22.2281 22.7974 22.7175 22.3857 23.1294C21.974 23.5412 21.4846 23.8672 20.946 24.0885C20.4074 24.3098 19.8302 24.4219 19.2479 24.4185H12.3376C11.7554 24.4218 11.1783 24.3095 10.6397 24.0883C10.1012 23.867 9.6119 23.5411 9.20015 23.1295C8.7884 22.7179 8.46238 22.2287 8.24097 21.6902C8.01956 21.1517 7.90715 20.5747 7.91025 19.9925V13.0809C7.90663 12.4986 8.01863 11.9213 8.23976 11.3826C8.4609 10.8439 8.78676 10.3545 9.19845 9.94267C9.61015 9.53085 10.0995 9.20484 10.6381 8.98355C11.1768 8.76226 11.754 8.65009 12.3363 8.65354H19.2479C19.8301 8.65009 20.4072 8.76222 20.9457 8.98343C21.4842 9.20464 21.9735 9.53053 22.3852 9.94221C22.7969 10.3539 23.1228 10.8432 23.344 11.3817C23.5652 11.9203 23.6773 12.4974 23.6739 13.0796V19.9912Z"
                                    fill="#2C2D2C" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <p class="commentBottom">We respect your privacy. Your information will not be shared with any third parties.
                </p>
            </div>


        </div>

        <?php
    }
}
