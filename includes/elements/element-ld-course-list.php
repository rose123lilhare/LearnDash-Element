<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Course_List extends Element
{
	protected $shortcode_slug   = 'ld_course_list';
	protected $shortcode_params = array(
		'per_page'                   => 'num',
		'order'                      => 'order',
		'orderby'                    => 'orderby',
		'mycourses'                  => 'mycourses',
		'status'                     => 'status',

		'course_grid'                => 'course_grid',
		'progress_bar'               => 'progress_bar',
		'col'                        => 'col',
		'show_thumbnail'        => 'show_thumbnail',

		'ld_course_cat_id'           => 'course_cat',
		'ld_course_tag_id'           => 'course_tag_id',
		'ld_course_categoryselector' => 'course_categoryselector',

		'wp_category_id'             => 'cat',
		'wp_tag_id'                  => 'tag_id',
		'wp_categoryselector'        => 'categoryselector',
	);

	public $category = 'learndash general';
	public $name     = 'learn_dash_course_list';
	public $icon     = 'ti-check-box';

	public function get_label()
	{
		return esc_html__('LD Course List', 'bricks');
	}

	function get_terms_by_post_type_and_taxonomy($post_type, $taxonomy)
	{
		// Validate that the taxonomy is associated with the given post type
		if (!taxonomy_exists($taxonomy) || !post_type_exists($post_type)) {
			return array('error' => 'Invalid post type or taxonomy');
		}

		$args = array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
		);

		// Fetch terms
		$terms = get_terms($args);

		$formatted_terms = [];
		if (!is_wp_error($terms)) {
			foreach ($terms as $term) {
				$formatted_terms[$term->term_id] = $term->name;
			}
		} else {
			// Handle error if terms fetching failed
			return array('error' => 'Failed to fetch terms');
		}

		return $formatted_terms;
	}

	public function set_controls()
	{
		// Settings section
		$this->control_groups['ld_course_list_settings'] = [
			'title' => esc_html__('Settings', 'learndash-bricks')
		];

		$this->controls['orderby'] = [
			'group'    => 'ld_course_list_settings',
			'label'    => esc_html__('Order by', 'learndash-bricks'),
			'type'     => 'select',
			'options'  => [
				'ID'         => __('ID - Order by post id. (default)', 'learndash-bricks'),
				'title'      => __('Title - Order by post title', 'learndash-bricks'),
				'date'       => __('Date - Order by post date', 'learndash-bricks'),
				'menu_order' => __('Menu - Order by Page Order Value', 'learndash-bricks')
			],
			'default'  => 'ID'
		];

		$this->controls['order'] = [
			'group'    => 'ld_course_list_settings',
			'label'    => esc_html__('Order', 'learndash-bricks'),
			'type'     => 'select',
			'options'  => [
				'DESC' => __('DESC - highest to lowest values (default)', 'learndash-bricks'),
				'ASC'  => __('ASC - lowest to highest values', 'learndash-bricks')
			],
			'default'  => 'DESC'
		];

		$this->controls['per_page'] = [
			'group'       => 'ld_course_list_settings',
			'label'       => sprintf(esc_html__('%s per page', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses')),
			'type'        => 'number',
			'description' => sprintf(esc_html__('Leave empty for default (%d) or 0 to show all items.', 'learndash-bricks'), \LearnDash_Settings_Section::get_section_setting('LearnDash_Settings_Section_General_Per_Page', 'per_page'))
		];

		$this->controls['mycourses'] = [
			'group'    => 'ld_course_list_settings',
			'label'    => sprintf(esc_html__('My %s', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses')),
			'type'     => 'select',
			'options'  => [
				''             => sprintf(esc_html__('Show All %s (default)', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses')),
				'enrolled'     => sprintf(esc_html__('Show Enrolled %s only', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses')),
				'not-enrolled' => sprintf(esc_html__('Show not-Enrolled %s only', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses'))
			],
			'default'  => ''
		];

		$this->controls['status'] = [
			'group'      => 'ld_course_list_settings',
			'label'      => sprintf(esc_html__('Enrolled %s Status', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('course')),
			'type'       => 'select',
			'required' => ['mycourses', '=', 'enrolled'],
			'options'    => [
				'not_started' => __('Not Started', 'learndash-bricks'),
				'in_progress' => __('In Progress', 'learndash-bricks'),
				'completed'   => __('Completed', 'learndash-bricks')
			],
			'default'    => ['not_started', 'in_progress', 'completed']
		];

		// Grid Settings section
		$this->control_groups['ld_course_list_grid_settings'] = [
			'title' => esc_html__('Grid Settings', 'learndash-bricks')
		];

		$this->controls['course_grid'] = [
			'group'    => 'ld_course_list_grid_settings',
			'label'    => esc_html__('Show Grid', 'learndash-bricks'),
			'type'     => 'select',
			'options'  => [
				'yes'         => 'Yes',
				'no'      => 'No',
			],
		];

		$this->controls['show_thumbnail'] = [
			'group'    => 'ld_course_list_grid_settings',
			'label'    => esc_html__('Show Thumbnail', 'learndash-bricks'),
			'type'     => 'select',
			'options'  => [
				'yes'         => 'Yes',
				'no'      => 'No',
			],
		];

		$this->controls['progress_bar'] = [
			'group'    => 'ld_course_list_grid_settings',
			'label'    => esc_html__('Show Progress Bar', 'learndash-bricks'),
			'type'     => 'select',
			'options'  => [
				'yes'         => 'Yes',
				'no'      => 'No',
			],
		];

		$this->controls['col'] = [
			'group'    => 'ld_course_list_grid_settings',
			'label'    => esc_html__('Columns', 'learndash-bricks'),
			'type'     => 'number',
			'default'  => 3
		];

		// LD Taxonomies section
		$this->control_groups['ld_course_list_ld_taxonomies'] = [
			'title' => sprintf(esc_html__('%s Taxonomies', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('course'))
		];

		$this->controls['ld_course_categoryselector'] = [
			'group'    => 'ld_course_list_ld_taxonomies',
			'label'    => sprintf(esc_html__('Show %s Category Selector', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('course')),
			'type'     => 'select',
			'options'  => [
				'yes'         => 'Yes',
				'no'      => 'No',
			],
		];

		$this->controls['ld_course_cat_id'] = [
			'group'        => 'ld_course_list_ld_taxonomies',
			'label'        => sprintf(esc_html__('%s Category', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('course')),
			'type'       => 'select',
			'options'  => $this->get_terms_by_post_type_and_taxonomy(learndash_get_post_type_slug('course'), 'ld_course_category'),
			'description'  => sprintf(esc_html__('Shows %s with mentioned LearnDash category.', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses'))
		];

		$this->controls['ld_course_tag_id'] = [
			'group'        => 'ld_course_list_ld_taxonomies',
			'label'        => sprintf(esc_html__('%s Tag', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('course')),
			'type'       => 'select',
			'options'  => $this->get_terms_by_post_type_and_taxonomy(learndash_get_post_type_slug('course'), 'ld_course_tag'),
			'description'  => sprintf(esc_html__('Shows %s with mentioned LearnDash category.', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses'))
		];

		// WP Taxonomies section
		$this->control_groups['ld_course_list_wp_taxonomies'] = [
			'title' => esc_html__('WordPress Taxonomies', 'learndash-bricks')
		];

		$this->controls['wp_categoryselector'] = [
			'group'    => 'ld_course_list_wp_taxonomies',
			'label'    => esc_html__('Show WordPress Category Selector', 'learndash-bricks'),
			'type'     => 'select',
			'options'  => [
				'yes'         => 'Yes',
				'no'      => 'No',
			],
		];

		$this->controls['wp_category_id'] = [
			'group'        => 'ld_course_list_wp_taxonomies',
			'label'        => esc_html__('Category', 'learndash-bricks'),
			'type'       => 'select',
			'options'  => $this->get_terms_by_post_type_and_taxonomy(learndash_get_post_type_slug('course'), 'category'),
			'description'  => sprintf(esc_html__('Shows %s with mentioned LearnDash category.', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses'))
		];

		$this->controls['wp_tag_id'] = [
			'group'        => 'ld_course_list_wp_taxonomies',
			'label'        => esc_html__('Tag', 'learndash-bricks'),
			'type'       => 'select',
			'options'  => $this->get_terms_by_post_type_and_taxonomy(learndash_get_post_type_slug('course'), 'post_tag'),
			'description'  => sprintf(esc_html__('Shows %s with mentioned WordPress tag.', 'learndash-bricks'), \LearnDash_Custom_Label::get_label('courses'))
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



		// Style section
		$this->control_groups['ld_course_grid_style_settings'] = [
			'title' => esc_html__('Grid Style', 'bricks')
		];

		$this->controls['thumbnail_border'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Thumbnail Border', 'bricks'),
			'type'  => 'border',
			'css'   => [
				[
					'property' => 'border',
					'selector' => '.ld_course_grid .thumbnail img',
				]
			]
		];

		$this->controls['caption_background_color'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Caption Background Color', 'bricks'),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background-color',
					'selector' => '.ld_course_grid .caption',
				]
			]
		];


		$this->controls['course_title_typography'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Course Title Typography', 'bricks'),
			'type'  => 'typography',
			'css'   => [
				[
					'property' => 'font',
					'selector' => '.ld_course_grid .caption h3',
				]
			]
		];

		$this->controls['caption_typography'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Course Description Typography', 'bricks'),
			'type'  => 'typography',
			'css'   => [
				[
					'property' => 'font',
					'selector' => '.ld_course_grid .caption p',
				]
			]
		];

		$this->controls['ribbon_background_color'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Ribbon Background Color', 'bricks'),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background-color',
					'selector' => '.ld_course_grid .ribbon',
				]
			]
		];

		$this->controls['ribbon_text_color'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Ribbon Text Color', 'bricks'),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'color',
					'selector' => '.ld_course_grid .ribbon',
				]
			]
		];

		$this->controls['ribbon_typography'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Ribbon Typography', 'bricks'),
			'type'  => 'typography',
			'css'   => [
				[
					'property' => 'font',
					'selector' => '.ld_course_grid .ribbon',
				]
			]
		];

		$this->controls['button_background_color'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Button Background Color', 'bricks'),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background-color',
					'selector' => '.ld_course_grid .btn',
				]
			]
		];

		$this->controls['button_typography'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Button Typography', 'bricks'),
			'type'  => 'typography',
			'css'   => [
				[
					'property' => 'font',
					'selector' => '.ld_course_grid .btn',
				]
			]
		];

		$this->controls['button_border'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Button Border', 'bricks'),
			'type'  => 'border',
			'css'   => [
				[
					'property' => 'border',
					'selector' => '.ld_course_grid .btn',
				]
			]
		];

		$this->controls['progress_bar_background_color'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Progress Bar Background Color', 'bricks'),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background-color',
					'selector' => '.ld-progress-bar',
				]
			]
		];

		$this->controls['progress_bar_percentage_color'] = [
			'group' => 'ld_course_grid_style_settings',
			'label' => esc_html__('Progress Bar Percentage Color', 'bricks'),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background-color',
					'selector' => '.ld-progress-bar-percentage',
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
			$skip_param = false;
			switch ($key) {
				case 'status':
					if ((isset($shortcode_pairs['mycourses'])) && ('enrolled' === $shortcode_pairs['mycourses'])) {
						if ((!empty($val)) && (is_array($val))) {
							$val = implode(',', $val);
						} else {
							$val = array('not_started', 'in_progress', 'completed');
							$val = implode(',', $val);
						}
					} else {
						$skip_param = true;
					}
					break;

				case 'course_categoryselector':
				case 'categoryselector':
				case 'progress_bar':
				case 'course_grid':
				case 'show_thumbnail':
					if ('yes' === $val) {
						$val = 'true';
					} else {
						$val = 'false';
					}
					break;

				default:
					if ('' === $val) {
						$skip_param = true;
					} else {
						$val = esc_attr($val);
					}
					break;
			}

			if (true !== $skip_param) {
				$shortcode_params_str .= ' ' . $key . '="' . $val . '"';
			}
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
			echo do_shortcode($shortcode_params_str);
			echo "</div>";
		}
	}
}
