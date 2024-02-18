<?php
class widget_button_1 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'widget_button_1';
	}

	public function get_style_depends()
	{
		return ['widget_ctm_style'];
	}
	public function get_title() {
		return 'Attractive button #1';
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'clarotm-category' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_button',
			[
				'label' => esc_html__( 'Title Button', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'text Button...', 'textdomain' ),
			]
		);
		$this->add_control(
			'link_button',
			[
				'label' => esc_html__( 'link Button', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options'=>['url','is_external','nofollow'],
				'default' => [
					'url'=> '',
					'is_external'=>false,
					'nofollow'=> false,
				],
				'lable_block'=>true,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-1-text-color' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'background',
			[
				'label' => esc_html__( 'background', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .button-1-background' => 'background: linear-gradient(90deg, #0000 33%, #fff5, #0000 67%) var(--_p,100%)/300% no-repeat,{{VALUE}}',
				],
			]
		);
		$this->add_control(
			'font_family',
			[
				'label' => esc_html__( 'Font Family', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .button-1-text-ff' => 'font-family: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings= $this->get_settings_for_display();
		?>
<!-- Base -->
<a class="btn1 button-1-background button-1-text-ff button-1-text-color" href="<?php echo $settings['link_button']['url']?>">
  <?php echo $settings['title_button']; ?>
</a>

		<?php
	}
}