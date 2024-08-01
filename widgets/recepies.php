<?php
class Recipes_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'recipes_Widget';
    }

    public function get_title()
    {
        return esc_html__('Recepies Widget', 'elementor-addon');
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
        return ['recepies', 'slider'];
    }
    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // Add controls for customizing the widget
        $this->add_control(
            'posts_count',
            [
                'label' => __('Number of Posts', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10, // Default number of posts to display
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $posts_count = $settings['posts_count'];

        // Query latest posts from the 'recipe' post type
        $query_args = array(
            'post_type' => 'recipe',
            'posts_per_page' => $posts_count,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $recipes_query = new WP_Query($query_args);

        // Check if there are posts
        if ($recipes_query->have_posts()) {
            ?>
            <style>
                
.recipesSection{
  display: flex;
  justify-content: start;
  align-items: start;
  flex-direction: column;
  gap: 25px;
}

.recipesSection, .recipesSection .splide__track{
  overflow: visible;
}

.recipesSection section.splide{
  width: 100%;
  max-width: 100%;
}

.recipesSection .splide .splide__pagination{
  display: none;
}

.recipesSection .splide__arrow svg{
  fill: #fff;
}

.recipesSection .splide__arrow{
  height: 3.5em;
  width: 3.5em;
  padding: 10px;
  background: rgba(0, 0, 0, 0.5);
}

.recipesSection h3 {
  color: var(--Black, #2c2d2c);
  width: 100%;
}

.recipesBlock {
  display: flex;
  gap: 20px;
}

.recipesOneBlock {
  height: 425px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  position: relative;
  width: 390px;
  display: flex;
  justify-content: end;
  align-items: start;
  flex-direction: column;
  gap: 10px;
  overflow: hidden;
  border-radius: 25px;
}

.textRecipes{
  display: flex;
  justify-content: start;
  align-items: start;
  flex-direction: column;
  gap: 10px;
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(238, 130, 238, 0) 100%) ;
  padding: 15px;
}

.recipesOneBlock h3 {
  color: var(--white);

}

.recipesOneBlock p {
  color: var(--white);

}

.recipesOneBlock .textInARow {
  display: flex;
  justify-content: start;
  align-items: center;
  gap: 10px;
  
}

.recipesOneBlock .oneBlockRecepie{
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
}

.recipesSection .buttonContainer{
  display: flex;justify-content: center;
  align-items: center;
  width: 100%;
}


@media screen and (max-width: 650px) {
  .recipesSection{
    gap: 10px;
    padding-top: 25px;
    padding-bottom: 25px;
  }
}

            </style>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
            <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css">
            <div class="recipesSection pageWidth">
                <h3>OUR RECEPIES:</h3>

                <section class="splide" aria-label="Splide Basic HTML Example" id="recepies">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php while ($recipes_query->have_posts()):
                                $recipes_query->the_post(); 
                                ?>

                                <li class="splide__slide">
                                    <a href="<?php the_permalink(); ?>" class="recipesOneBlock"
                                        style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
                                        <div class="textRecipes">
                                            <h3>
                                                <?php the_title(); ?>
                                            </h3>
                                            <div class="textInARow">
                                                <div class="oneBlockRecepie">
                                                    <svg width="26" height="25" viewBox="0 0 26 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="ph:clock-thin">
                                                            <path id="Vector"
                                                                d="M13 2.73438C11.0685 2.73437 9.18046 3.30712 7.57451 4.38018C5.96857 5.45324 4.71688 6.97842 3.97774 8.76286C3.23861 10.5473 3.04521 12.5108 3.42202 14.4052C3.79883 16.2995 4.72892 18.0396 6.09466 19.4053C7.46041 20.7711 9.20048 21.7012 11.0948 22.078C12.9892 22.4548 14.9527 22.2614 16.7371 21.5223C18.5216 20.7831 20.0468 19.5314 21.1198 17.9255C22.1929 16.3195 22.7656 14.4315 22.7656 12.5C22.7628 9.91087 21.733 7.42859 19.9022 5.5978C18.0714 3.76701 15.5891 2.73722 13 2.73438ZM13 21.4844C11.2231 21.4844 9.48603 20.9575 8.00855 19.9702C6.53108 18.983 5.37953 17.5799 4.69952 15.9382C4.01952 14.2965 3.8416 12.49 4.18826 10.7472C4.53493 9.00444 5.3906 7.40357 6.64709 6.14709C7.90358 4.8906 9.50444 4.03492 11.2472 3.68826C12.99 3.34159 14.7965 3.51951 16.4382 4.19952C18.0799 4.87953 19.483 6.03108 20.4702 7.50855C21.4575 8.98602 21.9844 10.7231 21.9844 12.5C21.9818 14.882 21.0344 17.1657 19.3501 18.8501C17.6657 20.5344 15.382 21.4818 13 21.4844ZM18.8594 12.5C18.8594 12.6036 18.8182 12.703 18.745 12.7762C18.6717 12.8495 18.5724 12.8906 18.4688 12.8906H13C12.8964 12.8906 12.797 12.8495 12.7238 12.7762C12.6505 12.703 12.6094 12.6036 12.6094 12.5V7.03125C12.6094 6.92765 12.6505 6.82829 12.7238 6.75504C12.797 6.68178 12.8964 6.64062 13 6.64062C13.1036 6.64062 13.203 6.68178 13.2762 6.75504C13.3495 6.82829 13.3906 6.92765 13.3906 7.03125V12.1094H18.4688C18.5724 12.1094 18.6717 12.1505 18.745 12.2238C18.8182 12.297 18.8594 12.3964 18.8594 12.5Z"
                                                                fill="white" />
                                                        </g>
                                                    </svg>
                                                    <p>
                                                        <?php echo get_field('cooking_time'); ?> min
                                                    </p>
                                                </div>
                                                <div class="oneBlockRecepie">
                                                    <svg width="16" height="21" viewBox="0 0 16 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2118 7.52778C11.2118 6.38769 12.7295 6.08501 13.1316 7.15303C14.106 9.73301 14.8151 12.0449 14.8151 13.2931C14.8151 15.2044 14.0558 17.0374 12.7043 18.3889C11.3528 19.7404 9.5198 20.4997 7.60848 20.4997C5.69717 20.4997 3.86413 19.7404 2.51263 18.3889C1.16112 17.0374 0.401855 15.2044 0.401855 13.2931C0.401855 11.9527 1.22053 9.38565 2.30729 6.57218C3.71258 2.92851 4.41595 1.10667 5.28507 1.00866C5.5618 0.976954 5.86592 1.03317 6.11383 1.16289C6.88782 1.56646 6.88782 3.55404 6.88782 7.52778C6.88782 8.10118 7.1156 8.65109 7.52105 9.05654C7.9265 9.46199 8.47642 9.68977 9.04981 9.68977C9.62321 9.68977 10.1731 9.46199 10.5786 9.05654C10.984 8.65109 11.2118 8.10118 11.2118 7.52778Z"
                                                            stroke="white" stroke-width="0.75" />
                                                    </svg>
                                                    <p>

                                                    <?php echo get_field('calories'); ?> kcal
                                                    </p>
                                                </div>
                                                <div class="oneBlockRecepie"> <svg width="24" height="15" viewBox="0 0 24 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M23.2947 7.3418C23.2615 7.26758 22.4627 5.49707 20.6746 3.70898C19.0183 2.05273 16.1697 0.078125 11.9998 0.078125C7.82984 0.078125 4.98121 2.05273 3.32496 3.70898C1.53687 5.49707 0.738044 7.26758 0.704841 7.3418C0.683096 7.39188 0.671875 7.44589 0.671875 7.50049C0.671875 7.55509 0.683096 7.6091 0.704841 7.65918C0.738044 7.73438 1.53687 9.50391 3.32496 11.292C4.98511 12.9521 7.83082 14.9219 11.9998 14.9219C16.1687 14.9219 19.0183 12.9482 20.6746 11.292C22.4627 9.50391 23.2615 7.73438 23.2947 7.65918C23.3164 7.6091 23.3277 7.55509 23.3277 7.50049C23.3277 7.44589 23.3164 7.39188 23.2947 7.3418ZM20.1013 10.7598C17.8484 13.0059 15.1209 14.1406 11.9959 14.1406C8.87086 14.1406 6.14722 13.0029 3.89039 10.7598C2.93012 9.8021 2.12254 8.70271 1.49586 7.5C2.12371 6.29701 2.93262 5.19761 3.89429 4.24023C6.15113 1.99707 8.87476 0.859375 11.9998 0.859375C15.1248 0.859375 17.8484 1.99707 20.1052 4.24023C21.0668 5.19771 21.8757 6.2971 22.5037 7.5C21.8758 8.70297 21.0669 9.80237 20.1052 10.7598H20.1013ZM11.9998 3.20312C11.1499 3.20312 10.3192 3.45513 9.61255 3.92728C8.90593 4.39943 8.35519 5.07051 8.02997 5.85566C7.70475 6.64081 7.61966 7.50477 7.78545 8.33828C7.95125 9.17179 8.36048 9.93742 8.96141 10.5384C9.56234 11.1393 10.328 11.5485 11.1615 11.7143C11.995 11.8801 12.859 11.795 13.6441 11.4698C14.4293 11.1446 15.1003 10.5938 15.5725 9.88722C16.0446 9.1806 16.2966 8.34984 16.2966 7.5C16.2953 6.36079 15.8422 5.26862 15.0367 4.46308C14.2311 3.65754 13.139 3.20442 11.9998 3.20312ZM11.9998 11.0156C11.3044 11.0156 10.6247 10.8094 10.0466 10.4231C9.46844 10.0368 9.01784 9.48777 8.75175 8.84537C8.48566 8.20297 8.41604 7.4961 8.55169 6.81414C8.68734 6.13217 9.02217 5.50575 9.51384 5.01408C10.0055 4.52241 10.6319 4.18758 11.3139 4.05193C11.9959 3.91628 12.7027 3.9859 13.3451 4.25199C13.9875 4.51807 14.5366 4.96868 14.9229 5.54682C15.3092 6.12497 15.5154 6.80468 15.5154 7.5C15.5154 8.4324 15.145 9.32661 14.4857 9.98592C13.8264 10.6452 12.9322 11.0156 11.9998 11.0156Z"
                                                            fill="white" />
                                                    </svg>
                                                    <p>

                                                    </p>
                                                    

                                                </div>
                                                
                                            </div>
                                            <p>
                                                <?php the_excerpt();?>

                                            </p>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile; ?>

                        </ul>
                    </div>
                </section>

                <div class="buttonContainer">
                    <a href="#" class="buttonRed">
                        More Recipes
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="19" viewBox="0 0 25 19" fill="none">
                            <path
                                d="M13.8596 0.506297C14.1811 0.182115 14.6171 0 15.0717 0C15.5262 0 15.9622 0.182115 16.2837 0.506297L23.9981 8.28787C24.3195 8.61215 24.5 9.05191 24.5 9.51044C24.5 9.96897 24.3195 10.4087 23.9981 10.733L16.2837 18.5146C15.9603 18.8296 15.5273 19.0039 15.0778 18.9999C14.6283 18.996 14.1984 18.8141 13.8805 18.4935C13.5627 18.1729 13.3824 17.7392 13.3785 17.2858C13.3746 16.8324 13.5474 16.3956 13.8596 16.0694L18.5003 11.2397H2.21431C1.75965 11.2397 1.32361 11.0575 1.00211 10.7332C0.680615 10.4089 0.5 9.96906 0.5 9.51044C0.5 9.05182 0.680615 8.61198 1.00211 8.28768C1.32361 7.96339 1.75965 7.7812 2.21431 7.7812H18.5003L13.8596 2.95144C13.5382 2.62716 13.3577 2.1874 13.3577 1.72887C13.3577 1.27034 13.5382 0.830577 13.8596 0.506297Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>


            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    new Splide('#recepies', {
                        type: 'loop',
                        autoWidth: true,
                        focus: 0,
                        omitEnd: true,
                        gap: 25,
                    }).mount();
                });
            </script>
            <?php
            // Reset the global post object
            wp_reset_postdata();
        } else {
            echo esc_html__('No recipes found.', 'elementor-addon');
        }
    }
}
