<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Payment_Buttons extends Element
{
	protected $shortcode_slug   = 'learndash_payment_buttons';
	protected $shortcode_params = array(
		'course_id' => 'course_id',
	);

	public $category = 'learndash course';
	public $name     = 'learn_dash_payment_buttons';
	public $icon     = 'ti-money';

	public function get_label()
	{
		return esc_html__('LD Payment Buttons', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_payment_buttons_settings'] = [
			'title' => esc_html__('Payment Button Settings', 'bricks')
		];

		$this->controls['course_id'] = [
			'group'   => 'ld_payment_buttons_settings',
			'label'   => esc_html__('Course ID', 'bricks'),
			'type'    => 'number',
			'default' => '',
			'description' => 'Enter the Course ID for which payment buttons are to be displayed. Leave blank to use within course context.'
		];


		$this->control_groups['ld_take_course_button_settings'] = [
			'title' => esc_html__('Take Course Button Settings', 'learndash-bricks')
		];


		// Controls for Take Course Button Settings
		$this->controls['take_course_button_text_color'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '#btn-join',
				]
			]
		];

		$this->controls['take_course_button_background_color'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '#btn-join',
				]
			]
		];

		$this->controls['take_course_button_typography'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '#btn-join',
				]
			]
		];

		$this->controls['take_course_button_padding'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '#btn-join',
				]
			]
		];

		$this->controls['take_course_button_margin'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '#btn-join',
				]
			]
		];

		$this->controls['take_course_button_border'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '#btn-join',
				]
			]
		];


		$this->controls['take_course_button_box_shadow'] = [
			'group' => 'ld_take_course_button_settings',
			'label' => esc_html__('Box Shadow', 'learndash-bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '#btn-join',
				]
			]
		];

		// Settings section
		$this->control_groups['ld_course_ended_button_settings'] = [
			'title' => esc_html__('Course Ended Button Settings', 'learndash-bricks')
		];

		// Controls for Course Ended Button Settings
		$this->controls['course_ended_button_text_color'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '#btn-join.btn-disabled',
				]
			]
		];

		$this->controls['course_ended_button_background_color'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '#btn-join.btn-disabled',
				]
			]
		];

		$this->controls['course_ended_button_typography'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '#btn-join.btn-disabled',
				]
			]
		];

		$this->controls['course_ended_button_padding'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '#btn-join.btn-disabled',
				]
			]
		];

		$this->controls['course_ended_button_margin'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '#btn-join.btn-disabled',
				]
			]
		];

		$this->controls['course_ended_button_border'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '#btn-join.btn-disabled',
				]
			]
		];

		$this->controls['course_ended_button_box_shadow'] = [
			'group' => 'ld_course_ended_button_settings',
			'label' => esc_html__('Box Shadow', 'learndash-bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '#btn-join.btn-disabled',
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
			if (empty($val)) {
				continue;  // Skip empty parameters to adhere to shortcode defaults
			}
			$val = esc_attr($val);
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
