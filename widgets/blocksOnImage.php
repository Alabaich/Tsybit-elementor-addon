<?php


class Blocks_On_Image extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'blocksOnImage';
	}

	public function get_title()
	{
		return esc_html__('Blocks On Image', 'elementor-addon');
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
			'title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
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
			      .typesOfCleaningServices .titles{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 25px;
        padding: 25px;
      }
			.typesOfCleaningServices {
				background-image: url(./media/Group\ 109.png);
				background-size: cover;
				background-repeat: no-repeat;
			}

			.typesOfInner {
				padding: 25px;
				display: grid;
				grid-template-columns: repeat(3, 1fr);
				grid-column-gap: 25px;
				grid-row-gap: 25px;
				width: 100%;
			}

			.homepageCleaningType {
				display: flex;
				justify-content: start;
				align-items: start;
				flex-direction: column;
				gap: 15px;
				background: #fff;
				padding: 25px;
				box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
				width: 100%;
				transition: all linear 300ms;
				border-radius: 5px;
			}

			.homepageCleaningType:hover {
				box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.25);
				cursor: pointer;
			}

			.homePageCleaningType h4 {
				font-size: 1.5rem;
				font-weight: 700;
			}

			@media screen and (max-width: 650px) {
				.typesOfInner{
					grid-template-columns: repeat(1, 1fr);
					grid-column-gap: 15px;
				grid-row-gap: 15px;
				}
			}
		</style>











		<div class="typesOfCleaningServices pageWidth" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);">
			<div class="titles">
				<h2>
					<?php echo $settings['title']; ?>
				</h2>
				<p>
					<?php echo $settings['subtitle']; ?>
				</p>
			</div>
			<div class="typesOfInner ">
				<?php
				$step = 1; // Initialize step counter before the loop
				foreach ($settings['blocks'] as $block): ?>
					<div class="homepageCleaningType">
						<p>Step
							<?php echo $step++; ?>
						</p>
						<h4>
							<?php echo esc_attr($block['title']); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="27" height="22" viewBox="0 0 27 22" fill="none">
								<path
									d="M14.8694 19.813L14.8693 19.8131C14.6733 20.0094 14.5632 20.2755 14.5632 20.5529C14.5632 20.8303 14.6733 21.0964 14.8693 21.2927L14.8696 21.2929C15.0658 21.4889 15.3319 21.5991 15.6093 21.5991C15.8868 21.5991 16.1528 21.4889 16.3491 21.2929L16.3492 21.2928L25.9117 11.7303L25.9119 11.7302C26.1079 11.5339 26.218 11.2678 26.218 10.9904C26.218 10.713 26.1079 10.4469 25.9119 10.2506L25.9117 10.2505L16.3492 0.687974L16.3494 0.687864L16.3429 0.681848C16.1444 0.496928 15.882 0.396256 15.6108 0.401042C15.3395 0.405827 15.0808 0.515695 14.889 0.707501C14.6972 0.899306 14.5873 1.15807 14.5825 1.42929C14.5777 1.7005 14.6784 1.96298 14.8633 2.16143L14.8632 2.16154L14.8694 2.16776L22.6439 9.9435L1.79684 9.9435C1.51919 9.9435 1.25292 10.0538 1.05659 10.2501C0.860263 10.4465 0.749969 10.7127 0.749969 10.9904C0.749969 11.268 0.860263 11.5343 1.05659 11.7306C1.25292 11.927 1.5192 12.0373 1.79684 12.0373L22.6439 12.0373L14.8694 19.813Z"
									fill="#010626" stroke="#010626" stroke-width="0.5" />
							</svg>
						</h4>
						<p>
							<?php echo esc_attr($block['text']); ?>
						</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>


		<?php
	}

}






