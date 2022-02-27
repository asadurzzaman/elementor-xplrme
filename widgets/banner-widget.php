<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( __(" Direct Access is not allowed", 'xplrme') );
}
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Group_Control_Box_Shadow;

class Xplrme_Elementor_Banner_Widget  extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Banner xplrme';
	}

	public function get_title() {
		return __( 'Banner', 'xplrme' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'xplrme' ),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Add Title', 'xplrme' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'label_block'	=> true,
				'placeholder' => __( 'This is demo title', 'xplrme' ),
			]
		);

		$this->add_control(
			'subtext',
			[
				'label' => __( 'Sub Text', 'xplrme' ),
				'type' => Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'text',
				'label_block'	=> true,
				'placeholder' => __( 'This is Sub Text', 'xplrme' ),
			]
		);

		$this->add_control(
			'button',
			[
				'label' => __( 'Button', 'xplrme' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'label_block'	=> true,
				'placeholder' => __( 'Button text', 'xplrme' ),
			]
		);

		$this->add_control(
			'imagesr',
			[
				'label' => __( 'Image', 'wpxray' ),
				'type' => Elementor\Controls_Manager::MEDIA,
				'input_type' => 'text',
				'label_block'	=> true,
				'default' => [
					'url' => Elementor\Utils::get_placeholder_image_src(),
				],
				
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'imagesiz', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`. 
				'default' => 'large',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'wpxray' ),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);

 		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'wpxray' ),
				'type' => Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);

 		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'wpxray' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				 'selector' => '{{WRAPPER}} .heading',
			]
		);

		$this -> add_responsive_control (
			'title_alignment',
			[
				'label'     => __ ( 'Alignment', 'bizme' ),
				'type'      => Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __ ( 'Left', 'bizme' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __ ( 'Center', 'bizme' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __ ( 'Right', 'bizme' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .heading' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtext_section',
			[
				'label' => __( 'Sub Text', 'wpxray' ),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);

 		$this->add_control(
			'subtext_color',
			[
				'label' => __( 'Color', 'wpxray' ),
				'type' => Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .sub-heading' => 'color: {{VALUE}}',
				],
			]
		);

 		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'wpxray' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				 'selector' => '{{WRAPPER}} .sub-heading',
			]
		);

		$this -> add_responsive_control (
			'subtext_alignment',
			[
				'label'     => __ ( 'Alignment', 'bizme' ),
				'type'      => Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __ ( 'Left', 'bizme' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __ ( 'Center', 'bizme' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __ ( 'Right', 'bizme' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sub-heading' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image', 'wpxray' ),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'MArgin Top', 'wpxray' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [ 
					'{{WRAPPER}} .image img' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$title = $settings['title'];
		$subtext = $settings['subtext'];
		//$image = $settings['image']['url'];

//		echo '<div claas="custom-item">';
//		echo '<h2 class="heading">' . $title . '</h2>';
//		echo '<p class="sub-heading">' . $subtext . '</p><div class="image">';
//		//echo '<img class="img-fluid" src="' . $image . '">';
//		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'imagesiz' ,'imagesr');
//		echo '</div></div>';

		?>

            <h1>Banner Title<br> Goes Here</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <a href="#">Get Started</a>
        </div>
        <div class="for_mobile">
            <img src="assets/img/banner-image.png" alt="">
            <a href="#">Get Started</a>
        </div>

<?php

	}
	protected function _content_template() {}

}