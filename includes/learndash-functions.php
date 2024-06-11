<?php


function learndash_bricks_show_course_content_listing($atts = array()): void
{
	global $course_pager_results;

	$atts_defaults = array(
		'course_id' => 0,
		'user_id'   => 0,
	);
	$atts          = shortcode_atts($atts_defaults, $atts);
	if (empty($atts['course_id'])) {
		return;
	}

	$course_id = $atts['course_id'];
	$user_id   = $atts['user_id'];

	/**
	 * Start from includes/class-ld-cpt-instance.php
	 */

	$has_access    = sfwd_lms_has_access($course_id, $user_id);
	$course_status = learndash_course_status($course_id, null);
	$course_meta   = get_post_meta($course_id, '_sfwd-courses', true);
	if ((!$course_meta) || (!is_array($course_meta))) {
		$course_meta = array();
	}
	if (!isset($course_meta['sfwd-courses_course_disable_content_table'])) {
		$course_meta['sfwd-courses_course_disable_content_table'] = false;
	}

	$lesson_progression_enabled = false;
	if (!empty($course_id)) {
		$lesson_progression_enabled = learndash_lesson_progression_enabled($course_id);
	}

	$lessons = learndash_get_course_lessons_list($course_id);

	// For now no pagination on the course quizzes. Can't think of a scenario where there will be more
	// than the pager count.
	$quizzes = learndash_get_course_quiz_list($course_id);

	$has_course_content = (!empty($lessons) || !empty($quizzes));

	$lesson_topics = array();

	$has_topics = false;

	if (!empty($lessons)) {
		foreach ($lessons as $lesson) {
			$lesson_topics[$lesson['post']->ID] = learndash_topic_dots($lesson['post']->ID, false, 'array', null, $course_id);
			if (!empty($lesson_topics[$lesson['post']->ID])) {
				$has_topics = true;

				$topic_pager_args                     = array(
					'course_id' => $course_id,
					'lesson_id' => $lesson['post']->ID,
				);
				$lesson_topics[$lesson['post']->ID] = learndash_process_lesson_topics_pager($lesson_topics[$lesson['post']->ID], $topic_pager_args);
			}
		}
	}

	/**
	 * Start from themes/ld30/templates/course.php
	 */

	$has_lesson_quizzes = learndash_30_has_lesson_quizzes($course_id, $lessons);
?><div class="<?php echo esc_attr(learndash_the_wrapper_class()); ?>">
		<?php

		global $course_pager_results;

		/**
		 * Identify if we should show the course content listing
		 *
		 * @var $show_course_content [bool]
		 */
		$show_course_content = (!$has_access && 'on' === $course_meta['sfwd-courses_course_disable_content_table'] ? false : true);

		if ($has_course_content && $show_course_content) :
		?>
			<div class="ld-item-list ld-lesson-list">
				<div class="ld-section-heading">

					<?php
					/** This filter is documented in themes/ld30/templates/course.php */
					do_action('learndash-course-heading-before', $course_id, $user_id);
					?>
					<h2>
						<?php
						printf(
							// translators: placeholder: Course.
							esc_html_x('%s Content', 'placeholder: Course', 'learndash'),
							\LearnDash_Custom_Label::get_label('course') // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Method escapes output
						);
						?>
					</h2>

					<?php
					/** This filter is documented in themes/ld30/templates/course.php */
					do_action('learndash-course-heading-after', $course_id, $user_id);
					?>
					<div class="ld-item-list-actions" data-ld-expand-list="true">

						<?php
						/**
						 * Fires before the course expand.
						 *
						 * @since 3.0.0
						 *
						 * @param int $course_id Course ID.
						 * @param int $user_id   User ID.
						 */
						do_action('learndash-course-expand-before', $course_id, $user_id);
						?>

						<?php
						// Only display if there is something to expand
						if ($has_topics || $has_lesson_quizzes) :
						?>
							<div class="ld-expand-button ld-primary-background" id="<?php echo esc_attr('ld-expand-button-' . $course_id); ?>" data-ld-expands="<?php echo esc_attr('ld-item-list-' . $course_id); ?>" data-ld-expand-text="<?php echo esc_attr_e('Expand All', 'learndash'); ?>" data-ld-collapse-text="<?php echo esc_attr_e('Collapse All', 'learndash'); ?>">
								<span class="ld-icon-arrow-down ld-icon"></span>
								<span class="ld-text"><?php echo esc_html_e('Expand All', 'learndash'); ?></span>
							</div> <!--/.ld-expand-button-->
							<?php
							/** This filter is documented in themes/ld30/templates/course.php */
							if (apply_filters('learndash_course_steps_expand_all', false, $course_id, 'course_lessons_listing_main')) {
							?>
								<script>
									jQuery(document).ready(function() {
										setTimeout(function() {
											jQuery("<?php echo esc_attr('#ld-expand-button-' . $course_id); ?>").trigger('click');
										}, 1000);
									});
								</script>
						<?php
							}
						endif;

						/** This filter is documented in themes/ld30/templates/course.php */
						do_action('learndash-course-expand-after', $course_id, $user_id);
						?>

					</div> <!--/.ld-item-list-actions-->
				</div> <!--/.ld-section-heading-->

				<?php
				/** This filter is documented in themes/ld30/templates/course.php */
				do_action('learndash-course-content-list-before', $course_id, $user_id);

				/**
				 * Content content listing
				 *
				 * @since 3.0
				 *
				 * ('listing.php');
				 */
				learndash_get_template_part(
					'course/listing.php',
					array(
						'course_id'                  => $course_id,
						'user_id'                    => $user_id,
						'lessons'                    => $lessons,
						'lesson_topics'              => !empty($lesson_topics) ? $lesson_topics : array(),
						'quizzes'                    => $quizzes,
						'has_access'                 => $has_access,
						'course_pager_results'       => $course_pager_results,
						'lesson_progression_enabled' => $lesson_progression_enabled,
					),
					true
				);

				/** This filter is documented in themes/ld30/templates/course.php */
				do_action('learndash-course-content-list-after', $course_id, $user_id);
				?>

			</div> <!--/.ld-item-list-->

		<?php
		endif;

		learndash_load_login_modal_html();
		?>
	</div>
<?php
}

function learndash_bricks_show_lesson_content_listing($atts = array()): void
{
	global $course_pager_results;

	$atts_defaults = array(
		'course_id' => 0,
		'user_id'   => 0,
		'step_id'   => 0,

	);

	$atts = shortcode_atts(
		$atts_defaults,
		$atts
	);

	if (empty($atts['course_id'])) {
		return;
	}

	$lesson_id   = $atts['step_id'];
	$lesson_post = get_post($atts['step_id']);
	$user_id     = $atts['user_id'];
	$course_id   = $atts['course_id'];

	if (!empty($user_id)) {
		$logged_in = true;
	} else {
		$logged_in = false;
	}

	$lesson_progression_enabled       = learndash_lesson_progression_enabled($course_id);
	$previous_incomplete_step_id      = learndash_user_progress_get_previous_incomplete_step($user_id, $course_id, $lesson_id);
	$previous_step_completed          = empty($previous_incomplete_step_id) || (!empty($previous_incomplete_step_id) && $previous_incomplete_step_id === $lesson_id);

	// For logged in users to allow an override filter.
	/** This filter is documented in themes/ld30/includes/helpers.php */

	/**
	 * Start from includes/class-ld-cpt-instance.php
	 */
	$show_content = false;

	if ($lesson_progression_enabled) {
		/**
		 * Filters whether the previous step for the course is completed or not.
		 *
		 * @param boolean $previous_complete Whether the previous state is completed or not.
		 * @param int     $lesson_id Post ID.
		 * @param int     $user_id User ID.
		 */
		$previous_lesson_completed = apply_filters('learndash_previous_step_completed', learndash_is_previous_complete($lesson_post) && $previous_step_completed, $lesson_id, $user_id);
	} elseif (learndash_is_sample($lesson_post)) {
		$previous_lesson_completed = true;
	} else {
		$previous_lesson_completed = true;
	}

	if (!learndash_bricks_user_step_access_state('show_content', $user_id, $lesson_id, $course_id)) {
		$show_content = false;
	} else {
		$show_content = $previous_lesson_completed;
	}


	$learndash_content = learndash_bricks_user_step_access_state('learndash_content', $user_id, $lesson_id, $course_id);

	/**
	 * Start from themes/ld30/templates/lesson.php
	 */
?><div class="<?php echo esc_attr(learndash_the_wrapper_class()); ?>">
		<?php
		/**
		 * If the user needs to complete the previous lesson display an alert
		 */

		$all_quizzes_completed = false;

		if ($show_content) {

			$quizzes  = learndash_get_lesson_quiz_list($lesson_post, null, $course_id);
			$quiz_ids = array();

			if (!empty($quizzes)) {
				foreach ($quizzes as $quiz) {
					$quiz_ids[$quiz['post']->ID] = $quiz['post']->ID;
				}
			}

			if ($lesson_progression_enabled && !$previous_lesson_completed) {
				add_filter('comments_array', 'learndash_remove_comments', 1, 2);
			}

			$topics = learndash_topic_dots($lesson_id, false, 'array', null, $course_id);
			if (!empty($topics)) {
				$topic_pager_args = array(
					'course_id' => $course_id,
					'lesson_id' => $lesson_id,
				);
				$topics           = learndash_process_lesson_topics_pager($topics, $topic_pager_args);
			}

			if (!empty($quiz_ids)) {
				$all_quizzes_completed = !learndash_is_quiz_notcomplete(null, $quiz_ids, false, $course_id);
			} else {
				$all_quizzes_completed = true;
			}

			/**
			 * Display Lesson Assignments
			 */

			if (learndash_lesson_hasassignments($lesson_post) && !empty($user_id)) {
				if ((learndash_lesson_progression_enabled() && learndash_lesson_topics_completed($lesson_id)) || !learndash_lesson_progression_enabled()) {
					/** This filter is documented in themes/ld30/templates/lesson.php */
					do_action('learndash-lesson-assignment-before', $lesson_id, $course_id, $user_id);

					learndash_get_template_part(
						'assignment/listing.php',
						array(
							'course_step_post' => $lesson_post,
							'user_id'          => $user_id,
							'course_id'        => $course_id,
						),
						true
					);

					/** This filter is documented in themes/ld30/templates/lesson.php */
					do_action('learndash-lesson-assignment-after', $lesson_id, $course_id, $user_id);
				}
			}

			/**
			 * Lesson Topics or Quizzes
			 */
			if (!empty($topics) || !empty($quizzes)) {

				/** This filter is documented in themes/ld30/templates/lesson.php */
				do_action('learndash-lesson-content-list-before', $lesson_id, $course_id, $user_id);

				$lesson = array(
					'post' => $lesson_post,
				);
		?>

				<div class="ld-lesson-topic-list">
					<?php
					learndash_get_template_part(
						'lesson/listing.php',
						array(
							'course_id' => $course_id,
							'lesson'    => $lesson,
							'topics'    => $topics,
							'quizzes'   => $quizzes,
							'user_id'   => $user_id,
						),
						true
					);
					?>
				</div>

		<?php
				/** This filter is documented in themes/ld30/templates/lesson.php */
				do_action('learndash-lesson-content-list-after', $lesson_id, $course_id, $user_id);
			}
		} elseif ($lesson_progression_enabled && !$previous_lesson_completed) {
			if (!empty($previous_incomplete_step_id)) {
				$previous_item = get_post($previous_incomplete_step_id);
			} else {
				$previous_item = learndash_get_previous($lesson_post);
			}

			learndash_get_template_part(
				'modules/messages/lesson-progression.php',
				array(
					'previous_item' => $previous_item,
					'course_id'     => $course_id,
					'context'       => 'topic',
					'user_id'       => $user_id,
				),
				true
			);
		} elseif (!empty($learndash_content)) {
			echo $learndash_content;
		}

		/**
		 * Set a variable to switch the next button to complete button
		 *
		 * @var $can_complete [bool] - can the user complete this or not?
		 */
		$can_complete = false;

		if ($all_quizzes_completed && $logged_in && !empty($course_id)) :
			/** This filter is documented in themes/ld30/templates/lesson.php */
			$can_complete = apply_filters('learndash-lesson-can-complete', true, $lesson_id, $course_id, $user_id);
		endif;

		learndash_get_template_part(
			'modules/course-steps.php',
			array(
				'course_id'        => $course_id,
				'course_step_post' => $lesson_post,
				'user_id'          => $user_id,
				'course_settings'  => isset($course_settings) ? $course_settings : array(),
				'can_complete'     => $can_complete,
				'context'          => 'lesson',
			),
			true
		);

		?>
	</div> <!--/.learndash-wrapper-->
<?php
}

function learndash_bricks_show_topic_content_listing($atts = array()): void
{
	$atts_defaults = array(
		'course_id' => 0,
		'user_id'   => 0,
		'step_id'   => 0,

	);

	$atts = shortcode_atts($atts_defaults, $atts);

	if (empty($atts['course_id'])) {
		return;
	}

	$topic_id   = $atts['step_id'];
	$topic_post = get_post($atts['step_id']);
	$user_id    = $atts['user_id'];
	$course_id  = $atts['course_id'];

	if (!empty($user_id)) {
		$logged_in = true;
	} else {
		$logged_in = false;
	}

	$lesson_progression_enabled = learndash_lesson_progression_enabled($course_id);
	/**
	 * Start from includes/class-ld-cpt-instance.php
	 */
	$lesson_id = learndash_course_get_single_parent_step($course_id, $topic_id);

	$lesson_post                 = get_post($lesson_id);
	$previous_topic_completed    = learndash_is_previous_complete($topic_post);
	$previous_lesson_completed   = learndash_is_previous_complete($lesson_post);
	$previous_incomplete_step_id = learndash_user_progress_get_previous_incomplete_step($user_id, $course_id, $topic_id);
	$previous_step_completed     = empty($previous_incomplete_step_id) || (!empty($previous_incomplete_step_id) && $previous_incomplete_step_id === $topic_id);


	if ($lesson_progression_enabled) {
		/** This filter is documented in includes/class-ld-cpt-instance.php */
		$previous_topic_completed = apply_filters('learndash_previous_step_completed', learndash_is_previous_complete($topic_post), $topic_id, $user_id);
		/** This filter is documented in includes/class-ld-cpt-instance.php */
		$previous_lesson_completed = apply_filters('learndash_previous_step_completed', learndash_is_previous_complete($lesson_post) && $previous_step_completed, $lesson_post->ID, $user_id);
	} elseif (learndash_is_sample($lesson_post)) {
		$previous_lesson_completed = true;
		$previous_topic_completed  = true;
	} else {
		$previous_lesson_completed = true;
		$previous_topic_completed  = true;
	}

	if (!learndash_bricks_user_step_access_state('show_content', $user_id, $topic_id, $course_id)) {
		$show_content = false;
	} else {
		$show_content = $previous_lesson_completed;
	}


	$learndash_content = learndash_bricks_user_step_access_state('learndash_content', $user_id, $topic_id, $course_id);

	/**
	 * Start from themes/ld30/templates/topic.php
	 */
?><div class="<?php echo esc_attr(learndash_the_wrapper_class()); ?>">
		<?php

		$all_quizzes_completed = false;

		if ($show_content) {

			$quizzes  = learndash_get_lesson_quiz_list($topic_post, null, $course_id);
			$quiz_ids = array();

			if (!empty($quizzes)) {
				foreach ($quizzes as $quiz) {
					$quiz_ids[$quiz['post']->ID] = $quiz['post']->ID;
				}
			}

			if ($lesson_progression_enabled && (!$previous_topic_completed || !$previous_lesson_completed)) {
				add_filter('comments_array', 'learndash_remove_comments', 1, 2);
			}

			if (!empty($quiz_ids)) {
				$all_quizzes_completed = !learndash_is_quiz_notcomplete(null, $quiz_ids, false, $course_id);
			} else {
				$all_quizzes_completed = true;
			}

			$topics = learndash_topic_dots($lesson_id, false, 'array', null, $course_id);

			if (!empty($quizzes)) {
				learndash_get_template_part(
					'quiz/listing.php',
					array(
						'user_id'   => $user_id,
						'course_id' => $course_id,
						'lesson_id' => $lesson_id,
						'quizzes'   => $quizzes,
						'context'   => 'topic',
					),
					true
				);
			}

			if (learndash_lesson_hasassignments($topic_post) && !empty($user_id)) {

				learndash_get_template_part(
					'assignment/listing.php',
					array(
						'user_id'          => $user_id,
						'course_step_post' => $topic_post,
						'course_id'        => $course_id,
						'context'          => 'topic',
					),
					true
				);
			}
		} elseif ($lesson_progression_enabled && (!$previous_topic_completed || !$previous_lesson_completed)) {
			if (!empty($previous_incomplete_step_id)) {
				$previous_item = get_post($previous_incomplete_step_id);
			} else {
				$previous_item = learndash_get_previous($topic_post);

				if (empty($previous_item)) {
					$previous_item = learndash_get_previous($lesson_post);
				}
			}

			learndash_get_template_part(
				'modules/messages/lesson-progression.php',
				array(
					'previous_item' => $previous_item,
					'course_id'     => $course_id,
					'context'       => 'topic',
				),
				true
			);
		} elseif (!empty($learndash_content)) {
			echo $learndash_content;
		}

		$can_complete = false;

		if ($all_quizzes_completed && $logged_in && !empty($course_id)) :
			/** This filter is documented in themes/ld30/templates/lesson.php */
			$can_complete = apply_filters('learndash-lesson-can-complete', true, $topic_id, $course_id, $user_id);
		endif;

		learndash_get_template_part(
			'modules/course-steps.php',
			array(
				'course_id'             => $course_id,
				'course_step_post'      => $topic_post,
				'all_quizzes_completed' => $all_quizzes_completed,
				'user_id'               => $user_id,
				'course_settings'       => isset($course_settings) ? $course_settings : array(),
				'context'               => 'topic',
				'can_complete'          => $can_complete,
			),
			true
		);

		?>
	</div> <!--/.learndash-wrapper-->
<?php

}
function learndash_bricks_user_step_access_state($state = '', $user_id = 0, $step_id = 0, $course_id = 0)
{
	static $user_course_access_states = array();

	$state_value = '';

	if ((!empty($state)) /* && ( ! empty( $user_id ) ) */ && (!empty($step_id)) && (!empty($course_id))) {
		$state     = esc_attr($state);
		$user_id   = absint($user_id);
		$step_id   = absint($step_id);
		$course_id = absint($course_id);

		if (in_array(get_post_type($step_id), learndash_get_post_types('course'), true)) {
			if (isset($user_course_access_states[$user_id][$course_id][$step_id][$state])) {
				$state_value = $user_course_access_states[$user_id][$course_id][$step_id][$state];
			} else {
				$step_post = get_post($step_id);

				if (!isset($user_course_access_states[$user_id])) {
					$user_course_access_states[$user_id] = array();
				}
				if (!isset($user_course_access_states[$user_id][$course_id])) {
					$user_course_access_states[$user_id][$course_id] = array();
				}

				$is_sample            = learndash_is_sample($step_id);

				$step_state                 = array();
				$lesson_progression_enabled = learndash_lesson_progression_enabled($course_id);
				if ($lesson_progression_enabled) {
					switch (get_post_type($step_id)) {
						case learndash_get_post_type_slug('topic'):
							if ((!$is_sample)) {
								$lesson_id   = learndash_course_get_single_parent_step($course_id, $step_id);
								$lesson_post = get_post($lesson_id);

								/** This filter is documented in includes/class-ld-cpt-instance.php */
								$step_state['previous_topic_completed'] = apply_filters('learndash_previous_step_completed', learndash_is_previous_complete($step_post), $step_id, $user_id);

								/** This filter is documented in includes/class-ld-cpt-instance.php */
								$step_state['previous_lesson_completed'] = apply_filters('learndash_previous_step_completed', learndash_is_previous_complete($lesson_post), $lesson_post->ID, $user_id);

								$step_state['show_content'] = ($step_state['previous_topic_completed'] && $step_state['previous_lesson_completed']);

								$step_state['learndash_content'] = apply_filters('learndash_content', '', $step_post);
								if (!empty($step_state['learndash_content'])) {
									$step_state['show_content'] = false;
								}
							} else {
								$step_state['previous_topic_completed']  = true;
								$step_state['previous_lesson_completed'] = true;

								$step_state['show_content'] = ($step_state['previous_topic_completed'] && $step_state['previous_lesson_completed']);
							}
							break;

						case learndash_get_post_type_slug('lesson'):
							if ((!$is_sample)) {
								$step_state['previous_lesson_completed'] = apply_filters('learndash_previous_step_completed', learndash_is_previous_complete($step_post), $step_id, $user_id);
								$step_state['show_content']              = $step_state['previous_lesson_completed'];

								$step_state['learndash_content'] = apply_filters('learndash_content', '', $step_post);
								if (!empty($step_state['learndash_content'])) {
									$step_state['show_content'] = false;
								}
							} else {
								$step_state['previous_lesson_completed'] = true;
								$step_state['show_content']              = $step_state['previous_lesson_completed'];
							}

							break;

						case learndash_get_post_type_slug('quiz'):
							$last_incomplete_step = learndash_is_quiz_accessable(null, $step_post, true, $course_id);
							if ((is_a($last_incomplete_step, 'WP_Post')) && (!$is_sample)) {
								$step_state['show_content'] = false;
							} else {
								$step_state['show_content'] = true;
							}
							break;

						default:
							break;
					}
				} else {
					$step_state['previous_topic_completed']  = true;
					$step_state['previous_lesson_completed'] = true;
					$step_state['show_content']              = ($step_state['previous_topic_completed'] && $step_state['previous_lesson_completed']);

					$step_state['learndash_content'] = apply_filters('learndash_content', '', $step_post);
					if (!empty($step_state['learndash_content'])) {
						$step_state['show_content'] = false;
					}
				}
				$user_course_access_states[$user_id][$course_id][$step_id] = $step_state;

				if (isset($user_course_access_states[$user_id][$course_id][$step_id][$state])) {
					$state_value = $user_course_access_states[$user_id][$course_id][$step_id][$state];
				}
			}
		}
	}

	return $state_value;
}