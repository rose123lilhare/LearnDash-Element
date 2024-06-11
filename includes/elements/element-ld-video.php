<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Video extends Element
{
	protected $shortcode_slug = 'ld_video';
	protected $shortcode_params = array(); // No parameters

	public $category = 'learndash general';
	public $name = 'learn_dash_video';
	public $icon = 'ti-video-camera';

	public function get_label()
	{
		return esc_html__('LD Video', 'bricks');
	}

	public function set_controls()
	{
		// Since there are no parameters, no controls are necessary.
		// However, you might want to add some informational text or a placeholder.
		// $this->control_groups['ld_video_settings'] = [
		// 	'title' => esc_html__('Video Settings', 'bricks')
		// ];


	}

	public function render()
	{
		// Just execute the shortcode as there are no parameters to configure.
		echo "<div {$this->render_attributes('_root')}>";
		echo do_shortcode('[' . $this->shortcode_slug . ']');
		echo "</div>";
	}
}
