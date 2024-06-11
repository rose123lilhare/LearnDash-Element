<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Certificate extends Element
{
    protected $shortcode_slug   = 'ld_certificate';
    protected $shortcode_params = array(
        'course_id'  => 'course_id',
        'group_id'   => 'group_id',
        'quiz_id'    => 'quiz_id',
        'user_id'    => 'user_id',
        'label'      => 'label',
    );

	public $category = 'learndash course';
    public $name     = 'ld_certificate';
    public $icon     = 'ti-medall';

    public function get_label()
    {
        return esc_html__('LD Certificate Button', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_certificate_settings'] = [
            'title' => esc_html__('Settings', 'bricks')
        ];

        $this->controls['course_id'] = [
            'group'    => 'ld_certificate_settings',
            'label'    => esc_html__('Course ID', 'bricks'),
            'type'     => 'number',
            'default'  => 0
        ];

        $this->controls['group_id'] = [
            'group'    => 'ld_certificate_settings',
            'label'    => esc_html__('Group ID', 'bricks'),
            'type'     => 'number',
            'default'  => 0
        ];

        $this->controls['quiz_id'] = [
            'group'    => 'ld_certificate_settings',
            'label'    => esc_html__('Quiz ID', 'bricks'),
            'type'     => 'number',
            'default'  => 0
        ];

        $this->controls['user_id'] = [
            'group'    => 'ld_certificate_settings',
            'label'    => esc_html__('User ID', 'bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        $this->controls['label'] = [
            'group'    => 'ld_certificate_settings',
            'label'    => esc_html__('Label', 'bricks'),
            'type'     => 'text',
            'default'  => esc_html__('Certificate', 'learndash')
        ];

        $this->controls['a_background_color'] = [
            'group' => 'ld_certificate_settings',
            'label' => esc_html__('Link Background Color', 'bricks'),
            'type' => 'color',
            'default' => '#ffffff',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.learndash-wrapper a.button',
                ]
            ]
        ];

        $this->controls['a_typography'] = [
            'group' => 'ld_certificate_settings',
            'label' => esc_html__('Link Typography', 'bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.learndash-wrapper a.button',
                ]
            ]
        ];



        $this->controls['a_borders'] = [
            'group' => 'ld_certificate_settings',
            'label' => esc_html__('Link Border', 'bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.learndash-wrapper a.button',
                ]
            ]
        ];



        $this->controls['a_padding'] = [
            'group' => 'ld_certificate_settings',
            'label' => esc_html__('Link Padding', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'default' => [
                'top' => '10px',
                'right' => '20px',
                'bottom' => '10px',
                'left' => '20px',
            ],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.learndash-wrapper a.button',
                ]
            ]
        ];

        $this->controls['a_margin'] = [
            'group' => 'ld_certificate_settings',
            'label' => esc_html__('Link Margin', 'bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'default' => [
                'top' => '10px',
                'right' => '0',
                'bottom' => '10px',
                'left' => '0',
            ],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.learndash-wrapper a.button',
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
