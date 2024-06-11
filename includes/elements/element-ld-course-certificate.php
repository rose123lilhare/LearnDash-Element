<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Course_Certificate extends Element
{
	protected $shortcode_slug = 'ld_course_certificate';
	protected $shortcode_params = array(
		'course_id' => 'course_id',
		'user_id'   => 'user_id',
		'label'     => 'label',
		'message'   => 'message',
	);

	public $category = 'learndash course';
	public $name = 'learn_dash_course_certificate';
	public $icon = 'ti-check-box';

	public function get_label()
	{
		return esc_html__('LD Course Certificate', 'bricks');
	}

	public function set_controls()
	{
		$this->control_groups['ld_course_certificate_settings'] = [
			'title' => esc_html__('Certificate Settings', 'bricks')
		];
		$this->control_groups['ld_course_alert_settings'] = [
			'title' => esc_html__('Alert Settings', 'bricks')
		];
		$this->control_groups['ld_course_button_settings'] = [
			'title' => esc_html__('Alert Button Settings', 'bricks')
		];

		$this->controls['course_id'] = [
			'group' => 'ld_course_certificate_settings',
			'label' => esc_html__('Course ID', 'bricks'),
			'type' => 'number',
			'default' => '',
			'description' => esc_html__('Enter the Course ID to display the certificate for.', 'bricks')
		];

		$this->controls['user_id'] = [
			'group' => 'ld_course_certificate_settings',
			'label' => esc_html__('User ID', 'bricks'),
			'type' => 'number',
			'default' => '',
			'description' => esc_html__('Enter the User ID to display the certificate for. Defaults to current user.', 'bricks')
		];

		$this->controls['label'] = [
			'group' => 'ld_course_certificate_settings',
			'label' => esc_html__('Button Text', 'bricks'),
			'type' => 'text',
			'default' => '',
			'description' => esc_html__('Custom label for the certificate link.', 'bricks')
		];

		$this->controls['message'] = [
			'group' => 'ld_course_certificate_settings',
			'label' => esc_html__('Alert Message', 'bricks'),
			'type' => 'textarea',
			'default' => '',
			'description' => esc_html__('Custom message to be displayed.', 'bricks')
		];


		$this->controls['alert_message_typography'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Message Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-alert-messages',
				]
			]
		];

		$this->controls['alert_background_color'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-alert',
				]
			]
		];

		$this->controls['alert_borders'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Border', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-alert',
				]
			]
		];

		$this->controls['alert_padding'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Padding', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'padding',
					'selector' => '.learndash-wrapper .ld-alert',
				]
			]
		];

		$this->controls['alert_margin'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Margin', 'bricks'),
			'type' => 'dimensions',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'margin',
					'selector' => '.learndash-wrapper .ld-alert',
				]
			]
		];

		$this->controls['alert_box_shadow'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Box Shadow', 'bricks'),
			'type' => 'box-shadow',
			'css' => [
				[
					'property' => 'box-shadow',
					'selector' => '.learndash-wrapper .ld-alert',
				]
			]
		];

		$this->controls['alert_icon_color'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Icon Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.learndash-wrapper .ld-alert-icon',
				]
			]
		];

		$this->controls['alert_icon_size'] = [
			'group' => 'ld_course_alert_settings',
			'label' => esc_html__('Alert Icon Size', 'bricks'),
			'type' => 'number',
			'units' => ['px', 'em', '%'],
			'css' => [
				[
					'property' => 'font-size',
					'selector' => '.learndash-wrapper .ld-alert-icon',
				]
			]
		];

		$this->controls['button_text_color'] = [
			'group' => 'ld_course_button_settings',
			'label' => esc_html__('Button Text Typography', 'bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.learndash-wrapper .ld-button',
				]
			]
		];

		$this->controls['button_background_color'] = [
			'group' => 'ld_course_button_settings',
			'label' => esc_html__('Button Background Color', 'bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'background-color',
					'selector' => '.learndash-wrapper .ld-button',
				]
			]
		];

		$this->controls['button_borders'] = [
			'group' => 'ld_course_button_settings',
			'label' => esc_html__('Button Borders', 'bricks'),
			'type' => 'border',
			'css' => [
				[
					'property' => 'border',
					'selector' => '.learndash-wrapper .ld-button',
				]
			]
		];
	}

	public function render()
	{
		$settings = $this->settings;

		$shortcode_pairs = array();

		foreach ($this->shortcode_params as $key_ex => $key_in) {
			$shortcode_pairs[$key_in] = '';
			if (isset($settings[$key_ex])) {
				if ($key_ex === 'course_id' || $key_ex === 'user_id') {
					$shortcode_pairs[$key_in] = absint($settings[$key_ex]);
				} else {
					$shortcode_pairs[$key_in] = esc_attr($settings[$key_ex]);
				}
			}
		}

		if (empty($shortcode_pairs['label'])) {
			$shortcode_pairs['label'] = __('Download Certificate', 'learndash-elementor');
		}
		if (empty($shortcode_pairs['message'])) {
			$shortcode_pairs['message'] = __("You've earned a certificate!", 'learndash-elementor');
		}

		// Determine the current context and set IDs accordingly
		if (empty($shortcode_pairs['course_id']) && in_array(get_post_type(), learndash_get_post_types(), true)) {
			$shortcode_pairs['course_id'] = learndash_get_course_id(get_the_ID());
		}

		if (empty($shortcode_pairs['user_id'])) {
			$shortcode_pairs['user_id'] = get_current_user_id();
		}

		if (!empty($shortcode_pairs['user_id']) && !empty($shortcode_pairs['course_id'])) {
			$course_certificate_link = learndash_get_course_certificate_link($shortcode_pairs['course_id'], $shortcode_pairs['user_id']);
		}

		if (!empty($course_certificate_link)) {
			$certificate_alert = learndash_get_template_part(
				'modules/alert.php',
				array(
					'type'    => 'success ld-alert-certificate',
					'icon'    => 'certificate',
					'message' => $shortcode_pairs['message'],
					'button'  => array(
						'url'    => $course_certificate_link,
						'icon'   => 'download',
						'label'  => $shortcode_pairs['label'],
						'target' => '_new',
					),
				),
				false
			);
			if (!empty($certificate_alert)) {
				echo "<div {$this->render_attributes('_root')}>";
				echo '<div class="' . esc_attr(learndash_get_wrapper_class($shortcode_pairs['course_id'])) . '">' . $certificate_alert . '</div>';
				echo "</div>";
			}
		}
	}
}
