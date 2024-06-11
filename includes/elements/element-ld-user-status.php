<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_User_Status extends Element
{
    protected $shortcode_slug   = 'learndash_user_status';
    protected $shortcode_params = array(
        'user_id' => 'user_id',
    );

	public $category = 'learndash user';
    public $name     = 'learndash_user_status';
    public $icon     = 'ti-user';

    public function get_label()
    {
        return esc_html__('LD User Status', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['learndash_user_status_settings'] = [
            'title' => esc_html__('Settings', 'bricks')
        ];

        $this->controls['user_id'] = [
            'group'    => 'learndash_user_status_settings',
            'label'    => esc_html__('User ID', 'bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        // Settings section
        $this->control_groups['ld_registered_courses_settings'] = [
            'title' => esc_html__('Registered Courses Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_course_item_settings'] = [
            'title' => esc_html__('Course Item Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_course_status_settings'] = [
            'title' => esc_html__('Course Status Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_course_progress_settings'] = [
            'title' => esc_html__('Course Progress Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_course_step_settings'] = [
            'title' => esc_html__('Course Step Settings', 'learndash-bricks')
        ];

        // Controls for Registered Courses Settings
        $this->controls['registered_courses_heading_color'] = [
            'group' => 'ld_registered_courses_settings',
            'label' => esc_html__('Heading Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-course-info .ld-section-heading h2',
                ]
            ]
        ];

        $this->controls['registered_courses_background_color'] = [
            'group' => 'ld_registered_courses_settings',
            'label' => esc_html__('Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-course-info',
                ]
            ]
        ];

        $this->controls['registered_courses_typography'] = [
            'group' => 'ld_registered_courses_settings',
            'label' => esc_html__('Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-course-info .ld-section-heading h2',
                ]
            ]
        ];

        // Controls for Course Item Settings
        $this->controls['course_item_name_color'] = [
            'group' => 'ld_course_item_settings',
            'label' => esc_html__('Item Name Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-item-list-item-preview .ld-item-name',
                ]
            ]
        ];

        $this->controls['course_item_background_color'] = [
            'group' => 'ld_course_item_settings',
            'label' => esc_html__('Item Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-item-list-item',
                ]
            ]
        ];

        $this->controls['course_item_typography'] = [
            'group' => 'ld_course_item_settings',
            'label' => esc_html__('Item Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-item-list-item-preview .ld-item-name',
                ]
            ]
        ];

        // Controls for Course Status Settings
        $this->controls['course_status_icon_color'] = [
            'group' => 'ld_course_status_settings',
            'label' => esc_html__('Status Icon Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-status-icon',
                ]
            ]
        ];

        $this->controls['course_status_background_color'] = [
            'group' => 'ld_course_status_settings',
            'label' => esc_html__('Status Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-status-icon.ld-secondary-background',
                ]
            ]
        ];

        // Controls for Course Progress Settings
        // $this->controls['course_progress_color'] = [
        //     'group' => 'ld_course_progress_settings',
        //     'label' => esc_html__('Progress Color', 'learndash-bricks'),
        //     'type' => 'color',
        //     'css' => [
        //         [
        //             'property' => 'color',
        //             'selector' => '.ld-item-component-progress',
        //         ]
        //     ]
        // ];

        $this->controls['course_progress_background_color'] = [
            'group' => 'ld_course_progress_settings',
            'label' => esc_html__('Progress Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-progress-bar-percentage',
                ]
            ]
        ];

        $this->controls['course_progress_typography'] = [
            'group' => 'ld_course_progress_settings',
            'label' => esc_html__('Progress Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-item-component-progress',
                ]
            ]
        ];

        // Controls for Course Step Settings
        $this->controls['course_step_color'] = [
            'group' => 'ld_course_step_settings',
            'label' => esc_html__('Step Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-item-component-steps',
                ]
            ]
        ];

        $this->controls['course_step_background_color'] = [
            'group' => 'ld_course_step_settings',
            'label' => esc_html__('Step Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-item-list-item',
                ]
            ]
        ];

        $this->controls['course_step_typography'] = [
            'group' => 'ld_course_step_settings',
            'label' => esc_html__('Step Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-item-component-steps',
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
            if ($value !== '') {
                $shortcode_atts .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
            }
        }

        // Construct the shortcode
        $shortcode = '[' . $this->shortcode_slug . $shortcode_atts . ']';

        // Output the shortcode
        echo "<div {$this->render_attributes('_root')}>";
        echo do_shortcode($shortcode);
        echo "</div>";
    }
}
