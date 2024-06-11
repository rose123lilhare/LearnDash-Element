<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Login extends Element
{
	protected $shortcode_slug   = 'learndash_login';
	protected $shortcode_params = array(
		'login_url'         => 'login_url',
		'login_label'       => 'login_label',
		'login_placement'   => 'login_placement',
		'login_button'      => 'login_button',

		'logout_url'        => 'logout_url',
		'logout_label'      => 'logout_label',
		'logout_placement'  => 'logout_placement',
		'logout_button'     => 'logout_button',
	);

	public $category = 'learndash user';
	public $name     = 'learn_dash_login';
	public $icon     = 'ti-unlock';

	public function get_label()
	{
		return esc_html__('LD Login/Logout', 'bricks');
	}

	public function set_controls()
	{
		// Settings for login
		$this->control_groups['ld_login_settings'] = [
			'title' => esc_html__('Login Settings', 'bricks')
		];

		$this->controls['login_url'] = [
			'group'   => 'ld_login_settings',
			'label'   => esc_html__('Login URL', 'bricks'),
			'type'    => 'text',
			'default' => '',
			'description' => 'URL to redirect after login.'
		];

		$this->controls['login_label'] = [
			'group'   => 'ld_login_settings',
			'label'   => esc_html__('Login Button Label', 'bricks'),
			'type'    => 'text',
			'default' => 'Login',
		];

		$this->controls['login_placement'] = [
			'group'   => 'ld_login_settings',
			'label'   => esc_html__('Login Button Placement', 'bricks'),
			'type'    => 'select',
			'options' => [
				'before' => 'Before content',
				'after'  => 'After content'
			],
			'default' => 'before'
		];

		// $this->controls['login_button'] = [
		// 	'group'   => 'ld_login_settings',
		// 	'label'   => esc_html__('Show Login Button', 'bricks'),
		// 	'type'    => 'checkbox',
		// 	'default' => true
		// ];

		// Settings for logout
		$this->control_groups['ld_logout_settings'] = [
			'title' => esc_html__('Logout Settings', 'bricks')
		];

		$this->controls['logout_url'] = [
			'group'   => 'ld_logout_settings',
			'label'   => esc_html__('Logout URL', 'bricks'),
			'type'    => 'text',
			'default' => '',
			'description' => 'URL to redirect after logout.'
		];

		$this->controls['logout_label'] = [
			'group'   => 'ld_logout_settings',
			'label'   => esc_html__('Logout Button Label', 'bricks'),
			'type'    => 'text',
			'default' => 'Logout',
		];

		$this->controls['logout_placement'] = [
			'group'   => 'ld_logout_settings',
			'label'   => esc_html__('Logout Button Placement', 'bricks'),
			'type'    => 'select',
			'options' => [
				'before' => 'Before content',
				'after'  => 'After content'
			],
			'default' => 'before'
		];

		// $this->controls['logout_button'] = [
		// 	'group'   => 'ld_logout_settings',
		// 	'label'   => esc_html__('Show Logout Button', 'bricks'),
		// 	'type'    => 'checkbox',
		// 	'default' => true
		// ];

		// Settings section
		$this->control_groups['ld_login_button_settings'] = [
			'title' => esc_html__('Login Button Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_logout_button_settings'] = [
			'title' => esc_html__('Logout Button Settings', 'learndash-bricks')
		];

		// Controls for Login Button Settings
		// $this->controls['login_button_text_color'] = [
		// 	'group' => 'ld_login_button_settings',
		// 	'label' => esc_html__('Text Color', 'learndash-bricks'),
		// 	'type' => 'color',
		// 	'css' => [
		// 		[
		// 			'property' => 'color',
		// 			'selector' => '.ld-login',
		// 		]
		// 	]
		// ];

		$this->controls['login_button_background_color'] = [
			'group' => 'ld_login_button_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-login',
				]
			]
		];

		$this->controls['login_button_typography'] = [
			'group' => 'ld_login_button_settings',
			'label' => esc_html__('Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-login',
				]
			]
		];

		$this->controls['login_button_padding'] = [
			'group' => 'ld_login_button_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-login',
				]
			]
		];

		$this->controls['login_button_margin'] = [
			'group' => 'ld_login_button_settings',
			'label' => esc_html__('Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-login',
				]
			]
		];

		$this->controls['login_button_border'] = [
			'group' => 'ld_login_button_settings',
			'label' => esc_html__('Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-login',
				]
			]
		];

		$this->controls['login_button_box_shadow'] = [
			'group' => 'ld_login_button_settings',
			'label' => esc_html__('Box Shadow', 'learndash-bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-login',
				]
			]
		];

		// Controls for Logout Button Settings
		// $this->controls['logout_button_text_color'] = [
		// 	'group' => 'ld_logout_button_settings',
		// 	'label' => esc_html__('Text Color', 'learndash-bricks'),
		// 	'type' => 'color',
		// 	'css' => [
		// 		[
		// 			'property' => 'color',
		// 			'selector' => '.ld-logout',
		// 		]
		// 	]
		// ];

		$this->controls['logout_button_background_color'] = [
			'group' => 'ld_logout_button_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-logout',
				]
			]
		];

		$this->controls['logout_button_typography'] = [
			'group' => 'ld_logout_button_settings',
			'label' => esc_html__('Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-logout',
				]
			]
		];

		$this->controls['logout_button_padding'] = [
			'group' => 'ld_logout_button_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-logout',
				]
			]
		];

		$this->controls['logout_button_margin'] = [
			'group' => 'ld_logout_button_settings',
			'label' => esc_html__('Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-logout',
				]
			]
		];

		$this->controls['logout_button_border'] = [
			'group' => 'ld_logout_button_settings',
			'label' => esc_html__('Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-logout',
				]
			]
		];


		$this->controls['logout_button_box_shadow'] = [
			'group' => 'ld_logout_button_settings',
			'label' => esc_html__('Box Shadow', 'learndash-bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-logout',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$shortcode_pairs = array();
		foreach ($this->shortcode_params as $key_ex => $key_in) {
			if (isset($settings[$key_ex])) {
				$shortcode_pairs[$key_in] = $settings[$key_ex];
			}
		}

		$shortcode_params_str = '';
		foreach ($shortcode_pairs as $key => $val) {
			if ($val === true) {
				$val = 'true';
			} elseif ($val === false || $val === '') {
				continue;  // Skip parameters that are false or empty to adhere to shortcode defaults
			} else {
				$val = esc_attr($val);
			}
			$shortcode_params_str .= ' ' . $key . '="' . $val . '"';
		}

		if (!empty($shortcode_params_str)) {
			$shortcode_params_str = '[' . $this->shortcode_slug . $shortcode_params_str . ']';
			echo "<div {$this->render_attributes('_root')}>";
			echo do_shortcode($shortcode_params_str);
			echo "</div>";
		} else {
			$shortcode_params_str = '[' . $this->shortcode_slug .  ']';
			echo "<div {$this->render_attributes('_root')}>";
			echo do_shortcode($shortcode_params_str);
			echo "</div>";
		}
	}
}
