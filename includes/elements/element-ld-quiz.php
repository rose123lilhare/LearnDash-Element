<?php

namespace Bricks;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Element_Learn_Dash_Quiz extends Element
{
    protected $shortcode_slug   = 'ld_quiz';
    protected $shortcode_params = array(
        'quiz_id'           => 'quiz_id'
    );

    public $category = 'learndash quiz';
    public $name     = 'learn_dash_quiz';
    public $icon     = 'ti-write';

    public function get_label()
    {
        return esc_html__('LD Quiz', 'bricks');
    }

    public function set_controls()
    {
		$this->control_groups['ld_quiz_settings'] = [
			'title' => esc_html__('Quiz Settings', 'bricks')
		];

		$this->controls['quiz_id'] = [
			'group'   => 'ld_quiz_settings',
			'label'   => esc_html__('Quiz ID', 'bricks'),
			'type'    => 'number',
			'default' => '',
			'description' => 'Enter the Quiz ID to display. Use within a quiz context or specify explicitly.'
		];

		// Group for Quiz Settings
		$this->control_groups['ld_quiz_settings'] = [
			'title' => esc_html__('Quiz Settings', 'learndash-bricks')
		];

		$this->controls['quiz_description_font'] = [
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Description Font', 'learndash-bricks'),
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_description',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_description',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_description',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_button',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_button',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_button',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_lock',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_lock',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_lock',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_loadQuiz',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_loadQuiz',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_loadQuiz',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_startOnlyRegisteredUser',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_startOnlyRegisteredUser',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_startOnlyRegisteredUser',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_prerequisite',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_prerequisite',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_prerequisite',
				],
				[
					'property' => 'line-height',
					'selector' => '.wpProQuiz_prerequisite',
				],
			]
		];

		$this->controls['quiz_sending_background_color'] = [
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Sending Font', 'learndash-bricks'),
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_sending',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_sending',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_sending',
				],
				[
					'property' => 'line-height',
					'selector' => '.wpProQuiz_sending',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_results',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_results',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_results',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_reviewDiv',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_reviewDiv',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_reviewDiv',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_listItem',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_listItem',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_listItem',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_correct',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_correct',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_correct',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_incorrect',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_incorrect',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_incorrect',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_questionInput',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_questionInput',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_questionInput',
				],
				[
					'property' => 'line-height',
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
			'type' => 'font',
			'css' => [
				[
					'property' => 'font-family',
					'selector' => '.wpProQuiz_button2',
				],
				[
					'property' => 'font-size',
					'selector' => '.wpProQuiz_button2',
				],
				[
					'property' => 'font-weight',
					'selector' => '.wpProQuiz_button2',
				],
				[
					'property' => 'line-height',
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

		$this->controls['quiz_summary_background_color'] = [
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
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

		$this->controls['quiz_lock_text_color'] = [
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Lock Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.wpProQuiz_lock',
				]
			]
		];

		$this->controls['quiz_loading_background_color'] = [
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
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

		$this->controls['quiz_sending_background_color'] = [
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Sending Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.wpProQuiz_sending',
				]
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

		$this->controls['quiz_results_text_color'] = [
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Results Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.wpProQuiz_results',
				]
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

		$this->controls['quiz_review_text_color'] = [
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Review Text Color', 'learndash-bricks'),
			'type' => 'color',
			'css' => [
				[
					'property' => 'color',
					'selector' => '.wpProQuiz_reviewDiv',
				]
			]
		];

		$this->controls['quiz_question_background_color'] = [
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Question Text Color', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.wpProQuiz_listItem',
				]
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

		$this->controls['quiz_correct_answer_text_color'] = [
			'group' => 'ld_quiz_settings',
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

		$this->controls['quiz_incorrect_answer_text_color'] = [
			'group' => 'ld_quiz_settings',
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

		$this->controls['quiz_sending_background_color'] = [
			'group' => 'ld_quiz_settings',
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
			'group' => 'ld_quiz_settings',
			'label' => esc_html__('Sending Font', 'learndash-bricks'),
			'type' => 'typography',
			'css' => [
				[
					'property' => 'font',
					'selector' => '.wpProQuiz_sending',
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
        $shortcode_pairs = array();

        // Check if 'quiz_id' is set; if not, use the current page ID
        if (!isset($settings['quiz_id']) || empty($settings['quiz_id'])) {
            $settings['quiz_id'] = get_the_ID();
        }

        foreach ($this->shortcode_params as $key_ex => $key_in) {
            if (isset($settings[$key_ex])) {
                $shortcode_pairs[$key_in] = $settings[$key_ex];
            }
        }

        $shortcode_params_str = '';
        foreach ($shortcode_pairs as $key => $val) {
            $val = esc_attr($val);
            if (!empty($val)) {  // Only add the parameter if it's not empty
                $shortcode_params_str .= ' ' . $key . '="' . $val . '"';
            }
        }

        if (!empty($shortcode_params_str)) {
            $shortcode_params_str = '[' . $this->shortcode_slug . $shortcode_params_str . ']';
            echo "<div {$this->render_attributes('_root')}>";
            echo do_shortcode($shortcode_params_str);
            echo "</div>";
        } else {
            // Fallback to rendering the default shortcode without parameters if none are set
            echo "<div {$this->render_attributes('_root')}>";
            echo do_shortcode('[' . $this->shortcode_slug . ']');
            echo "</div>";
        }
    }
}
