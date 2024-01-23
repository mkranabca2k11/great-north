<?php

namespace Elementor;

use Elementor\Modules\DynamicTags\Module as TagsModule;

if (!defined('ABSPATH')) exit;

/**
 * Auckland Grammar School Parallax Section Elementor Widget.
 *
 * Elementor widget for parallax section of Radius Care Website
 *
 * @since 1.0.0
 */
class GN_Widget extends \Elementor\Widget_Base
{

    // Widget Name
    public function get_name()
    {
        return 'great-north-widget';
    }

    // Widget Title
    public function get_title()
    {
        return __('Great North Custom Widget', 'plugin-name');
    }

    // Widget Icon
    public function get_icon()
    {
        return 'fa fa-window-maximize';
    }

    // Widget Catagories
    public function get_categories()
    {
        return ['gn'];
    }

    // Register styles
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
        // wp_register_style( 'radius-parallax-styles', str_replace( ABSPATH, '/', __DIR__ ) . '/assets/radius-parallax/style.css');
        // wp_register_script( 'jarallax', str_replace( ABSPATH, '/', __DIR__ ) . '/assets/radius-parallax/jarallax.min.js', [ 'elementor-frontend', 'jquery' ], '', true );
    }
    public function get_style_depends()
    {
        return [];
    }
    public function get_script_depends()
    {
        return [];
    }

    /**
     * Register widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls()
    {

        // Video
        $this->start_controls_section(
            'parallax_section',
            [
                'label' => __('Parallax', 'elementor'),
            ]
        );

        $this->add_control(
            'parallax_image',
            [
                'label' => __('Image 1', 'elementor'),
                'description' => 'Add the parallax__section class to the parent section',
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'parallax_image_2',
            [
                'label' => __('Image 2', 'elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => __('Height (px)', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 400,
                'selectors' => [
                    '{{WRAPPER}} .parallax-window' =>
                    'height: {{SIZE}}px'
                ],
            ]
        );


        $this->add_control(
            'speed',
            [
                'label' => __('Speed', 'elementor'),
                'description' => 'The higher the scale is set, the more visible the parallax effect will be. In return, the image will lose in quality',
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 1,
                ],
            ]
        );

        $this->add_control(
            'position_x',
            [
                'label' => __('Position X', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 50,
                ],
            ]
        );

        $this->add_control(
            'position_y',
            [
                'label' => __('Position Y (Image 1)', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 50,
                ],
            ]
        );

        $this->add_control(
            'position_y_2',
            [
                'label' => __('Position Y (Image 2)', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 50,
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Parallax Section', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'elementor'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .parallax-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
            ]
        );

        $this->add_control(
            'overlay',
            [
                'label' => __('Overlay', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Core\Schemes\Color::get_type(),
                    'value' => Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        // Output
		$settings = $this->get_settings_for_display();

    // Get image attributes
    $parallax_image_url = $settings['parallax_image']['url'];
    $parallax_image_2_url = $settings['parallax_image_2']['url'];

    // Other settings
    $height = $settings['height'];
    $speed = $settings['speed'];
    $position_x = $settings['position_x'];
    $position_y = $settings['position_y'];
    $position_y_2 = $settings['position_y_2'];

    // Output HTML with image attributes and other settings
    ?>
	 <div class="parallax-section" style="height: <?php echo esc_attr($height); ?>px;">
        <img src="<?php echo esc_url($parallax_image_url); ?>" alt="Parallax Image 1" style="transform: translate(<?php echo esc_attr($position_x); ?>%, <?php echo esc_attr($position_y); ?>%) scale(<?php echo esc_attr($speed); ?>);">
        <img src="<?php echo esc_url($parallax_image_2_url); ?>" alt="Parallax Image 2" style="transform: translate(<?php echo esc_attr($position_x); ?>%, <?php echo esc_attr($position_y_2); ?>%) scale(<?php echo esc_attr($speed); ?>);">

        <!-- Additional HTML output for your parallax section -->
    </div>
    
    <?php
?>

        <h1>Congrats you got the widget working!</h1>

<?php
    }
}
