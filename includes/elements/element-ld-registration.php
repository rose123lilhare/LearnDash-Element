<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_Registration extends Element
{
    protected $shortcode_slug   = 'ld_registration';
    protected $shortcode_params = array();

	public $category = 'learndash user';
    public $name     = 'ld_registration';
    public $icon     = 'ti-id-badge';

    public function get_label()
    {
        return esc_html__('LD Registration', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_registration_wrapper_settings'] = [
            'title' => esc_html__('Registration Wrapper Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_login_form_settings'] = [
            'title' => esc_html__('Login Form Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_registration_form_settings'] = [
            'title' => esc_html__('Registration Form Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_login_button_settings'] = [
            'title' => esc_html__('Login Button Settings', 'learndash-bricks')
        ];

        $this->control_groups['ld_registration_button_settings'] = [
            'title' => esc_html__('Registration Button Settings', 'learndash-bricks')
        ];

        // Controls for Registration Wrapper Settings
        $this->controls['wrapper_background_color'] = [
            'group' => 'ld_registration_wrapper_settings',
            'label' => esc_html__('Wrapper Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        $this->controls['wrapper_padding'] = [
            'group' => 'ld_registration_wrapper_settings',
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

        $this->controls['wrapper_margin'] = [
            'group' => 'ld_registration_wrapper_settings',
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

        $this->controls['wrapper_border'] = [
            'group' => 'ld_registration_wrapper_settings',
            'label' => esc_html__('Wrapper Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        $this->controls['wrapper_box_shadow'] = [
            'group' => 'ld_registration_wrapper_settings',
            'label' => esc_html__('Wrapper Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.learndash-wrapper',
                ]
            ]
        ];

        // Controls for Login Form Settings
        $this->controls['login_form_background_color'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.registration-login-form',
                ]
            ]
        ];

        $this->controls['login_form_padding'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.registration-login-form',
                ]
            ]
        ];

        $this->controls['login_form_margin'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.registration-login-form',
                ]
            ]
        ];

        $this->controls['login_form_border'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.registration-login-form',
                ]
            ]
        ];

        $this->controls['login_form_box_shadow'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.registration-login-form',
                ]
            ]
        ];

        // Login Form Fields
        $this->controls['login_form_input_background_color'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Input Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.registration-login-form input[type="text"], .registration-login-form input[type="password"]',
                ]
            ]
        ];

        $this->controls['login_form_input_text_color'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Input Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.registration-login-form input[type="text"], .registration-login-form input[type="password"]',
                ]
            ]
        ];

        $this->controls['login_form_input_border'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Input Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.registration-login-form input[type="text"], .registration-login-form input[type="password"]',
                ]
            ]
        ];

        $this->controls['login_form_input_padding'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Input Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.registration-login-form input[type="text"], .registration-login-form input[type="password"]',
                ]
            ]
        ];

        $this->controls['login_form_input_margin'] = [
            'group' => 'ld_login_form_settings',
            'label' => esc_html__('Login Form Input Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.registration-login-form input[type="text"], .registration-login-form input[type="password"]',
                ]
            ]
        ];

        // Controls for Registration Form Settings
        $this->controls['registration_form_background_color'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '#learndash_registerform',
                ]
            ]
        ];

        $this->controls['registration_form_padding'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '#learndash_registerform',
                ]
            ]
        ];

        $this->controls['registration_form_margin'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '#learndash_registerform',
                ]
            ]
        ];

        $this->controls['registration_form_border'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '#learndash_registerform',
                ]
            ]
        ];

        $this->controls['registration_form_box_shadow'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '#learndash_registerform',
                ]
            ]
        ];

        // Registration Form Fields
        $this->controls['registration_form_input_background_color'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Input Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '#learndash_registerform input[type="text"], #learndash_registerform input[type="password"]',
                ]
            ]
        ];

        $this->controls['registration_form_input_text_color'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Input Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '#learndash_registerform input[type="text"], #learndash_registerform input[type="password"]',
                ]
            ]
        ];

        $this->controls['registration_form_input_border'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Input Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '#learndash_registerform input[type="text"], #learndash_registerform input[type="password"]',
                ]
            ]
        ];

        $this->controls['registration_form_input_padding'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Input Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '#learndash_registerform input[type="text"], #learndash_registerform input[type="password"]',
                ]
            ]
        ];

        $this->controls['registration_form_input_margin'] = [
            'group' => 'ld_registration_form_settings',
            'label' => esc_html__('Registration Form Input Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '#learndash_registerform input[type="text"], #learndash_registerform input[type="password"]',
                ]
            ]
        ];

        // Controls for Login Button Settings
        $this->controls['login_button_text_color'] = [
            'group' => 'ld_login_button_settings',
            'label' => esc_html__('Login Button Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.registration-login-form .button-primary',
                ]
            ]
        ];

        $this->controls['login_button_background_color'] = [
            'group' => 'ld_login_button_settings',
            'label' => esc_html__('Login Button Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.registration-login-form .button-primary',
                ]
            ]
        ];

        $this->controls['login_button_padding'] = [
            'group' => 'ld_login_button_settings',
            'label' => esc_html__('Login Button Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.registration-login-form .button-primary',
                ]
            ]
        ];

        $this->controls['login_button_margin'] = [
            'group' => 'ld_login_button_settings',
            'label' => esc_html__('Login Button Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.registration-login-form .button-primary',
                ]
            ]
        ];

        $this->controls['login_button_border'] = [
            'group' => 'ld_login_button_settings',
            'label' => esc_html__('Login Button Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.registration-login-form .button-primary',
                ]
            ]
        ];

        $this->controls['login_button_box_shadow'] = [
            'group' => 'ld_login_button_settings',
            'label' => esc_html__('Login Button Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.registration-login-form .button-primary',
                ]
            ]
        ];

        // Controls for Registration Button Settings
        $this->controls['registration_button_text_color'] = [
            'group' => 'ld_registration_button_settings',
            'label' => esc_html__('Registration Button Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '#learndash_registerform .button-primary',
                ]
            ]
        ];

        $this->controls['registration_button_background_color'] = [
            'group' => 'ld_registration_button_settings',
            'label' => esc_html__('Registration Button Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '#learndash_registerform .button-primary',
                ]
            ]
        ];

        $this->controls['registration_button_padding'] = [
            'group' => 'ld_registration_button_settings',
            'label' => esc_html__('Registration Button Padding', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '#learndash_registerform .button-primary',
                ]
            ]
        ];

        $this->controls['registration_button_margin'] = [
            'group' => 'ld_registration_button_settings',
            'label' => esc_html__('Registration Button Margin', 'learndash-bricks'),
            'type' => 'dimensions',
            'units' => ['px', 'em', '%'],
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '#learndash_registerform .button-primary',
                ]
            ]
        ];

        $this->controls['registration_button_border'] = [
            'group' => 'ld_registration_button_settings',
            'label' => esc_html__('Registration Button Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '#learndash_registerform .button-primary',
                ]
            ]
        ];

        $this->controls['registration_button_box_shadow'] = [
            'group' => 'ld_registration_button_settings',
            'label' => esc_html__('Registration Button Box Shadow', 'learndash-bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '#learndash_registerform .button-primary',
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
