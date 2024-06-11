<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Navigation extends Element
{
    protected $shortcode_slug   = 'ld_navigation';
    protected $shortcode_params = array(
        'course_id' => 'course_id',
        'post_id'   => 'post_id',
        'user_id'   => 'user_id',
    );

    public $category = 'learndash general';
    public $name     = 'ld_navigation';
    public $icon     = 'ti-control-forward';

    public function get_label()
    {
        return esc_html__('LD Navigation', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_navigation_settings'] = [
            'title' => esc_html__('Settings', 'learndash-bricks')
        ];
        $this->control_groups['ld_navigation_wrapper_settings'] = [
            'title' => esc_html__('Wrapper Style Settings', 'learndash-bricks')
        ];
        $this->control_groups['ld_content_action_settings'] = [
            'title' => esc_html__('Action Style Settings', 'learndash-bricks')
        ];
        $this->control_groups['ld_course_step_back_button_settings'] = [
            'title' => esc_html__('Back Button Style Settings', 'learndash-bricks')
        ];
        $this->control_groups['ld_next_topic_button_settings'] = [
            'title' => esc_html__('Next Button Style Settings', 'learndash-bricks')
        ];

        $this->controls['course_id'] = [
            'group'    => 'ld_navigation_settings',
            'label'    => esc_html__('Course ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => false
        ];

        $this->controls['post_id'] = [
            'group'    => 'ld_navigation_settings',
            'label'    => esc_html__('Post ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => false
        ];

        $this->controls['user_id'] = [
            'group'    => 'ld_navigation_settings',
            'label'    => esc_html__('User ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => false
        ];

        // Control Group: Navigation Wrapper Settings
        $this->controls['wrapper_background_color'] = [
            'group' => 'ld_navigation_wrapper_settings',
            'label' => esc_html__('Wrapper Background Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
                ]
            ]
        ];

        $this->controls['wrapper_padding'] = [
            'group' => 'ld_navigation_wrapper_settings',
            'label' => esc_html__('Wrapper Padding', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
                ]
            ]
        ];

        $this->controls['wrapper_margin'] = [
            'group' => 'ld_navigation_wrapper_settings',
            'label' => esc_html__('Wrapper Margin', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
                ]
            ]
        ];

        $this->controls['wrapper_box_shadow'] = [
            'group' => 'ld_navigation_wrapper_settings',
            'label' => esc_html__('Wrapper Box Shadow', 'bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
                ]
            ]
        ];

        $this->controls['wrapper_borders'] = [
            'group' => 'ld_navigation_wrapper_settings',
            'label' => esc_html__('Wrapper Border', 'bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
                ]
            ]
        ];


        // Control Group: Content Action Settings
        $this->controls['content_action_background_color'] = [
            'group' => 'ld_content_action_settings',
            'label' => esc_html__('Content Action Background Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-content-action',
                ]
            ]
        ];

        $this->controls['content_action_padding'] = [
            'group' => 'ld_content_action_settings',
            'label' => esc_html__('Content Action Padding', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.ld-content-action',
                ]
            ]
        ];

        $this->controls['content_action_margin'] = [
            'group' => 'ld_content_action_settings',
            'label' => esc_html__('Content Action Margin', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.ld-content-action',
                ]
            ]
        ];

        $this->controls['content_action_box_shadow'] = [
            'group' => 'ld_content_action_settings',
            'label' => esc_html__('Content Action Box Shadow', 'bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.ld-content-action',
                ]
            ]
        ];

        $this->controls['content_action_borders'] = [
            'group' => 'ld_content_action_settings',
            'label' => esc_html__('Content Action Border', 'bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.ld-content-action',
                ]
            ]
        ];

        // Control Group: Course Step Back Button Settings
        $this->controls['back_button_text_color'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Text Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];

        $this->controls['back_button_background_color'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Background Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];

        $this->controls['back_button_padding'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Padding', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];

        $this->controls['back_button_margin'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Margin', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];

        $this->controls['back_button_box_shadow'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Box Shadow', 'bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];

        $this->controls['back_button_borders'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Border', 'bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];


        $this->controls['back_button_typography'] = [
            'group' => 'ld_course_step_back_button_settings',
            'label' => esc_html__('Back Button Typography', 'bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-course-step-back',
                ]
            ]
        ];

        // Control Group: Next Topic Button Settings
        $this->controls['next_button_text_color'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Text Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-button',
                ]
            ]
        ];

        $this->controls['next_button_background_color'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Background Color', 'bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-button',
                ]
            ]
        ];

        $this->controls['next_button_padding'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Padding', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.ld-button',
                ]
            ]
        ];

        $this->controls['next_button_margin'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Margin', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.ld-button',
                ]
            ]
        ];

        $this->controls['next_button_box_shadow'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Box Shadow', 'bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.ld-button',
                ]
            ]
        ];

        $this->controls['next_button_borders'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Border', 'bricks'),
            'type' => 'coborderlor',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.ld-button',
                ]
            ]
        ];

        $this->controls['next_button_typography'] = [
            'group' => 'ld_next_topic_button_settings',
            'label' => esc_html__('Next Button Typography', 'bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-button',
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
            if ($value !== false) { // Exclude false values
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
