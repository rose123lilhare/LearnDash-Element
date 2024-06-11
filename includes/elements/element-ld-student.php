<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_Student extends Element
{
	public $category = 'learndash user';
    public $name = 'learndash_student';
    public $icon = 'ti-user';
    public $nestable = true;

    public function get_label()
    {
        return esc_html__('LD Student', 'bricks');
    }

    public function set_controls()
    {
        $this->controls['course_ids'] = [
            'label'       => esc_html__('Course IDs', 'bricks'),
            'type'        => 'text',
            'description' => esc_html__('Enter the comma-separated IDs of the courses. Content inside this block will only be visible to users who have access to these specified courses.', 'bricks'),
            'placeholder' => esc_html__('e.g., 4523, 2894', 'bricks'),
        ];

        $this->controls['user_id'] = [
            'label'       => esc_html__('User ID', 'bricks'),
            'type'        => 'number',
            'description' => esc_html__('Enter a specific user ID to target. Content will only be visible to this user.', 'bricks'),
            'placeholder' => esc_html__('Enter User ID', 'bricks'),
        ];
    }

    public function get_nestable_children()
    {
        return [
            [
                'name'     => 'block',
                'label'    => esc_html__('Student Content', 'bricks'),
                'settings' => [
                    '_hidden' => [
                        '_cssClasses' => 'student-content',
                    ],
                ],
            ],
        ];
    }

    public function render()
    {
        $settings = $this->settings;
        $course_ids = !empty($settings['course_ids']) ? array_map('intval', explode(',', $settings['course_ids'])) : [];
        $user_id = !empty($settings['user_id']) ? intval($settings['user_id']) : get_current_user_id();

        $access = false;

        // Check for course access
        if (!empty($course_ids)) {
            foreach ($course_ids as $course_id) {
                if (sfwd_lms_has_access($course_id, $user_id)) {
                    $access = true;
                    break;
                }
            }
        }

        // Check for specific user access
        if (get_current_user_id() === $user_id) {
            $access = true;
        }

        if ($access) {
            $output = "<div {$this->render_attributes('_root')}>";
            $output .= Frontend::render_children($this);
            $output .= '</div>';
            echo $output;
        }
    }
}
