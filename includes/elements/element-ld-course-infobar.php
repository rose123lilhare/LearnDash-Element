<?php

namespace Bricks;

use MailPoetVendor\Doctrine\DBAL\Types\VarDateTimeType;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Course_InfoBar extends Element
{
	protected $shortcode_slug = 'ld_course_infobar';
	protected $shortcode_params = array(
		'course_id'         => 'course_id',
		'step_id'           => 'step_id',
		'has_access'        => 'has_access',
		'course_status'     => 'course_status',
		'user_id'           => 'user_id'
	);

	public $category = 'learndash course';
	public $name = 'learn_dash_course_infobar';
	public $icon = 'ti-info-alt';

	public function get_label()
	{
		return esc_html__('LD Course InfoBar', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_course_infobar_settings'] = [
			'title' => esc_html__('InfoBar Settings', 'bricks')
		];
		$this->control_groups['ld_course_status_settings'] = [
			'title' => esc_html__('Status Settings', 'bricks')
		];
		$this->control_groups['ld_progressbar_settings'] = [
			'title' => esc_html__('Progressbar Settings', 'bricks')
		];

		// Controls for basic course and user settings
		$this->controls['course_id'] = [
			'group' => 'ld_course_infobar_settings',
			'label' => esc_html__('Course ID', 'bricks'),
			'type' => 'number',
			'default' => '',
			'description' => esc_html__('Enter the Course ID to display information for.', 'bricks')
		];
		$this->controls['step_id'] = [
			'group' => 'ld_course_infobar_settings',
			'label' => esc_html__('Step ID', 'bricks'),
			'type' => 'number',
			'default' => '',
			'description' => esc_html__('Enter the Step ID related to the course.', 'bricks')
		];
		$this->controls['has_access'] = [
			'group' => 'ld_course_infobar_settings',
			'label' => esc_html__('Has Access', 'bricks'),
			'type' => 'checkbox',
			'default' => false,
			'description' => esc_html__('Check this if the user has access to the course.', 'bricks')
		];
		// $this->controls['course_status'] = [
		// 	'group' => 'ld_course_infobar_settings',
		// 	'label' => esc_html__('Course Status', 'bricks'),
		// 	'type' => 'select',
		// 	'options'     => [
		// 		'not-started' => __('Not Started', 'learndash-bricks'),
		// 		'in-progress' => __('In Progress', 'learndash-bricks'),
		// 		'completed'   => __('Completed', 'learndash-bricks'),
		// 	],
		// 	'description' => esc_html__('Current status of the course for the user.', 'bricks')
		// ];
		$this->controls['user_id'] = [
			'group' => 'ld_course_infobar_settings',
			'label' => esc_html__('User ID', 'bricks'),
			'type' => 'number',
			'default' => '',
			'description' => esc_html__('Enter the User ID to display information for. Defaults to current user.', 'bricks')
		];


		$this->controls['course_status_text_color'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Course Status Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-course-status',
				]
			]
		];
		$this->controls['course_status_background_color'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Course Status Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-course-status',
				]
			]
		];
		$this->controls['course_status_bordes'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Course Status Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-course-status',
				]
			]
		];
		$this->controls['course_status_padding'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Course Status Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-course-status',
				]
			]
		];
		$this->controls['course_status_margin'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Course Status Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-course-status',
				]
			]
		];
		$this->controls['course_status_box_shadow'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Course Status Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-course-status',
				]
			]
		];


		
		$this->controls['progress_background_color'] = [
			'group' => 'ld_progressbar_settings',
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
			'group' => 'ld_progressbar_settings',
			'label' => esc_html__('Progress Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-progress',
				]
			]
		];
		$this->controls['progress_box_shadow'] = [
			'group' => 'ld_progressbar_settings',
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
			'group' => 'ld_progressbar_settings',
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
			'group' => 'ld_progressbar_settings',
			'label' => esc_html__('Progress Bar Percentage Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-progress .ld-progress-heading .ld-progress-stats .ld-progress-percentage',
				]
			]
		];
		$this->controls['progress_bar_percentage_bordes'] = [
			'group' => 'ld_progressbar_settings',
			'label' => esc_html__('Progress Bar Percentage Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-progress-bar-percentage',
				]
			]
		];
		$this->controls['progress_padding'] = [
			'group' => 'ld_progressbar_settings',
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
			'group' => 'ld_progressbar_settings',
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
		
		

	}

	public function render()
	{
		$settings = $this->settings;
		$shortcode_pairs = array();

		foreach ($this->shortcode_params as $key_ex => $key_in) {
			$shortcode_pairs[$key_in] = '';
			if (isset($settings[$key_ex])) {
				if ($key_ex === 'course_id' || $key_ex === 'step_id' || $key_ex === 'user_id') {
					$shortcode_pairs[$key_in] = absint($settings[$key_ex]);
				} else {
					$shortcode_pairs[$key_in] = esc_attr($settings[$key_ex]);
				}
			}
		}

		if (empty($shortcode_pairs['course_id']) && in_array(get_post_type(), learndash_get_post_types(), true)) {
			$shortcode_pairs['course_id'] = learndash_get_course_id(get_the_ID());
		}

		if (empty($shortcode_pairs['step_id']) && in_array(get_post_type(), learndash_get_post_types(), true)) {
			$shortcode_pairs['step_id'] = get_the_ID();
		}

		if (empty($shortcode_pairs['user_id'])) {
			$shortcode_pairs['user_id'] = get_current_user_id();
		}

		$shortcode_pairs['course_status'] = learndash_course_status($shortcode_pairs['course_id'], $shortcode_pairs['user_id']);
		$shortcode_pairs['has_access'] = sfwd_lms_has_access($shortcode_pairs['course_id'], $shortcode_pairs['user_id']);

		$context = '';
		$step_post_type = get_post_type($shortcode_pairs['step_id']);
		if (!empty($step_post_type) && in_array($step_post_type, learndash_get_post_types('course'), true)) {
			if (learndash_get_post_type_slug('course') === $step_post_type) {
				$context = 'course';
			} elseif (learndash_get_post_type_slug('lesson') === $step_post_type) {
				$context = 'lesson';
			} elseif (learndash_get_post_type_slug('topic') === $step_post_type) {
				$context = 'topic';
			} elseif (learndash_get_post_type_slug('quiz') === $step_post_type) {
				$context = 'quiz';
			}
		}
		if (!empty($context)) {
			$infobar_html = learndash_get_template_part(
				'modules/infobar.php',
				array(
					'context'       => $context,
					'course_id'     => $shortcode_pairs['course_id'],
					'user_id'       => $shortcode_pairs['user_id'],
					'has_access'    => $shortcode_pairs['has_access'],
					'course_status' => $shortcode_pairs['course_status'],
					'post'          => get_post($shortcode_pairs['step_id']),
				),
				false
			);
			if (!empty($infobar_html)) {
				echo "<div {$this->render_attributes('_root')}>";
				echo '<div class="' . esc_attr(learndash_get_wrapper_class($shortcode_pairs['step_id'])) . '">' . $infobar_html . '</div>';
				echo "</div>";
			}
		}
	}
}
