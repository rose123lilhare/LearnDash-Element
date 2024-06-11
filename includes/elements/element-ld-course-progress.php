<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_Course_Progress extends Element
{
	public $category = 'learndash course';
	public $name = 'learndash_course_progress';
	public $icon = 'ti-stats-up';

	public function get_label()
	{
		return esc_html__('LD Course Progress', 'bricks');
	}

	public function set_controls()
	{

		// Settings section
		$this->control_groups['ld_course_settings'] = [
			'title' => esc_html__('Settings', 'learndash-bricks')
		];
		$this->control_groups['ld_course_progress_settings'] = [
			'title' => esc_html__('Progress Bar Settings', 'learndash-bricks')
		];

		// Control for specifying a user ID
		$this->controls['user_id'] = [
			'group' => 'ld_course_settings',
			'label'       => esc_html__('User ID', 'bricks'),
			'type'        => 'number',
			'description' => esc_html__('Display the progress for a specific user.', 'bricks'),
			'placeholder' => esc_html__('Enter User ID', 'bricks'),
		];

		// Control for specifying a course ID
		$this->controls['course_id'] = [
			'group' => 'ld_course_settings',
			'label'       => esc_html__('Course ID', 'bricks'),
			'type'        => 'number',
			'description' => esc_html__('Display the progress for a specific course.', 'bricks'),
			'placeholder' => esc_html__('Enter Course ID', 'bricks'),
		];

		$this->controls['progress_text_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_bordes'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_padding'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_margin'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_box_shadow'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_bar_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-progress-bar',
				]
			]
		];

		$this->controls['progress_bar_percentage_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Percentage Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];

		$this->controls['progress_bar_percentage_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Percentage Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];

		$this->controls['progress_bar_percentage_borders'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Percentage Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];

		$this->controls['progress_percentage_typography'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Percentage Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-progress-percentage',
				]
			]
		];

		$this->controls['progress_steps_typography'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Steps Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-progress-steps',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$user_id = !empty($settings['user_id']) ? intval($settings['user_id']) : get_current_user_id();
		$course_id = !empty($settings['course_id']) ? intval($settings['course_id']) : learndash_get_course_id(get_the_ID());

		$shortcode = '[learndash_course_progress';
		$shortcode .= $user_id ? ' user_id="' . $user_id . '"' : '';
		$shortcode .= $course_id ? ' course_id="' . $course_id . '"' : '';
		$shortcode .= ']';
		echo "<div {$this->render_attributes('_root')}>";
		echo do_shortcode($shortcode);
		echo "</div>";
	}
}
