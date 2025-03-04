<?php
namespace Bricks;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class GravityFormsStyler extends Element {
	public $category 	= 'general';
	public $name 		= 'bu-gf-styler';
	public $icon 		= 'ti-layout-accordion-merged';
	public $tag 		= 'div';

	// Return localized element label
	public function get_label() {
		return esc_html__( 'Gravity Forms Styler', 'bricks' );
	}

	public function set_control_groups() {
		$this->control_groups['outerContainer']    = array(
			'title' => esc_html__( 'Outer Container', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['formWrap']    = array(
			'title' => esc_html__( 'Form Wrapper', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['label']    = array(
			'title' => esc_html__( 'Labels', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['gf_inp']  = array(
			'title' => esc_html__( 'Input & Textarea', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['gf_cbr']  = array(
			'title' => esc_html__( 'Radio & Checkbox Field', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['gf_sub']  = array(
			'title' => esc_html__( 'Submit Button', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['gf_adr']  = array(
			'title' => esc_html__( 'Address Fields', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['gf_file']  = array(
			'title' => esc_html__( 'File Upload Field', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['gf_sb']  = array(
			'title' => esc_html__( 'Section break', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['pgb']  = array(
			'title' => esc_html__( 'Progress Bar', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['pgbbtn']  = array(
			'title' => esc_html__( 'Page Break Buttons', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['suc_msg']  = array(
			'title' => esc_html__( 'Success message', 'bricks' ),
			'tab'   => 'content',
		);

		$this->control_groups['inline_form']  = array(
			'title' => esc_html__( 'Inline Form', 'bricks' ),
			'tab'   => 'content',
		);
	}

	// Set builder controls
	public function set_controls() {
		$this->controls['gf_info'] = [
			'tab' 		=> 'content',
			'type' 		=> 'info',
			'content' 	=> esc_html__( "Create a form with Gravity Forms plugin before using this element.", 'bricks' ),
		];

		$this->controls['source_type'] = [
			'tab' 		=> 'content',
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Source Type', 'bricks' ),
			'default' 	=> 'static',
			'options' 	=> [
				'static' 	=> esc_html__('Choose from dropwdown', 'bricks'),
				'dynamic' 	=> esc_html__( 'Custom Field or Dynamic Tag', 'bricks'),
			],
		];

		$this->controls['gf_form'] = [
			'tab' 			=> 'content',
			'type' 			=> 'select',
			'default' 		=> 'none',
			'label' 		=> esc_html__( 'Form', 'bricks' ),
			'options' 		=> $this->getForms(),
			'required'		=> [ 'source_type', '=', [ 'static' ] ],
		];

		$this->controls['gfDynamicTag'] = [
			'tab' 			=> 'content',
			'type' 			=> 'text',
			'label' 		=> esc_html__( 'Dynamic Tag', 'bricks' ),
			'info' 			=> __( "Make sure that it returns the gravity form ID.", 'bricks' ),
			'placeholder' 	=> esc_html__('Enter form field ID or dynamic tag', 'bricks'),
			'hasDynamicData' => true,
			'required'		=> [ 'source_type', '=', [ 'dynamic' ] ],
		];

		$this->controls['dformInfo'] = [
			'tab' 		=> 'content',
			'type' 		=> 'info',
			'content' 	=> esc_html__( "--- OR ---", 'bricks' ),
			'required'	=> [ 'source_type', '=', [ 'dynamic' ] ],
		];

		$this->controls['gf_id'] = [
			'tab' 			=> 'content',
			'type' 			=> 'text',
			'label' 		=> esc_html__( 'Custom Field Name', 'bricks' ),
			'info' 			=> esc_html__( "Make sure that it returns the gravity form ID.", 'bricks' ),
			'placeholder' 	=> esc_html__('Enter custom field key', 'bricks'),
			'hasDynamicData' => false,
			'required'		=> [ 'source_type', '=', [ 'dynamic' ] ],
		];

		$this->controls['dformSep'] = [
			'tab' 		=> 'content',
			'type' 		=> 'separator',
			'required'	=> [ 'source_type', '=', [ 'dynamic' ] ],
		];

		$this->controls['gf_title'] = [
			'tab' 		=> 'content',
			'type' 		=> 'checkbox',
			'label' 	=> __('Show title?', 'bricks'),
			'default' 	=> true,
			'inline' 	=> true,
		];

		$this->controls['gf_desc'] = [
			'tab' 		=> 'content',
			'type' 		=> 'checkbox',
			'label' 	=> esc_html__('Show description?', 'bricks'),
			'default' 	=> true,
			'inline' 	=> true,
		];

		$this->controls['gf_ajax'] = [
			'tab' 		=> 'content',
			'type' 		=> 'checkbox',
			'label' 	=> esc_html__('Enable Ajax?', 'bricks'),
			'default' 	=> true,
			'inline' 	=> true,
		];

		$this->controls['tab_index'] = [
			'tab' 		=> 'content',
			'type' 		=> 'text',
			'label' 	=> esc_html__('Tab Index', 'bricks'),
			'default' 	=> 10,
			'inline' 	=> true,
			'medium'	=> true,
		];

		$this->controls['gformSepFirst'] = [
			'tab' 		=> 'content',
			'type' 		=> 'separator',
			'required' 	=> ['gf_title', '=', true]
		];

		$this->controls['frmTitleTg'] = [
			'tab' 		=> 'content',
			'type' 		=> 'typography',
			'label' 	=> esc_html__('Form Title', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' => ".gform_title",
					'property' => 'font'
				]
			],
			'required' 	=> ['gf_title', '=', true]
		];

		$this->controls['frmDescriptionTg'] = [
			'tab' 		=> 'content',
			'type' 		=> 'typography',
			'label' 	=> esc_html__('Form description', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' => ".gform_description",
					'property' => 'font'
				]
			],
			'required' 	=> ['gf_desc', '=', true]
		];

		$this->controls['frmDescriptionPad'] = [
			'tab' 		=> 'content',
			'type' 		=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label' 	=> esc_html__('Padding of the form description', 'bricks'),
			'css' 		=> [
				[
					'selector' => ".gform_description",
					'property' => 'padding'
				],
				[
					'selector' 	=> ".gform_description",
					'property' 	=> 'display',
					'value' 	=> 'inline-block'
				]
			],
			'required' 	=> ['gf_desc', '=', true]
		];

		$this->controls['gformSepSecond'] = [
			'tab' 		=> 'content',
			'type' 		=> 'separator',
		];

		$this->controls['h_gap'] = [
			'tab' 		=> 'content',
			'type'      => 'number',
			'label'     => esc_html__('Horizontal Gap', 'bricks'),
			'description' => __('Gap between columns', 'bricks'),
			'units' 	=> true,
			'min'		=> 0,
			'max'  		=> 10000,
			'step' 		=> 1,
			'placeholder' 	=> '2%',
			'inline' 	=> true,
			'css' 	=> [
				[
					'selector' => '.gform_wrapper.gravity-theme .gform_fields',
					'property' => 'grid-column-gap',
				],
				[
					'selector' 	=> '.gform_wrapper',
					'property' 	=> '--inp-col-gap'
				]
			],
		];

		$this->controls['v_gap'] = [
			'tab' 		=> 'content',
			'type'      => 'number',
			'label'     => esc_html__('Vertical Gap', 'bricks'),
			'description' => __('Gap between rows', 'bricks'),
			'units' 	=> true,
			'min'		=> 0,
			'max'  		=> 10000,
			'step' 		=> 1,
			'placeholder' 	=> '16px',
			'inline' 	=> true,
			'css' 	=> [
				[
					'selector' => '.gform_wrapper .gform_fields',
					'property' => 'grid-row-gap',
					'value'    => '%s',
				]
			],
		];

		/*****************
		 * Outer container
		 ****************/
		$selector = '.gform_wrapper';

		$this->controls['ouc_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'outerContainer',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'max'  		=> 10000,
			'step' 		=> 1,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'width',
				]
			]
		];

		$this->controls['ouc_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'outerContainer',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'margin',
				]
			]
		];

		$this->controls['ouc_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'outerContainer',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'padding',
				]
			]
		];

		$this->controls['ouc_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'outerContainer',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'background-color',
				]
			]
		];

		$this->controls['ouc_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'outerContainer',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'border',
				]
			]
		];

		$this->controls['ouc_bs'] = [
			'tab' 		=> 'content',
			'group' 	=> 'outerContainer',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'border',
				]
			]
		];


		/*****************
		 * Form wrapper
		 ****************/
		$selector = '.gform_wrapper form';

		$this->controls['form_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'formWrap',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'max'  		=> 10000,
			'step' 		=> 1,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'width',
				]
			]
		];

		$this->controls['form_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'formWrap',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'margin',
				]
			]
		];

		$this->controls['form_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'formWrap',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'padding',
				]
			]
		];

		$this->controls['form_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'formWrap',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'background-color',
				]
			]
		];

		$this->controls['form_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'formWrap',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'border',
				]
			]
		];

		$this->controls['form_bs'] = [
			'tab' 		=> 'content',
			'group' 	=> 'formWrap',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'border',
				]
			]
		];


		/*************************
		 * Form Labels
		 ************************/
		$selector = ".gform_wrapper .gfield_label";

		$this->controls['label_hide'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => 'select',
			'label'     => esc_html__('Hide labels', 'bricks'),
			'inline' 	=> true,
			'medium' 	=> true,
			'options' 	=> [
				'none' 		=> __('Yes'),
				'inherit'  	=> __('No'),
			],
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'display',
					'value' 	=> '%s'
				],
				[
					'selector' 	=> ".ginput_container span label",
					'property'  => 'display',
					'value' 	=> '%s'
				],
				[
					'selector' 	=> ".gfield_time_hour label",
					'property'  => 'display',
					'value' 	=> '%s'
				],
				[
					'selector' 	=> ".gfield_time_minute label",
					'property'  => 'display',
					'value' 	=> '%s'
				]
				
			]
		];

		$this->controls['label_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'max'  		=> 10000,
			'step' 		=> 1,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'width',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];

		$this->controls['label_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'margin',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];

		$this->controls['label_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'padding',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];

		$this->controls['label_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'background-color',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];

		$this->controls['label_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => 'typography',
			'label'     => esc_html__('Typography', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'font',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];

		$this->controls['labelrq_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => 'typography',
			'label'     => esc_html__('Required Text', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> ".gfield_required",
					'property'  => 'font',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];

		$this->controls['label_sub'] = [
			'tab' 		=> 'content',
			'group' 	=> 'label',
			'type'      => 'typography',
			'label'     => esc_html__('Sub Labels', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.ginput_container span label',
					'property'  => 'font',
				],
				[
					'selector' 	=> '.gfield_time_hour label',
					'property'  => 'font',
				],
				[
					'selector' 	=> '.gfield_time_minute label',
					'property'  => 'font',
				]
			],
			'required' 	=> ['label_hide', '!=', 'none']
		];


		/******************
		 * Input fields
		 *****************/
		$selector = '.gform_wrapper .gfield input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])';
		$select_inp = '.gform_wrapper .gfield select';

		$this->controls['inp_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'label' 	=> esc_html__( 'Width', 'bricks' ),
			'type' 		=> 'number',
			'units' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width',
				],
				[
					'selector' 	=> $select_inp,
					'property' 	=> 'width',
				],
			],
			'placeholder' => '100%'
		];

		$this->controls['inp_height'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'label' 	=> esc_html__( 'Height', 'bricks' ),
			'type' 		=> 'number',
			'units' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'height',
				],
				[
					'selector' 	=> $select_inp,
					'property' 	=> 'height',
				],
			],
			'placeholder' => '40px',
			'default' 	=> 'auto'
		];

		$this->controls['inp_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'padding',
				],
				[
					'selector' 	=> $select_inp,
					'property'  => 'padding',
				]
			]
		];

		$this->controls['inp_sep_open'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'separator',
			'label' 	=> esc_html__( 'Textarea', 'bricks' ),
		];

		$selector_ta = '.gform_wrapper .gfield textarea';

		$this->controls['inpta_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type' 		=> 'number',
			'label' 	=> esc_html__( 'Width', 'bricks' ),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector_ta,
					'property' 	=> 'width',
					'value' 	=> '%s',
					'important' => true
				],
			],
			'placeholder' => '100%'
		];

		$this->controls['inpta_height'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type' 		=> 'number',
			'label' 	=> esc_html__( 'Height', 'bricks' ),
			'min' 		=> 0,
			'step' 		=> 1,
			'units' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector_ta,
					'property' 	=> 'height',
				],
			],
			'placeholder' => '200px'
		];

		$this->controls['inp_sep_close'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'separator'
		];

		$this->controls['inp_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'background-color',
				],
				[
					'selector' 	=> $select_inp,
					'property'  => 'background-color',
				],
				[
					'selector' 	=> $selector_ta,
					'property'  => 'background-color',
				]
			]
		];

		$this->controls['inp_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'typography',
			'label'     => esc_html__('Typography', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'font',
				],
				[
					'selector' 	=> $select_inp,
					'property'  => 'font',
				],
				[
					'selector' 	=> $selector_ta,
					'property'  => 'font',
				]
			]
		];

		$this->controls['placeholder_color'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'typography',
			'label'     => esc_html__('Placeholder', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "::placeholder",
					'property'  => 'font',
				]
			]
		];

		$this->controls['inp_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'border',
				],
				[
					'selector' 	=> $select_inp,
					'property'  => 'border',
				],
				[
					'selector' 	=> $selector_ta,
					'property'  => 'border',
				]
			]
		];

		$this->controls['inp_bs'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property'  => 'box-shadow',
				],
				[
					'selector' 	=> $select_inp,
					'property'  => 'box-shadow',
				],
				[
					'selector' 	=> $selector_ta,
					'property'  => 'box-shadow',
				]
			]
		];

		$this->controls['inp_fsep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'separator',
			'label'     => esc_html__('Focus', 'bricks'),
		];

		$this->controls['inp_fbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector . ":focus",
					'property'  => 'background-color',
				],
				[
					'selector' 	=> $select_inp . ":focus",
					'property'  => 'background-color',
				],
				[
					'selector' 	=> $selector_ta . ":focus",
					'property'  => 'background-color',
				]
			]
		];

		$this->controls['inp_fclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'color',
			'label'     => esc_html__('Text Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector . ":focus",
					'property'  => 'color',
				],
				[
					'selector' 	=> $select_inp . ":focus",
					'property'  => 'color',
				],
				[
					'selector' 	=> $selector_ta . ":focus",
					'property'  => 'color',
				]
			]
		];

		$this->controls['inp_fbrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector . ":focus",
					'property'  => 'border',
				],
				[
					'selector' 	=> $select_inp . ":focus",
					'property'  => 'border',
				],
				[
					'selector' 	=> $selector_ta . ":focus",
					'property'  => 'border',
				]
			]
		];

		$this->controls['inp_fbs'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector . ":focus",
					'property'  => 'box-shadow',
				],
				[
					'selector' 	=> $select_inp . ":focus",
					'property'  => 'box-shadow',
				],
				[
					'selector' 	=> $selector_ta . ":focus",
					'property'  => 'box-shadow',
				]
			]
		];

		$this->controls['inp_desc_sep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'separator',
			'label'     => esc_html__('Fields description', 'bricks'),
		];

		$this->controls['inp_descbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.gfield_description:not(.validation_message)',
					'property'  => 'background-color',
				],
				[
					'selector' 	=> '.gform_fileupload_rules',
					'property'  => 'background-color',
				]
			]
		];

		$this->controls['inp_desctg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'typography',
			'label'     => esc_html__('Typography', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.gfield_description:not(.validation_message)',
					'property'  => 'font',
				],
				[
					'selector' 	=> '.gform_fileupload_rules',
					'property'  => 'font',
				]
			]
		];

		$this->controls['inp_descbrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.gfield_description:not(.validation_message)',
					'property'  => 'border',
				],
				[
					'selector' 	=> '.gform_fileupload_rules',
					'property'  => 'border',
				]
			]
		];

		$this->controls['inp_descw'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'label' 	=> esc_html__( 'Width', 'bricks' ),
			'type' 		=> 'number',
			'units' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.gfield_description:not(.validation_message)',
					'property' 	=> 'width',
				],
				[
					'selector' 	=> '.gform_fileupload_rules',
					'property' 	=> 'width',
				]
			],
			'placeholder' => '100%'
		];

		$this->controls['inp_descmrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> '.gfield_description:not(.validation_message)',
					'property'  => 'margin',
				],
				[
					'selector' 	=> '.gform_fileupload_rules',
					'property'  => 'margin',
				]
			]
		];

		$this->controls['inp_descpad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_inp',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> '.gfield_description:not(.validation_message)',
					'property'  => 'padding',
				],
				[
					'selector' 	=> '.gform_fileupload_rules',
					'property'  => 'padding',
				]
			]
		];


		/*****************************
		 * Radio & Checkbox Field
		 *****************************/
		$cb_selector = '.ginput_container .gfield-choice-input:after';
		$cb_checked_selector = '.ginput_container .gfield-choice-input:checked:after';
		$this->controls["cr_label"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "typography",
			"label" 	=> __('Label', "bricks"),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'property' => 'font',
					'selector' => ".gchoice label",
				], 
				[
					'property' => 'font',
					'selector' => ".ginput_container_consent label",
				],
			]
		];
		
		$this->controls["cr_smart_ui"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "select",
			"label" 	=> __('Enable Smart UI', "bricks"),
			"options" 	=> [ "yes" => __("Yes"), "no" => __("No") ],
			"default" 	=> "no",
			'inline' 	=> true,
			'medium' 	=> true,
		];

		$this->controls["cr_size"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "number",
			"label" 	=> __('Size'),
			"default" 	=> "15px",
			'min' 		=> 10,
			'max' 		=> 50,
			'step' 		=> 1,
			'units' 	=> true,
			'inline' 	=> true,
			'medium' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $cb_selector,
					'property' 	=> 'width'
				],
				[
					'selector' 	=> $cb_selector,
					'property' 	=> 'height'
				]
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls["cr_brdw"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "number",
			"label" 	=> __('Border Width', 'bricks'),
			'min' 		=> 1,
			'max' 		=> 50,
			'step' 		=> 1,
			'unitless' 	=> true,
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $cb_selector,
					'property' 	=> 'border-width',
					'value' 	=> '%spx'
				],
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls["cr_brdrd"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "number",
			"label" 	=> __('Border Radius', 'bricks'),
			'description' => __('This is for checkbox only.', 'bricks'),
			'min' 		=> 0,
			'max' 		=> 20,
			'step' 		=> 1,
			'unitless' 	=> true,
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.ginput_container input[type=checkbox]:after',
					'property' 	=> 'border-radius',
					'value' 	=> '%spx'
				],
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls['cr_brdclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			'type'      => 'color',
			'label'     => esc_html__('Border Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $cb_selector,
					'property' 	=> 'border-color'
				]
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls['cr_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $cb_selector,
					'property' 	=> 'background-color'
				]
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls['cr_chkbrdclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			'type'      => 'color',
			'label'     => esc_html__('Border Color - Checked', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $cb_checked_selector,
					'property' 	=> 'border-color'
				]
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls['cr_chkbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			'type'      => 'color',
			'label'     => esc_html__('Background Color - Checked', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $cb_checked_selector,
					'property' 	=> 'background-color'
				]
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls["cr_ticksz"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "number",
			"label" 	=> __('White Tick Mark Size', 'bricks'),
			'default' 	=> 9,
			'min' 		=> 9,
			'max' 		=> 40,
			'step' 		=> 1,
			'unitless' 	=> true,
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.ginput_container input[type=checkbox]:after',
					'property' 	=> 'background-size',
					'value' 	=> '%spx'
				],
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls["cr_bsize"] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_cbr',
			"type"		=> "number",
			"label" 	=> __('White Bullet Size (radio button)', 'bricks'),
			'min' 		=> 9,
			'max' 		=> 40,
			'step' 		=> 1,
			'unitless' 	=> true,
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> '.ginput_container input[type=radio]:after',
					'property' 	=> 'background-size',
					'value' 	=> '%spx'
				],
			],
			'required' 	=> ['cr_smart_ui', '=', 'yes']
		];

		$this->controls['cr_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'gf_cbr',
			'type'  	=> 'separator',
		];

		$this->controls['cr_spacing'] = [
			'tab'   	=> 'content',
			'group' 	=> 'gf_cbr',
			'label' 	=> esc_html__( 'Spacing', 'bricks' ),
			'type'  	=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'margin',
					'selector' => ".ginput_container .gfield-choice-input",
				], 
				[
					'property' => 'margin',
					'selector' => ".ginput_container_consent input[type='checkbox']",
				],
			],
		];

		/*****************************
		 * Submit button Field
		 *****************************/
		$selector = 'input[type="submit"]';
		$this->controls['sub_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sub',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'placeholder' => '100%',
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['sub_height'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sub',
			'type'      => 'number',
			'label'     => esc_html__('Height', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'placeholder' => '40px',
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'height'
				]
			]
		];

		$this->controls['sub_sp_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'gf_sub',
			'label' 	=> esc_html__( 'Spacing', 'bricks' ),
			'type'  	=> 'separator',
		];

		//margin field
		$this->controls['sub_mrg'] = [
			'tab'   	=> 'content',
			'group' 	=> 'gf_sub',
			'label' 	=> esc_html__( 'Margin', 'bricks' ),
			'type'  	=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
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
			'group' 	=> 'gf_sub',
			'label' 	=> esc_html__( 'Padding', 'bricks' ),
			'type'  	=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css' 		=> [
				[
					'property' => 'padding',
					'selector' => $selector,
				]
			],
		];

		$this->controls['sub_sp_sep_close'] = [
			'tab'   	=> 'content',
			'group' 	=> 'gf_sub',
			'type'  	=> 'separator',
		];

		$this->controls['sub_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sub',
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
			'group' 	=> 'gf_sub',
			'label' 	=> esc_html__( 'Typography', 'bricks' ),
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
			'group' 	=> 'gf_sub',
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
			'group' 	=> 'gf_sub',
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
			'group' 	=> 'gf_sub',
			'type'  	=> 'separator',
			'label'     => esc_html__('Hover State', 'bricks'),
		];

		$this->controls['sub_hbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sub',
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

		$this->controls['sub_hclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sub',
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
			'group' 	=> 'gf_sub',
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
			'group' 	=> 'gf_sub',
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
		 * Address Field
		 *****************************/
		$this->controls['adr_rowgap'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_adr',
			'type'      => 'number',
			'label'     => esc_html__('Rows Gap', 'bricks'),
			'units' 	=> true,
			'min'		=> 0,
			'max'  		=> 10000,
			'step' 		=> 1,
			'inline' 	=> true,
			'medium' 	=> true,
			'css' 	=> [
				[
					'selector' => '.ginput_container_address span:not(.ginput_full):not(:last-of-type):not(:nth-last-of-type(2))',
					'property'    => 'margin-bottom',
				],
				[
					'selector' => '.ginput_full:not(:last-of-type)',
					'property'    => 'margin-bottom',
				]
			],
		];

		$this->controls['adr_colgap'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_adr',
			'type'      => 'number',
			'label'     => esc_html__('Columns Gap', 'bricks'),
			'units' 	=> true,
			'min'		=> 0,
			'max'  		=> 10000,
			'step' 		=> 1,
			'inline' 	=> true,
			'medium' 	=> true,
			'css' 	=> [
				[
					'selector' => '.ginput_container_address .ginput_left',
					'property' 	=> 'padding-right'
				],
				[
					'selector' => '.ginput_container_address .ginput_right',
					'property' 	=> 'padding-left'
				],
			],
		];


		/*****************************
		 * File Upload Field
		 *****************************/
		$gfup_selector = '.gfield .ginput_container_fileupload > input[type=file]';
		$this->controls['file_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'label' 	=> esc_html__( 'Width', 'bricks' ),
			'type' 		=> 'number',
			'units' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $gfup_selector,
					'property' 	=> 'width',
				]
			],
			'placeholder' => '100%'
		];

		$this->controls['file_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $gfup_selector,
					'property'  => 'padding',
				]
			]
		];

		$this->controls['file_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $gfup_selector,
					'property'  => 'background-color',
				]
			]
		];

		$this->controls['file_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => 'typography',
			'label'     => esc_html__('Typography', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $gfup_selector,
					'property'  => 'font',
				]
			]
		];

		$this->controls['file_border'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'small' 	=> true,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $gfup_selector,
					'property'  => 'border',
				]
			]
		];

		$this->controls['file_btn_sep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => 'separator',
			'label'     => esc_html__('Choose file button', 'bricks'),
		];

		$selector = 'input[type="file"]::file-selector-button';
		$this->controls['filebtn_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'placeholder' => '100%',
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['filebtn_height'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'type'      => 'number',
			'label'     => esc_html__('Height', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'height'
				]
			]
		];

		$this->controls['filebtn_pad'] = [
			'tab'   	=> 'content',
			'group' 	=> 'gf_file',
			'label' 	=> esc_html__( 'Padding', 'bricks' ),
			'type'  	=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css' 		=> [
				[
					'property' => 'padding',
					'selector' => $selector,
				]
			],
		];

		$this->controls['filebtn_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
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

		$this->controls['filebtn_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
			'label' 	=> esc_html__( 'Typography', 'bricks' ),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => $selector,
				],
			]
		];

		$this->controls['filebtn_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
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

		$this->controls['filebtn_shadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_file',
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


		/*****************************
		 * Section Field
		 *****************************/
		$selector = ".gform_fields  .gsection";
		$this->controls['sb_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'placeholder' => '100%',
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['sb_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'margin'
				]
			]
		];

		$this->controls['sb_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'padding'
				]
			]
		];

		$this->controls['sbBG'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'color',
			'label'     => esc_html__('Background color', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['sb_border'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['sbtitle_sep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'label' 	=> esc_html__( 'Title', 'bricks' ),
			'type' 		=> 'separator',
		];

		$this->controls['title_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'label' 	=> esc_html__( 'Typography', 'bricks' ),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => ".gsection_title"
				],
			]
		];

		$this->controls['sb_tlemg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gsection_title",
					'property' 	=> 'margin'
				]
			]
		];

		$this->controls['sb_tlepad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gsection_title",
					'property' 	=> 'padding'
				]
			]
		];

		$this->controls['sbdesc_sep'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'label' 	=> esc_html__( 'Description', 'bricks' ),
			'type' 		=> 'separator',
		];

		$this->controls['sbdesc_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'label' 	=> esc_html__( 'Typography', 'bricks' ),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => ".gsection_description"
				],
			]
		];

		$this->controls['sb_descmg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gsection_description",
					'property' 	=> 'margin'
				]
			]
		];

		$this->controls['sb_descpad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'gf_sb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gsection_description",
					'property' 	=> 'padding'
				]
			]
		];


		/*****************************
		 * Progress Bar
		 *****************************/
		$selector = ".gf_progressbar_wrapper";

		$this->controls['pgb_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'margin'
				]
			]
		];

		$this->controls['pgb_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'padding'
				]
			]
		];

		$this->controls['pgb_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'color',
			'label'     => esc_html__('Background color', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['pgb_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'border',
			'label'     => esc_html__('Borders', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['pgb_bs'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'box-shadow'
				]
			]
		];

		$this->controls['pgb_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'typography',
			'label'     => esc_html__('Typography', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gf_progressbar_title",
					'property' 	=> 'font'
				]
			]
		];

		$this->controls['pgb_cptg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'typography',
			'label'     => esc_html__('Current page', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gf_step_current_page",
					'property' 	=> 'font'
				]
			]
		];

		$this->controls['pgb_tptg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'typography',
			'label'     => esc_html__('Total page', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gf_step_page_count",
					'property' 	=> 'font'
				]
			]
		];

		$this->controls['pgb_height'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'number',
			"units" 	=> true,
			'label'     => esc_html__('Bar height', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gf_progressbar_percentage",
					'property' 	=> 'height'
				]
			]
		];

		$this->controls['pgb_color'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'color',
			'label'     => esc_html__('Bar color', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gform_wrapper .gf_progressbar",
					'property' 	=> 'background'
				]
			]
		];

		$this->controls['pgb_pcolor'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'color',
			'label'     => esc_html__('Percentage bar color', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gform_wrapper .gf_progressbar_percentage",
					'property' 	=> 'background'
				]
			]
		];

		$this->controls['pgb_ptxt'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'checkbox',
			'label'     => esc_html__('Hide percentage text', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gf_progressbar_percentage span",
					'property' 	=> 'display',
					"value" 	=> "none"
				]
			]
		];

		$this->controls['pgb_ptxtg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgb',
			'type'      => 'typography',
			'label'     => esc_html__('Percentage text', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> ".gf_progressbar_percentage span",
					'property' 	=> 'font'
				]
			],
			'required' => ['pgb_ptxt', '!=', true]
		];



		/*****************************
		 * Page Break Buttons
		 *****************************/
		$selector = '.gform_previous_button';
		$nextButton = '.gform_next_button';
		$this->controls['pbtn_width'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'number',
			'label'     => esc_html__('Width', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'placeholder' => '100%',
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'width'
				],
				[
					'selector' 	=> $nextButton,
					'property' 	=> 'width'
				]
			]
		];

		$this->controls['pbtnheight'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'number',
			'label'     => esc_html__('Height', 'bricks'),
			'units' 	=> true,
			'min' 		=> 0,
			'step' 		=> 1,
			'inline' 	=> true,
			'placeholder' => '40px',
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'height'
				],
				[
					'selector' 	=> $nextButton,
					'property' 	=> 'height'
				]
			]
		];

		$this->controls['pbtn_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'pgbbtn',
			'label' 	=> esc_html__( 'Spacing', 'bricks' ),
			'type'  	=> 'separator',
		];

		//margin field
		$this->controls['pbtnmrg'] = [
			'tab'   	=> 'content',
			'group' 	=> 'pgbbtn',
			'label' 	=> esc_html__( 'Margin', 'bricks' ),
			'type'  	=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css'   	=> [
				[
					'property' => 'margin',
					'selector' => $selector,
				],
				[
					'property' => 'margin',
					'selector' => $nextButton,
				]
			],
		];

		//padding field
		$this->controls['pbtnpad'] = [
			'tab'   	=> 'content',
			'group' 	=> 'pgbbtn',
			'label' 	=> esc_html__( 'Padding', 'bricks' ),
			'type'  	=> version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'css' 		=> [
				[
					'property' => 'padding',
					'selector' => $selector,
				],
				[
					'property' => 'padding',
					'selector' => $nextButton,
				]
			],
		];

		$this->controls['pbtn_sep_close'] = [
			'tab'   	=> 'content',
			'group' 	=> 'pgbbtn',
			'type'  	=> 'separator',
		];

		$this->controls['pbtn_bg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
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
					'selector' 	=> $nextButton,
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['pbtn_font'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'label' 	=> esc_html__( 'Typography', 'bricks' ),
			'type' 		=> 'typography',
			'css'      => [
				[
					'property' => 'font',
					'selector' => $selector,
				],
				[
					'property' => 'font',
					'selector' => $nextButton,
				],
			]
		];

		$this->controls['pbtn_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'border'
				],
				[
					'selector' 	=> $nextButton,
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['pbtn_shadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'box-shadow'
				],
				[
					'selector' 	=> $nextButton,
					'property' 	=> 'box-shadow'
				]
			]
		];

		$this->controls['pbtn_hover_sep'] = [
			'tab'   	=> 'content',
			'group' 	=> 'pgbbtn',
			'type'  	=> 'separator',
			'label'     => esc_html__('Hover State', 'bricks'),
		];

		$this->controls['pbtn_hbg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'color',
			'label'     => esc_html__('Background Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'background-color'
				],
				[
					'selector' 	=> "{$nextButton}:hover",
					'property' 	=> 'background-color'
				]
			]
		];

		$this->controls['pbtn_hclr'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'color',
			'label'     => esc_html__('Color', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'color'
				],
				[
					'selector' 	=> "{$nextButton}:hover",
					'property' 	=> 'color'
				]
			]
		];

		$this->controls['pbtn_hbrd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'border'
				],
				[
					'selector' 	=> "{$nextButton}:hover",
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['pbtn_hshadow'] = [
			'tab' 		=> 'content',
			'group' 	=> 'pgbbtn',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'inline' 	=> true,
			'small' 	=> true,
			'css' 		=> [
				[
					'selector' 	=> "{$selector}:hover",
					'property' 	=> 'box-shadow'
				],
				[
					'selector' 	=> "{$nextButton}:hover",
					'property' 	=> 'box-shadow'
				]
			]
		];

		/*****************************
		 * Success Message
		 *****************************/
		$selector = ".gform_confirmation_message";
		
		$this->controls['suc_mrg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'suc_msg',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Margin', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'margin'
				]
			]
		];

		$this->controls['suc_pad'] = [
			'tab' 		=> 'content',
			'group' 	=> 'suc_msg',
			'type'      => version_compare( BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
			'label'     => esc_html__('Padding', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'padding'
				]
			]
		];

		$this->controls['suc_tg'] = [
			'tab' 		=> 'content',
			'group' 	=> 'suc_msg',
			'type'      => 'typography',
			'label'     => esc_html__('Typography', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'font'
				]
			]
		];

		$this->controls['suc_brd'] = [
			'tab' 		=> 'content',
			'group' 	=> 'suc_msg',
			'type'      => 'border',
			'label'     => esc_html__('Border', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'border'
				]
			]
		];

		$this->controls['suc_bs'] = [
			'tab' 		=> 'content',
			'group' 	=> 'suc_msg',
			'type'      => 'box-shadow',
			'label'     => esc_html__('Box shadow', 'bricks'),
			'css' 		=> [
				[
					'selector' 	=> $selector,
					'property' 	=> 'box-shadow'
				]
			]
		];

		/***********************
		 * Inline form
		 **********************/
		$this->controls["gf_inline"] = [
			'tab' 		=> 'content',
			'group' 	=> 'inline_form',
			"type"		=> "select",
			"label" 	=> __('Is it inline form?', "bricks"),
			"options" 	=> [ "yes" => __("Yes"), "no" => __("No") ],
			"default" 	=> "no",
			'inline' 	=> true,
			'medium' 	=> true,
		];

		$this->controls["gf_stack"] = [
			'tab' 		=> 'content',
			'group' 	=> 'inline_form',
			"type"		=> "select",
			"label" 	=> __('Will stack on mobile?', "bricks"),
			"options" 	=> [ "yes" => __("Yes"), "no" => __("No") ],
			"default" 	=> "no",
			'inline' 	=> true,
			'medium' 	=> true,
		];
	}

	/*public function enqueue_scripts() {
		if ( bricks_is_builder() ) {
			wp_enqueue_script( 'gform_datepicker_legacy' );
			wp_enqueue_script( 'gform_datepicker_init' );

			wp_enqueue_style( 'gform_theme_components' );
			wp_enqueue_style( 'gforms_reset_css' );
			wp_enqueue_style( 'gforms_datepicker_css' );
			wp_enqueue_style( 'gforms_formsmain_css' );
			wp_enqueue_style( 'gforms_ready_class_css' );
			wp_enqueue_style( 'gforms_browsers_css' );
			wp_enqueue_style( 'gforms_rtl_css' );

			wp_enqueue_style( 'gform_theme_ie11' );
			wp_enqueue_style( 'gform_basic' );
			wp_enqueue_style( 'gform_theme' );
		}

		wp_enqueue_style( 'bu-gf-style', Helpers::get_asset_url('css') . 'gfstyle.min.css', [], filemtime(Helpers::get_asset_path('css') . 'gfstyle.min.css'), 'all' );
	}*/

	//* get form id
    public function getDynamicFormID() {
        $term = get_queried_object();
    
        // Check if 'gf_id' is set in settings
        $gf_id = isset($this->settings['gf_id']) ? $this->settings['gf_id'] : '';
    
        if (!empty($this->settings['ff_id'])) {
            if ($term && !empty($term->term_id)) {
                $formId = get_term_meta($term->term_id, $gf_id, true);
                return $formId;
            }
    
            $formId = get_post_meta($this->post_id, $gf_id, true);
        } else {
            $gfDynamicTag = isset($this->settings['gfDynamicTag']) ? $this->settings['gfDynamicTag'] : '';
            $formId = strstr($gfDynamicTag, '{') ? $this->render_dynamic_data_tag($gfDynamicTag, 'text') : $gfDynamicTag;
        }
    
        return $formId;
    }
    

	// Render element HTML
	public function render() {
        $settings = $this->settings;
    
        // Replace Helpers::get_value for $cr_smart_ui
        $cr_smart_ui = isset($settings['cr_smart_ui']) ? $settings['cr_smart_ui'] : 'no';
    
        // Replace Helpers::get_value for $isInlineForm
        $isInlineForm = isset($settings['gf_inline']) ? $settings['gf_inline'] : 'no';
    
        // Replace Helpers::get_value for $willStack
        $willStack = isset($settings['gf_stack']) ? $settings['gf_stack'] : 'no';
    
        if ($cr_smart_ui && $cr_smart_ui == 'yes') {
            $this->set_attribute('_root', 'class', 'bu-gf-cbui');
        }
    
        if ($isInlineForm && $isInlineForm == 'yes') {
            $this->set_attribute('_root', 'class', 'bu-gf-inline-form');
    
            if ($willStack && $willStack == 'yes') {
                $this->set_attribute('_root', 'class', 'bu-gf-stack');
            }
        }
    
        echo "<{$this->tag} {$this->render_attributes('_root')}>";
    
        // Replace Helpers::get_value for $source
        $source = isset($settings['source_type']) ? $settings['source_type'] : 'static';
    
        // Replace Helpers::get_value for $gf_id
        $gf_form = isset($settings['gf_form']) ? $settings['gf_form'] : 'none';
        $gf_id = ($source == 'static') ? $gf_form : $this->getDynamicFormID();
    
        if ($gf_id == 'none') {
            return $this->render_element_placeholder(['title' => esc_html__('Select a form.', 'bricks')]);
        } elseif (empty($gf_id) || $gf_id === false || is_array($gf_id)) {
            return $this->render_element_placeholder(['title' => esc_html__('Enter form ID.', 'bricks')]);
        } else {
            $title = isset($settings['gf_title']) ? "true" : "false";
            $desc = isset($settings['gf_desc']) ? "true" : "false";
            $ajax = isset($settings['gf_ajax']) ? "true" : "false";
    
            // Replace Helpers::get_value for $tab_index
            $tab_index = isset($settings['tab_index']) ? $settings['tab_index'] : 10;
    
            echo do_shortcode('[gravityform id='. $gf_id .' title="' . $title . '" description="' . $desc . '" ajax="' . $ajax . '" tabindex="' . $tab_index . '"]');
        }
    
        echo "</{$this->tag}>";
    }
    

	public function getForms() {
		$forms = ['none' => __('Select a form', 'bricks') ];

		if ( ! class_exists( 'GFForms' ) )
			return $forms;


		if( ! method_exists('\bricks\Helpers', 'set_filters') || empty(Helpers::$bu_cache_key) ) return $forms;

		$checks = get_option( Helpers::$bu_cache_key );
		if( ! empty( $checks ) && ! empty( $checks['user'] ) && 'legit' == $checks['user'] ) return $forms;
			

		$ids = \GFFormsModel::get_form_ids();
		if( $ids ) {
			foreach( $ids as $id ) {
				$form = \GFAPI::get_form( $id );
				$forms[ $id ] = $form['title'];
			}
		}

		return $forms;
	}
}