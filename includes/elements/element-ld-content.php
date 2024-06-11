<?php

namespace Bricks;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
class Element_Learn_Dash_Content extends Element
{
	public $category = 'learndash general';
	public $name = 'learn_dash_content';
	public $icon = 'ti-check-box';

	protected $shortcode_params = array(
		'course_id'         => 'course_id',
		'step_id'           => 'step_id',
		'user_id'           => 'user_id',
	);

	public function get_label()
	{
		return esc_html__('LD Content', 'bricks');
	}

	public function set_controls()
	{

		// Settings section
		$this->control_groups['ld_course_content_visibility_settings'] = [
			'title' => esc_html__('Course Content Visibility Settings', 'learndash-bricks')
		];

		// Controls for Course Content Visibility Settings
		$this->controls['hide_infobar'] = [
			'group' => 'ld_course_content_visibility_settings',
			'label' => esc_html__('Hide Infobar', 'learndash-bricks'),
			'type' => 'checkbox',
			'css' => [
				[
					'property' => 'display',
					'value' => 'none',
					'selector' => '.ld-course-status, .ld-lesson-status, .ld-topic-status',
				]
			]
		];

		$this->controls['hide_tabs'] = [
			'group' => 'ld_course_content_visibility_settings',
			'label' => esc_html__('Hide Tabs', 'learndash-bricks'),
			'type' => 'checkbox',
			'css' => [
				[
					'property' => 'display',
					'value' => 'none',
					'selector' => '.ld-tabs',
				]
			]
		];

		$this->controls['hide_content_list'] = [
			'group' => 'ld_course_content_visibility_settings',
			'label' => esc_html__('Hide Content List', 'learndash-bricks'),
			'type' => 'checkbox',
			'css' => [
				[
					'property' => 'display',
					'value' => 'none',
					'selector' => '.ld-item-list',
				]
			]
		];

		$this->controls['hide_navigation'] = [
			'group' => 'ld_course_content_visibility_settings',
			'label' => esc_html__('Hide Navigation', 'learndash-bricks'),
			'type' => 'checkbox',
			'css' => [
				[
					'property' => 'display',
					'value' => 'none',
					'selector' => '.ld-content-actions',
				]
			]
		];

		// Settings section for tab controls
		$this->control_groups['ld_tabs_settings'] = [
			'title' => esc_html__('Tabs Settings', 'learndash-bricks'),
			'required' => ['hide_tabs', '=', false],
		];

		// Controls for Tabs Settings
		$this->controls['tabs_background_color'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tabs Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-tabs',
				]
			]
		];

		$this->controls['tab_button_background_color'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-tabs-navigation .ld-tab',
				]
			]
		];

		$this->controls['tab_button_background_color_hover'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Background Color (Hover)', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-tabs-navigation .ld-tab:hover',
				]
			]
		];

		$this->controls['tab_button_background_color_active'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Background Color (Active)', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-tabs-navigation .ld-tab.ld-active',
				]
			]
		];

		$this->controls['tab_button_text_color'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-tabs-navigation .ld-tab .ld-text',
				]
			]
		];

		$this->controls['tab_button_text_color_hover'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Text Color (Hover)', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-tabs-navigation .ld-tab:hover .ld-text',
				]
			]
		];

		$this->controls['tab_button_text_color_active'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Text Color (Active)', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-tabs-navigation .ld-tab.ld-active .ld-text',
				]
			]
		];

		$this->controls['tab_button_icon_color'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Icon Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-tabs-navigation .ld-tab .ld-icon',
				]
			]
		];

		$this->controls['tab_button_icon_color_hover'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Icon Color (Hover)', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-tabs-navigation .ld-tab:hover .ld-icon',
				]
			]
		];

		$this->controls['tab_button_icon_color_active'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Button Icon Color (Active)', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-tabs-navigation .ld-tab.ld-active .ld-icon',
				]
			]
		];

		$this->controls['tab_content_background_color'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Content Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-tab-content',
				]
			]
		];

		$this->controls['tab_content_padding'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Content Padding', 'learndash-bricks'),
			'type' => 'number',
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-tab-content',
				]
			],
			'options' => [
				'unit' => 'px',
				'step' => 1,
				'min' => 0,
				'max' => 100,
			]
		];

		$this->controls['tab_content_margin'] = [
			'group' => 'ld_tabs_settings',
			'label' => esc_html__('Tab Content Margin', 'learndash-bricks'),
			'type' => 'number',
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-tab-content',
				]
			],
			'options' => [
				'unit' => 'px',
				'step' => 1,
				'min' => 0,
				'max' => 100,
			]
		];

		$this->control_groups['ld_course_content_settings'] = [
			'title' => esc_html__('Content List Settings', 'bricks'),
			'required' => ['hide_content_list', '=', false],
		];

		$this->controls['section_heading_typography'] = [
			'group' => 'ld_course_content_settings',
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
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Section Heading Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-section-heading',
				]
			]
		];



		$this->controls['expand_button_background_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Expand Button Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];

		$this->controls['expand_button_text_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Expand Button Text Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-expand-button .ld-text',
				]
			]
		];


		$this->controls['expand_button_borders'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Expand Button Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];


		$this->controls['expand_button_padding'] = [
			'group' => 'ld_course_content_settings',
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
			'group' => 'ld_course_content_settings',
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
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Expand Button Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-expand-button',
				]
			]
		];

		$this->controls['item_list_background_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item List Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];


		$this->controls['item_list_borders'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item List Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-item-list',
				]
			]
		];

		$this->controls['item_list_padding'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item List Padding', 'bricks'),
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
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item List Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],

			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-item-list',
				]
			]
		];

		$this->controls['item_list_box_shadow'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item List Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-item-list',
				]
			]
		];

		$this->controls['item_name_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Name Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-item-name',
				]
			]
		];

		$this->controls['item_name_hover_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Name Hover Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-item-name:hover',
				]
			]
		];

		$this->controls['item_name_typography'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Name Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-item-name',
				]
			]
		];

		$this->controls['item_details_background_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Details Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];

		$this->controls['item_details_text_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Details Text Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-item-details',
				]
			]
		];



		$this->controls['item_details_borders'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Details Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];

		$this->controls['item_details_padding'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Details Padding', 'bricks'),
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
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Details Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-item-list-item-preview',
				]
			]
		];


		$this->controls['status_icon_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Status Icon Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-status-icon',
				]
			]
		];

		$this->controls['status_icon_background_color'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Status Icon Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-status-icon',
				]
			]
		];


		$this->controls['item_typography'] = [
			'group' => 'ld_course_content_settings',
			'label' => esc_html__('Item Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-item-list .ld-item-list-item',
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

		// Settings section
		$this->control_groups['ld_course_progress_settings'] = [
			'title' => esc_html__('Progress Settings', 'learndash-bricks'),
			'required' => ['hide_infobar', '=', false],
		];

		$this->controls['widget_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Widget Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper.learndash-widget',
				]
			]
		];

		$this->controls['widget_padding'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Widget Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper.learndash-widget',
				]
			]
		];

		$this->controls['widget_margin'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Widget Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper.learndash-widget',
				]
			]
		];

		$this->controls['widget_box_shadow'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Widget Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper.learndash-widget',
				]
			]
		];

		$this->controls['widget_borders'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Widget Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper.learndash-widget',
				]
			]
		];

	

		$this->controls['progress_text_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Text Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_borders'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_padding'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_margin'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_box_shadow'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];

		$this->controls['progress_bar_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-progress-bar',
				]
			]
		];

		$this->controls['progress_bar_percentage_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Percentage Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];

		$this->controls['progress_bar_percentage_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Percentage Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];

		$this->controls['progress_bar_percentage_borders'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Bar Percentage Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];


		$this->controls['progress_percentage_typography'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Percentage Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-progress-percentage',
				]
			]
		];

		$this->controls['progress_steps_typography'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Steps Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-progress-steps',
				]
			]
		];

		$this->control_groups['ld_navigation_wrapper_settings'] = [
			'title' => esc_html__('Navigations Wrapper Style Settings', 'learndash-bricks'),
			'required' => ['hide_navigation', '=', false],
		];
		$this->control_groups['ld_content_action_settings'] = [
			'title' => esc_html__('Navigations Action Style Settings', 'learndash-bricks'),
			'required' => ['hide_navigation', '=', false],
		];
		$this->control_groups['ld_course_step_back_button_settings'] = [
			'title' => esc_html__('Navigations Back Button Style Settings', 'learndash-bricks'),
			'required' => ['hide_navigation', '=', false],
		];
		$this->control_groups['ld_next_topic_button_settings'] = [
			'title' => esc_html__('Navigations Next Button Style Settings', 'learndash-bricks'),
			'required' => ['hide_navigation', '=', false],
		];


		// Control Group: Navigation Wrapper Settings
		$this->controls['wrapper_background_color'] = [
			'group' => 'ld_navigation_wrapper_settings',
			'label' => esc_html__('Wrapper Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
				]
			]
		];

		$this->controls['wrapper_padding'] = [
			'group' => 'ld_navigation_wrapper_settings',
			'label' => esc_html__('Wrapper Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
				]
			]
		];

		$this->controls['wrapper_margin'] = [
			'group' => 'ld_navigation_wrapper_settings',
			'label' => esc_html__('Wrapper Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
				]
			]
		];

		$this->controls['wrapper_box_shadow'] = [
			'group' => 'ld_navigation_wrapper_settings',
			'label' => esc_html__('Wrapper Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
				]
			]
		];

		$this->controls['wrapper_borders'] = [
			'group' => 'ld_navigation_wrapper_settings',
			'label' => esc_html__('Wrapper Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper.learndash-shortcode-wrap-ld_navigation-1946_1948_1',
				]
			]
		];

		// Control Group: Content Action Settings
		$this->controls['content_action_background_color'] = [
			'group' => 'ld_content_action_settings',
			'label' => esc_html__('Content Action Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-content-action',
				]
			]
		];

		$this->controls['content_action_padding'] = [
			'group' => 'ld_content_action_settings',
			'label' => esc_html__('Content Action Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-content-action',
				]
			]
		];

		$this->controls['content_action_margin'] = [
			'group' => 'ld_content_action_settings',
			'label' => esc_html__('Content Action Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-content-action',
				]
			]
		];

		$this->controls['content_action_box_shadow'] = [
			'group' => 'ld_content_action_settings',
			'label' => esc_html__('Content Action Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-content-action',
				]
			]
		];

		$this->controls['content_action_borders'] = [
			'group' => 'ld_content_action_settings',
			'label' => esc_html__('Content Action Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-content-action',
				]
			]
		];

		// Control Group: Course Step Back Button Settings
		$this->controls['back_button_text_color'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Text Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		$this->controls['back_button_background_color'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		$this->controls['back_button_padding'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		$this->controls['back_button_margin'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		$this->controls['back_button_box_shadow'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		$this->controls['back_button_borders'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		$this->controls['back_button_typography'] = [
			'group' => 'ld_course_step_back_button_settings',
			'label' => esc_html__('Back Button Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-course-step-back',
				]
			]
		];

		// Control Group: Next Topic Button Settings
		$this->controls['next_button_text_color'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Text Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['next_button_background_color'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['next_button_padding'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['next_button_margin'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['next_button_box_shadow'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['next_button_borders'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-button',
				]
			]
		];

		$this->controls['next_button_typography'] = [
			'group' => 'ld_next_topic_button_settings',
			'label' => esc_html__('Next Button Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-button',
				]
			]
		];
	}

	public function render()
	{
		$content =  get_the_content();
		$formatted_content = apply_filters('the_content', $content);
		echo "<div {$this->render_attributes('_root')}>";
		echo $formatted_content;
		echo "</div>";
	}
}
