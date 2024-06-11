<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Course_Info extends Element
{
	protected $shortcode_slug = 'courseinfo';

	public $category = 'learndash course';
	public $name = 'learn_dash_course_info';
	public $icon = 'ti-info-alt';

	public function get_label()
	{
		return esc_html__('LD Course Info', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_course_info_settings'] = [
			'title' => esc_html__('Info Settings', 'bricks')
		];

		$this->controls['show'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Show Information', 'bricks'),
			'type' => 'select',
			'options' => [
				'course_title'           => __('Course Title', 'bricks'),
				'course_points'          => __('Course Points', 'bricks'),
				'user_course_points'     => __('User Course Points', 'bricks'),
				'completed_on'           => __('Completed On', 'bricks'),
				'cumulative_score'       => __('Cumulative Score', 'bricks'),
				'cumulative_points'      => __('Cumulative Points', 'bricks'),
				'cumulative_total_points' => __('Cumulative Total Points', 'bricks'),
				'cumulative_percentage'  => __('Cumulative Percentage', 'bricks'),
				'cumulative_timespent'   => __('Cumulative Time Spent', 'bricks'),
				'aggregate_score'        => __('Aggregate Score', 'bricks'),
				'aggregate_points'       => __('Aggregate Points', 'bricks'),
				'aggregate_total_points' => __('Aggregate Total Points', 'bricks'),
				'aggregate_percentage'   => __('Aggregate Percentage', 'bricks'),
				'aggregate_timespent'    => __('Aggregate Time Spent', 'bricks'),
			],
			'default' => 'course_title',
		];

		// Control for the date format when showing completed on date
		$this->controls['format'] = [
			'group'   => 'ld_course_info_settings',
			'label'   => esc_html__('Date Format', 'bricks'),
			'type'    => 'text',
			'default' => 'F j, Y',
			'required' => ['show', '=', 'completed_on'],
		];

		
		$this->controls['course_info_background_color'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.be-learndash-course-info',
				]
			]
		];
		
		$this->controls['course_info_typography'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.be-learndash-course-info',
				]
			]
		];
		
		$this->controls['course_info_bordes'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.be-learndash-course-info',
				]
			]
		];
		
		
		$this->controls['course_info_padding'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.be-learndash-course-info',
				]
			]
		];
		
		$this->controls['course_info_margin'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.be-learndash-course-info',
				]
			]
		];
		
		$this->controls['course_info_box_shadow'] = [
			'group' => 'ld_course_info_settings',
			'label' => esc_html__('Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.be-learndash-course-info',
				]
			]
		];
		
	}

	public function render()
	{
		$settings = $this->settings;
		$shortcode_param = $settings['show'];
		$format = $settings['format'];

		$shortcode_str = '[courseinfo show="' . esc_attr($shortcode_param) . '"';
		if ('completed_on' === $shortcode_param && !empty($format)) {
			$shortcode_str .= ' format="' . esc_attr($format) . '"';
		}
		$shortcode_str .= ']';
		$output = "<div {$this->render_attributes('_root')}>";
		$output .= "<div class='be-learndash-course-info'>";
		$output .= do_shortcode($shortcode_str);
		$output .= '</div>';
		$output .= '</div>';


		echo $output;
	}
}
