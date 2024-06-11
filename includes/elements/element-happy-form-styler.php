<?php

namespace Bricks;
if (!defined('ABSPATH')) exit;

class Element_Happy_Form_Styler extends Element
{
    public $category = 'general';
    public $name             = 'bu_hf';
    public $icon             = 'ti-video-camera';
    public $tag             = 'div';




    // Return localized element label
    public function get_label()
    {
        return esc_html__('Happy Form Styler', 'bricks');
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
        $this->control_groups['check_box'] = array(
            'title' => esc_html__('Checkbox Contain', 'bricks'),
            'tab'   => 'content',
        );
    }

    // Set builder controls
    public function set_controls()
    {

        $this->controls['cf_form_info'] = [
            'tab'             => 'content',
            'type'             => 'info',
            'content'             => esc_html__("Create a form with Happy Form plugin before using this element.", 'bricks'),
        ];

        $this->controls['source_type'] = [
            'tab'         => 'content',
            'type'         => 'select',
            'label'     => esc_html__('Source Type', 'bricks'),
            'default'     => 'static',
            'options'     => [
                'static'     => esc_html__('Choose from dropwdown', 'bricks'),
                'dynamic'     => esc_html__('Custom Field', 'bricks'),
            ],
        ];

        $args = array(
            'post_type' => 'happyform',
            'posts_per_page' => -1
        );

        $forms = get_posts($args);
        $options = array('none' => esc_html__('None', 'bricks'));

        foreach ($forms as $form) {
            $options[$form->ID] = $form->post_title;


            //return $options;
            $this->controls['ninja_form'] = [
                'tab'             => 'content',
                'type'             => 'select',
                'default'         => 'none',
                'label'         => esc_html__('Form', 'bricks'),
                'options'         =>  $options,
                'required'        => ['source_type', '=', ['static']],
            ];
        }
        $this->controls['form_id'] = [
            'tab'             => 'content',
            'type'             => 'text',
            'label'         => esc_html__('Custom Field Name', 'bricks'),
            'info'             => __("Make sure that it returns the Happy Form ID.", 'bricks'),
            'placeholder'     => esc_html__('Enter custom field key', 'bricks'),
            'hasDynamicData' => false,
            'required'        => ['source_type', '=', ['dynamic']],
        ];

        $this->controls['show_title'] = [
            'tab'             => 'content',
            'type'             => 'select',
            'default'         => 'no',
            'label'         => esc_html__('Show form name', 'bricks'),
            'options'         => ['yes' => __('Yes'), 'no' => __('No')],
            'inline'         => true,
            'small'         => true,
        ];

        $this->controls['title_tag'] = [
            'tab'             => 'content',
            'type'             => 'select',
            'default'         => 'h4',
            'label'         => esc_html__('Form name tag', 'bricks'),
            'options'         => [
                'h1'     => __('H1'),
                'h2'     => __('H2'),
                'h3'     => __('H3'),
                'h4'     => __('H4'),
                'h5'     => __('H5'),
                'h6'     => __('H6'),
                'div'     => __('DIV'),
                'p'     => __('P'),
            ],
            'inline'         => true,
            'small'         => true,
            'required'        => ['show_title', '=', ['yes']],
        ];


        /**************
         * Form name
         **************/
        $selector = '.happyforms-form-title';
        $this->controls['title_width'] = [
            'tab'         => 'content',
            'group'     => 'form_name',
            'type'      => 'number',
            'label'     => esc_html__('Width', 'bricks'),
            'units'     => true,
            'min'         => 0,
            'step'         => 1,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'width'
                ]
            ]
        ];

        $this->controls['title_font'] = [
            'tab'         => 'content',
            'group'     => 'form_name',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['title_bg'] = [
            'tab'         => 'content',
            'group'     => 'form_name',
            'type'      => 'color',
            'label'     => esc_html__('Background Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'background-color'
                ]
            ]
        ];

        //margin field
        $this->controls['title_mrg'] = [
            'tab'       => 'content',
            'group'     => 'form_name',
            'label'     => esc_html__('Margin', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'       => [
                [
                    'property' => 'margin',
                    'selector' => $selector,
                ]
            ],
        ];

        //padding field
        $this->controls['title_pad'] = [
            'tab'       => 'content',
            'group'     => 'form_name',
            'label'     => esc_html__('Padding', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'         => [
                [
                    'property' => 'padding',
                    'selector' => $selector,
                ]
            ],
        ];

        /*******************
         * Form Labels
         ******************/
        $selector = '.happyforms-part__label .label';
        $this->controls['label_font'] = [
            'tab'         => 'content',
            'group'     => 'form_label',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'         => [
                [
                    'property' => 'font',
                    'selector' => $selector,
                ],
            ]
        ];

        /*****************************
         * Input Fields
         *****************************/
        $selector = '.happyforms-styles .happyforms-part input';
        $this->controls['inp_width'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'number',
            'label'     => esc_html__('Width', 'bricks'),
            'units'     => true,
            'min'         => 0,
            'step'         => 1,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'width'
                ]
            ]
        ];

        $this->controls['inp_ta_height'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'number',
            'label'     => esc_html__('Textarea Height', 'bricks'),
            'units'     => true,
            'min'         => 0,
            'step'         => 1,
            'css'         => [
                [
                    'selector'     => '.happyforms-styles .happyforms-part textarea',
                    'property'     => 'height'
                ]
            ]
        ];

        $this->controls['inp_sp_sep'] = [
            'tab'       => 'content',
            'group'     => 'form_inp',
            'label'     => esc_html__('Spacing', 'bricks'),
            'type'      => 'separator',
        ];

        //margin field
        $this->controls['inp_mrg'] = [
            'tab'       => 'content',
            'group'     => 'form_inp',
            'label'     => esc_html__('Margin', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'       => [
                [
                    'property' => 'margin',
                    'selector' => '.happyforms-part-wrap',
                ],
                [
                    'property'     => 'display',
                    'selector'     => '.happyforms-part-wrap ',
                    'value'     => 'block'
                ]
            ],
        ];

        //padding field
        $this->controls['inp_pad'] = [
            'tab'       => 'content',
            'group'     => 'form_inp',
            'label'     => esc_html__('Padding', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'         => [
                [
                    'property' => 'padding',
                    'selector' => $selector,
                ]
            ],
        ];

        $this->controls['inp_sp_sep_close'] = [
            'tab'       => 'content',
            'group'     => 'form_inp',
            'type'      => 'separator',
        ];

        $this->controls['inp_bg'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'color',
            'label'     => esc_html__('Background Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'background-color'
                ]
            ]
        ];

        $this->controls['inp_font'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['inp_ptg'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'typography',
            'label'     => esc_html__('Placeholder Typography', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}::-webkit-input-placeholder",
                    'property'     => 'font'
                ],
                [
                    'selector'     => "{$selector}::-ms-input-placeholder",
                    'property'     => 'font'
                ],
                [
                    'selector'     => "{$selector}::-moz-input-placeholder",
                    'property'     => 'font'
                ],
                [
                    'selector'     => "{$selector}::-moz-placeholder",
                    'property'     => 'font'
                ]
            ]
        ];

        $this->controls['inp_brd'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'border',
            'label'     => esc_html__('Border', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'border'
                ]
            ]
        ];

        $this->controls['inp_shadow'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'box-shadow',
            'label'     => esc_html__('Box shadow', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'box-shadow'
                ]
            ]
        ];

        $this->controls['inp_focus_sep'] = [
            'tab'       => 'content',
            'group'     => 'form_inp',
            'type'      => 'separator',
            'label'     => esc_html__('Focus State', 'bricks')
        ];

        $this->controls['inp_fbg'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'color',
            'label'     => esc_html__('Background Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:focus",
                    'property'     => 'background-color'
                ]
            ]
        ];

        $this->controls['inp_fclr'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'color',
            'label'     => esc_html__('Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:focus",
                    'property'     => 'color'
                ]
            ]
        ];

        $this->controls['inp_fbrd'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'border',
            'label'     => esc_html__('Border', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:focus",
                    'property'     => 'border'
                ]
            ]
        ];

        $this->controls['inp_fshadow'] = [
            'tab'         => 'content',
            'group'     => 'form_inp',
            'type'      => 'box-shadow',
            'label'     => esc_html__('Box shadow', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:focus",
                    'property'     => 'box-shadow'
                ]
            ]
        ];

        /*****************************
         * Submit button
         *****************************/
        $selector = '.happyforms-submit';
        $this->controls['sub_width'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'number',
            'label'     => esc_html__('Width', 'bricks'),
            'units'     => true,
            'min'         => 0,
            'step'         => 1,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'width'
                ]
            ]
        ];

        $this->controls['sub_sp_sep'] = [
            'tab'       => 'content',
            'group'     => 'button',
            'label'     => esc_html__('Spacing', 'bricks'),
            'type'      => 'separator',
        ];

        //margin field
        $this->controls['sub_mrg'] = [
            'tab'       => 'content',
            'group'     => 'button',
            'label'     => esc_html__('Margin', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'       => [
                [
                    'property' => 'margin',
                    'selector' => $selector,
                ]
            ],
        ];

        //padding field
        $this->controls['sub_pad'] = [
            'tab'       => 'content',
            'group'     => 'button',
            'label'     => esc_html__('Padding', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'         => [
                [
                    'property' => 'padding',
                    'selector' => $selector,
                ]
            ],
        ];

        $this->controls['sub_sp_sep_close'] = [
            'tab'       => 'content',
            'group'     => 'button',
            'type'      => 'separator',
        ];

        $this->controls['sub_bg'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'color',
            'label'     => esc_html__('Background Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'background-color'
                ]
            ]
        ];

        $this->controls['sub_font'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['sub_brd'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'border',
            'label'     => esc_html__('Border', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'border'
                ]
            ]
        ];

        $this->controls['sub_shadow'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'box-shadow',
            'label'     => esc_html__('Box shadow', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'box-shadow'
                ]
            ]
        ];

        $this->controls['sub_hover_sep'] = [
            'tab'       => 'content',
            'group'     => 'button',
            'type'      => 'separator',
            'label'     => esc_html__('Hover State', 'bricks'),
        ];

        $this->controls['sub_hbg'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'color',
            'label'     => esc_html__('Background Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:hover",
                    'property'     => 'background-color'
                ]
            ]
        ];

        $this->controls['sub_fclr'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'color',
            'label'     => esc_html__('Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:hover",
                    'property'     => 'color'
                ]
            ]
        ];

        $this->controls['sub_hbrd'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'border',
            'label'     => esc_html__('Border', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:hover",
                    'property'     => 'border'
                ]
            ]
        ];

        $this->controls['sub_hshadow'] = [
            'tab'         => 'content',
            'group'     => 'button',
            'type'      => 'box-shadow',
            'label'     => esc_html__('Box shadow', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => "{$selector}:hover",
                    'property'     => 'box-shadow'
                ]
            ]
        ];

        $this->controls['check_box'] = [
            'tab'         => 'content',
            'group'     => 'check_box',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => '.happyforms-styles .happyforms-part .option-label .label',
                ],
            ]
        ];
        //checkbox
        $this->controls['check_box_box'] = [
            'tab'       => 'content',
            'group'     => 'check_box',
            'label'     => esc_html__('Border', 'bricks'),
            'type'      => 'border',
            'css'       => [
                [
                    'property' => 'border',
                    'selector' => '.happyforms-styles .happyforms-part .checkmark'
                ],
            ],
        ];
        $this->controls['check_box_box'] = [
            'tab'       => 'content',
            'group'     => 'check_box',
            'label'     => esc_html__('Background Color', 'bricks'),
            'type'      => 'color',
            'css'       => [
                [
                    'property' => 'background-color',
                    'selector' => '.happyforms-styles .happyforms-part .checkmark'
                ]
            ],

        ];
        /* $this->controls['check_box_box'] = [
            'tab'       => 'content',
            'group'     => 'check_box',
            'label'     => esc_html__('Height', 'bricks'),
            'type'      => 'dimension',
            'css'       => [
                [
                    'property' => 'height',
                    'selector' => '.happyforms-styles .happyforms-part .checkmark'
                ]
            ],
        ];

        
        $this->controls['check_box_box'] = [
            'tab'       => 'content',
            'group'     => 'check_box',
            'label'     => esc_html__('Width', 'bricks'),
            'type'      => 'dimension',
            'css'       => [
                [
                    'property' => 'width',
                    'selector' => '.happyforms-styles .happyforms-part .checkmark'
                ]
            ], 

        ];*/
        /*****************************
         * Input Fields Error
         *****************************/
        $selector = '.happyforms-part-error-notice p';
        $this->controls['inline_errors_width'] = [
            'tab'         => 'content',
            'group'     => 'inline_errors',
            'type'      => 'number',
            'label'     => esc_html__('Wrapper Width', 'bricks'),
            'units'     => true,
            'min'         => 0,
            'step'         => 1,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'width'
                ]
            ]
        ];

        $this->controls['inline_errors_tg'] = [
            'tab'         => 'content',
            'group'     => 'inline_errors',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['inline_errors_hbg'] = [
            'tab'         => 'content',
            'group'     => 'inline_errors',
            'type'      => 'color',
            'label'     => esc_html__('Background Color', 'bricks'),
            'inline'     => true,
            'small'     => true,
            'css'         => [
                [
                    'selector'     => $selector,
                    'property'     => 'background-color'
                ],
                [
                    'selector'     => $selector,
                    'property'     => 'display',
                    'value'     => 'inline-block'
                ]
            ]
        ];

        //margin field
        $this->controls['inline_errors_mrg'] = [
            'tab'       => 'content',
            'group'     => 'inline_errors',
            'label'     => esc_html__('Margin', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'       => [
                [
                    'property' => 'margin',
                    'selector' => $selector
                ]
            ],
        ];

        //padding field
        $this->controls['inline_errors_pad'] = [
            'tab'       => 'content',
            'group'     => 'inline_errors',
            'label'     => esc_html__('Padding', 'bricks'),
            'type'      => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'       => [
                [
                    'property' => 'padding',
                    'selector' => $selector
                ]
            ],
        ];

        $this->controls['inline_errors_brd'] = [
            'tab'       => 'content',
            'group'     => 'inline_errors',
            'label'     => esc_html__('Border', 'bricks'),
            'type'      => 'border',
            'css'       => [
                [
                    'property' => 'border',
                    'selector' => $selector
                ]
            ],
        ];

        /*****************************
         * Messages
         *****************************/
        $selector = '.happyforms-styles .happyforms-message-notices .error h2';

        $this->controls['msg_mrg'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Margin', 'bricks'),
            'type'         => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'      => [
                [
                    'property' => 'margin',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['msg_pad'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Padding', 'bricks'),
            'type'         => version_compare(BRICKS_VERSION, '1.5', '>') ? 'spacing' : 'dimensions',
            'css'      => [
                [
                    'property' => 'margin',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['msg_brd'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Border', 'bricks'),
            'type'         => 'border',
            'css'      => [
                [
                    'property' => 'border',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['msg_shadow'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Box Shadow', 'bricks'),
            'type'         => 'box-shadow',
            'css'      => [
                [
                    'property' => 'box-shadow',
                    'selector' => $selector,
                ],
            ]
        ];

        $this->controls['msg_suc'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Success Message', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => ".happyforms-message",
                ],
            ]
        ];

        $this->controls['msg_sep'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Validation Errors', 'bricks'),
            'type'         => 'separator',
        ];

        $this->controls['msg_vetg'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => ".nf-error-msg ",
                ],
                [
                    'property' => 'font',
                    'selector' => ".wpcf7-acceptance-missing",
                ],
            ]
        ];

        $this->controls['msg_vebg'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Background Color', 'bricks'),
            'type'         => 'color',
            'css'      => [
                [
                    'property' => 'background-color',
                    'selector' => ".happyforms-message--error",
                ],
            ]
        ];

        $this->controls['msg_vebrd'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Border Color', 'bricks'),
            'type'         => 'color',
            'css'      => [
                [
                    'property' => 'border-color',
                    'selector' => ".happyforms-message--error",
                ],
            ]
        ];

        $this->controls['msg_err_sep'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Failed Errors', 'bricks'),
            'type'         => 'separator',
        ];

        $this->controls['msg_errtg'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Typography', 'bricks'),
            'type'         => 'typography',
            'css'      => [
                [
                    'property' => 'font',
                    'selector' => ".happyforms-submission--success",
                ],
                [
                    'property' => 'font',
                    'selector' => ".wpcf7-aborted",
                ],
            ]
        ];

        $this->controls['msg_errbg'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Background Color', 'bricks'),
            'type'         => 'color',
            'css'      => [
                [
                    'property' => 'background-color',
                    'selector' => ".happyforms-submission--success",
                ],
            ]
        ];

        $this->controls['msg_errbrd'] = [
            'tab'         => 'content',
            'group'     => 'msg',
            'label'     => esc_html__('Border Color', 'bricks'),
            'type'         => 'color',
            'css'      => [
                [
                    'property' => 'border-color',
                    'selector' => ".happyforms-submission--success",
                ],
            ]
        ];
    }

    // Enqueue element styles and scripts
    /* public function enqueue_scripts()
    {
        if (bricks_is_builder()) {
            //wphf_enqueue_styles();
            //wphf_html5_fallback();
        }

        wp_enqueue_style('bu-hf', Helpers::get_asset_url('css') . 'cf7.min.css', [], filemtime(Helpers::get_asset_path('css') . 'cf7.min.css'), 'all');
    }*/

    // Render element HTML

    public function render()
    {
        // Define a local helper function
        function get_value($source, $key, $default = null)
        {
            if (is_array($source) && array_key_exists($key, $source)) {
                return $source[$key];
            }
            if (is_object($source) && property_exists($source, $key)) {
                return $source->$key;
            }
            return $default;
        }

        echo "<{$this->tag} {$this->render_attributes('_root')}>";

        $settings = $this->settings;

        $source = get_value($settings, 'source_type', 'static');
        $cf7_id = ($source == 'static') ? get_value($settings, 'ninja_form', 'none') : get_post_meta($this->post_id, get_value($settings, 'form_id', false), true);

        if ($cf7_id == 'none') {
            return $this->render_element_placeholder(['title' => esc_html__('Select a form.', 'bricks')]);
        } elseif (empty($cf7_id) || $cf7_id === false) {
            return $this->render_element_placeholder(['title' => esc_html__('Enter form ID.', 'bricks')]);
        } else {
            $show_form_title = get_value($settings, 'show_title', 'no');

            if ($show_form_title == 'yes') {
                $tag = get_value($settings, 'title_tag', 'h4');
                $title = get_post_field('post_title', $cf7_id);
                echo "<{$tag} class=\"happyforms-form-title\">" . wp_kses_post($title) . "</{$tag}>";
            }

            echo do_shortcode('[happyforms id=' . $cf7_id . ']');
        }

        echo "</{$this->tag}>";
    }


    // Get all forms of Contact Form 7 plugin
    public function getHappyForms()
    {
        $options = [
            'none'  => esc_html__('Select a form', 'bricks'),
        ];

        $args = [
            'post_type'      => 'happyform',
            'posts_per_page' => -1,
        ];

        $forms = get_posts($args);

        if (!empty($forms)) {
            foreach ($forms as $form) {
                $options[$form->ID] = esc_html($form->post_title);
            }
        }

        return $options;
    }
}
