<?php
if (!defined('ABSPATH')) {
	die(__(" Direct Access is not allowed", 'xplrme'));
}

use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
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
		return 'xplrme_tab';
	}
	public function get_title()
	{
		return __('Xplrme Tab', 'xplrme');
	}
	public function get_icon()
	{
		return 'dashicons-editor-table';
	}
	public function get_categories()
	{
		return ['basic'];
	}

	protected function _register_controls()
	{

		$this->start_controls_section(
			'xplrme_single_tab',
			[
				'label' => __('Xplrme Single tab', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Elementor\Repeater();

		$repeater->add_control(
			'is_xplrme_single_tab_title',
			[
				'label' => __('Title', 'xplrme'),
				'type' => Elementor\Controls_Manager::TEXT,
				'default'	=> false,
			]
		);

		$repeater->add_control(
			'is_xplrme_single_tab_desc',
			[
				'label' => __('Tab Description', 'xplrme'),
				'type' => Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$repeater->add_control(
			'xplrme_tab_icons',
			[
				'label' => __('Feature Icon', 'xplrme'),
				'type' => Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'tabs_list',
			[
				'label' => __('Repeater List', 'xplrme'),
				'type' => Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'is_xplrme_single_tab_title' => __('Single Tab 1', 'xplrme'),
					],
					[
						'is_xplrme_single_tab_title' => __('Single Tab 2', 'xplrme'),
					],
				],
				'title_field' => '{{{ is_xplrme_single_tab_title }}}',
			]
		);

		$this->end_controls_section();

		////////////////////////////////////////////////////
		/////////// Style Section For Annual
		///////////////////////////////////////////////////

		$this->start_controls_section(
			'tab_box',
			[
				'label' => __('Tab', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_typography',
				'label' => __( 'Typography', 'xplrme' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} button.nav-link',
			]
		);
        $this->add_control(
                'tabs_tab_color',
			[
                'label' => __( 'Title Color', 'xplrme' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Elementor\Core\Schemes\Color::get_type(),
                    'value' => Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} button.nav-link p' => 'color: {{VALUE}}',
                ],
            ]
		);
		$this->add_control(
			'tabs_bg_color',
			[
				'label' => __( 'Background Color', 'xplrme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .choose_tab ul li button.nav-link.active' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border radius', 'xplrme' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .choose_tab ul li button.nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'tab_content_style',
			[
				'label' => __('Tab Content', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tabs_desc_bg_color',
			[
				'label' => __( 'Background Color', 'xplrme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tab_desc' => 'background: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'tab_t_style',
			[
				'label' => __('Tab Title', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_t_content_typography',
				'label' => __( 'Typography', 'xplrme' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tab-pane h2',
			]
		);
		$this->add_control(
			'tabs_t_color',
			[
				'label' => __( 'Color', 'xplrme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-pane h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'tab_st_style',
			[
				'label' => __('Tab Sub Title', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_st_content_typography',
				'label' => __( 'Typography', 'xplrme' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tab-pane h3',
			]
		);
		$this->add_control(
			'tabs_st_color',
			[
				'label' => __( 'Color', 'xplrme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-pane h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'tab_p_style',
			[
				'label' => __('Tab Paragraph', 'xplrme'),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabs_p_content_typography',
				'label' => __( 'Typography', 'xplrme' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tab-pane p',
			]
		);
		$this->add_control(
			'tabs_p_color',
			[
				'label' => __( 'Color', 'xplrme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Core\Schemes\Color::get_type(),
					'value' => Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-pane p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();


	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$tabs_list = $settings['tabs_list'];
?>

		<section class="below_course_section">
			<div class="tab_desc">
				<div class="choose_tab full">
					<ul class="nav">
						<?php

						if( $settings['tabs_list']) {
							$count = 0;
						foreach ( $settings['tabs_list'] as $tab_list ){
							$count++;
                            $category_slug = str_replace(' ', '-', $tab_list['is_xplrme_single_tab_title']);
							$category_link = strtolower( $category_slug );

						?>
						<li>
							<button class="nav-link <?php echo ( $count == 1 ) ? 'active' : '';?>" data-bs-toggle="pill" data-bs-target="#<?php echo sanitize_text_field($category_link); ?>">
                                <i class="<?php echo $tab_list['xplrme_tab_icons']['value'] ?>    "></i>
								<p><?php echo sanitize_text_field( $tab_list['is_xplrme_single_tab_title'] ); ?></p>
							</button>
						</li>
						<?php } } ;?>
					</ul>
				</div>

				<div class="tab-content">
					<?php
					if( $settings['tabs_list']) {
						$i = 0;
						foreach ( $settings['tabs_list'] as $tab_list ){
							$i++;
                        $category_desc = str_replace(' ', '-', $tab_list['is_xplrme_single_tab_title']);
                        $category_desc_link = strtolower( $category_desc );
					?>
					<div class="tab-pane fade show <?php echo ( $i == 1 ) ? 'active' : '';?>" id="<?php echo
                    $category_desc_link; ?>" >
						<?php echo sanitize_text_field( $tab_list['is_xplrme_single_tab_desc'] ); ?>
					</div>
					<?php } } ;?>
				</div>



				<div class="choose_tab tab_mobile">
					<ul class="nav">
						<?php
						if( $settings['tabs_list']) {
							foreach ( $settings['tabs_list'] as $tab_list ){

								?>
								<li>
									<button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-home">
										<i class="fas fa-gear    "></i>
										<p><?php echo sanitize_text_field($tab_list['is_xplrme_single_tab_title']); ?></p>
									</button>
								</li>
							<?php } } ?>
					</ul>
				</div>

			</div>
		</section>

<?php }

	//protected function _content_template() { }


}
