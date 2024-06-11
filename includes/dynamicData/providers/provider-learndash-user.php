<?php

namespace BricksExtended\DynamicData\Providers;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Provider_Learndash_User extends \Bricks\Integrations\Dynamic_Data\Providers\Base
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
		$group_user_details = esc_html__('User Details', 'bricksextended');

		return [
			'be_user_first_name' => [
				'label' => esc_html__('First Name', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_last_name' => [
				'label' => esc_html__('Last Name', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_display_name' => [
				'label' => esc_html__('Display Name', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_login' => [
				'label' => esc_html__('Username', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_nickname' => [
				'label' => esc_html__('Nickname', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_email' => [
				'label' => esc_html__('Email Address', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_url' => [
				'label' => esc_html__('Website URL', 'bricksextended'),
				'group' => $group_user_details,
			],
			'be_user_description' => [
				'label' => esc_html__('Description', 'bricksextended'),
				'group' => $group_user_details,
			],
		];
	}

	public function get_tag_value($tag, $post, $args, $context)
	{
		$user_id = get_current_user_id();

		switch ($tag) {
			case 'be_user_first_name':
				return get_user_meta($user_id, 'first_name', true);
			case 'be_user_last_name':
				return get_user_meta($user_id, 'last_name', true);
			case 'be_user_display_name':
				$user = get_userdata($user_id);
				return $user ? $user->display_name : '';
			case 'be_user_login':
				$user = get_userdata($user_id);
				return $user ? $user->user_login : '';
			case 'be_user_nickname':
				return get_user_meta($user_id, 'nickname', true);
			case 'be_user_email':
				$user = get_userdata($user_id);
				return $user ? $user->user_email : '';
			case 'be_user_url':
				$user = get_userdata($user_id);
				return $user ? $user->user_url : '';
			case 'be_user_description':
				return get_user_meta($user_id, 'description', true);
			default:
				return ''; // Return an empty string for unknown tags
		}
	}
}
