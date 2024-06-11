<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_User_Meta extends Element
{
	protected $shortcode_slug = 'usermeta';

	public $category = 'learndash user';
	public $name = 'learn_dash_user_meta';
	public $icon = 'ti-user';

	public function get_label()
	{
		return esc_html__('LD User Meta', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_user_meta_settings'] = [
			'title' => esc_html__('User Meta Settings', 'bricks')
		];

		$this->controls['field'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('User Field', 'bricks'),
			'type' => 'select',
			'options' => [
				'first_name'  => __('First Name', 'bricks'),
				'last_name'   => __('Last Name', 'bricks'),
				'display_name' => __('Display Name', 'bricks'),
				'user_login'  => __('Username', 'bricks'),
				'nickname'    => __('Nickname', 'bricks'),
				'user_email'  => __('Email Address', 'bricks'),
				'user_url'    => __('Website URL', 'bricks'),
				'description' => __('Description', 'bricks'),
			],
			'default' => 'first_name',
		];

	
		$this->controls['course_info_background_color'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.be-learndash-user-info',
				]
			]
		];
		
		$this->controls['course_info_typography'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.be-learndash-user-info',
				]
			]
		];

		
		$this->controls['course_info_borders'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('Border', 'bricks'),
			'type' => 'border',
			'units' => ['px'],
			'css' => [
				[
					'property' => 'border',
					'selector' => '.be-learndash-user-info',
				]
			]
		];
		
		$this->controls['course_info_padding'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.be-learndash-user-info',
				]
			]
		];
		
		$this->controls['course_info_margin'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.be-learndash-user-info',
				]
			]
		];
		
		$this->controls['course_info_box_shadow'] = [
			'group' => 'ld_user_meta_settings',
			'label' => esc_html__('Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.be-learndash-user-info',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$field = $settings['field'];
		$output = '';

		$shortcode_str = '[usermeta field="' . esc_attr($field) . '"]';

		$output .= "<div {$this->render_attributes('_root')}>";
		$output .= "<div class='be-learndash-user-info'>";
		$output .= do_shortcode($shortcode_str);
		$output .= '</div>';
		$output .= '</div>';

		echo $output;
	}
}
