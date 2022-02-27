<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/*
 * Elementor Classes
 * */

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

class xplrme_Join_Widget extends \Elementor\Widget_Base{

	public function get_name(){
		return 'wpxraycarousel';
	}

	public function get_title(){
		return __('Carousel', 'wpxray');
	}

	public function get_icon(){
		return 'eicon-media-carousel';
	}


	public function get_categories(){
		return ['basic'];
	}

	protected function _register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'wpxray'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => __('Title', 'wpxray'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Mostofa Kamal',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label'       => __('Desc', 'wpxray'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'UX Researcher',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'carousel_img',
			[
				'label'   => __('Image', 'wpxray'),
				'type'    => Controls_Manager::MEDIA,
				'default' =>
				[
					'url' => Utils::get_placeholder_image_src()
				],
			]
		);
		$this->add_control(
			'single_carousel',
			[
				'label'       => __('Carousel', 'wpxray'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'carousel_img',
				'default' => 'home_thumb',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'carousel_style',
			[
				'label' => __('Navigation Style', 'wpxray'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __('Normal', 'wpxray'),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label'     => __('Icon Color', 'wpxray'),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-active .slick-arrow i' => 'color: {{VALUE}}',
				],
				'default'   => '#a1a1a1',

			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label'     => __('Icon Background', 'wpxray'),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default'   => '#efefef',
				'selectors' => [
					'{{WRAPPER}} .team-active .slick-arrow i' => 'background-color: {{VALUE}}',
				],

			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'text_style',
			[
				'label' => __('Text Style', 'bizme'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __('Title Typography', 'bizme'),
				'scheme'   => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h4.team-name',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => __('Title Color', 'bizme'),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default'   => '#0a0c19',
				'selectors' => [
					'{{WRAPPER}} h4.team-name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_hover_color',
			[
				'label'     => __('Title Hover Color', 'bizme'),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default'   => '#ff3a46',
				'selectors' => [
					'{{WRAPPER}} h4.team-name:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tabs(); //Title Style
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_title_typography',
				'label'    => __('Sub Title Typography', 'bizme'),
				'scheme'   => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-content>span',
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label'     => __('Sub Title Color', 'bizme'),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default'   => '#63688e',
				'selectors' => [
					'{{WRAPPER}} .team-content>span' => 'color: {{VALUE}}',
				],
			]
		); 
		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$new_id   = rand(1245, 5489);

		echo '<script>
                jQuery(document).ready(function($) {
                    $("#carousel-' . $new_id . '").slick({
                        infinite: true,
                        speed: 800,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        mobileFirst: false,
                        prevArrow:\'<span class="prev"><i class="fa fa-angle-left"></i></span>\',
                        nextArrow: \'<span class="next"><i class="fa fa-angle-right"></i></span>\',
                        responsive: [
                            {
                              breakpoint: 1200,
                              settings: {
                                slidesToShow: 3,
                              }
                            },
                            {
                              breakpoint: 992,
                              settings: {
                                slidesToShow: 2,
                                arrows: false,
                                autoplay: true,
                                autoplaySpeed: 3000,
                              }
                            },
                            {
                              breakpoint: 768,
                              settings: {
                                slidesToShow: 2,
                                arrows: false,
                                autoplay: true,
                                autoplaySpeed: 3000,
                              }
                            },
                            {
                              breakpoint: 576,
                              settings: {
                                slidesToShow: 1,
                                arrows: false,
                                autoplay: true,
                                autoplaySpeed: 3000,
                              }
                            }
                        ]
                    });
                 
                    })
                    
                </script>';
?>
		<div id="carousel-<?php echo $new_id; ?>" class="row team-active">
			<?php
			if ($settings['single_carousel']) {

				foreach ( $settings['single_carousel'] as $item ) {   
			?>


			<div class="d-flex align-items-center">
				  <div class="flex-shrink-0">
				    <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'home_thumb', 'carousel_img' ); ?>
				  </div>
				  <div class="flex-grow-1 ms-3">
				    	<div class="team-content">
							<h2 class="team-name"><?php echo esc_attr($item['title']); ?></h2>
							<span><?php echo esc_attr($item['desc']); ?></span> 
						</div>
				  </div>
			</div> 
			<?php }
			} ?>
		</div>
<?php

	}
}
