<?php

namespace Bricks;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
class Element_Learn_Dash_Topic_Content extends Element

{
	protected $shortcode_slug = 'topic_content';
	public $category = 'learndash topic';
	public $name = 'learn_dash_topic_content';
	public $icon = 'ti-check-box';

	protected $shortcode_params = array(
		'course_id'         => 'course_id',
		'step_id'           => 'step_id',
		'user_id'           => 'user_id',
		'preview_course_id' => 'preview_course_id',
		'preview_step_id'   => 'preview_step_id',
		'preview_user_id'   => 'preview_user_id',
	);

	public function get_label()
	{
		return esc_html__('LD Topic Content', 'bricks');
	}

	public function set_controls()
	{
		// Settings section
		$this->control_groups['ld_quiz_list_settings'] = [
			'title' => esc_html__('Quiz List Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_quiz_list_header_settings'] = [
			'title' => esc_html__('Quiz List Header Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_quiz_list_item_settings'] = [
			'title' => esc_html__('Quiz List Item Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_quiz_status_icon_settings'] = [
			'title' => esc_html__('Quiz Status Icon Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_quiz_title_settings'] = [
			'title' => esc_html__('Quiz Title Settings', 'learndash-bricks')
		];

		// Controls for Quiz List Settings
		$this->controls['quiz_list_background_color'] = [
			'group' => 'ld_quiz_list_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list.ld-quiz-list',
				]
			]
		];

		$this->controls['quiz_list_borders'] = [
			'group' => 'ld_quiz_list_settings',
			'label' => esc_html__('Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-table-list.ld-quiz-list',
				]
			]
		];

		$this->controls['quiz_list_padding'] = [
			'group' => 'ld_quiz_list_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-table-list.ld-quiz-list',
				]
			]
		];

		// Controls for Quiz List Header Settings
		$this->controls['quiz_list_header_background_color'] = [
			'group' => 'ld_quiz_list_header_settings',
			'label' => esc_html__('Header Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list-header.ld-primary-background',
				]
			]
		];

		$this->controls['quiz_list_header_title_color'] = [
			'group' => 'ld_quiz_list_header_settings',
			'label' => esc_html__('Header Title Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-table-list-header .ld-table-list-title',
				]
			]
		];

		$this->controls['quiz_list_header_title_typography'] = [
			'group' => 'ld_quiz_list_header_settings',
			'label' => esc_html__('Header Title Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-table-list-header .ld-table-list-title',
				]
			]
		];

		// Controls for Quiz List Item Settings
		$this->controls['quiz_list_item_background_color'] = [
			'group' => 'ld_quiz_list_item_settings',
			'label' => esc_html__('Item Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-table-list-item',
				]
			]
		];

		$this->controls['quiz_list_item_borders'] = [
			'group' => 'ld_quiz_list_item_settings',
			'label' => esc_html__('Item Border', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-table-list-item',
				]
			]
		];

		$this->controls['quiz_list_item_padding'] = [
			'group' => 'ld_quiz_list_item_settings',
			'label' => esc_html__('Item Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-table-list-item',
				]
			]
		];

		// Controls for Quiz Status Icon Settings
		$this->controls['quiz_status_icon_color'] = [
			'group' => 'ld_quiz_status_icon_settings',
			'label' => esc_html__('Status Icon Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-status-icon',
				]
			]
		];

		$this->controls['quiz_status_icon_background_color'] = [
			'group' => 'ld_quiz_status_icon_settings',
			'label' => esc_html__('Status Icon Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-status-icon.ld-secondary-background',
				]
			]
		];

		// Controls for Quiz Title Settings
		$this->controls['quiz_title_color'] = [
			'group' => 'ld_quiz_title_settings',
			'label' => esc_html__('Quiz Title Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-item-title',
				]
			]
		];

		$this->controls['quiz_title_typography'] = [
			'group' => 'ld_quiz_title_settings',
			'label' => esc_html__('Quiz Title Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-item-title',
				]
			]
		];

		$this->controls['quiz_title_hover_color'] = [
			'group' => 'ld_quiz_title_settings',
			'label' => esc_html__('Quiz Title Hover Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-table-list-item-preview.ld-primary-color-hover:hover',
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
					case 'preview_step_id':
					case 'user_id':
					case 'preview_user_id':
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
		learndash_bricks_show_topic_content_listing($shortcode_pairs);
		echo "</div>";
	}
}
