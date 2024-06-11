<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Quiz_Info extends Element
{
	protected $shortcode_slug = 'quizinfo';

	public $category = 'learndash quiz';
	public $name = 'learn_dash_quiz_info';
	public $icon = 'ti-info-alt';

	public function get_label()
	{
		return esc_html__('LD Quiz Info', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_quiz_info_settings'] = [
			'title' => esc_html__('Quiz Info Settings', 'bricks')
		];

		$this->controls['show'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Show Information', 'bricks'),
			'type' => 'select',
			'options' => [
				'score'         => __('Score', 'bricks'),
				'count'         => __('Attempt Count', 'bricks'),
				'pass'          => __('Pass/Fail', 'bricks'),
				'timestamp'     => __('Timestamp', 'bricks'),
				'points'        => __('Points', 'bricks'),
				'total_points'  => __('Total Points', 'bricks'),
				'percentage'    => __('Percentage', 'bricks'),
				'quiz_title'    => __('Quiz Title', 'bricks'),
				'course_title'  => __('Course Title', 'bricks'),
				'timespent'     => __('Time Spent', 'bricks'),
			],
			'default' => 'score',
		];

		// Control for the date format when showing timestamp
		$this->controls['format'] = [
			'group'   => 'ld_quiz_info_settings',
			'label'   => esc_html__('Date Format', 'bricks'),
			'type'    => 'text',
			'default' => 'F j, Y',
			'condition' => [
				'show' => 'timestamp'
			]
		];


	
		$this->controls['course_info_background_color'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.be-learndash-quiz-info',
				]
			]
		];
		
		$this->controls['course_info_typography'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.be-learndash-quiz-info',
				]
			]
		];
		
		$this->controls['course_info_borders'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.be-learndash-quiz-info',
				]
			]
		];
		
		$this->controls['course_info_padding'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.be-learndash-quiz-info',
				]
			]
		];
		
		$this->controls['course_info_margin'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.be-learndash-quiz-info',
				]
			]
		];
		
		$this->controls['course_info_box_shadow'] = [
			'group' => 'ld_quiz_info_settings',
			'label' => esc_html__('Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.be-learndash-quiz-info',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$shortcode_param = $settings['show'];
		$format = $settings['format'];

		$shortcode_str = '[quizinfo show="' . esc_attr($shortcode_param) . '"';
		if ('timestamp' === $shortcode_param && !empty($format)) {
			$shortcode_str .= ' format="' . esc_attr($format) . '"';
		}
		$shortcode_str .= ']';

		$output = "<div {$this->render_attributes('_root')}>";
		$output .= "<div class='be-learndash-quiz-info'>";
		$output .= do_shortcode($shortcode_str);
		$output .= '</div>';
		$output .= '</div>';
	}
}
