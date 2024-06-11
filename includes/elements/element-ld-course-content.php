<?php

namespace Bricks;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Element_Learn_Dash_Course_Content extends Element
{
	protected $shortcode_slug = 'course_content';
	public $category = 'learndash course';
	public $name = 'learn_dash_course_content';
	public $icon = 'ti-check-box';

	protected $shortcode_params = array(
		'course_id'         => 'course_id',
		'step_id'           => 'step_id',
		'user_id'           => 'user_id',
	);

	public function get_label()
	{
		return esc_html__('LD Course Content', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_section_heading_style'] = [
			'title' => esc_html__('Section Settings', 'bricks')
		];

		$this->control_groups['ld_expand_button_style'] = [
			'title' => esc_html__('Expand Button Settings', 'bricks')
		];

		$this->control_groups['ld_item_list_style'] = [
			'title' => esc_html__('List Items Settings', 'bricks')
		];

		$this->control_groups['ld_status_icon_style'] = [
			'title' => esc_html__('Status Icon Settings', 'bricks')
		];

		$this->control_groups['ld_course_content_settings'] = [
			'title' => esc_html__('Table List Settings', 'bricks')
		];


		$this->controls['section_heading_typography'] = [
			'group' => 'ld_section_heading_style',
			'label' => esc_html__('Section Heading Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-section-heading h2',
				]
			]
		];
		$this->controls['section_heading_background_color'] = [
			'group' => 'ld_section_heading_style',
			'label' => esc_html__('Section Heading Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-section-heading',
				]
			]
		];
		$this->controls['item_list_padding'] = [
			'group' => 'ld_section_heading_style',
			'label' => esc_html__('List Items Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-item-list',
				]
			]
		];
		$this->controls['item_list_margin'] = [
			'group' => 'ld_section_heading_style',
			'label' => esc_html__('List Items Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-item-list',
				]
			]
		];


		$this->controls['expand_button_background_color'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];
		$this->controls['expand_button_icon_background_color'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button icon Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-expand-button.ld-button-alternate .ld-icon',
				]
			]
		];
		$this->controls['expand_button_text_color'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button Style', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-expand-button .ld-text',
				]
			]
		];
		$this->controls['expand_button_borders'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button Borders', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];
		$this->controls['expand_button_padding'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];
		$this->controls['expand_button_margin'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];
		$this->controls['expand_button_box_shadow'] = [
			'group' => 'ld_expand_button_style',
			'label' => esc_html__('Expand Button Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];
		$this->controls['item_list_box_shadow'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Items Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-item-list',
				]
			]
		];
		$this->controls['item_name_hover_color'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Name Hover Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-item-name:hover',
				]
			]
		];
		$this->controls['item_name_typography'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Name Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-item-name',
				]
			]
		];
		$this->controls['item_details_background_color'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Details Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];
		$this->controls['item_details_text_color'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Details Text Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-item-details',
				]
			]
		];
		$this->controls['item_details_borders'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Details Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];
		$this->controls['item_details_padding'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Details Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];
		$this->controls['item_details_margin'] = [
			'group' => 'ld_item_list_style',
			'label' => esc_html__('List Item Details Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];


		$this->controls['status_icon_border_color'] = [
			'group' => 'ld_status_icon_style',
			'label' => esc_html__('Status Icon Border Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'border-color',
					'selector' => '.learndash-wrapper .ld-status-icon',
				]
			]
		];
		$this->controls['status_icon_background_color'] = [
			'group' => 'ld_status_icon_style',
			'label' => esc_html__('Status Icon Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-status-icon',
				]
			]
		];
		$this->controls['status_icon_size'] = [
			'group' => 'ld_status_icon_style',
			'label' => esc_html__('Status Icon Size', 'bricks'),
			'type' => 'slider',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'width',
					'selector' => '.learndash-wrapper .ld-status-icon',
				],
				[
					'property' => 'height',
					'selector' => '.learndash-wrapper .ld-status-icon',
				]
			]
		];


		$this->controls['table_list_header_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List Header Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-table-list .ld-table-list-header',
				]
			]
		];
		$this->controls['table_list_header_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List Header Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-table-list .ld-table-list-header .ld-table-list-title',
				]
			]
		];
		$this->controls['table_list_background_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-table-list',
				]
			]
		];
		$this->controls['table_list_background_typography'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List background Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-table-list .ld-table-list-item .ld-table-list-item-preview',
				]
			]
		];
		$this->controls['table_list_borders'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-table-list',
				]
			]
		];
		$this->controls['table_list_padding'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-table-list',
				]
			]
		];
		$this->controls['table_list_margin'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Table List Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-table-list',
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
		learndash_bricks_show_course_content_listing($shortcode_pairs);
		echo "</div>";
	}
}
