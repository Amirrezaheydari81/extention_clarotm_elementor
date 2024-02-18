<?php

class widget_button_4 extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'widget_button_4';
    }

    public function get_title() {
		return 'Attractive button #4';
	}

    public function get_icon()
    {
        return 'eicon-button';

    }


    public function get_categories()
    {
        return [ 'clarotm-category' ];
    }

    protected function register_controls() {

		$this->start_controls_section(
			'button4_section',
			[
				'label' => esc_html__( 'Button', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_button_front',
			[
				'label' => esc_html__( 'Title front', 'textdomain' ),
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
			'text_color_front',
			[
				'label' => esc_html__( 'Text Color Front', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn4_text_color_front' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'text_color_front_hover',
			[
				'label' => esc_html__( 'Text Color hover', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn4_text_color_hover' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .btn4_ff' => 'font-family: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_btn',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .btn4_border',
				'fields_options' => [
					'border_color' => [
						'label' => __( 'Border Color', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
					],
				],
			]
		);

		$this->end_controls_section();


	}

    protected function render() {
		$settings = $this->get_settings_for_display();

		?>
<style>
	.btn4 {
    --bgbtn4: <?php echo $settings['border_color'] ?>;
	}
	.btn4:hover {
    color: <?php echo $settings['text_color_front_hover'] ?> !important;
  }
</style>
<a class="btn4 btn4_ff btn4_border btn4_bg_color_front btn4_text_color_front" href="<?php echo $settings['link_button']['url'];?>"

<?php if($settings['link_button']['nofollow']==true){
echo ' rel="nofollow" ';
}
if ($settings['link_button']['is_external']=="on") {
	echo ' target="_blank" ';
}
?>>
<!-- code here -->
<svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
<?php \Elementor\Icons_Manager::render_icon( $settings['icon_btn'], [ 'aria-hidden' => 'true' ] ); ?>
</svg>
    <span><?php echo $settings['title_button_front'] ?></span>
<!-- code here -->
</a>
		<?php
	}

}
