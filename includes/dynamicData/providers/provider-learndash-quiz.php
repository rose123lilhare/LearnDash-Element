<?php

namespace BricksExtended\DynamicData\Providers;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Provider_LearnDash_Quiz extends \Bricks\Integrations\Dynamic_Data\Providers\Base
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
		$group_quiz_details = esc_html__('Quiz Details', 'bricksextended');

		return [
			'be_ld_quiz_score' => [
				'label' => esc_html__('Score', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_count' => [
				'label' => esc_html__('Attempt Count', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_pass' => [
				'label' => esc_html__('Pass/Fail', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_timestamp' => [
				'label' => esc_html__('Timestamp', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_points' => [
				'label' => esc_html__('Points', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_total_points' => [
				'label' => esc_html__('Total Points', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_percentage' => [
				'label' => esc_html__('Percentage', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_title' => [
				'label' => esc_html__('Quiz Title', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_course_title' => [
				'label' => esc_html__('Course Title', 'bricksextended'),
				'group' => $group_quiz_details,
			],
			'be_ld_quiz_timespent' => [
				'label' => esc_html__('Time Spent', 'bricksextended'),
				'group' => $group_quiz_details,
			],
		];
	}

	public function get_tag_value($tag, $post, $args, $context)
	{
		$quiz_id = $this->get_quiz_id($post);
		$user_id = get_current_user_id();

		switch ($tag) {
			case 'be_ld_quiz_score':
				return do_shortcode('[quizinfo show="score"]');
			case 'be_ld_quiz_count':
				return do_shortcode('[quizinfo show="count"]');
			case 'be_ld_quiz_pass':
				return do_shortcode('[quizinfo show="pass"]');
			case 'be_ld_quiz_timestamp':
				return do_shortcode('[quizinfo show="timestamp"]');
			case 'be_ld_quiz_points':
				return do_shortcode('[quizinfo show="points"]');
			case 'be_ld_quiz_total_points':
				return do_shortcode('[quizinfo show="total_points"]');
			case 'be_ld_quiz_percentage':
				return do_shortcode('[quizinfo show="percentage"]');
			case 'be_ld_quiz_title':
				return do_shortcode('[quizinfo show="quiz_title"]');
			case 'be_ld_quiz_course_title':
				return do_shortcode('[quizinfo show="course_title"]');
			case 'be_ld_quiz_timespent':
				return do_shortcode('[quizinfo show="timespent"]');
			default:
				return ''; // Return an empty string for unknown tags
		}
	}

	private function get_quiz_id($post)
	{
		if ($post && 'sfwd-quiz' === $post->post_type) {
			return $post->ID;
		}
		return null;
	}
}
