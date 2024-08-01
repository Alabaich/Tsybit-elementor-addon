<?php


class Three_In_Row extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'Three In Row';
	}

	public function get_title()
	{
		return esc_html__('Three In Row', 'elementor-addon');
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
			'link1_title',
			[
				'label' => esc_html__('Link 1 Title', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Link 1', 'your-text-domain'),
			]
		);


		$this->add_control(
			'link1_image',
			[
				'label' => esc_html__('Link 1 Image', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);


		$this->add_control(
			'link1_url',
			[
				'label' => esc_html__('Link 1 URL', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://example.com/link1', 'your-text-domain'),
				'default' => [
					'url' => 'https://example.com/link1',
				],
			]
		);


		$this->add_control(
			'link2_title',
			[
				'label' => esc_html__('Link 2 Title', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Link 2', 'your-text-domain'),
			]
		);


		$this->add_control(
			'link2_image',
			[
				'label' => esc_html__('Link 2 Image', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);


		$this->add_control(
			'link2_url',
			[
				'label' => esc_html__('Link 2 URL', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://example.com/link2', 'your-text-domain'),
				'default' => [
					'url' => 'https://example.com/link2',
				],
			]
		);


		$this->add_control(
			'link3_title',
			[
				'label' => esc_html__('Link 3 Title', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Link 3', 'your-text-domain'),
			]
		);


		$this->add_control(
			'link3_image',
			[
				'label' => esc_html__('Link 3 Image', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);


		$this->add_control(
			'link3_url',
			[
				'label' => esc_html__('Link 3 URL', 'your-text-domain'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://example.com/link3', 'your-text-domain'),
				'default' => [
					'url' => 'https://example.com/link3',
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
			.blocksThreeInRowCustom {
				display: flex;
				justify-content: space-between;
				gap: 25px;
				width: 100%;
			}

			@media screen and (max-width:600px) {
				.homePageFirstViewContainer {
					padding-bottom: 0;
				}

				.heroSectionColumn {
					height: auto;
				}

				.heroSectionColumn h2 {
					font-size: 32px;
				}

				.blocksThreeInRow {
					gap: 15px;
				}

				.blocksThreeInRow,
				.blocksThreeInRowCustom {
					display: grid;
					grid-template-columns: repeat(3, 1fr);
					align-items: start;
					position: relative;
					bottom: 0;
				}



				.blocksThreeInRow .oneBlock,
				.blocksThreeInRowCustom .oneBlock {
					box-shadow: none;
					display: flex;
					justify-content: center;
					align-items: center;
					flex-direction: column;
					text-align: center;
					border-radius: 0;
					background: transparent;
				}

				.blocksThreeInRow .oneBlock img,
				.blocksThreeInRowCustom .oneBlock img {
					border-radius: 15px;
					height: 100px;
					width: 100%;
					object-fit: cover;

				}
			}

			
.blocksThreeInRow {
  display: flex; 
  justify-content: space-between;
  gap: 25px;
  width: 100%;
  position: absolute;
  bottom: -50px;
}

.oneBlock {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: auto;
  background: var(--white);
  padding-bottom: 15px;
  gap: 10px;
  border-radius: 25px;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  transition: all linear 300ms;
}

.oneBlock:hover{
  box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5);
}

.oneBlock{
  color: #2c2d2c;
  text-decoration: none;
  width: 100%;
}

.oneBlock img{
  border-radius: 25px 25px 0px 0px;
  max-width: 100%;
  width: 100%;
  max-height: 250px;
  object-fit: cover;
}
		</style>
		<div class="blocksThreeInRowCustom pageWidth">
			<!-- Link 1 -->
			<a class="oneBlock" href="<?php echo esc_url($settings['link1_url']['url']); ?>">
				<img src="<?php echo esc_url($settings['link1_image']['url']); ?>"
					alt="<?php echo esc_attr($settings['link1_title']); ?>" />
				<?php echo esc_html($settings['link1_title']); ?>
			</a>

			<!-- Link 2 -->
			<a class="oneBlock" href="<?php echo esc_url($settings['link2_url']['url']); ?>">
				<img src="<?php echo esc_url($settings['link2_image']['url']); ?>"
					alt="<?php echo esc_attr($settings['link2_title']); ?>" />
				<?php echo esc_html($settings['link2_title']); ?>
			</a>

			<!-- Link 3 -->
			<a class="oneBlock" href="<?php echo esc_url($settings['link3_url']['url']); ?>">
				<img src="<?php echo esc_url($settings['link3_image']['url']); ?>"
					alt="<?php echo esc_attr($settings['link3_title']); ?>" />
				<p><?php echo esc_html($settings['link3_title']); ?></p>
			</a>
		</div>



		<?php
	}

}






