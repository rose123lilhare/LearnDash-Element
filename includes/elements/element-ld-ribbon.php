<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Ribbon extends Element
{
	public $category = 'learndash course';
	public $name = 'learn_dash_ribbon';
	public $icon = 'ti-flag-alt';

	public function get_label()
	{
		return esc_html__('LD Ribbon', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_ribbon_settings'] = [
			'title' => esc_html__('Ribbon Settings', 'bricks')
		];

		$this->control_groups['ld_ribbon_style'] = [
			'title' => esc_html__('Ribbon Style', 'bricks')
		];

		$this->controls['id'] = [
			'group' => 'ld_ribbon_settings',
			'label' => esc_html__('Course/Topic/Group/Lesson ID', 'bricks'),
			'type' => 'number',
			'default' => ''
		];

		$this->controls['ribbon_text_typography'] = [
			'group' => 'ld_ribbon_style',
			'label' => esc_html__('Ribbon Text Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-ribbon',
				]
			]
		];

		$this->add_status_controls('enrolled', 'Enrolled');
		$this->add_status_controls('completed', 'Completed');
		$this->add_status_controls('free', 'Free');
		$this->add_status_controls('available', 'Available');
		$this->add_status_controls('not_started', 'Not Started');
		$this->add_status_controls('in_progress', 'In Progress');
		$this->add_status_controls('not_enrolled', 'Not Enrolled');
	}

	private function add_status_controls($status, $label)
	{
		$this->controls["{$status}_background_color"] = [
			'group' => 'ld_ribbon_style',
			'label' => esc_html__("{$label} Background Color", 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => ".ld-ribbon.{$status}",
				]
			]
		];

		$this->controls["{$status}_padding"] = [
			'group' => 'ld_ribbon_style',
			'label' => esc_html__("{$label} Padding", 'bricks'),
			'type' => 'dimensions',
			'css' => [
				[
					'property' => 'padding',
					'selector' => ".ld-ribbon.{$status}",
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;

		$post_id = !empty($settings['id']) ? absint($settings['id']) : get_the_ID();
		$user_id = get_current_user_id();
		$post = get_post($post_id);
		$has_access = sfwd_lms_has_access($post_id, $user_id);
		$is_completed = learndash_course_completed($user_id, $post_id);

		$meta = get_post_meta($post_id, '_sfwd-courses', true);
		$price_type = isset($meta['sfwd-courses_course_price_type']) ? $meta['sfwd-courses_course_price_type'] : '';
		$price_text = isset($meta['sfwd-courses_course_price']) ? $meta['sfwd-courses_course_price'] : '';

		$ribbon_class = 'ld-ribbon';
		$ribbon_text = '';

		if (in_array($post->post_type, ['sfwd-courses', 'groups'])) {
			if ($price_type != 'open' && empty($ribbon_text)) {
				if ($has_access && !$is_completed) {
					$ribbon_class .= ' enrolled';
					$ribbon_text = __('Enrolled', 'learndash-course-grid');
				} elseif ($has_access && $is_completed) {
					$ribbon_class .= ' completed';
					$ribbon_text = __('Completed', 'learndash-course-grid');
				} elseif (!empty($price_text)) {
					$ribbon_text = $price_text;
				} elseif ($price_type == 'free') {
					$ribbon_class .= ' free';
					$ribbon_text = __('Free', 'learndash-course-grid');
				} else {
					$ribbon_class .= ' available';
					$ribbon_text = __('Available', 'learndash-course-grid');
				}
			} elseif ($price_type == 'open' && empty($ribbon_text)) {
				if (is_user_logged_in() && !$is_completed) {
					$ribbon_class .= ' enrolled';
					$ribbon_text = __('Enrolled', 'learndash-course-grid');
				} elseif (is_user_logged_in() && $is_completed) {
					$ribbon_class .= ' completed';
					$ribbon_text = __('Completed', 'learndash-course-grid');
				} else {
					$ribbon_class .= ' free';
					$ribbon_text = __('Free', 'learndash-course-grid');
				}
			}
		} elseif (in_array($post->post_type, ['sfwd-lessons', 'sfwd-topic'])) {
			$activity_type = $post->post_type == 'sfwd-lessons' ? 'lesson' : 'topic';
			$activity = learndash_get_user_activity([
				'course_id' => $post_id,
				'user_id' => $user_id,
				'post_id' => $post->ID,
				'activity_type' => $activity_type,
			]);

			$has_started = !empty($activity) && !empty($activity->activity_started) && !$activity->activity_completed;

			if ($has_access && $is_completed) {
				$ribbon_class .= ' enrolled completed';
				$ribbon_text = __('Completed', 'learndash-course-grid');
			} elseif ($has_access && !$has_started) {
				$ribbon_class .= ' enrolled not-started';
				$ribbon_text = __('Not started', 'learndash-course-grid');
			} elseif ($has_access && $has_started) {
				$ribbon_class .= ' enrolled in-progress';
				$ribbon_text = __('In progress', 'learndash-course-grid');
			} elseif (learndash_is_sample($post->ID)) {
				$ribbon_class .= ' free';
				$ribbon_text = __('Free', 'learndash-course-grid');
			} else {
				$ribbon_class .= ' not-enrolled';
				$ribbon_text = '';
			}
		}

		echo "<div {$this->render_attributes('_root')}>";
		echo "<span class='$ribbon_class'>{$ribbon_text}</span>";
		echo "</div>";
	}
}
