<?php

namespace BricksExtended\DynamicData\Providers;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Provider_LearnDash_Group extends \Bricks\Integrations\Dynamic_Data\Providers\Base
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
		$group_group_details = esc_html__('Group Details', 'bricksextended');

		return [
			'be_ld_group_title' => [
				'label' => esc_html__('Group Title', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_group_url' => [
				'label' => esc_html__('Group Url', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_group_price_type' => [
				'label' => esc_html__('Group Price Type', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_group_price' => [
				'label' => esc_html__('Group Price', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_group_users_count' => [
				'label' => esc_html__('Group Users Count', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_group_courses_count' => [
				'label' => esc_html__('Group Courses Count', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_user_group_status' => [
				'label' => esc_html__('Group Status', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_enrolled_on' => [
				'label' => esc_html__('Enrolled On', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_completed_on' => [
				'label' => esc_html__('Completed On', 'bricksextended'),
				'group' => $group_group_details,
			],
			'be_ld_percent_completed' => [
				'label' => esc_html__('Percent Completed', 'bricksextended'),
				'group' => $group_group_details,
			],
		];
	}

	public function get_tag_value($tag, $post, $args, $context)
	{
		$group_id = $this->get_group_id($post);
		$user_id = get_current_user_id();

		switch ($tag) {
			case 'be_ld_group_title':
				return do_shortcode('[groupinfo show="group_title"]');
			case 'be_ld_group_url':
				return do_shortcode('[groupinfo show="group_url"]');
			case 'be_ld_group_price_type':
				return do_shortcode('[groupinfo show="group_price_type"]');
			case 'be_ld_group_price':
				return do_shortcode('[groupinfo show="group_price"]');
			case 'be_ld_group_users_count':
				return do_shortcode('[groupinfo show="group_users_count"]');
			case 'be_ld_group_courses_count':
				return do_shortcode('[groupinfo show="group_courses_count"]');
			case 'be_ld_user_group_status':
				return do_shortcode('[groupinfo show="user_group_status"]');
			case 'be_ld_enrolled_on':
				return do_shortcode('[groupinfo show="enrolled_on"]');
			case 'be_ld_completed_on':
				return do_shortcode('[groupinfo show="completed_on"]');
			case 'be_ld_percent_completed':
				return do_shortcode('[groupinfo show="percent_completed"]');
			default:
				return ''; // Return an empty string for unknown tags
		}
	}

	private function get_group_id($post)
	{
		if ($post && 'groups' === $post->post_type) {
			return $post->ID;
		}

		return null;
	}
}
