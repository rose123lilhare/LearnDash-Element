<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Quiz_Complete extends Element
{
    protected $shortcode_slug   = 'ld_quiz_complete';
    protected $shortcode_params = array(
        'course_id' => 'course_id',
        'quiz_id'   => 'quiz_id',
        'user_id'   => 'user_id'
    );

	public $category = 'learndash quiz';
    public $name     = 'ld_quiz_complete';
    public $icon     = 'ti-bookmark-alt';

    public function get_label()
    {
        return esc_html__('LD Quiz Complete', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_quiz_complete_settings'] = [
            'title' => esc_html__('Settings', 'learndash-bricks')
        ];

        $this->controls['course_id'] = [
            'group'    => 'ld_quiz_complete_settings',
            'label'    => esc_html__('Course ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => 0
        ];

        $this->controls['quiz_id'] = [
            'group'    => 'ld_quiz_complete_settings',
            'label'    => esc_html__('Quiz ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => 0
        ];

        $this->controls['user_id'] = [
            'group'    => 'ld_quiz_complete_settings',
            'label'    => esc_html__('User ID', 'learndash-bricks'),
            'type'     => 'number',
            'default'  => get_current_user_id()
        ];
    }

    public function render()
    {
        $settings = $this->settings;

        // Generate shortcode attributes
        $shortcode_atts = '';
        foreach ($settings as $key => $value) {
            if ($value !== '') {
                $shortcode_atts .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
            }
        }

        // Construct the shortcode
        $shortcode = '[' . $this->shortcode_slug . $shortcode_atts . ']';

        // Output the shortcode
        echo "<div {$this->render_attributes('_root')}>";
        echo do_shortcode($shortcode);
        echo "</div>";
    }
}
