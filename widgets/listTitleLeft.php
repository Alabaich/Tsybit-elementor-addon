<?php


class List_Title_Left extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'listTitleLeft';
	}

	public function get_title()
	{
		return esc_html__('List Title Left', 'elementor-addon');
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
						'name' => 'text',
						'label' => esc_html__('Title', 'your-text-domain'),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__('Block text', 'your-text-domain'),
					]

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
			.blockWithInfo p {
				text-align: left;
				width: 800px;
				color: #2c2d2c;
				font-weight: 400;
			}

			.blockWithInfo {
				display: flex;
				justify-content: space-between;
				padding: 50px 150px;
				gap: 50px;
			}

			.blockWithInfo h1 {
				border-top: 2px #2c2d2c solid;
				color: #2c2d2c;
				padding-top: 20px;
			}

			
			@media screen and (max-width: 650px) {
				.blockWithInfo p {
				text-align: center;
				width: 100%;
			}

			.blockWithInfo {
				display: flex;
				justify-content: center;
				align-items: center;
				gap: 25px;
				flex-direction: column;
				padding: 15px;
				padding-bottom: 50px;
			}

			.blockWithInfo h1 {
				width: 100%;
				text-align: center;
			}
                }
		</style>





		<?php foreach ($settings['blocks'] as $block): ?>
			<div class="blockWithInfo pageWidth">
				<h1>
					<?php echo esc_attr($block['title']); ?>
				</h1>
				<p class="bodyLarge">
					<?php echo esc_attr($block['text']); ?>
				</p>
			</div>
		<?php endforeach; ?>

		<?php
	}

}






