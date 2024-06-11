<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Quiz_List extends Element
{
	protected $shortcode_slug   = 'ld_quiz_list';
	protected $shortcode_params = array(
		'course_id' => 'course_id',
		'lesson_id' => 'lesson_id',
		'topic_id'  => 'topic_id',
		'per_page'  => 'num',
		'order'     => 'order',
		'orderby'   => 'orderby',

		'course_grid' => 'course_grid',
		'col'         => 'col',

		'ld_quiz_cat_id' => 'quiz_cat',
		'ld_quiz_tag_id' => 'quiz_tag_id',

		'wp_category_id' => 'cat',
		'wp_tag_id'      => 'tag_id',
	);

	public $category = 'learndash quiz';
	public $name     = 'learn_dash_quiz_list';
	public $icon     = 'ti-check-box';

	function get_terms_by_post_type_and_taxonomy($post_type, $taxonomy)
	{
		if (!taxonomy_exists($taxonomy) || !post_type_exists($post_type)) {
			return array('error' => 'Invalid post type or taxonomy');
		}

		$args = array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
		);

		$terms = get_terms($args);
		$formatted_terms = [];
		if (!is_wp_error($terms)) {
			foreach ($terms as $term) {
				$formatted_terms[$term->term_id] = $term->name;
			}
		} else {
			return array('error' => 'Failed to fetch terms');
		}

		return $formatted_terms;
	}

	public function get_label()
	{
		return esc_html__('LD Quiz List', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_quiz_list_settings'] = [
			'title' => esc_html__('Settings', 'bricks')
		];

		$this->controls['course_id'] = [
			'group'   => 'ld_quiz_list_settings',
			'label'   => esc_html__('Course ID', 'bricks'),
			'type'    => 'number',
			'default' => '',
			'description' => 'Enter single Course ID to limit listing. Leave blank if used within a Course.'
		];

		$this->controls['lesson_id'] = [
			'group'   => 'ld_quiz_list_settings',
			'label'   => esc_html__('Lesson ID', 'bricks'),
			'type'    => 'number',
			'default' => '',
			'description' => 'Enter single Lesson ID to limit listing. Leave blank if used within a Lesson.'
		];

		$this->controls['topic_id'] = [
			'group'   => 'ld_quiz_list_settings',
			'label'   => esc_html__('Topic ID', 'bricks'),
			'type'    => 'number',
			'default' => '',
			'description' => 'Enter single Topic ID to limit listing. Leave blank if used within a Topic.'
		];

		$this->controls['orderby'] = [
			'group'   => 'ld_quiz_list_settings',
			'label'   => esc_html__('Order by', 'bricks'),
			'type'    => 'select',
			'options' => [
				'ID'         => __('ID - Order by post id. (default)', 'bricks'),
				'title'      => __('Title - Order by post title', 'bricks'),
				'date'       => __('Date - Order by post date', 'bricks'),
				'menu_order' => __('Menu - Order by Page Order Value', 'bricks')
			],
			'default' => 'ID'
		];

		$this->controls['order'] = [
			'group'   => 'ld_quiz_list_settings',
			'label'   => esc_html__('Order', 'bricks'),
			'type'    => 'select',
			'options' => [
				'DESC' => __('DESC - highest to lowest values (default)', 'bricks'),
				'ASC'  => __('ASC - lowest to highest values', 'bricks')
			],
			'default' => 'DESC'
		];

		$this->controls['per_page'] = [
			'group'       => 'ld_quiz_list_settings',
			'label'       => esc_html__('Quizzes per page', 'bricks'),
			'type'        => 'number',
			'description' => esc_html__('Set the number of quizzes to display per page. Leave empty or set to 0 to show all.', 'bricks')
		];

		// Grid Settings
		$this->control_groups['ld_quiz_list_grid_settings'] = [
			'title' => esc_html__('Grid Settings', 'bricks')
		];

		$this->controls['course_grid'] = [
			'group'   => 'ld_quiz_list_grid_settings',
			'label'   => esc_html__('Show Grid', 'bricks'),
			'type'    => 'checkbox',
			'default' => false
		];

		$this->controls['col'] = [
			'group'   => 'ld_quiz_list_grid_settings',
			'label'   => esc_html__('Columns', 'bricks'),
			'type'    => 'number',
			'default' => 3
		];

		// Quiz Taxonomies
		// $this->control_groups['ld_quiz_list_ld_taxonomies'] = [
		// 	'title' => sprintf(esc_html__('%s Taxonomies', 'bricks'), \LearnDash_Custom_Label::get_label('quiz'))
		// ];

		// $this->controls['ld_quiz_cat_id'] = [
		// 	'group'       => 'ld_quiz_list_ld_taxonomies',
		// 	'label'       => sprintf(esc_html__('%s Category', 'bricks'), \LearnDash_Custom_Label::get_label('quiz')),
		// 	'type'        => 'select',
		// 	'options'     => $this->get_terms_by_post_type_and_taxonomy('sfwd-quiz', 'ld_quiz_category'),
		// 	'description' => sprintf(esc_html__('Shows quizzes with mentioned LearnDash category.', 'bricks'), \LearnDash_Custom_Label::get_label('quizzes'))
		// ];

		// $this->controls['ld_quiz_tag_id'] = [
		// 	'group'       => 'ld_quiz_list_ld_taxonomies',
		// 	'label'       => sprintf(esc_html__('%s Tag', 'bricks'), \LearnDash_Custom_Label::get_label('quiz')),
		// 	'type'        => 'select',
		// 	'options'     => $this->get_terms_by_post_type_and_taxonomy('sfwd-quiz', 'ld_quiz_tag'),
		// 	'description' => sprintf(esc_html__('Shows quizzes with mentioned LearnDash tag.', 'bricks'), \LearnDash_Custom_Label::get_label('quizzes'))
		// ];

		// // WordPress Taxonomies
		// $this->control_groups['ld_quiz_list_wp_taxonomies'] = [
		// 	'title' => esc_html__('WordPress Taxonomies', 'bricks')
		// ];

		// $this->controls['wp_category_id'] = [
		// 	'group'       => 'ld_quiz_list_wp_taxonomies',
		// 	'label'       => esc_html__('Category', 'bricks'),
		// 	'type'        => 'select',
		// 	'options'     => $this->get_terms_by_post_type_and_taxonomy('sfwd-quiz', 'category'),
		// 	'description' => esc_html__('Shows quizzes with mentioned WordPress category.', 'bricks')
		// ];

		// $this->controls['wp_tag_id'] = [
		// 	'group'       => 'ld_quiz_list_wp_taxonomies',
		// 	'label'       => esc_html__('Tag', 'bricks'),
		// 	'type'        => 'select',
		// 	'options'     => $this->get_terms_by_post_type_and_taxonomy('sfwd-quiz', 'post_tag'),
		// 	'description' => esc_html__('Shows quizzes with mentioned WordPress tag.', 'bricks')
		// ];

		// Style section for row items
		$this->control_groups['course_list_style_settings'] = [
			'title' => esc_html__('Course List Style', 'learndash-bricks'),
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

		$this->controls['course_list_border_color'] = [
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

		$this->control_groups['course_list_item_style_settings'] = [
			'title' => esc_html__('Course List Items Style', 'learndash-bricks'),
		];

		$this->controls['course_item_background_color'] = [
			'group' => 'course_list_item_style_settings',
			'label' => esc_html__('Course Item Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		

		$this->controls['course_item_box_shadow'] = [
			'group' => 'course_list_item_style_settings',
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
			'group' => 'course_list_item_style_settings',
			'label' => esc_html__('Course Item Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.ld-item-list-item',
				]
			]
		];

		$this->controls['course_item_name_hover_color'] = [
			'group' => 'course_list_item_style_settings',
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
			'group' => 'course_list_item_style_settings',
			'label' => esc_html__('Course Item Name Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.ld-item-name',
				]
			]
		];

		$this->controls['course_item_padding'] = [
			'group' => 'course_list_item_style_settings',
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
			'group' => 'course_list_item_style_settings',
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

		// Ensure correct IDs are set or fallbacks are used
		if (!isset($shortcode_pairs['course_id']) || !$shortcode_pairs['course_id']) {
			if (get_post_type(get_the_ID()) === learndash_get_post_type_slug('course')) {
				$shortcode_pairs['course_id'] = get_the_ID();
			}
		}
		if (!isset($shortcode_pairs['lesson_id']) || !$shortcode_pairs['lesson_id']) {
			if (get_post_type(get_the_ID()) === learndash_get_post_type_slug('lesson')) {
				$shortcode_pairs['lesson_id'] = get_the_ID();
			}
		}
		if (!isset($shortcode_pairs['topic_id']) || !$shortcode_pairs['topic_id']) {
			if (get_post_type(get_the_ID()) === learndash_get_post_type_slug('topic')) {
				$shortcode_pairs['topic_id'] = get_the_ID();
			}
		}

		$shortcode_params_str = '';
		foreach ($shortcode_pairs as $key => $val) {
			if ($val === true) {
				$val = 'true';
			} elseif ($val === false || $val === '') {
				continue;  // Skip parameters that are false or empty to adhere to shortcode defaults
			} else {
				$val = esc_attr($val);
			}
			$shortcode_params_str .= ' ' . $key . '="' . $val . '"';
		}

		if (!empty($shortcode_params_str)) {
			if ((isset($shortcode_pairs['course_grid'])) && (!empty($shortcode_pairs['course_grid']))) {
				if ((defined('LEARNDASH_COURSE_GRID_FILE')) && (file_exists(LEARNDASH_COURSE_GRID_FILE))) {
					learndash_enqueue_course_grid_scripts();
				}
			}

			$shortcode_params_str = '[' . $this->shortcode_slug . $shortcode_params_str . ']';
			echo "<div {$this->render_attributes('_root')}>";
			echo do_shortcode($shortcode_params_str);
			echo "</div>";
		} else {
			$shortcode_params_str = '[' . $this->shortcode_slug .  ']';
			echo "<div {$this->render_attributes('_root')}>";
			echo do_shortcode($this->shortcode_slug);
			echo "</div>";
		}
	}
}
