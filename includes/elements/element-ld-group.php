<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LearnDash_GroupMember extends Element
{
	public $category = 'learndash group';
    public $name = 'learndash_group_member';
    public $icon = 'ti-medall';
    public $nestable = true;

    public function get_label()
    {
        return esc_html__('LD Group Member', 'bricks');
    }

    public function set_controls()
    {
        $this->controls['group_id'] = [
            'label'       => esc_html__('Group ID', 'bricks'),
            'type'        => 'number',
            'description' => esc_html__('Enter the ID of the group. Content inside this block will only be visible to users who are in the specified group.', 'bricks'),
            'placeholder' => esc_html__('Enter Group ID', 'bricks'),
        ];

        $this->controls['user_id'] = [
            'label'       => esc_html__('User ID', 'bricks'),
            'type'        => 'number',
            'description' => esc_html__('Enter the ID of the user. Content inside this block will only be visible to this user if they are in the specified group.', 'bricks'),
            'placeholder' => esc_html__('Enter User ID', 'bricks'),
        ];
    }

    public function get_nestable_children()
    {
        return [
            [
                'name'     => 'block',
                'label'    => esc_html__('Group Member Content', 'bricks'),
                'settings' => [
                    '_hidden' => [
                        '_cssClasses' => 'group-member-content',
                    ],
                ],
            ],
        ];
    }

    public function render()
    {
        $settings = $this->settings;
        $group_id = !empty($settings['group_id']) ? intval($settings['group_id']) : 0;
        $specified_user_id = !empty($settings['user_id']) ? intval($settings['user_id']) : 0;

        if (!is_user_logged_in()) return;

        $current_user_id = get_current_user_id();

        if ($current_user_id == $specified_user_id && learndash_is_user_in_group($specified_user_id, $group_id)) {
            $output = "<div {$this->render_attributes('_root')}>";
            $output .= Frontend::render_children($this);
            $output .= '</div>';
            echo $output;
        } elseif (empty($specified_user_id) && learndash_is_user_in_group($current_user_id, $group_id)) {
            $output = "<div {$this->render_attributes('_root')}>";
            $output .= Frontend::render_children($this);
            $output .= '</div>';
        }
    }
}
