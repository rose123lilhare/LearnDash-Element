<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_Visitor extends Element
{
	public $category = 'learndash course';
	public $name = 'learndash_visitor';
	public $icon = 'ti-eye';
	public $nestable = true;

	public function get_label()
	{
		return esc_html__('LD Visitor', 'bricks');
	}

	public function set_controls()
	{
		$this->controls['course_id'] = [
			'label'       => esc_html__('Course ID', 'bricks'),
			'type'        => 'number',
			'description' => esc_html__('Enter the ID of the course. Content inside this block will only be visible to users who do not have access to the specified course.', 'bricks'),
			'placeholder' => esc_html__('Enter Course ID', 'bricks'),
		];
	}

	public function get_nestable_children()
	{
		return [
			[
				'name'     => 'block',
				'label'    => esc_html__('Visitor Content', 'bricks'),
				'settings' => [
					'_hidden' => [
						'_cssClasses' => 'visitor-content',
					],
				],
			],
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$current_post_id = get_the_ID();
		$course_id = !empty($settings['course_id']) ? intval($settings['course_id']) : learndash_get_course_id($current_post_id);

		if (!is_user_logged_in() || !sfwd_lms_has_access($course_id)) {
			$output = "<div {$this->render_attributes('_root')}>";

			$output .= Frontend::render_children($this);

			$output .= '</div>';
			echo $output;
		}
	}
}
