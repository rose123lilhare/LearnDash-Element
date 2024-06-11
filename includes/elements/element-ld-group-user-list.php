<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Group_User_List extends Element
{
	protected $shortcode_slug   = 'learndash_group_user_list';
	protected $shortcode_params = array(
		'group_id' => 'group_id',
	);

	public $category = 'learndash group';
	public $name     = 'learn_dash_group_user_list';
	public $icon     = 'ti-user';

	public function get_label()
	{
		return esc_html__('LD Group User List', 'bricks');
	}

	public function set_controls()
	{
		// Settings section
		$this->control_groups['learndash_group_user_list_settings'] = [
			'title' => esc_html__('Settings', 'learndash-bricks')
		];

		$this->controls['group_id'] = [
			'group'    => 'learndash_group_user_list_settings',
			'label'    => esc_html__('Group ID', 'learndash-bricks'),
			'type'     => 'number',
			'default'  => ''
		];

		// Style section for row items
		$this->control_groups['course_list_style_settings'] = [
			'title' => esc_html__('Style', 'learndash-bricks'),
		];

		$this->controls['course_list_background_color'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course List Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-course-list-content',
				]
			]
		];

		$this->controls['course_list_padding'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course List Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-course-list-content',
				]
			]
		];

		$this->controls['course_list_margin'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course List Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-course-list-content',
				]
			]
		];

		$this->controls['course_list_box_shadow'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course List Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-course-list-content',
				]
			]
		];

		$this->controls['course_list_borders'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course List Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-course-list-content',
				]
			]
		];


		$this->controls['course_item_background_color'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_item_padding'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_item_margin'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_item_box_shadow'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_item_borders'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-item-list-item',
				]
			]
		];


		$this->controls['course_item_name_color'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Name Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-item-name',
				]
			]
		];

		$this->controls['course_item_name_hover_color'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Name Hover Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-item-name:hover',
				]
			]
		];

		$this->controls['course_item_name_typography'] = [
			'group' => 'course_list_style_settings',
			'label' => esc_html__('Course Item Name Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-item-name',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;

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
