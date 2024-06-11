<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Group_Info extends Element
{
    protected $shortcode_slug   = 'groupinfo';
    protected $shortcode_params = array(
        'show'     => 'show',
        'user_id'  => 'user_id',
        'group_id' => 'group_id',
        'format'   => 'format',
        'decimals' => 'decimals',
    );


	public $category = 'learndash group';
    public $name     = 'ld_group_info';
    public $icon     = 'ti-info-alt';

    public function get_label()
    {
        return esc_html__('LD Group Info', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_group_info_settings'] = [
            'title' => esc_html__('Settings', 'learndash-bricks')
        ];

        $this->controls['show'] = [
            'group'    => 'ld_group_info_settings',
            'label'    => esc_html__('Show', 'learndash-bricks'),
            'type'     => 'select',
            'options'  => [
                'group_title' => __('Group Title', 'learndash-bricks'),
                'group_url' => __('Group Url', 'learndash-bricks'),
                'group_price_type' => __('Group Price Type', 'learndash-bricks'),
                'group_price' => __('Group Price', 'learndash-bricks'),
                'group_users_count' => __('Group Users Count', 'learndash-bricks'),
                'group_courses_count' => __('Group Courses Count', 'learndash-bricks'),
                'user_group_status' => __('Group Status', 'learndash-bricks'),
                'enrolled_on' => __('Enrolled On', 'learndash-bricks'),
                'completed_on' => __('Completed On', 'learndash-bricks'),
                'percent_completed' => __('Percent Completed', 'learndash-bricks'),
            ],
            'default'  => 'group_title'
        ];

        $this->controls['user_id'] = [
            'group'    => 'ld_group_info_settings',
            'label'    => esc_html__('User ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        $this->controls['group_id'] = [
            'group'    => 'ld_group_info_settings',
            'label'    => esc_html__('Group ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        $this->controls['format'] = [
            'group'    => 'ld_group_info_settings',
            'label'    => esc_html__('Date Format For Date', 'learndash-bricks'),
            'type'     => 'text',
            'default'  => 'F j, Y, g:i a'
        ];

        $this->controls['decimals'] = [
            'group'    => 'ld_group_info_settings',
            'label'    => esc_html__('Decimals For Pricing', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => 2
        ];


        $this->controls['course_info_background_color'] = [
            'group' => 'ld_group_info_settings',
            'label' => esc_html__('Background Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.be-learndash-group-info',
                ]
            ]
        ];

        $this->controls['course_info_typography'] = [
            'group' => 'ld_group_info_settings',
            'label' => esc_html__('Typography', 'bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.be-learndash-group-info',
                ]
            ]
        ];

        $this->controls['course_info_borders'] = [
            'group' => 'ld_group_info_settings',
            'label' => esc_html__('Border', 'bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.be-learndash-group-info',
                ]
            ]
        ];

        $this->controls['course_info_padding'] = [
            'group' => 'ld_group_info_settings',
            'label' => esc_html__('Padding', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.be-learndash-group-info',
                ]
            ]
        ];

        $this->controls['course_info_margin'] = [
            'group' => 'ld_group_info_settings',
            'label' => esc_html__('Margin', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.be-learndash-group-info',
                ]
            ]
        ];

        $this->controls['course_info_box_shadow'] = [
            'group' => 'ld_group_info_settings',
            'label' => esc_html__('Box Shadow', 'bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.be-learndash-group-info',
                ]
            ]
        ];
    }

    public function render()
    {
        $settings = $this->settings;

        // Generate shortcode attributes
        $shortcode_atts = '';
        foreach ($settings as $key => $value) {
            if (!empty($value)) {
                $shortcode_atts .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
            }
        }

        // Construct the shortcode
        $shortcode = '[' . $this->shortcode_slug . $shortcode_atts . ']';

        // Output the shortcode
        echo "<div {$this->render_attributes('_root')}>";
        echo "<div class='be-learndash-group-info'>";
        echo do_shortcode($shortcode);
        echo "</div>";
        echo "</div>";
    }
}
