<?php

class widget_button_2 extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'widget_button_2';
    }

    public function get_title() {
		return 'دکمه جذاب شماره 2';
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
			'button2_section',
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
			'title_button_back',
			[
				'label' => esc_html__( 'Title back', 'textdomain' ),
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
					'{{WRAPPER}} .text_color_front' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bg_color_front',
			[
				'label' => esc_html__( 'Background Color Front', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg_color_front' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'text_color_back',
			[
				'label' => esc_html__( 'Text Color Back', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text_color_back' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bg_color_back',
			[
				'label' => esc_html__( 'Background Color Back', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg_color_back' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .btn2-ff' => 'font-family: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();


	}

    protected function render() {
		$settings = $this->get_settings_for_display();

		?>
<style>
.scene{width:10em;justify-content:center;align-items:center}
.cube{cursor:pointer;transition:all .85s cubic-bezier(.17,.67,.14,.93);transform-style:preserve-3d;transform-origin:100% 50%;width:10em;height:4em}
.cube:hover{transform:rotateX(-90deg)}
.side{box-sizing:border-box;position:absolute;display:inline-block;height:4em;width:10em;text-align:center;text-transform:uppercase;padding-top:1.5em;font-weight:700}
.back{transform:rotateX(90deg) translate3d(0,0,2em);box-shadow:inset 0 0 0 5px #fff}
.front{box-shadow:inset 0 0 0 5px #fff;transform:translate3d(0,0,2em)}
</style>
<?php //var_dump($settings['link_button']); ?>
<a href="<?php echo $settings['link_button']['url'];?>"
<?php if($settings['link_button']['nofollow']==true){
echo ' rel="nofollow" ';
}
if ($settings['link_button']['is_external']=="on") {
	echo ' target="_blank" ';
}
?>
>
<div class="scene">
  <div class="cube btn2-ff">
    <span class="side back text_color_back bg_color_back"> <?php echo $settings['title_button_back'] ?> </span>
    <span class="side front text_color_front bg_color_front"> <?php echo $settings['title_button_front'] ?> </span>
  </div>
</div>
</a>
		<?php
	}

}
