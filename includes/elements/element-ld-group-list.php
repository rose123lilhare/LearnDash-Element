<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_GroupList extends Element
{
    protected $shortcode_slug   = 'ld_group_list';
    protected $shortcode_params = array(
        'orderby'        => 'orderby',
        'order'          => 'order',
        'num'            => 'num',
        'price_type'     => 'price_type',
        'mygroups'       => 'mygroups',
        'status'         => 'status',
        'show_content'   => 'show_content',
        'show_thumbnail' => 'show_thumbnail',
        'col'            => 'col',
        'group_category_name' => 'group_category_name',
        'group_cat'      => 'group_cat',
        'group_categoryselector' => 'group_categoryselector',
        'group_tag'      => 'group_tag',
        'group_tag_id'   => 'group_tag_id'
    );

	public $category = 'learndash group';
    public $name     = 'learn_dash_group_list';
    public $icon     = 'ti-list';

    public function get_label()
    {
        return esc_html__('LD Group List', 'bricks');
    }

    public function set_controls()
    {

        $this->control_groups['ld_group_settings'] = [
			'title' => esc_html__('Settings', 'learndash-bricks')
		];

        $this->control_groups['ld_grid_settings'] = [
			'title' => esc_html__('Grid Settings', 'learndash-bricks')
		];

        $this->control_groups['ld_course_list_settings'] = [
			'title' => esc_html__('Style Course List Settings', 'learndash-bricks')
		];

        $this->control_groups['course_list_style_settings'] = [
            'title' => esc_html__('Course List Style', 'learndash-bricks'),
        ];

        $this->control_groups['course_item_style_settings'] = [
            'title' => esc_html__('Course Item Style', 'learndash-bricks'),
        ];

        // Adding controls for Group List parameters
        $this->controls['orderby'] = [
            'group' => 'ld_group_settings',
            'label'       => esc_html__('Order by', 'bricks'),
            'type'        => 'select',
            'options'     => [
                'ID'         => esc_html__('ID - Order by post id. (default)', 'bricks'),
                'title'      => esc_html__('Title - Order by post title', 'bricks'),
                'date'       => esc_html__('Date - Order by post date', 'bricks'),
                'menu_order' => esc_html__('Menu - Order by Page Order Value', 'bricks')
            ],
            'default'     => 'ID'
        ];

        $this->controls['order'] = [
            'group' => 'ld_group_settings',
            'label'       => esc_html__('Order', 'bricks'),
            'type'        => 'select',
            'options'     => [
                'DESC' => esc_html__('DESC - highest to lowest values (default)', 'bricks'),
                'ASC'  => esc_html__('ASC - lowest to highest values', 'bricks')
            ],
            'default'     => 'DESC'
        ];

        $this->controls['num'] = [
            'group' => 'ld_group_settings',
            'label'       => esc_html__('Number of Groups', 'bricks'),
            'type'        => 'number',
            'placeholder' => '10',
            'min'         => 0,
            'step'        => 1
        ];

        $this->controls['price_type'] = [
            'group' => 'ld_group_settings',
            'label'       => esc_html__('Price Type', 'bricks'),
            'type'        => 'select',
            'options'     => [
                'free'      => esc_html__('Free', 'bricks'),
                'paynow'    => esc_html__('Buy Now', 'bricks'),
                'subscribe' => esc_html__('Recurring', 'bricks'),
                'closed'    => esc_html__('Closed', 'bricks')
            ],
            'multiple'    => true,
            'description' => esc_html__('Select price types to filter groups.', 'bricks')
        ];

        $this->controls['mygroups'] = [
            'group' => 'ld_group_settings',
            'label'       => esc_html__('My Groups', 'bricks'),
            'type'        => 'select',
            'options'     => [
                ''             => esc_html__('Show All Groups (default)', 'bricks'),
                'enrolled'     => esc_html__('Show Enrolled Groups only', 'bricks'),
                'not-enrolled' => esc_html__('Show not-Enrolled Groups only', 'bricks')
            ],
            'default'     => ''
        ];

        $this->controls['status'] = [
            'group' => 'ld_group_settings',
            'label'       => esc_html__('Group Status', 'bricks'),
            'type'        => 'select',
            'options'     => [
                'not_started' => esc_html__('Not Started', 'bricks'),
                'in_progress' => esc_html__('In Progress', 'bricks'),
                'completed'   => esc_html__('Completed', 'bricks')
            ],
            'multiple'    => true,
            'description' => esc_html__('Select status to filter groups.', 'bricks')
        ];

        $this->controls['show_content'] = [
            'group' => 'ld_grid_settings',
            'label'       => esc_html__('Show Content', 'bricks'),
            'type'        => 'checkbox',
            'default'     => 'true'
        ];

        $this->controls['show_thumbnail'] = [
            'group' => 'ld_grid_settings',
            'label'       => esc_html__('Show Thumbnail', 'bricks'),
            'type'        => 'checkbox',
            'default'     => 'true'
        ];

        $this->controls['col'] = [
            'group' => 'ld_grid_settings',
            'label'       => esc_html__('Columns', 'bricks'),
            'type'        => 'number',
            'placeholder' => '3',
            'min'         => 1,
            'max'         => 6
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
            'group' => 'course_item_style_settings',
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
            'group' => 'course_item_style_settings',
            'label' => esc_html__('Course Item Box Shadow', 'bricks'),
            'type' => 'box-shadow',
            'css' => [
                [
                    'property' => 'box-shadow',
                    'selector' => '.ld-item-list-item',
                ]
            ]
        ];

        $this->controls['course_item_bordes'] = [
            'group' => 'course_item_style_settings',
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
            'group' => 'course_item_style_settings',
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
            'group' => 'course_item_style_settings',
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
            'group' => 'course_item_style_settings',
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
            'group' => 'course_item_style_settings',
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

        // Construct shortcode parameter string
        $shortcode_params_str = '';
        foreach ($shortcode_pairs as $key => $val) {
            $skip_param = false;
            switch ($key) {
                case 'group_categoryselector':
                case 'show_content':
                case 'show_thumbnail':
                    if (true === $val) {
                        $val = 'true';
                    } else if (false === $val) {
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

        // Output the shortcode
        if (!empty($shortcode_params_str)) {
            if (defined('LEARNDASH_COURSE_GRID_FILE') && file_exists(LEARNDASH_COURSE_GRID_FILE)) {
                learndash_enqueue_course_grid_scripts();
            }

            $shortcode_params_str = '[' . $this->shortcode_slug . $shortcode_params_str . ']';
            echo "<div {$this->render_attributes('_root')}>";
            echo do_shortcode($shortcode_params_str);
            echo "</div>";
        } else {
            echo "<div {$this->render_attributes('_root')}>";
            echo do_shortcode('[' . $this->shortcode_slug . ']');
            echo "</div>";
        }
    }
}
