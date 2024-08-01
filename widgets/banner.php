<?php


class Banner extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'banner';
	}

	public function get_title()
	{
		return esc_html__('Banner', 'elementor-addon');
	}

	public function get_icon()
	{
		return 'eicon-bullet-list';
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
				'label' => esc_html__('Elements', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'link',
			[
				'name' => 'link',
				'label' => esc_html__('URL', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '',
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
			.banner{
				width: 100%;
				padding: 25px;
				height: 75vh;
			}

			.banner img{
				width: 100%;
				height: 100%;
				object-fit: cover;
				border-radius: 25px;
			}
		</style>







		<a href="<?php echo esc_url($settings['link']['url']); ?>" class="banner">
			<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="">
		</a>





		<?php
	}

}






