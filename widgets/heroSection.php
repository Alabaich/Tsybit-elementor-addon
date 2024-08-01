<?php


class Hero_Section extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'heroSection';
	}

	public function get_title()
	{
		return esc_html__('Text with Image', 'elementor-addon');
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
			'title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Title', 'elementor-addon'),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Subtitle', 'elementor-addon'),
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__('Text', 'elementor-addon'),
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
			'leftRight',
			[
				'label' => esc_html__('Image Position', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Left', 'elementor-addon'),
				'label_off' => esc_html__('Right', 'elementor-addon'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Button', 'elementor-addon'),
			]
		);

		// URL Control for Button Link
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__('Button Link', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://example.com', 'elementor-addon'),
				'default' => [
					'url' => 'https://example.com',
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label' => esc_html__('Link Text', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Link', 'elementor-addon'),
			]
		);

		// URL Control for Link
		$this->add_control(
			'link_url',
			[
				'label' => esc_html__('Link URL', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://example.com', 'elementor-addon'),
				'default' => [
					'url' => 'https://example.com',
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
			.heroSectionTwo {
				display: flex;
			}

			.rightImage .leftImageInner {
				display: none;
			}

			.leftImage .rightImageInner {
				display: none;
			}

			.heroSectionTwo.rightImage .heroText {
				display: flex;
				padding: 25px;
				flex-direction: column;
				justify-content: center;
				align-items: flex-start;
				gap: 25px;
				align-self: stretch;
				width: 48%;
				min-width: 48%;
				max-width: 48%;
			}

			.heroSectionTwo img {
				width: 48%;
				height: 600px;
				object-fit: cover;
				border-radius: 25px;
			}

			.heroSectionTwo.leftImage .heroText {
				display: flex;
				padding: 25px;
				flex-direction: column;
				justify-content: center;
				align-items: flex-start;
				gap: 25px;
				align-self: stretch;
				width: 48%;
				min-width: 48%;
				max-width: 48%;
			}

			.heroSectionTwo .link{
				color: var(--red);
				font-weight: 300;
				text-decoration: underline;
			}

			@media screen and (max-width: 600px) {
				.heroSectionTwo {
					flex-direction: column;
					gap: 10px;
				}

				.heroSectionTwo .heroText,
				.heroSectionTwo.rightImage .heroText,
				.heroSectionTwo.leftImage .heroText {
					width: 100%;
					max-width: 100%;
					gap: 10px;
					padding: 0;
					padding-bottom: 25px;
				}

				.heroSectionTwo img,
				.heroSectionTwo.rightImage img,
				.heroSectionTwo.leftImage img {
					width: 100%;
					height: 350px;
				}

				.heroSectionTwo .leftImageInner {
					display: block;
				}

				.heroSectionTwo .rightImageInner {
					display: none;
				}
			}
		</style>
		<div class="heroSectionTwo 
		<?php if ($settings['leftRight'] === 'yes'): ?>
			leftImage
		<?php else: ?>
			rightImage
		<?php endif; ?>
		 pageWidth">
			<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="heroImage leftImageInner" />
			<div class="heroText">
				<h1>
					<?php echo $settings['title']; ?>
				</h1>
				<h4>
					<?php echo $settings['subtitle']; ?>
				</h4>
				<div class="p">
					<?php echo $settings['text']; ?>
				</div>

				<?php if (!empty($settings['button_text']) && !empty($settings['button_link']['url'])): ?>
					<!-- Display button if both button text and button link are provided -->
					<a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="buttonHeroSection buttonRed">
						<?php echo esc_html($settings['button_text']); ?>
					</a>
				<?php endif; ?>

				<?php if (!empty($settings['link_text']) && !empty($settings['link_url']['url'])): ?>
					<!-- Display link if both link text and link URL are provided -->
					<a href="<?php echo esc_url($settings['link_url']['url']); ?>" class="link">
						<?php echo esc_html($settings['link_text']); ?>
					</a>
				<?php endif; ?>
			</div>
			<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="heroImage rightImageInner" />
		</div>
		<?php
	}

}






