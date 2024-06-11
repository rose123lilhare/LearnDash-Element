<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_CourseComplete extends Element
{
	public $category = 'learndash course';
    public $name = 'learndash_course_complete';
    public $icon = 'ti-medall';
    public $nestable = true;

    public function get_label()
    {
        return esc_html__('LD Course Complete', 'bricks');
    }

    public function set_controls()
    {
        $this->controls['course_id'] = [
            'label'       => esc_html__('Course ID', 'bricks'),
            'type'        => 'number',
            'description' => esc_html__('Enter the ID of the course. Content inside this block will only be visible to users who have completed the specified course. If left empty it will tak current course id', 'bricks'),
            'placeholder' => esc_html__('Enter Course ID', 'bricks'),
        ];
    }

    public function get_nestable_children()
    {
        return [
            [
                'name'     => 'block',
                'label'    => esc_html__('Completed Course Content', 'bricks'),
                'settings' => [
                    '_hidden' => [
                        '_cssClasses' => 'completed-course-content',
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

        // Check if the user has access and the course status is "Completed"
        if ($access && 'Completed' === learndash_course_status($course_id, $user_id)) {
            $output = "<div {$this->render_attributes('_root')}>";
            $output .= Frontend::render_children($this);
            $output .= '</div>';
            echo $output;
        }
    }
}
