<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_CourseNotStarted extends Element
{
	public $category = 'learndash course';
    public $name = 'learndash_course_notstarted';
    public $icon = 'ti-time';
    public $nestable = true;

    public function get_label()
    {
        return esc_html__('LD Course Not Started', 'bricks');
    }

    public function set_controls()
    {
        $this->controls['course_id'] = [
            'label'       => esc_html__('Course ID', 'bricks'),
            'type'        => 'text',
            'description' => esc_html__('Enter the ID of the course. Content inside this block will only be visible to users who have access to the course but have not started it yet.', 'bricks'),
            'placeholder' => esc_html__('Enter Course ID', 'bricks'),
        ];
    }

    public function get_nestable_children()
    {
        return [
            [
                'name'     => 'block',
                'label'    => esc_html__('Not Started Content', 'bricks'),
                'settings' => [
                    '_hidden' => [
                        '_cssClasses' => 'not-started-content',
                    ],
                ],
            ],
        ];
    }

    public function render()
    {
        $settings = $this->settings;
        $course_id = !empty($settings['course_id']) ? intval($settings['course_id']) : learndash_get_course_id(get_the_ID());

        if (!is_user_logged_in()) return;

        $user_id = get_current_user_id();
        $access = sfwd_lms_has_access($course_id, $user_id);

        // Check if the user has access and the course status is "Not Started"
        if ($access && 'Not Started' === learndash_course_status($course_id, $user_id)) {
            $output = "<div {$this->render_attributes('_root')}>";
            $output .= Frontend::render_children($this);
            $output .= '</div>';
            echo $output;
        }
    }
}
