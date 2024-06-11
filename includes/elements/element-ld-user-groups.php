<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_User_Groups extends Element
{
    protected $shortcode_slug   = 'user_groups';
    protected $shortcode_params = array(
        'user_id' => 'user_id',
    );

	public $category = 'learndash user';
    public $name     = 'user_groups';
    public $icon     = 'ti-user';

    public function get_label()
    {
        return esc_html__('User Groups List', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['user_groups_settings'] = [
            'title' => esc_html__('Settings', 'bricks')
        ];

        $this->controls['user_id'] = [
            'group'    => 'user_groups_settings',
            'label'    => esc_html__('User ID', 'bricks'),
            'type'     => 'number',
            'default'  => ''
        ];

        // Settings section
        $this->control_groups['ld_assigned_groups_settings'] = [
            'title' => esc_html__('Assigned Group(s) Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_group_item_settings'] = [
            'title' => esc_html__('Group Item Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_expand_button_settings'] = [
            'title' => esc_html__('Expand Button Settings', 'learndash-bricks')
        ];


        // Controls for Assigned Group(s) Settings

        $this->controls['assigned_groups_background_color'] = [
            'group' => 'ld_assigned_groups_settings',
            'label' => esc_html__('Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-item-list-group-leader',
                ]
            ]
        ];

        $this->controls['assigned_groups_typography'] = [
            'group' => 'ld_assigned_groups_settings',
            'label' => esc_html__('Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-item-list-group-leader .ld-section-heading h2',
                ]
            ]
        ];

        // Controls for Group Item Settings
        $this->controls['group_item_name_color'] = [
            'group' => 'ld_group_item_settings',
            'label' => esc_html__('Item Name Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-item-list-item-preview .ld-item-name',
                ]
            ]
        ];

        $this->controls['group_item_background_color'] = [
            'group' => 'ld_group_item_settings',
            'label' => esc_html__('Item Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-item-list-item',
                ]
            ]
        ];

        $this->controls['group_item_typography'] = [
            'group' => 'ld_group_item_settings',
            'label' => esc_html__('Item Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-item-list-item-preview .ld-item-name',
                ]
            ]
        ];

        // Controls for Expand Button Settings
        $this->controls['expand_button_color'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.ld-expand-button .ld-text',
                ]
            ]
        ];

        $this->controls['expand_button_background_color'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.ld-expand-button',
                ]
            ]
        ];

        $this->controls['expand_button_typography'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Typography', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.ld-expand-button .ld-text',
                ]
            ]
        ];

        $this->controls['expand_button_padding'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.ld-expand-button',
                ]
            ]
        ];

        $this->controls['expand_button_margin'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.ld-expand-button',
                ]
            ]
        ];

        $this->controls['expand_button_border'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.ld-expand-button',
                ]
            ]
        ];

        $this->controls['expand_button_box_shadow'] = [
            'group' => 'ld_expand_button_settings',
            'label' => esc_html__('Button Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.ld-expand-button',
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
