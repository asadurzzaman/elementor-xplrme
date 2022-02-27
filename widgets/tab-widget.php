<?php
if (!defined('ABSPATH')) {
	die(__(" Direct Access is not allowed", 'xplrme'));
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

$repeater = new \Elementor\Repeater();

class Xplrme_Elementor_Tab  extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'WPC_Pricing';
	}
	public function get_title()
	{
		return __('WPC Pricing', 'xplrme');
	}
	public function get_icon()
	{
		return 'dashicons-editor-table';
	}
	public function get_categories()
	{
		return ['general'];
	}

	protected function _register_controls()
	{

		///////////////////////////////////////
		//////// Tab Header
		//////////////////////////////////////
		$this->start_controls_section(
			'table_tab',
			[
				'label' => __('Table Header Section', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'header_annual',
			[
				'label' => __('Annual', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'header_lifetime',
			[
				'label' => __('Life Time', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$this->end_controls_section();
		///////////////////////////////////////
		//////// Anuual Tab
		//////////////////////////////////////

		$this->start_controls_section(
			'annual_table',
			[
				'label' => __('Annual', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Elementor\Repeater();

		$repeater->add_control(
			'is_annual_feature',
			[
				'label' => __('Highlight', 'wpxray'),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'default'	=> false,
			]
		);
		$repeater->add_control(
			'annual_old_price',
			[
				'label' => __('Old Price', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'annual_offer_price',
			[
				'label' => __('Offer Price', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$repeater->add_control(
			'annual_package_type',
			[
				'label' => __('Package Type', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$repeater->add_control(
			'annual_package_name',
			[
				'label' => __('Package Name', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$repeater->add_control(
			'annual_feature_list',
			[
				'label' => __('Features', 'wpxray'),
				'type' => Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'annual_feature_icons',
			[
				'label' => __('Feature Icon', 'wpxray'),
				'type' => Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		// $repeater->add_control(
		// 	'is_button_full_with', [
		// 		'label' => __( 'Button Full With?', 'wpxray' ),
		// 		'type' => Elementor\Controls_Manager::SWITCHER,  
		// 		'default' => false,
		// 		'return_value' => 'yes',
		// 		'style_transfer' => true,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .single-price-tab button' => ' display: block; width:100%;', 
		// 		],
		// 	]
		// );
		$repeater->add_control(
			'annual_button_text',
			[
				'label' => __('Button text', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'annual_button_url',
			[
				'label' => __('URL', 'wpxray'),
				'type' => Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'wpxray'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'annual_list',
			[
				'label' => __('Repeater List', 'wpxray'),
				'type' => Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'table_features' => __('Annual Table 1', 'wpxray'),
					],
					[
						'table_features' => __('Annual Table 2', 'wpxray'),
					],
				],
				'title_field' => '{{{ table_features }}}',
			]
		);

		$this->end_controls_section();
		///////////////////////////////////////////
		///////// Life Time Tab
		/////////////////////////////////////////

		$this->start_controls_section(
			'lifetime_table',
			[
				'label' => __('Life Time', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Elementor\Repeater();

		$repeater->add_control(
			'is_lifetime_feature',
			[
				'label' => __('Highlight', 'wpxray'),
				'type' => Elementor\Controls_Manager::SWITCHER,
			]
		);
		$repeater->add_control(
			'lifetime_old_price',
			[
				'label' => __('Old Price', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'lifetime_offer_price',
			[
				'label' => __('Offer Price', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'lifetime_package_type',
			[
				'label' => __('Package Type', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'lifetime_package_name',
			[
				'label' => __('Package Name', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'lifetime_feature_list',
			[
				'label' => __('Features', 'wpxray'),
				'type' => Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$repeater->add_control(
			'lifetime_feature_icons',
			[
				'label' => __('Feature Icon', 'wpxray'),
				'type' => Elementor\Controls_Manager::ICONS,
			]
		);
		// $repeater->add_control(
		// 	'is_life_button_full_with', [
		// 		'label' => __( 'Button Full With?', 'wpxray' ),
		// 		'type' => Elementor\Controls_Manager::SWITCHER,  
		// 		'default' => false,
		// 		'return_value' => 'yes',
		// 		'style_transfer' => true,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .single-price-tab button' => ' display: block; width:100%;', 
		// 		],
		// 	]
		// );	
		$repeater->add_control(
			'lifetime_button_text',
			[
				'label' => __('Button text', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'lifetime_button_link',
			[
				'label' => __('Link', 'wpxray'),
				'type' => Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'wpxray'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'lifetime_list',
			[
				'label' => __('Repeater List', 'wpxray'),
				'type' => Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'table_features' => __('Annual Table 1', 'wpxray'),
					],
					[
						'table_features' => __('Annual Table 2', 'wpxray'),
					],
				],
				'title_field' => '{{{ table_features }}}',
			]
		);

		$this->end_controls_section();
		////////////////////////////////////////////////////
		/////////// Style Section For Annual
		///////////////////////////////////////////////////
		$this->start_controls_section(
			'price_box',
			[
				'label' => __('Price Box', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		); 
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'label' => __( 'Background', 'wpxray' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .table-width',
			]
		);
		$this->add_control(
			'box_radius',
			[
				'label' => __( 'Border radius', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .table-width' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// $this->add_control(
		// 	'price_box_padding',
		// 	[
		// 		'label' => __( 'Padding', 'plugin-domain' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .details-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 			'{{WRAPPER}} .features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 			'{{WRAPPER}} .bottom-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'wpxray' ),
				'selector' => '{{WRAPPER}} .table-width',
			]
		);   
		$this->end_controls_section();
		$this->start_controls_section(
			'header_style',
			[
				'label' => __('Header', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'tabs_header_part',
			[
				'separator' => 'before'
			]
		);

		$this->start_controls_tab(
			'normal',
			[
				'label' => __('Normal', 'wpxray'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_button_typography',
				'label' => __( 'Typography', 'wpxray' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} button.nav-link',
			]
		);
		$this->add_control(
			'tabs_color',
			[
				'label' => __( 'Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} button.nav-link' => 'color: {{VALUE}}',
				],
			]
		); 
		$this->add_control(
			'hr10',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'outside_more_options',
			[
				'label' => __( 'Button Out Side', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'tabs_bg_color',
			[
				'label' => __( 'Background Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} div#nav-tab' => 'background: {{VALUE}}',
				],
			]
		); 
		$this->add_control(
			'tabs_width',
			[
				'label' => __( 'Width', 'wpxray' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'tabs_padding',
			[
				'label' => __( 'Padding Out Side Button', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} div#nav-tab' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'tabs_border_radius',
			[
				'label' => __( 'Border radius', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} div#nav-tab' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hr11',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);			
		$this->add_control(
			'inside_more_options',
			[
				'label' => __( 'Button', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'tabs_normal_button_color',
			[
				'label' => __( 'Button Background', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button' => 'background: {{VALUE}}',
				],
			]
		); 
		$this->add_control(
			'tabs_button_padding',
			[
				'label' => __( 'Padding Button', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};display: inline-block;',
				],
			]
		);			
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tabs_border',
				'label' => __( 'Border', 'wpxray' ),
				'selector' => '{{WRAPPER}} button.nav-link',
			]
		);
		$this->add_control(
			'tabs_button_radius',
			[
				'label' => __( 'Border radius', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		); 
		$this->add_control(
			'tabs_below_margin',
			[
				'label' => __( 'Below Spacing', 'wpxray' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} div#nav-tab' => 'margin-bottom: {{SIZE}}{{UNIT}};display: inline-block;',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover',
			[
				'label' => __('Hover', 'wpxray'),
			]
		);
		$this->add_control(
			'tabs_active_color',
			[
				'label' => __( 'Active Background Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button.active' => 'background: {{VALUE}}',
				],
			]
		); 
		$this->add_control(
			'tabs_active_taxt_color',
			[
				'label' => __( 'Background Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button.active' => 'color: {{VALUE}}',
				],
			]
		); 
		$this->add_control(
			'tabs_hover_color',
			[
				'label' => __( 'Hover Background Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button:hover' => 'background: {{VALUE}}',
				],
			]
		); 	
		$this->add_control(
			'tabs_hover_text_color',
			[
				'label' => __( 'Background Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				], 
				'selectors' => [
					'{{WRAPPER}} div#nav-tab button:hover' => 'color: {{VALUE}}',
				],
			]
		); 	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'single_header',
			[
				'label' => __('Table Header', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);  
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'annaul_background',
				'label' => __( 'Annual Table Background', 'wpxray' ),
				'types' => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .annual-top-section',
			]
		);
		$this->add_control(
			'hr13',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);		
		$this->add_control(
			'bg_lifetime_options',
			[
				'label' => __( 'Lifetime Table', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'lifetime_background',
				'label' => __( 'Lifetime Table Background', 'wpxray' ),
				'types' => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .lifetime-top-section',
			]
		);		
		$this->add_control(
			'header_width',
			[
				'label' => __('Width', 'plugin-domain'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .annual-top-section' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'header_height',
			[
				'label' => __('Height', 'wpxray'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .annual-top-section' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'header_bottom',
			[
				'label' => __('Margin Bottom', 'wpxray'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .top-section' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'top_radius',
			[
				'label' => __( 'Border Radius', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .top-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'top_padding',
			[
				'label' => __( 'Padding', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .details-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_text_align',
			[
				'label' => __('Price Text Alignment', 'wpxray'),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'wpxray'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'wpxray'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'wpxray'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .details-price' => 'text-align:{{options}} ;',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'offer_style',
			[
				'label' => __('Offer Price', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'offer_typography',
				'label' => __('Typography', 'wpxray'),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .offer-price',
			]
		);
		$this->add_control(
			'offer_text_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .offer-price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'old_style',
			[
				'label' => __('Old Price', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
				'label_block' => true,
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'old_typography',
				'label' => __('Typography', 'wpxray'),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .old-price',
			]
		);
		$this->add_control(
			'old_text_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .old-price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'packeg_types',
			[
				'label' => __('Packeg Type', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
				'label_block' => true,
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'packeg_typography',
				'label' => __('Typography', 'wpxray'),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .offer-price span.package-type',
			]
		);
		$this->add_control(
			'packeg_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .offer-price span.package-type' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'packeg_names',
			[
				'label' => __('Packeg Name', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
				'label_block' => true,
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'packeg_name_typography',
				'label' => __('Typography', 'wpxray'),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .package-name h3',
			]
		);
		$this->add_control(
			'packeg_name_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .package-name h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'packeg_name_background',
				'label' => __( 'Background', 'wpxray' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .package-name',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'packeg_name_box_shadow',
				'label' => __( 'Box Shadow', 'wpxray' ),
				'selector' => '{{WRAPPER}} .package-name h3',
			]
		);
		$this->add_control(
			'packeg_name_padding',
			[
				'label' => __( 'Padding', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .package-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'packeg_name_margin',
			[
				'label' => __( 'margin', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .package-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'packeg_name_radius',
			[
				'label' => __( 'Border Radius', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .package-name' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'feature_style',
			[
				'label' => __('Feature', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
				'label_block' => true,
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'label' => __('Typography', 'wpxray'),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .features ul li',
			]
		);
		$this->add_control(
			'features_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .features ul li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'features_align',
			[
				'label' => __('Alignment', 'wpxray'),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'wpxray'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'wpxray'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'wpxray'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .features ul li' => 'text-align:{{options}} ;',
				],
			]
		);
		$this->add_control(
			'features_margin',
			[
				'label' => __('Spacing', 'wpxray'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .features ul li' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'features_padding',
			[
				'label' => __( 'Padding', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'button_style',
			[
				'label' => __('Button', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
				'label_block' => true,
			]
		);

		$this->start_controls_tabs(
			'lifetime_button_before',
			[
				'separator' => 'before'
			]
		);

		$this->start_controls_tab(
			'lifetime_button_before_normal',
			[
				'label' => __('Normal', 'wpxray'),
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography', 'wpxray'),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} button.price-link a',
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} button.price-link a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'annual_table_background',
				'label' => __('Background', 'wpxray'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} button.price-link',
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __( 'Border', 'wpxray' ),
				'selector' => '{{WRAPPER}} button.price-link',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'lifetime_button_before_hover',
			[
				'label' => __('Hover', 'wpxray'),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => __('Color', 'wpxray'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} button.price-link:hover a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'annual_table_hover_background',
				'label' => __('Background', 'wpxray'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} button.price-link:hover ',
			]
		);
		
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'hr7',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __('Box Shadow', 'wpxray'),
				'selector' => '{{WRAPPER}} button.price-link',
			]
		);
		$this->add_responsive_control(
			'button_padding',
			[
				'label' => __('Padding', 'plugin-name'),
				'type' => Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} button.price-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'wpxray'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} button.price-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_align',
			[
				'label' => __('Alignment', 'wpxray'),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'wpxray'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'wpxray'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'wpxray'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .bottom-section' => 'text-align:{{options}} ;',
				],
			]
		);
		$this->add_control(
			'button_margin',
			[
				'label' => __( 'Margin', 'wpxray' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bottom-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'highlight_style',
			[
				'label' => __('Highlight', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
				'label_block' => true,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'highlight_background',
				'label' => __( 'Background', 'wpxray' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .rec-price-tab div.annual-top-section:after,{{WRAPPER}} .rec-price-tab div.lifetime-top-section:after',
			]
		);
		$this->add_control(
			'highlight_color',
			[
				'label' => __( 'Color', 'wpxray' ),
				'type' => Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],  
				'selectors' => [
					'{{WRAPPER}} .rec-price-tab div.annual-top-section div.package-name h3, 
					{{WRAPPER}} .rec-price-tab div.annual-top-section span.package-type,
					{{WRAPPER}} .rec-price-tab div.annual-top-section .details-price,
					{{WRAPPER}} .rec-price-tab div.lifetime-top-section div.package-name h3,
					{{WRAPPER}} .rec-price-tab div.lifetime-top-section span.package-type,
					{{WRAPPER}} .rec-price-tab div.lifetime-top-section .details-price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$headerannual = $settings['header_annual'];
		$headerlifetime = $settings['header_lifetime'];

?>
		<nav class="price-table-tab"> 
			<div class="nav text-center justify-content-center" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"><?php echo $headerannual; ?></button>
				<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"><?php echo $headerlifetime; ?></button>
			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">
			<style>
				@media (min-width: 320px) and (max-width:767px){ 
					div.price-tab div.table-width {
						margin: 25px 0px !important;
					}
					.table-width {
						width: inherit; 
					}
				 }
				@media (min-width: 768px) and (max-width: 991px){ 
					div.price-tab div.table-width {
						margin: 25px 0px !important;
					}
					.table-width {
						width: inherit; 
					}					
				 } 
				.rec-price-tab div.lifetime-top-section:after,
				.rec-price-tab div.annual-top-section:after {
					position: absolute;
					content: ""; 
					width: 100%;
					height: 100%;
					top: 0;
				}
					/*New Pricing Table CSS*/
					.features ul{
						margin: 0px;
						padding: 0px;
						list-style: none;
					}
					.table-width {
						width: 100%;
						overflow:hidden;
					}
					.price-tab div.table-width { 
						margin: 15px;
					} 
					.details-price {
						position: relative;
						z-index: 99;
						width: 100%;
					}
					.offer-price,
					.old-price { 
						display: inline-block; 
					}
					.top-section {
						position: relative;
					}
					nav.price-table-tab {
						text-align: center;
					}

			</style>
			<div class="tab-pane fade  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<div class="price-tab  d-lg-flex d-xl-flex d-xxl-flex justify-content-center  annual">
					<?php
					if ($settings['annual_list']) {
						foreach ($settings['annual_list'] as $annuallist) {

							$annualfeature = $annuallist['is_annual_feature'] ? 'rec-price-tab' : ' ';
					?>
							<div class="table-width <?php echo esc_attr($annualfeature); ?>">
								<div class="single-price-tab text-centersss">
									<div class="offer starter"></div>
									<div class="top-section annual-top-section"> 

										<div class="details-price"> 
											<?php if ($annuallist['annual_old_price']) { ?> 
												<div class="old-price">  
													<span class="old-currency-symbol">$</span><?php echo $annuallist['annual_old_price'] ?> 
												</div>
											<?php } ?>

											<div class="offer-price">
												<?php if ($annuallist['annual_offer_price']) { ?>
													<span class="currency-symbol">$</span><?php echo $annuallist['annual_offer_price'] ?>
												<?php } ?>
												<?php if ($annuallist['annual_package_type']) { ?>
													<span class="package-type"><?php echo $annuallist['annual_package_type'] ?></span>
												<?php } ?>
											</div>
											<div class="package-name">
												<h3><?php echo $annuallist['annual_package_name'] ?></h3>
											</div>   
										</div>

									</div>


									<div class="features">
										<?php echo $annuallist['annual_feature_list'] ?>
									</div>
									<div class="bottom-section">
										<button class="price-link text-center" type="button"><a href="<?php echo $annuallist['annual_button_url']['url'] ?>"><?php echo $annuallist['annual_button_text'] ?></a></button>
									</div>
								</div>
							</div>
					<?php }
					} ?>
				</div>
			</div>

			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<div class="price-tab d-lg-flex d-xl-flex d-xxl-flex justify-content-center lifetime">

					<?php
					if ($settings['lifetime_list']) {
						foreach ($settings['lifetime_list'] as $lifetimelist) {
							$lifetimefeature = $lifetimelist['is_lifetime_feature'] ? 'rec-price-tab' : '';
					?>
							<div class="table-width <?php echo esc_attr($lifetimefeature); ?>">
								<div class="single-price-tab text-centerss">
									<div class="offer starter"></div>
									<div class="top-section lifetime-top-section">   
										<div class="details-price">  

											<?php if ($lifetimelist['lifetime_old_price']) { ?>
												<div class="old-price">  
													<span class="old-currency-symbol">$</span><?php echo $lifetimelist['lifetime_old_price'] ?> 
												</div>
											<?php } ?>

											<div class="offer-price">
												<?php if ($lifetimelist['lifetime_offer_price']) { ?>
													<span class="currency-symbol">$</span><?php echo $lifetimelist['lifetime_offer_price'] ?>
												<?php } ?>
												<?php if ($lifetimelist['lifetime_package_type']) { ?>
													<span class="package-type"><?php echo $lifetimelist['lifetime_package_type'] ?></span>
												<?php } ?>
											</div>
											<div class="package-name">
												<h3><?php echo $lifetimelist['lifetime_package_name'] ?></h3>
											</div>  
										</div> 
									</div> 
									<div class="features">
										<?php echo $lifetimelist['lifetime_feature_list'] ?>
									</div> 
									<?php if ($lifetimelist['lifetime_button_text']) { ?>		
										<div class="bottom-section">
											<button class="price-link" type="button">
												<a href="<?php echo $lifetimelist['lifetime_button_url']['url'] ?>">
												<?php echo $lifetimelist['lifetime_button_text'] ?></a>
											</button>
										</div>
									<?php } ?>
								</div>
							</div>
					<?php }
					} ?>


				</div>
			</div>

		</div>
<?php }

	//protected function _content_template() { }


}
