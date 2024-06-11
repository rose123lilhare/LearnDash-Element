<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Reset_Password extends Element
{
    protected $shortcode_slug   = 'ld_reset_password';
    protected $shortcode_params = array();

	public $category = 'learndash user';
    public $name     = 'ld_reset_password';
    public $icon     = 'ti-key';

    public function get_label()
    {
        return esc_html__('LD Reset Password', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_reset_password_wrapper_settings'] = [
            'title' => esc_html__('Reset Password Wrapper Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_reset_password_form_settings'] = [
            'title' => esc_html__('Reset Password Form Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_reset_password_fields_settings'] = [
            'title' => esc_html__('Reset Password Fields Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_reset_password_button_settings'] = [
            'title' => esc_html__('Reset Password Button Settings', 'learndash-bricks')
        ];

        // Controls for Reset Password Wrapper Settings
        $this->controls['reset_password_wrapper_background_color'] = [
            'group' => 'ld_reset_password_wrapper_settings',
            'label' => esc_html__('Wrapper Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        $this->controls['reset_password_wrapper_padding'] = [
            'group' => 'ld_reset_password_wrapper_settings',
            'label' => esc_html__('Wrapper Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        $this->controls['reset_password_wrapper_margin'] = [
            'group' => 'ld_reset_password_wrapper_settings',
            'label' => esc_html__('Wrapper Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        $this->controls['reset_password_wrapper_border'] = [
            'group' => 'ld_reset_password_wrapper_settings',
            'label' => esc_html__('Wrapper Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        $this->controls['reset_password_wrapper_box_shadow'] = [
            'group' => 'ld_reset_password_wrapper_settings',
            'label' => esc_html__('Wrapper Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        // Controls for Reset Password Form Settings
        $this->controls['reset_password_form_background_color'] = [
            'group' => 'ld_reset_password_form_settings',
            'label' => esc_html__('Form Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '#learndash-reset-password-wrapper form',
                ]
            ]
        ];

        $this->controls['reset_password_form_padding'] = [
            'group' => 'ld_reset_password_form_settings',
            'label' => esc_html__('Form Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '#learndash-reset-password-wrapper form',
                ]
            ]
        ];

        $this->controls['reset_password_form_margin'] = [
            'group' => 'ld_reset_password_form_settings',
            'label' => esc_html__('Form Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '#learndash-reset-password-wrapper form',
                ]
            ]
        ];

        $this->controls['reset_password_form_border'] = [
            'group' => 'ld_reset_password_form_settings',
            'label' => esc_html__('Form Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '#learndash-reset-password-wrapper form',
                ]
            ]
        ];

        $this->controls['reset_password_form_box_shadow'] = [
            'group' => 'ld_reset_password_form_settings',
            'label' => esc_html__('Form Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '#learndash-reset-password-wrapper form',
                ]
            ]
        ];

        // Controls for Reset Password Fields Settings
        $this->controls['reset_password_fields_text_color'] = [
            'group' => 'ld_reset_password_fields_settings',
            'label' => esc_html__('Fields Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '#learndash-reset-password-wrapper input[type="text"], #learndash-reset-password-wrapper input[type="password"]',
                ]
            ]
        ];

        $this->controls['reset_password_fields_background_color'] = [
            'group' => 'ld_reset_password_fields_settings',
            'label' => esc_html__('Fields Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '#learndash-reset-password-wrapper input[type="text"], #learndash-reset-password-wrapper input[type="password"]',
                ]
            ]
        ];

        $this->controls['reset_password_fields_padding'] = [
            'group' => 'ld_reset_password_fields_settings',
            'label' => esc_html__('Fields Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '#learndash-reset-password-wrapper input[type="text"], #learndash-reset-password-wrapper input[type="password"]',
                ]
            ]
        ];

        $this->controls['reset_password_fields_margin'] = [
            'group' => 'ld_reset_password_fields_settings',
            'label' => esc_html__('Fields Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '#learndash-reset-password-wrapper input[type="text"], #learndash-reset-password-wrapper input[type="password"]',
                ]
            ]
        ];

        $this->controls['reset_password_fields_border'] = [
            'group' => 'ld_reset_password_fields_settings',
            'label' => esc_html__('Fields Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '#learndash-reset-password-wrapper input[type="text"], #learndash-reset-password-wrapper input[type="password"]',
                ]
            ]
        ];

        $this->controls['reset_password_fields_box_shadow'] = [
            'group' => 'ld_reset_password_fields_settings',
            'label' => esc_html__('Fields Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '#learndash-reset-password-wrapper input[type="text"], #learndash-reset-password-wrapper input[type="password"]',
                ]
            ]
        ];

        // Controls for Reset Password Button Settings
        $this->controls['reset_password_button_text_color'] = [
            'group' => 'ld_reset_password_button_settings',
            'label' => esc_html__('Button Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '#learndash-reset-password-wrapper input[type="submit"]',
                ]
            ]
        ];

        $this->controls['reset_password_button_background_color'] = [
            'group' => 'ld_reset_password_button_settings',
            'label' => esc_html__('Button Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '#learndash-reset-password-wrapper input[type="submit"]',
                ]
            ]
        ];

        $this->controls['reset_password_button_padding'] = [
            'group' => 'ld_reset_password_button_settings',
            'label' => esc_html__('Button Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '#learndash-reset-password-wrapper input[type="submit"]',
                ]
            ]
        ];

        $this->controls['reset_password_button_margin'] = [
            'group' => 'ld_reset_password_button_settings',
            'label' => esc_html__('Button Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '#learndash-reset-password-wrapper input[type="submit"]',
                ]
            ]
        ];

        $this->controls['reset_password_button_border'] = [
            'group' => 'ld_reset_password_button_settings',
            'label' => esc_html__('Button Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '#learndash-reset-password-wrapper input[type="submit"]',
                ]
            ]
        ];

        $this->controls['reset_password_button_box_shadow'] = [
            'group' => 'ld_reset_password_button_settings',
            'label' => esc_html__('Button Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '#learndash-reset-password-wrapper input[type="submit"]',
                ]
            ]
        ];
    }

    public function render()
    {
        // Simply echo the shortcode
        echo "<div {$this->render_attributes('_root')}>";
        echo do_shortcode('[' . $this->shortcode_slug . ']');
        echo "</div>";
    }
}
