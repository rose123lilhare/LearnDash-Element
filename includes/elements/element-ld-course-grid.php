<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Bricks\Element;
use Bricks\Frontend;

class Element_Learn_Dash_Course_Grid extends Element
{

	public $category = 'learndash general';
	public $name     = 'learn_dash_course_grid';
	public $icon = 'ti-layout-grid2';
	public $tag = 'div';
	public $nestable = true;

	// Return localized element label
	public function get_label()
	{
		return esc_html__('LD Course Grid', 'bricks');
	}

	// Set builder controls
	public function set_controls()
	{
	}

	public function get_nestable_children()
	{
		return [
			[
				'name' => 'container',
				'label' => esc_html__('Course Grid Wrapper', 'bricks'),
				'settings' => [
					'_display' => "grid",
					'_gridTemplateColumns' => "1fr 1fr 1fr",
					'_gridGap' => "20px 20px",
					'_hidden' => [
						'_cssClasses' => 'grid-item grid-item-{loop_counter}'
					]
				],
				'children' => [
					[
						'name' => 'block',
						'label' => esc_html__('Column', 'bricks'),
						'settings' => [
							'hasLoop' => true,
							'query' => [
								'objectType' => 'post',
								'post_type' => learndash_get_post_type_slug('course'),
								'posts_per_page' => 12,
								'offset' => 0
							],
							'_hidden' => [
								'_cssClasses' => 'grid-item grid-item-{loop_counter}'
							]
						],
						'children' => [
							[
								'name' => 'image',
								'label' => esc_html__('Featured image', 'bricks'),
								'settings' => [
									'image' => [
										'useDynamicData' => "{featured_image}",
										'size' => 'full'
									]
								]
							],
							[
								'name' => 'post-title',
								'settings' => [
									'linkToPost' => true
								]
							],
							[
								'name' => 'learndash_course_progress',
							]
						],
						'delete' => false
					]
				],
				'delete' => false
			]
		];
	}

	// Enqueue element styles and scripts
	public function render()
	{
		echo "<div {$this->render_attributes('_root')}>";
		echo Frontend::render_children($this);
		echo "</div>";
	}
}
