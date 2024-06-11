<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_LD_Adv_Quiz extends Element
{
    protected $shortcode_slug   = 'LDAdvQuiz';
    protected $shortcode_params = array(
        'quiz_id'     => 'quiz_id',
        'course_id'   => 'course_id',
        'lesson_id'   => 'lesson_id',
        'topic_id'    => 'topic_id',
        'quiz_pro_id' => 'quiz_pro_id',
    );

	public $category = 'learndash quiz';
    public $name     = 'LD_Adv_Quiz';
    public $icon     = 'ti-pencil-alt';

    public function get_label()
    {
        return esc_html__('LD Advanced Quiz', 'bricks');
    }

    public function set_controls()
    {
        // Settings section
        $this->control_groups['ld_adv_quiz_settings'] = [
            'title' => esc_html__('Settings', 'bricks')
        ];

        $this->controls['quiz_id'] = [
            'group'    => 'ld_adv_quiz_settings',
            'label'    => esc_html__('Quiz ID', 'bricks'),
            'type'     => 'number',
            'default'  => 0
        ];

        // Settings section for quiz controls
        $this->control_groups['ld_quiz_settings'] = [
            'title' => esc_html__('Quiz Settings', 'learndash-bricks')
        ];

        // Controls for Quiz Settings
        $this->controls['quiz_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_content',
                ]
            ]
        ];

        $this->controls['quiz_text_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_content',
                ]
            ]
        ];

        $this->controls['quiz_borders'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.wpProQuiz_content',
                ]
            ]
        ];

        $this->controls['quiz_padding'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Padding', 'learndash-bricks'),
            'type' => 'number',
            'css' => [
                [
                    'property' => 'padding',
                    'selector' => '.wpProQuiz_content',
                ]
            ],
            'options' => [
                'unit' => 'px',
                'step' => 1,
                'min' => 0,
                'max' => 50,
            ]
        ];

        $this->controls['quiz_margin'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Margin', 'learndash-bricks'),
            'type' => 'number',
            'css' => [
                [
                    'property' => 'margin',
                    'selector' => '.wpProQuiz_content',
                ]
            ],
            'options' => [
                'unit' => 'px',
                'step' => 1,
                'min' => 0,
                'max' => 50,
            ]
        ];

        $this->controls['quiz_button_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Button Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_button',
                ]
            ]
        ];

        $this->controls['quiz_button_text_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Button Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_button',
                ]
            ]
        ];

        $this->controls['quiz_button_borders'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Button Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.wpProQuiz_button',
                ]
            ]
        ];

        $this->controls['quiz_header_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Header Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_header',
                ]
            ]
        ];

        $this->controls['quiz_header_text_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Quiz Header Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_header',
                ]
            ]
        ];

        $this->controls['quiz_time_limit_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Time Limit Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_time_limit',
                ]
            ]
        ];

        $this->controls['quiz_time_limit_text_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Time Limit Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_time_limit .time',
                ]
            ]
        ];

        $this->controls['quiz_progress_bar_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Progress Bar Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_progress',
                ]
            ]
        ];

        $this->control_groups['ld_quiz_summary_settings'] = [
            'title' => esc_html__('Quiz Summary Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_summary_background_color'] = [
            'group' => 'ld_quiz_summary_settings',
            'label' => esc_html__('Summary Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_checkPage',
                ]
            ]
        ];

        $this->controls['quiz_summary_text_color'] = [
            'group' => 'ld_quiz_summary_settings',
            'label' => esc_html__('Summary Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_checkPage',
                ]
            ]
        ];

        $this->controls['quiz_infopage_background_color'] = [
            'group' => 'ld_quiz_summary_settings',
            'label' => esc_html__('Infopage Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_infopage',
                ]
            ]
        ];

        $this->controls['quiz_infopage_text_color'] = [
            'group' => 'ld_quiz_summary_settings',
            'label' => esc_html__('Infopage Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_infopage',
                ]
            ]
        ];

        $this->controls['quiz_lock_background_color'] = [
            'group' => 'ld_quiz_summary_settings',
            'label' => esc_html__('Lock Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_lock',
                ]
            ]
        ];

        $this->controls['quiz_lock_text_color'] = [
            'group' => 'ld_quiz_summary_settings',
            'label' => esc_html__('Lock Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_lock',
                ]
            ]
        ];

        $this->control_groups['ld_quiz_loading_settings'] = [
            'title' => esc_html__('Quiz Loading Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_loading_background_color'] = [
            'group' => 'ld_quiz_loading_settings',
            'label' => esc_html__('Loading Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_loadQuiz',
                ]
            ]
        ];

        $this->controls['quiz_loading_text_color'] = [
            'group' => 'ld_quiz_loading_settings',
            'label' => esc_html__('Loading Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_loadQuiz',
                ]
            ]
        ];

        $this->controls['quiz_start_user_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Start User Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_startOnlyRegisteredUser',
                ]
            ]
        ];

        $this->controls['quiz_start_user_text_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Start User Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_startOnlyRegisteredUser',
                ]
            ]
        ];

        $this->controls['quiz_prerequisite_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Prerequisite Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_prerequisite',
                ]
            ]
        ];

        $this->controls['quiz_prerequisite_text_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Prerequisite Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_prerequisite',
                ]
            ]
        ];

        $this->control_groups['ld_quiz_sending_settings'] = [
            'title' => esc_html__('Quiz Sending Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_sending_background_color'] = [
            'group' => 'ld_quiz_sending_settings',
            'label' => esc_html__('Sending Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_sending',
                ]
            ]
        ];

        $this->controls['quiz_sending_text_color'] = [
            'group' => 'ld_quiz_sending_settings',
            'label' => esc_html__('Sending Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_sending',
                ]
            ]
        ];
        $this->controls['quiz_sending_background_color'] = [
            'group' => 'ld_quiz_sending_settings',
            'label' => esc_html__('Sending Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_sending',
                ]
            ]
        ];

        $this->controls['quiz_sending_font'] = [
            'group' => 'ld_quiz_sending_settings',
            'label' => esc_html__('Sending Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_sending',
                ],
            ]
        ];

        $this->control_groups['ld_quiz_result_settings'] = [
            'title' => esc_html__('Quiz Result Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_results_background_color'] = [
            'group' => 'ld_quiz_result_settings',
            'label' => esc_html__('Results Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_results',
                ]
            ]
        ];

        $this->controls['quiz_results_text_color'] = [
            'group' => 'ld_quiz_result_settings',
            'label' => esc_html__('Results Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_results',
                ]
            ]
        ];

        $this->control_groups['ld_quiz_review_settings'] = [
            'title' => esc_html__('Quiz Review Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_review_background_color'] = [
            'group' => 'ld_quiz_review_settings',
            'label' => esc_html__('Review Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_reviewDiv',
                ]
            ]
        ];

        $this->controls['quiz_review_text_color'] = [
            'group' => 'ld_quiz_review_settings',
            'label' => esc_html__('Review Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_reviewDiv',
                ]
            ]
        ];

        $this->control_groups['ld_quiz_question_settings'] = [
            'title' => esc_html__('Quiz Question Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_question_background_color'] = [
            'group' => 'ld_quiz_question_settings',
            'label' => esc_html__('Question Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_listItem',
                ]
            ]
        ];

        $this->controls['quiz_question_text_color'] = [
            'group' => 'ld_quiz_question_settings',
            'label' => esc_html__('Question Text Color', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_listItem',
                ]
            ]
        ];

        $this->control_groups['ld_quiz_answer_settings'] = [
            'title' => esc_html__('Quiz Answer Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_correct_answer_background_color'] = [
            'group' => 'ld_quiz_answer_settings',
            'label' => esc_html__('Correct Answer Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_correct',
                ]
            ]
        ];

        $this->controls['quiz_correct_answer_text_color'] = [
            'group' => 'ld_quiz_answer_settings',
            'label' => esc_html__('Correct Answer Text Color', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_correct',
                ]
            ]
        ];

        $this->controls['quiz_incorrect_answer_background_color'] = [
            'group' => 'ld_quiz_answer_settings',
            'label' => esc_html__('Incorrect Answer Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_incorrect',
                ]
            ]
        ];

        $this->controls['quiz_incorrect_answer_text_color'] = [
            'group' => 'ld_quiz_answer_settings',
            'label' => esc_html__('Incorrect Answer Text Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'color',
                    'selector' => '.wpProQuiz_incorrect',
                ]
            ]
        ];
        // Group for Quiz Settings
        $this->control_groups['ld_quiz_settings'] = [
            'title' => esc_html__('Quiz Settings', 'learndash-bricks')
        ];

        $this->controls['quiz_description_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Description Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_description',
                ],
            ]
        ];

        $this->controls['quiz_description_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Description Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_description',
                ]
            ]
        ];

        $this->controls['quiz_button_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Button Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_button',
                ],
            ]
        ];

        $this->controls['quiz_button_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Button Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_button',
                ]
            ]
        ];

        $this->controls['quiz_button_border'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Button Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.wpProQuiz_button',
                ]
            ]
        ];

        $this->controls['quiz_lock_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Lock Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_lock',
                ]
            ]
        ];

        $this->controls['quiz_lock_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Lock Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_lock',
                ],
            ]
        ];

        $this->controls['quiz_load_quiz_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Load Quiz Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_loadQuiz',
                ]
            ]
        ];

        $this->controls['quiz_load_quiz_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Load Quiz Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_loadQuiz',
                ],
            ]
        ];

        $this->controls['quiz_start_user_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Start User Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_startOnlyRegisteredUser',
                ]
            ]
        ];

        $this->controls['quiz_start_user_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Start User Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_startOnlyRegisteredUser',
                ],
            ]
        ];

        $this->controls['quiz_prerequisite_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Prerequisite Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_prerequisite',
                ]
            ]
        ];

        $this->controls['quiz_prerequisite_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Prerequisite Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_prerequisite',
                ],
            ]
        ];

        

        $this->controls['quiz_results_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Results Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_results',
                ]
            ]
        ];

        $this->controls['quiz_results_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Results Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_results',
                ],
            ]
        ];

        $this->controls['quiz_review_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Review Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_reviewDiv',
                ]
            ]
        ];

        $this->controls['quiz_review_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Review Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_reviewDiv',
                ],
            ]
        ];

        $this->controls['quiz_question_list_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Question List Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_listItem',
                ]
            ]
        ];

        $this->controls['quiz_question_list_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Question List Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_listItem',
                ],
            ]
        ];

        $this->controls['quiz_correct_answer_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Correct Answer Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_correct',
                ]
            ]
        ];

        $this->controls['quiz_correct_answer_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Correct Answer Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_correct',
                ],
            ]
        ];

        $this->controls['quiz_incorrect_answer_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Incorrect Answer Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_incorrect',
                ]
            ]
        ];

        $this->controls['quiz_incorrect_answer_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Incorrect Answer Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_incorrect',
                ],
            ]
        ];

        $this->controls['quiz_input_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Input Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_questionInput',
                ]
            ]
        ];

        $this->controls['quiz_input_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Input Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_questionInput',
                ],
            ]
        ];

        $this->controls['quiz_input_border'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Input Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.wpProQuiz_questionInput',
                ]
            ]
        ];

        $this->controls['quiz_button_input_font'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Button Input Font', 'learndash-bricks'),
            'type' => 'typography',
            'css' => [
                [
                    'property' => 'font',
                    'selector' => '.wpProQuiz_button2',
                ],
            ]
        ];

        $this->controls['quiz_button_input_background_color'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Button Input Background Color', 'learndash-bricks'),
            'type' => 'color',
            'css' => [
                [
                    'property' => 'background-color',
                    'selector' => '.wpProQuiz_button2',
                ]
            ]
        ];

        $this->controls['quiz_button_input_border'] = [
            'group' => 'ld_quiz_settings',
            'label' => esc_html__('Button Input Border', 'learndash-bricks'),
            'type' => 'border',
            'css' => [
                [
                    'property' => 'border',
                    'selector' => '.wpProQuiz_button2',
                ]
            ]
        ];
    }

    public function render()
    {
        $settings = $this->settings;

        if (isset($settings['quiz_id'])) {
            // Construct the shortcode
            $shortcode = '[' . $this->shortcode_slug . ' ' . absint($settings['quiz_id']) . ']';
            // Output the shortcode
            echo "<div {$this->render_attributes('_root')}>";
            echo do_shortcode($shortcode);
            echo "</div>";
        }
    }
}
