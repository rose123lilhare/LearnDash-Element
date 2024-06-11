<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Course_Resume extends Element
{
	protected $shortcode_slug   = 'ld_course_resume';
	protected $shortcode_params = array(
		'course_id'  => 'course_id',
		'user_id'    => 'user_id',
		'label'      => 'label',
		'html_class' => 'html_class',
		'html_id'    => 'html_id',
		'button'     => 'button',
	);

	public $category = 'learndash course';
	public $name     = 'learn_dash_course_resume';
	public $icon     = 'ti-check-box';

	public function get_label()
	{
		return esc_html__('LD Course Resume', 'bricks');
	}


	public function set_controls()
	{
		// Settings section
		$this->control_groups['ld_course_resume_settings'] = [
			'title' => esc_html__('Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_course_resume_button_style_settings'] = [
			'title' => esc_html__('Styles', 'learndash-bricks')
		];

		$this->controls['course_id'] = [
			'group'    => 'ld_course_resume_settings',
			'label'    => esc_html__('Course ID', 'learndash-bricks'),
			'type'     => 'number',
			'default'  => 0
		];

		$this->controls['user_id'] = [
			'group'    => 'ld_course_resume_settings',
			'label'    => esc_html__('User ID', 'learndash-bricks'),
			'type'     => 'number',
			'default'  => ''
		];

		$this->controls['label'] = [
			'group'    => 'ld_course_resume_settings',
			'label'    => esc_html__('Label', 'learndash-bricks'),
			'type'     => 'text',
			'default'  => ''
		];

		$this->controls['button_background_color'] = [
			'group' => 'ld_course_resume_button_style_settings',
			'label' => esc_html__('Button Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-course-resume.ld-button',
				]
			]
		];

		$this->controls['button_box_shadow'] = [
			'group' => 'ld_course_resume_button_style_settings',
			'label' => esc_html__('Button Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-course-resume.ld-button',
				]
			]
		];

		$this->controls['button_borders'] = [
			'group' => 'ld_course_resume_button_style_settings',
			'label' => esc_html__('Button Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-course-resume.ld-button',
				]
			]
		];

		$this->controls['button_typography'] = [
			'group' => 'ld_course_resume_button_style_settings',
			'label' => esc_html__('Button Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-course-resume.ld-button',
				]
			]
		];

		$this->controls['button_padding'] = [
			'group' => 'ld_course_resume_button_style_settings',
			'label' => esc_html__('Button Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-course-resume.ld-button',
				]
			]
		];

		$this->controls['button_margin'] = [
			'group' => 'ld_course_resume_button_style_settings',
			'label' => esc_html__('Button Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-course-resume.ld-button',
				]
			]
		];
	}


	public function render()
	{
		$settings = $this->settings;

		// Set course ID if not provided
		if (empty($settings['course_id'])) {
			// Get current post ID
			$current_post_id = get_the_ID();
			// Check if it's a LearnDash course
			if (get_post_type($current_post_id) === learndash_get_post_type_slug('course')) {
				$settings['course_id'] = $current_post_id;
			}
		}

		// Set user ID if not provided
		if (empty($settings['user_id'])) {
			$settings['user_id'] = get_current_user_id();
		}

		// Generate shortcode attributes
		$shortcode_atts = '';
		foreach ($settings as $key => $value) {
			if (!empty($value)) {
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
