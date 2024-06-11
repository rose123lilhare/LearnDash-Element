<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Materials extends Element
{
    protected $shortcode_slug   = 'ld_materials';
    protected $shortcode_params = array(
        'post_id'                  => 'post_id',
    );

	public $category = 'learndash general';
    public $name     = 'learn_dash_ld_materials';
    public $icon     = 'ti-check-box';

    public function get_label()
    {
        return esc_html__('LD Materials', 'bricks');
    }

    public function set_controls()
    {
        $this->control_groups['ld_lesson_materials_settings'] = [
            'title' => esc_html__('Settings', 'bricks')
        ];

        $this->controls['post_id'] = [
            'group'   => 'ld_lesson_materials_settings',
            'label'   => esc_html__('Course ID', 'bricks'),
            'type'    => 'number',
            'default' => '',
            'description' => 'Enter single Course or lesson or topic ID to show material. Leave blank if used within a Course or lesson or topic.'
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
                case 'post_id':
                    $val = absint($val);
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
