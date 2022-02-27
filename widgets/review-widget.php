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

class xplrme_Elementor_Review  extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'WPC_Comparison';
	}
	public function get_title()
	{
		return __('WPC Comparison', 'xplrme');
	}
	public function get_icon()
	{
		return 'dashicons-editor-table';
	}
	public function get_categories()
	{
		return ['general'];
	}

	protected function _register_controls(){
		$this->start_controls_section(
			'comparison_header',
			[
				'label' => __('Comparison Header', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'comparison_feature',
			[
				'label' => __('Feature Ttitle', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
                'default'   =>  __('Feature'),
			]
		); 
        $this->add_control(
			'comparison_pro',
			[
				'label' => __('Pro Ttitle', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
                'default'   =>  __('Pro'),
			]
		); 
        $this->add_control(
			'comparison_free',
			[
				'label' => __('Feature Free', 'wpxray'),
				'type' => Elementor\Controls_Manager::TEXT,
                'default'   =>  __('Free'),
			]
		); 
		$this->end_controls_section();

		$this->start_controls_section(
			'features_list',
			[
				'label' => __('Comparison Features', 'wpxray'),
				'tab' => Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'all_features_list',
			[
				'label' => esc_html__( 'Features List', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'wpxray' ),
						'type' => Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'List Item', 'wpxray' ),
						'default' => esc_html__( 'List Item', 'wpxray' ),
					],
					[
						'name' => 'peo_icon',
						'label' => esc_html__( 'Pro Icon', 'wpxray' ),
						'type' => Elementor\Controls_Manager::ICONS, 
                        'default' => [
                            'value' => 'eicon eicon-check',
                            'library' => 'solid',
                        ],
					],
					[
						'name' => 'free_icon',
						'label' => esc_html__( 'Free Icon', 'wpxray' ),
						'type' => Elementor\Controls_Manager::ICONS, 
                        'default' => [
                            'value' => 'eicon eicon-close',
                            'library' => 'solid',
                        ],
					],                    
				],
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'wpxray' ), 
					],
                    [
						'text' => esc_html__( 'List Item #1', 'wpxray' ), 
					],

				],
				'title_field' => '{{{ text }}}',
			]
		);
         $this->end_controls_section();

         //Style
         $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Section', 'wpxray' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'comparison_color',
			[
				'label' => esc_html__( 'Title Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.table.comparison-table thead tr th' => 'color: {{VALUE}}',
				],
                'default'   => '#EF5812',
			]
		);
        $this->add_control(
			'comparison_title_border_color',
			[
				'label' => esc_html__( 'Boder Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.table.comparison-table thead ' => 'border-bottom: 1px solid {{VALUE}}',
				],
                'default'   => '#EF5812',
			]
		);

		$this->add_control(
			'pro_icon_color',
			[
				'label' => esc_html__( 'Pro Icon Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pro i' => 'color: {{VALUE}}',
				],
                'default'   => '#008000',
			]
		);
        $this->add_control(
			'free_icon_color',
			[
				'label' => esc_html__( 'Free Icon Color', 'wpxray' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .free i' => 'color: {{VALUE}}',
				],
                'default'   => '#ff0000',
			]
		);
        $this->end_controls_section();
	}

	protected function render(){ 

        $settings = $this->get_settings_for_display();
        $comparison_feature = $settings['comparison_feature'];
        $comparison_free = $settings['comparison_free'];
        $comparison_pro = $settings['comparison_pro'];
        $all_features_list = $settings['all_features_list'];
        
        
        ?>
        <div class="table-responsive-sm table-responsive-md table-responsive-lg">
            <table class="table comparison-table">
            <thead>
                <tr>
                    <th scope="col"><?php echo esc_html_e( $comparison_feature ) ?></th> 
                    <th scope="col"><?php echo esc_html_e( $comparison_free ) ?></th>
                    <th scope="col"><?php echo esc_html_e( $comparison_pro ) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $all_features_list as $index => $feature ) : ?>
                <tr>
                    <th scope="row"><?php esc_html_e( $feature['text'] ) ?></th> 
                    <td class="free"><?php \Elementor\Icons_Manager::render_icon( $feature['free_icon'], [ 'aria-hidden' => 'true' ] ); ?></td>
                    <td  class="pro"><?php \Elementor\Icons_Manager::render_icon( $feature['peo_icon'], [ 'aria-hidden' => 'true' ] ); ?></td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
<?php  
     }

	//protected function _content_template() { }


}
