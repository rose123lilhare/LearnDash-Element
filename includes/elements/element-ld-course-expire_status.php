<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Course_Expire_Status extends Element
{
    protected $shortcode_slug   = 'ld_course_expire_status';
    protected $shortcode_params = array(
        'course_id'    => 'course_id',
        'user_id'      => 'user_id',
        'label_before' => 'label_before',
        'label_after'  => 'label_after',
        'format'       => 'format',
    );

	public $category = 'learndash course';
    public $name     = 'ld_course_expire_status';
    public $icon     = 'ti-time';

    public function get_label()
    {
        return esc_html__('LD Course Expire Status', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_course_expire_status_settings'] = [
            'title' => esc_html__('Settings', 'bricks')
        ];

        $this->controls['course_id'] = [
            'group'    => 'ld_course_expire_status_settings',
            'label'    => esc_html__('Course ID', 'bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        $this->controls['user_id'] = [
            'group'    => 'ld_course_expire_status_settings',
            'label'    => esc_html__('User ID', 'bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        $this->controls['label_before'] = [
            'group'    => 'ld_course_expire_status_settings',
            'label'    => esc_html__('Label Before', 'bricks'),
            'type'     => 'text',
            'default'  => sprintf(esc_html_x('%s access will expire on:', 'placeholder: Course', 'learndash'), \LearnDash_Custom_Label::get_label('course'))
        ];

        $this->controls['label_after'] = [
            'group'    => 'ld_course_expire_status_settings',
            'label'    => esc_html__('Label After', 'bricks'),
            'type'     => 'text',
            'default'  => sprintf(esc_html_x('%s access expired on:', 'placeholder: Course', 'learndash'), \LearnDash_Custom_Label::get_label('course'))
        ];

        $this->controls['format'] = [
            'group'    => 'ld_course_expire_status_settings',
            'label'    => esc_html__('Date Format', 'bricks'),
            'type'     => 'text',
            'default'  => get_option('date_format') . ' ' . get_option('time_format')
        ];
        // Define control groups
        $this->control_groups['ld_course_expire_status_style_settings'] = [
            'title' => esc_html__('Course Expire Status Style Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_course_expire_status_date_settings'] = [
            'title' => esc_html__('Course Expire Status Date Style Settings', 'learndash-bricks')
        ];

        // Controls for Course Expire Status Message
        $this->controls['course_expire_status_text_color'] = [
            'group' => 'ld_course_expire_status_style_settings',
            'label' => esc_html__('Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.learndash-course-expire-status-message p',
                ]
            ]
        ];

        $this->controls['course_expire_status_background_color'] = [
            'group' => 'ld_course_expire_status_style_settings',
            'label' => esc_html__('Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.learndash-course-expire-status-message',
                ]
            ]
        ];

        $this->controls['course_expire_status_padding'] = [
            'group' => 'ld_course_expire_status_style_settings',
            'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.learndash-course-expire-status-message',
                ]
            ]
        ];

        $this->controls['course_expire_status_margin'] = [
            'group' => 'ld_course_expire_status_style_settings',
            'label' => esc_html__('Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.learndash-course-expire-status-message',
                ]
            ]
        ];

        $this->controls['course_expire_status_border'] = [
            'group' => 'ld_course_expire_status_style_settings',
            'label' => esc_html__('Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.learndash-course-expire-status-message',
                ]
            ]
        ];

        $this->controls['course_expire_status_box_shadow'] = [
            'group' => 'ld_course_expire_status_style_settings',
            'label' => esc_html__('Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.learndash-course-expire-status-message',
                ]
            ]
        ];

        // Controls for Course Expire Status Date
        $this->controls['course_expire_status_date_text_color'] = [
            'group' => 'ld_course_expire_status_date_settings',
            'label' => esc_html__('Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.learndash-course-expire-status-date',
                ]
            ]
        ];

        $this->controls['course_expire_status_date_background_color'] = [
            'group' => 'ld_course_expire_status_date_settings',
            'label' => esc_html__('Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.learndash-course-expire-status-date',
                ]
            ]
        ];

        $this->controls['course_expire_status_date_padding'] = [
            'group' => 'ld_course_expire_status_date_settings',
            'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.learndash-course-expire-status-date',
                ]
            ]
        ];

        $this->controls['course_expire_status_date_margin'] = [
            'group' => 'ld_course_expire_status_date_settings',
            'label' => esc_html__('Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.learndash-course-expire-status-date',
                ]
            ]
        ];

        $this->controls['course_expire_status_date_border'] = [
            'group' => 'ld_course_expire_status_date_settings',
            'label' => esc_html__('Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.learndash-course-expire-status-date',
                ]
            ]
        ];

        $this->controls['course_expire_status_date_box_shadow'] = [
            'group' => 'ld_course_expire_status_date_settings',
            'label' => esc_html__('Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.learndash-course-expire-status-date',
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
        echo "<div {$this->render_attributes('_root')}>";;
        echo do_shortcode($shortcode);
        echo "</div>";
    }
}
