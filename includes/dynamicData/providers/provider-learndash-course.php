<?php

namespace BricksExtended\DynamicData\Providers;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Provider_Learndash_course extends \Bricks\Integrations\Dynamic_Data\Providers\Base
{
	public static function load_me()
	{
		return true;
	}

	public function register_tags()
	{
		$tags = $this->get_tags_config();

		foreach ($tags as $key => $tag) {
			$this->tags[$key] = [
				'name'     => '{' . $key . '}',
				'label'    => $tag['label'],
				'group'    => $tag['group'],
				'provider' => $this->name,
			];
		}
	}

	public function get_tags_config()
	{
		$group_course_details = esc_html__('Course Details', 'bricksextended');

		return [
			'be_ld_course_title' => [
				'label' => esc_html__('Course Title', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_course_points' => [
				'label' => esc_html__('Course Points', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_user_course_points' => [
				'label' => esc_html__('User Course Points', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_completed_on' => [
				'label' => esc_html__('Completed On', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_cumulative_score' => [
				'label' => esc_html__('Cumulative Score', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_cumulative_points' => [
				'label' => esc_html__('Cumulative Points', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_cumulative_total_points' => [
				'label' => esc_html__('Cumulative Total Points', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_cumulative_percentage' => [
				'label' => esc_html__('Cumulative Percentage', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_cumulative_timespent' => [
				'label' => esc_html__('Cumulative Time Spent', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_aggregate_score' => [
				'label' => esc_html__('Aggregate Score', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_aggregate_points' => [
				'label' => esc_html__('Aggregate Points', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_aggregate_total_points' => [
				'label' => esc_html__('Aggregate Total Points', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_aggregate_percentage' => [
				'label' => esc_html__('Aggregate Percentage', 'bricksextended'),
				'group' => $group_course_details,
			],
			'be_ld_aggregate_timespent' => [
				'label' => esc_html__('Aggregate Time Spent', 'bricksextended'),
				'group' => $group_course_details,
			],
		];
	}

	public function get_tag_value($tag, $post, $args, $context)
	{
		$course_id = $this->get_course_id($post);
		$user_id = get_current_user_id();

		switch ($tag) {
			case 'be_ld_course_title':
				return do_shortcode('[courseinfo show="course_title"]');
			case 'be_ld_course_points':
				return do_shortcode('[courseinfo show="course_points"]');
			case 'be_ld_user_course_points':
				return do_shortcode('[courseinfo show="user_course_points"]');
			case 'be_ld_completed_on':
				return do_shortcode('[courseinfo show="completed_on"]');
			case 'be_ld_cumulative_score':
				return do_shortcode('[courseinfo show="cumulative_score"]');
			case 'be_ld_cumulative_points':
				return do_shortcode('[courseinfo show="cumulative_points"]');
			case 'be_ld_cumulative_total_points':
				return do_shortcode('[courseinfo show="cumulative_total_points"]');
			case 'be_ld_cumulative_percentage':
				return do_shortcode('[courseinfo show="cumulative_percentage"]');
			case 'be_ld_cumulative_timespent':
				return do_shortcode('[courseinfo show="cumulative_timespent"]');
			case 'be_ld_aggregate_score':
				return do_shortcode('[courseinfo show="aggregate_score"]');
			case 'be_ld_aggregate_points':
				return do_shortcode('[courseinfo show="aggregate_points"]');
			case 'be_ld_aggregate_total_points':
				return do_shortcode('[courseinfo show="aggregate_total_points"]');
			case 'be_ld_aggregate_percentage':
				return do_shortcode('[courseinfo show="aggregate_percentage"]');
			case 'be_ld_aggregate_timespent':
				return do_shortcode('[courseinfo show="aggregate_timespent"]');
			default:
				return ''; // Return an empty string for unknown tags
		}
	}

	private function get_course_id($post)
	{
		if ($post && 'sfwd-courses' === $post->post_type) {
			return $post->ID;
		}

		// Try to infer course ID from context if not directly available
		if ($post && 'sfwd-lessons' === $post->post_type) {
			return learndash_get_course_id($post->ID);
		}

		return null;
	}
}
