<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Profile extends Element
{
	protected $shortcode_slug   = 'ld_profile';
	protected $shortcode_params = array(
		'per_page'           => 'per_page',
		'order'              => 'order',
		'orderby'            => 'orderby',
		'show_search'        => 'show_search',
		'show_header'        => 'show_header',
		'course_points_user' => 'course_points_user',
		'profile_link'       => 'profile_link',
		'show_quizzes'       => 'show_quizzes',
		'expand_all'         => 'expand_all',
	);

	public $category = 'learndash user';
	public $name     = 'learn_dash_profile';
	public $icon     = 'ti-id-badge';

	public function get_label()
	{
		return esc_html__('LD Profile', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_profile_settings'] = [
			'title' => esc_html__('Profile Settings', 'bricks')
		];

		$this->controls['per_page'] = [
			'group'       => 'ld_profile_settings',
			'label'       => esc_html__('Items per page', 'bricks'),
			'type'        => 'number',
			'default'     => '',
			'description' => 'Specify the number of items per page (leave blank for default setting).'
		];

		$this->controls['order'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Order', 'bricks'),
			'type'    => 'select',
			'options' => [
				'ASC'  => __('Ascending', 'bricks'),
				'DESC' => __('Descending', 'bricks')
			],
			'default' => 'ASC'
		];

		$this->controls['orderby'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Order by', 'bricks'),
			'type'    => 'select',
			'options' => [
				'ID'    => __('ID', 'bricks'),
				'title' => __('Title', 'bricks'),
				'date'  => __('Date', 'bricks')
			],
			'default' => 'title'
		];

		$this->controls['show_search'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Show Search', 'bricks'),
			'type'     => 'select',
			'options'  => [
				'true'         => 'Yes',
				'false'      => 'No',
			],
		];

		$this->controls['show_header'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Show Header', 'bricks'),
			'type'     => 'select',
			'options'  => [
				'true'         => 'Yes',
				'false'      => 'No',
			],
		];

		$this->controls['course_points_user'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Show Course Points', 'bricks'),
			'type'     => 'select',
			'options'  => [
				'true'         => 'Yes',
				'false'      => 'No',
			],
		];

		$this->controls['profile_link'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Profile Link', 'bricks'),
			'type'     => 'select',
			'options'  => [
				'true'         => 'Yes',
				'false'      => 'No',
			],
		];

		$this->controls['show_quizzes'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Show Quizzes', 'bricks'),
			'type'     => 'select',
			'options'  => [
				'true'         => 'Yes',
				'false'      => 'No',
			],
		];

		$this->controls['expand_all'] = [
			'group'   => 'ld_profile_settings',
			'label'   => esc_html__('Expand All', 'bricks'),
			'type'     => 'select',
			'options'  => [
				'true'         => 'Yes',
				'false'      => 'No',
			],
		];

		// Settings section
		$this->control_groups['ld_profile_settings'] = [
			'title' => esc_html__('Profile Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_profile_summary_settings'] = [
			'title' => esc_html__('Profile Summary Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_profile_stats_settings'] = [
			'title' => esc_html__('Profile Stats Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_profile_courses_settings'] = [
			'title' => esc_html__('Profile Courses Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_course_item_settings'] = [
			'title' => esc_html__('Course Item Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_course_status_settings'] = [
			'title' => esc_html__('Course Status Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_course_progress_settings'] = [
			'title' => esc_html__('Course Progress Settings', 'learndash-bricks')
		];

		$this->control_groups['ld_course_step_settings'] = [
			'title' => esc_html__('Course Step Settings', 'learndash-bricks')
		];

		// Controls for Profile Settings
		$this->controls['profile_background_color'] = [
			'group' => 'ld_profile_settings',
			'label' => esc_html__('Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper',
				]
			]
		];

		$this->controls['profile_padding'] = [
			'group' => 'ld_profile_settings',
			'label' => esc_html__('Padding', 'learndash-bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper',
				]
			]
		];

		// Controls for Profile Summary Settings
		$this->controls['profile_avatar_border_radius'] = [
			'group' => 'ld_profile_summary_settings',
			'label' => esc_html__('Avatar Border Radius', 'learndash-bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-profile-avatar img',
				]
			]
		];

		$this->controls['profile_edit_link_color'] = [
			'group' => 'ld_profile_summary_settings',
			'label' => esc_html__('Edit Link Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-profile-edit-link',
				]
			]
		];

		$this->controls['profile_edit_link_typography'] = [
			'group' => 'ld_profile_summary_settings',
			'label' => esc_html__('Edit Link Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-profile-edit-link',
				]
			]
		];

		// Controls for Profile Stats Settings
		$this->controls['profile_stats_background_color'] = [
			'group' => 'ld_profile_stats_settings',
			'label' => esc_html__('Stats Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-profile-stat',
				]
			]
		];

		$this->controls['profile_stats_typography'] = [
			'group' => 'ld_profile_stats_settings',
			'label' => esc_html__('Stats Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-profile-stat',
				]
			]
		];

		// Controls for Profile Courses Settings
		$this->controls['profile_courses_heading_color'] = [
			'group' => 'ld_profile_courses_settings',
			'label' => esc_html__('Courses Heading Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-course-list .ld-section-heading h3',
				]
			]
		];

		$this->controls['profile_courses_heading_typography'] = [
			'group' => 'ld_profile_courses_settings',
			'label' => esc_html__('Courses Heading Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-course-list .ld-section-heading h3',
				]
			]
		];

		$this->controls['profile_courses_search_button_color'] = [
			'group' => 'ld_profile_courses_settings',
			'label' => esc_html__('Search Button Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-search-prompt',
				]
			]
		];

		$this->controls['profile_courses_search_button_background_color'] = [
			'group' => 'ld_profile_courses_settings',
			'label' => esc_html__('Search Button Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-search-prompt',
				]
			]
		];

		// Controls for Course Item Settings
		$this->controls['course_item_name_color'] = [
			'group' => 'ld_course_item_settings',
			'label' => esc_html__('Item Name Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-item-list-item-preview .ld-item-name',
				]
			]
		];

		$this->controls['course_item_background_color'] = [
			'group' => 'ld_course_item_settings',
			'label' => esc_html__('Item Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_item_typography'] = [
			'group' => 'ld_course_item_settings',
			'label' => esc_html__('Item Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-item-list-item-preview .ld-item-name',
				]
			]
		];

		// Controls for Course Status Settings
		$this->controls['course_status_icon_color'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Status Icon Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-status-icon',
				]
			]
		];

		$this->controls['course_status_background_color'] = [
			'group' => 'ld_course_status_settings',
			'label' => esc_html__('Status Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-status-icon.ld-secondary-background',
				]
			]
		];

		// Controls for Course Progress Settings
		$this->controls['course_progress_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-item-component-progress',
				]
			]
		];

		$this->controls['course_progress_background_color'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-progress-bar-percentage',
				]
			]
		];

		$this->controls['course_progress_typography'] = [
			'group' => 'ld_course_progress_settings',
			'label' => esc_html__('Progress Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-item-component-progress',
				]
			]
		];

		// Controls for Course Step Settings
		$this->controls['course_step_color'] = [
			'group' => 'ld_course_step_settings',
			'label' => esc_html__('Step Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.ld-item-component-steps',
				]
			]
		];

		$this->controls['course_step_background_color'] = [
			'group' => 'ld_course_step_settings',
			'label' => esc_html__('Step Background Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_step_typography'] = [
			'group' => 'ld_course_step_settings',
			'label' => esc_html__('Step Typography', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-item-component-steps',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;
		$shortcode_pairs = array();
		foreach ($this->shortcode_params as $key_ex => $key_in) {
			if (isset($settings[$key_ex])) {
				$shortcode_pairs[$key_in] = $settings[$key_ex];
			}
		}

		$shortcode_params_str = '';
		foreach ($shortcode_pairs as $key => $val) {
			$val = is_bool($val) ? ($val ? 'true' : 'false') : esc_attr($val);
			$shortcode_params_str .= ' ' . $key . '="' . $val . '"';
		}

		$shortcode_params_str = '[' . $this->shortcode_slug . $shortcode_params_str . ']';
		echo "<div {$this->render_attributes('_root')}>";
		echo do_shortcode($shortcode_params_str);
		echo "</div>";
	}
}
