<?php

namespace Bricks;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Element_Learn_Dash_Lesson_Content extends Element
{
	protected $shortcode_slug = 'lesson_content';
	public $category = 'learndash lesson';
	public $name = 'learn_dash_lesson_content';
	public $icon = 'ti-check-box';

	protected $shortcode_params = array(
		'course_id'         => 'course_id',
		'step_id'           => 'step_id',
		'user_id'           => 'user_id',
	);

	public function get_label()
	{
		return esc_html__('LD Lesson Content', 'bricks');
	}

	public function set_controls()
	{
		// Settings section
		$this->control_groups['ld_lesson_topic_list_settings'] = [
			'title' => esc_html__('Lesson Topic List Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_table_list_settings'] = [
			'title' => esc_html__('Table List Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_table_list_header_settings'] = [
			'title' => esc_html__('Table List Header Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_table_list_items_settings'] = [
			'title' => esc_html__('Table List Items Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_table_list_item_settings'] = [
			'title' => esc_html__('Table List Item Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_content_actions_settings'] = [
			'title' => esc_html__('Content Actions Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_button_settings'] = [
			'title' => esc_html__('Button Settings', 'learndash-bricks')
		];

		// Controls for Lesson Topic List Settings
		$this->controls['lesson_topic_list_background_color'] = [
			'group' => 'ld_lesson_topic_list_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-lesson-topic-list',
				]
			]
		];

		$this->controls['lesson_topic_list_padding'] = [
			'group' => 'ld_lesson_topic_list_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-lesson-topic-list',
				]
			]
		];

		// Controls for Table List Settings
		$this->controls['table_list_background_color'] = [
			'group' => 'ld_table_list_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list',
				]
			]
		];

		$this->controls['table_list_padding'] = [
			'group' => 'ld_table_list_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-table-list',
				]
			]
		];

		// Controls for Table List Header Settings
		$this->controls['table_list_header_background_color'] = [
			'group' => 'ld_table_list_header_settings',
			'label' => esc_html__('Header Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list-header',
				]
			]
		];

		$this->controls['table_list_header_text_color'] = [
			'group' => 'ld_table_list_header_settings',
			'label' => esc_html__('Header Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-table-list-header .ld-text',
				]
			]
		];

		$this->controls['table_list_header_padding'] = [
			'group' => 'ld_table_list_header_settings',
			'label' => esc_html__('Header Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-table-list-header',
				]
			]
		];

		// Controls for Table List Items Settings
		$this->controls['table_list_items_background_color'] = [
			'group' => 'ld_table_list_items_settings',
			'label' => esc_html__('Items Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list-items',
				]
			]
		];

		$this->controls['table_list_items_padding'] = [
			'group' => 'ld_table_list_items_settings',
			'label' => esc_html__('Items Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-table-list-items',
				]
			]
		];

		// Controls for Table List Item Settings
		$this->controls['table_list_item_background_color'] = [
			'group' => 'ld_table_list_item_settings',
			'label' => esc_html__('Item Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list-item',
				]
			]
		];

		$this->controls['table_list_item_text_color'] = [
			'group' => 'ld_table_list_item_settings',
			'label' => esc_html__('Item Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-table-list-item .ld-topic-title',
				]
			]
		];

		$this->controls['table_list_item_padding'] = [
			'group' => 'ld_table_list_item_settings',
			'label' => esc_html__('Item Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-table-list-item',
				]
			]
		];

		$this->controls['table_list_item_margin'] = [
			'group' => 'ld_table_list_item_settings',
			'label' => esc_html__('Item Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-table-list-item',
				]
			]
		];

		// Controls for Content Actions Settings
		$this->controls['content_actions_background_color'] = [
			'group' => 'ld_content_actions_settings',
			'label' => esc_html__('Content Actions Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-content-actions',
				]
			]
		];

		$this->controls['content_actions_padding'] = [
			'group' => 'ld_content_actions_settings',
			'label' => esc_html__('Content Actions Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-content-actions',
				]
			]
		];

		$this->controls['content_actions_margin'] = [
			'group' => 'ld_content_actions_settings',
			'label' => esc_html__('Content Actions Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-content-actions',
				]
			]
		];

		// Controls for Button Settings
		$this->controls['button_text_color'] = [
			'group' => 'ld_button_settings',
			'label' => esc_html__('Button Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['button_background_color'] = [
			'group' => 'ld_button_settings',
			'label' => esc_html__('Button Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['button_padding'] = [
			'group' => 'ld_button_settings',
			'label' => esc_html__('Button Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['button_margin'] = [
			'group' => 'ld_button_settings',
			'label' => esc_html__('Button Margin', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['button_border'] = [
			'group' => 'ld_button_settings',
			'label' => esc_html__('Button Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['button_box_shadow'] = [
			'group' => 'ld_button_settings',
			'label' => esc_html__('Button Box Shadow', 'learndash-bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-button',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$shortcode_pairs = array();

		foreach ($this->shortcode_params as $key_ex => $key_in) {
			$shortcode_pairs[$key_in] = '';
			if (isset($settings[$key_ex])) {
				switch ($key_ex) {
					case 'step_id':
					case 'user_id':
						$shortcode_pairs[$key_in] = absint($settings[$key_ex]);
						break;
					default:
						$shortcode_pairs[$key_in] = esc_attr($settings[$key_ex]);
						break;
				}
			}
		}

		if ((!isset($shortcode_pairs['course_id'])) || (empty($shortcode_pairs['course_id']))) {
			if (in_array(get_post_type(), learndash_get_post_types(), true)) {
				$shortcode_pairs['course_id'] = learndash_get_course_id(get_the_ID());
			}
		}

		if ((!isset($shortcode_pairs['step_id'])) || (empty($shortcode_pairs['step_id']))) {
			if (in_array(get_post_type(), learndash_get_post_types(), true)) {
				$shortcode_pairs['step_id'] = get_the_ID();
			}
		}

		if ((!isset($shortcode_pairs['user_id'])) || (empty($shortcode_pairs['user_id']))) {
			$shortcode_pairs['user_id'] = get_current_user_id();
		}
		echo "<div {$this->render_attributes('_root')}>";
		learndash_bricks_show_lesson_content_listing($shortcode_pairs);
		echo "</div>";
	}
}
