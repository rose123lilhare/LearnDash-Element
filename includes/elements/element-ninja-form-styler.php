<?php

namespace Bricks;

if (!defined('ABSPATH')) exit;

class Element_Ninja_Form_Styler extends Element
{
    public $category = 'general';
	public $name 			= 'bu-nf';
	public $icon 			= 'ti-layout-accordion-merged';
	public $tag 			= 'div';

	// Return localized element label
	public function get_label()
	{
		return esc_html__('Ninja Form Styler', 'bricks');
	}

	// Set builder control groups
	public function set_control_groups()
	{
		$this->control_groups['form_name']    = array(
			'title' => esc_html__('Name', 'bricks'),
			'tab'   => 'content',
			'required' => ['show_title', '=', 'yes']
		);
		$this->control_groups['form_label']    = array(
			'title' => esc_html__('Labels', 'bricks'),
			'tab'   => 'content',
		);
		$this->control_groups['form_inp']  = array(
			'title' => esc_html__('Input Fields', 'bricks'),
			'tab'   => 'content',
		);
		$this->control_groups['button'] = array(
			'title' => esc_html__('Submit Button', 'bricks'),
			'tab'   => 'content',
		);
		$this->control_groups['inline_errors'] = array(
			'title' => esc_html__('Inline Errors', 'bricks'),
			'tab'   => 'content',
		);
		$this->control_groups['msg'] = array(
			'title' => esc_html__('Message', 'bricks'),
			'tab'   => 'content',
		);
	}

	// Set builder controls
	public function set_controls()
	{
		$this->controls['njf_form_info'] = [
			'tab' 			=> 'content',
			'type' 			=> 'info',
			'content' 			=> esc_html__("Create a form with Ninja Form plugin before using this element.", 'bricks'),
		];

		$this->controls['source_type'] = [
			'tab' 		=> 'content',
			'type' 		=> 'select',
			'label' 	=> esc_html__('Source Type', 'bricks'),
			'default' 	=> 'static',
			'options' 	=> [
				'static' 	=> esc_html__('Choose from dropwdown', 'bricks'),
				'dynamic' 	=> esc_html__('Custom Field', 'bricks'),
			],
		];

		$this->controls['ninja_form'] = [
			'tab' 			=> 'content',
			'type' 			=> 'select',
			'default' 		=> 'none',
			'label' 		=> esc_html__('Form', 'bricks'),
			'options' 		=> $this->getNinjaForms(),
			'required'		=> ['source_type', '=', ['static']],
		];

		$this->controls['form_id'] = [
			'tab' 			=> 'content',
			'type' 			=> 'text',
			'label' 		=> esc_html__('Custom Field Name', 'bricks'),
			'info' 			=> __("Make sure that it returns the Ninja Form ID.", 'bricks'),
			'placeholder' 	=> esc_html__('Enter custom field key', 'bricks'),
			'hasDynamicData' => false,
			'required'		=> ['source_type', '=', ['dynamic']],
		];

		$this->controls['show_title'] = [
			'tab' 			=> 'content',
			'type' 			=> 'select',
			'default' 		=> 'no',
			'label' 		=> esc_html__('Show form name', 'bricks'),
			'options' 		=> ['yes' => __('Yes'), 'no' => __('No')],
			'inline' 		=> true,
			'small' 		=> true,
		];

		$this->controls['title_tag'] = [
			'tab' 			=> 'content',
			'type' 			=> 'select',
			'default' 		=> 'h4',
			'label' 		=> esc_html__('Form name tag', 'bricks'),
			'options' 		=> [
				'h1' 	=> __('H1'),
				'h2' 	=> __('H2'),
				'h3' 	=> __('H3'),
				'h4' 	=> __('H4'),
				'h5' 	=> __('H5'),
				'h6' 	=> __('H6'),
				'div' 	=> __('DIV'),
				'p' 	=> __('P'),
			],
			'inline' 		=> true,
			'small' 		=> true,
			'required'		=> ['show_title', '=', ['yes']],
		];


		/**************
		 * Form name
		 **************/
		$selector = '.nf-form-title';
		$this->controls['title_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_name',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['title_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_name',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => $selector,
				],
			]
		];

		$this->controls['title_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_name',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'background-color'
				]
			]
		];

		//margin field
		$this->controls['title_mrg'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_name',
			'label' 	=> esc_html__('Margin', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'margin',
					'selector' => $selector,
				]
			],
		];

		//padding field
		$this->controls['title_pad'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_name',
			'label' 	=> esc_html__('Padding', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css' 		=> [
				[
					'property' => 'padding',
					'selector' => $selector,
				]
			],
		];

		/*******************
		 * Form Labels
		 ******************/
		$selector = '.nf-field-label label';
		$this->controls['label_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_label',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css' 		=> [
				[
					'property' => 'font',
					'selector' => $selector,
				],
			]
		];

		/*****************************
		 * Input Fields
		 *****************************/
		$selector = '.nf-element:not(input[type="submit"])';
		$this->controls['inp_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['inp_ta_height'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'number',
			'label'     => esc_html__('Textarea Height', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'css' 		=> [
				[
					'selector' 	=> '.nf-field-element textarea',
					'property' 	=> 'height'
				]
			]
		];

		$this->controls['inp_sp_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_inp',
			'label' 	=> esc_html__('Spacing', 'bricks'),
			'type'  	=> 'separator',
		];

		//margin field
		$this->controls['inp_mrg'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_inp',
			'label' 	=> esc_html__('Margin', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'margin',
					'selector' => '.field-wrap ',
				],
				[
					'property' 	=> 'display',
					'selector' 	=> '.field-wrap ',
					'value' 	=> 'block'
				]
			],
		];

		//padding field
		$this->controls['inp_pad'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_inp',
			'label' 	=> esc_html__('Padding', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css' 		=> [
				[
					'property' => 'padding',
					'selector' => $selector,
				]
			],
		];

		$this->controls['inp_sp_sep_close'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_inp',
			'type'  	=> 'separator',
		];

		$this->controls['inp_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['inp_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => $selector,
				],
			]
		];

		$this->controls['inp_ptg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'typography',
			'label'     => esc_html__('Placeholder Typography', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}::-webkit-input-placeholder",
					'property' 	=> 'font'
				],
				[
					'selector' 	=> "{$selector}::-ms-input-placeholder",
					'property' 	=> 'font'
				],
				[
					'selector' 	=> "{$selector}::-moz-input-placeholder",
					'property' 	=> 'font'
				],
				[
					'selector' 	=> "{$selector}::-moz-placeholder",
					'property' 	=> 'font'
				]
			]
		];

		$this->controls['inp_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['inp_shadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'box-shadow'
				]
			]
		];

		$this->controls['inp_focus_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'form_inp',
			'type'  	=> 'separator',
			'label' 	=> esc_html__('Focus State', 'bricks')
		];

		$this->controls['inp_fbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:focus",
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['inp_fclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'color',
			'label'     => esc_html__('Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:focus",
					'property' 	=> 'color'
				]
			]
		];

		$this->controls['inp_fbrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:focus",
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['inp_fshadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'form_inp',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:focus",
					'property' 	=> 'box-shadow'
				]
			]
		];

		/*****************************
		 * Submit button
		 *****************************/
		$selector = '.ninja-forms-field.nf-element[type="submit"]';
		$this->controls['sub_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['sub_sp_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'button',
			'label' 	=> esc_html__('Spacing', 'bricks'),
			'type'  	=> 'separator',
		];

		//margin field
		$this->controls['sub_mrg'] = [
			'tab'   	=> 'content',
			'group' 	=> 'button',
			'label' 	=> esc_html__('Margin', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'margin',
					'selector' => $selector,
				]
			],
		];

		//padding field
		$this->controls['sub_pad'] = [
			'tab'   	=> 'content',
			'group' 	=> 'button',
			'label' 	=> esc_html__('Padding', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css' 		=> [
				[
					'property' => 'padding',
					'selector' => $selector,
				]
			],
		];

		$this->controls['sub_sp_sep_close'] = [
			'tab'   	=> 'content',
			'group' 	=> 'button',
			'type'  	=> 'separator',
		];

		$this->controls['sub_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['sub_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => $selector,
				],
			]
		];

		$this->controls['sub_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['sub_shadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'box-shadow'
				]
			]
		];

		$this->controls['sub_hover_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'button',
			'type'  	=> 'separator',
			'label'     => esc_html__('Hover State', 'bricks'),
		];

		$this->controls['sub_hbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['sub_fclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'color',
			'label'     => esc_html__('Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'color'
				]
			]
		];

		$this->controls['sub_hbrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['sub_hshadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'button',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'box-shadow'
				]
			]
		];


		/*****************************
		 * Input Fields Error
		 *****************************/
		$selector = '.nf-error-msg ';
		$this->controls['inline_errors_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'inline_errors',
			'type'      => 'number',
			'label'     => esc_html__('Wrapper Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['inline_errors_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'inline_errors',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => $selector,
				],
			]
		];

		$this->controls['inline_errors_hbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'inline_errors',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'background-color'
				],
				[
					'selector' 	=> $selector,
					'property' 	=> 'display',
					'value' 	=> 'inline-block'
				]
			]
		];

		//margin field
		$this->controls['inline_errors_mrg'] = [
			'tab'   	=> 'content',
			'group' 	=> 'inline_errors',
			'label' 	=> esc_html__('Margin', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'margin',
					'selector' => $selector
				]
			],
		];

		//padding field
		$this->controls['inline_errors_pad'] = [
			'tab'   	=> 'content',
			'group' 	=> 'inline_errors',
			'label' 	=> esc_html__('Padding', 'bricks'),
			'type'  	=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'padding',
					'selector' => $selector
				]
			],
		];

		$this->controls['inline_errors_brd'] = [
			'tab'   	=> 'content',
			'group' 	=> 'inline_errors',
			'label' 	=> esc_html__('Border', 'bricks'),
			'type'  	=> 'border',
			'css'   	=> [
				[
					'property' => 'border',
					'selector' => $selector
				]
			],
		];

		/*****************************
		 * Messages
		 *****************************/
		$selector = '.nf-response-msg';

		$this->controls['msg_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Margin', 'bricks'),
			'type' 		=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'      => [
				[
					'property' => 'margin',
					'selector' => $selector,
				],
			]
		];

		$this->controls['msg_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Padding', 'bricks'),
			'type' 		=> version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'      => [
				[
					'property' => 'margin',
					'selector' => $selector,
				],
			]
		];

		$this->controls['msg_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Border', 'bricks'),
			'type' 		=> 'border',
			'css'      => [
				[
					'property' => 'border',
					'selector' => $selector,
				],
			]
		];

		$this->controls['msg_shadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Box Shadow', 'bricks'),
			'type' 		=> 'box-shadow',
			'css'      => [
				[
					'property' => 'box-shadow',
					'selector' => $selector,
				],
			]
		];

		$this->controls['msg_suc'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Success Message', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => ".nf-success-msg",
				],
			]
		];

		$this->controls['msg_sep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Validation Errors', 'bricks'),
			'type' 		=> 'separator',
		];

		$this->controls['msg_vetg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => ".nf-error-msg ",
				],
				[
					'property' => 'font',
					'selector' => ".nf-field-container .nf-field-acceptance .nf-error",
				],
			]
		];

		$this->controls['msg_vebg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Background Color', 'bricks'),
			'type' 		=> 'color',
			'css'      => [
				[
					'property' => 'background-color',
					'selector' => ".nf-error-msg",
				],
			]
		];

		$this->controls['msg_vebrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Border Color', 'bricks'),
			'type' 		=> 'color',
			'css'      => [
				[
					'property' => 'border-color',
					'selector' => ".nf-error-msg",
				],
			]
		];

		$this->controls['msg_err_sep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Failed Errors', 'bricks'),
			'type' 		=> 'separator',
		];

		$this->controls['msg_errtg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Typography', 'bricks'),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => ".nf-form .nf-mail-sent-ng",
				],
				[
					'property' => 'font',
					'selector' => ".nf-form .nf-aborted",
				],
			]
		];

		$this->controls['msg_errbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Background Color', 'bricks'),
			'type' 		=> 'color',
			'css'      => [
				[
					'property' => 'background-color',
					'selector' => ".nf-form .nf-mail-sent-ng",
				],
			]
		];

		$this->controls['msg_errbrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'msg',
			'label' 	=> esc_html__('Border Color', 'bricks'),
			'type' 		=> 'color',
			'css'      => [
				[
					'property' => 'border-color',
					'selector' => ".nf-form .nf-mail-sent-ng",
				],
			]
		];
	}

	// Enqueue element styles and scripts
   /* public function enqueue_ninja_forms_assets() {
        // Check if Ninja Forms is active
        if (class_exists('Ninja_Forms')) {
            // Enqueue Ninja Forms CSS
            wp_enqueue_style('bu-nf', plugin_dir_url( __FILE__ ) . 'ninja-forms/assets/css/display.css');
            
            // Enqueue Ninja Forms JS
            wp_enqueue_script('bu-nf', plugin_dir_url( __FILE__ ) . 'ninja-forms/assets/js/display.min.js', ['jquery'], null, true);
        }
    }*/

	// Render element HTML
	
    public function render()
    {
        echo "<{$this->tag} {$this->render_attributes('_root')}>";
    
        $settings = $this->settings;
    
        // Anonymous function to get value from settings
        $get_value = function($array, $key, $default = null) {
            return isset($array[$key]) ? $array[$key] : $default;
        };
    
        $source = $get_value($settings, 'source_type', 'static');
        $cf7_id = ($source == 'static') ? $get_value($settings, 'ninja_form', 'none') : get_post_meta($this->post_id, $get_value($settings, 'form_id', false), true);
    
        if ($cf7_id == 'none') {
            echo $this->render_element_placeholder(['title' => esc_html__('Select a form.', 'bricks')]);
        } elseif (empty($cf7_id) || $cf7_id === false) {
            echo $this->render_element_placeholder(['title' => esc_html__('Enter form ID.', 'bricks')]);
        } else {
    
            $show_form_title = $get_value($settings, 'show_title', 'no');
    
            if ($show_form_title == 'yes') {
                $tag = $get_value($settings, 'title_tag', 'h4');
                $title = get_post_field('post_title', $cf7_id);
                echo "<{$tag} class=\"nf-form-cont\">" . wp_kses_post($title) . "</{$tag}>";
            }
    
            echo do_shortcode('[ninja_form id=' . $cf7_id . ']');
        }
    
        echo "</{$this->tag}>";
    }
    
    

	// Get all forms of Contact Form 7 plugin
	public function getNinjaForms() {
        $options = [
            'none'  => esc_html__( 'Select a form', 'bricks' ),
        ];
    
        $forms = Ninja_Forms()->form()->get_forms();
        if ( ! empty( $forms ) ) {
            foreach ( $forms as $form ) {
                $options[ $form->get_id() ] = esc_html( $form->get_setting( 'title' ) );
            }
        }
    
        return $options;
    }
    
}
