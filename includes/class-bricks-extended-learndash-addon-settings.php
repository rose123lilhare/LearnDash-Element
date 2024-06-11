<?php

/**
 * Settings class file.
 *
 * @package WordPress Plugin Template/Settings
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Settings class.
 */
class Bricks_Extended_Learndash_Addon_Settings
{

	/**
	 * The single instance of Bricks_Extended_Learndash_Addon_Settings.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $_instance = null; //phpcs:ignore

	/**
	 * The main plugin object.
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $parent = null;

	/**
	 * Prefix for plugin settings.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $base = '';

	/**
	 * Available settings for plugin.
	 *
	 * @var     array
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = array();

	/**
	 * Constructor function.
	 *
	 * @param object $parent Parent object.
	 */
	public function __construct($parent)
	{
		$this->parent = $parent;

		$this->base = 'exafbrx_';

		// Check if Bricks Builder is installed.
		if ('bricks' !== wp_get_theme()->get('Template')) {
			if ('Bricks' !== wp_get_theme()->get('Name')) {
				add_action(
					'admin_notices',
					function () {
						$message = sprintf(
							/* translators: 1: Theme name 2: Bricksable */
							esc_html__('%1$s requires %2$s to be installed and activated.', 'bricksable'),
							'<strong>LearnDash Addons For Bricks Builder</strong>',
							'<strong>Bricks Builder</strong>'
						);
						$html = sprintf('<div class="notice notice-warning">%s</div>', wpautop($message));
						echo wp_kses_post($html);
					}
				);
				return;
			}
		}

		// Initialise settings.
		add_action('init', array($this, 'init_settings'), 11);

		// Register plugin settings.
		add_action('admin_init', array($this, 'register_settings'));

		// Add settings page to menu.
		add_action('admin_menu', array($this, 'add_menu_item'));

		// Add settings link to plugins page.
		add_filter(
			'plugin_action_links_' . plugin_basename($this->parent->file),
			array(
				$this,
				'add_settings_link',
			)
		);

		// Configure placement of plugin settings page. See readme for implementation.
		add_filter($this->base . 'menu_settings', array($this, 'configure_settings'));

		// function filter_learndash_template($filepath, $name, $args, $echo, $return_file_path)
		// {
		// 	return "C:\Users\yashr\Local Sites\plugin-test\app\public\wp-content\plugins\bricks-extended-learndash-addon\single-course.php";
		// }

		// add_filter('learndash_template', 'filter_learndash_template', 1000, 5);

		// // Add Template Types to control options
		// add_filter('bricks/setup/control_options',  'add_template_types');

		// /**
		//  * Add template types to control options
		//  *
		//  * @param array $control_options
		//  * @return array
		//  *
		//  * @since 1.4
		//  */
		// function add_template_types($control_options)
		// {
		// 	$template_types = $control_options['templateTypes'];

		// 	// @since 1.3: Product archive & single product templates
		// 	$template_types['ld_single_course'] = 'LearnDash - ' . esc_html__('Single Course', 'bricks');
		// 	$template_types['ld_single_lesson'] = 'LearnDash - ' . esc_html__('Single Lesson', 'bricks');

		// 	$control_options['templateTypes'] = $template_types;

		// 	return $control_options;
		// }

		// Register custom elements.
		add_action(
			'init',
			function () {

				if (class_exists('\Bricks\Elements')) {
					require_once(__DIR__  . "\\dynamicData\\providers.php");
					require_once(__DIR__  . "\\learndash-functions.php");


					$allProviders = [];
					$providers_dir = __DIR__ . '\\dynamicData\\providers';
					if (is_dir($providers_dir)) {

						// Scan for files starting with 'provider-'
						$files = scandir($providers_dir);
						foreach ($files as $file) {
							if (strpos($file, 'provider-') === 0 && strpos($file, '-') !== false && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
								require_once $providers_dir . '/' . $file;

								// Extract provider key from the filename
								$key = str_replace(['provider-', '.php'], '', $file);
								$key = str_replace('-', '_', $key);
								$allProviders[] = $key;
							}
						}
					}


					if (class_exists('\Bricks\Integrations\Dynamic_Data\Providers')) {
						BricksExtended\DynamicData\Providers::register($allProviders);
					}

					if ('on' === get_option('exafbrx_all_elements') || false === get_option('exafbrx_all_elements')) {
						$file_names = $this->extended_Addons_for_Bricks_Builder_load_elements();
					} else {
						$file_names = $this->extended_Addons_for_Bricks_Builder_check_elements();
					}

					foreach ($file_names as $file_name) {
						$file = __DIR__ . "/elements/$file_name";
						// Register all element in builder and frontend.
						\Bricks\Elements::register_element($file);
					}
				}
			},
			11
		);
	}

	/**
	 * Initialise settings
	 *
	 * @return void
	 */
	public function init_settings()
	{
		$this->settings = $this->settings_fields();
	}

	/**
	 * Add settings page to admin menu
	 *
	 * @return void
	 */
	public function add_menu_item()
	{

		$args = $this->menu_settings();

		// Do nothing if wrong location key is set.
		if (is_array($args) && isset($args['location']) && function_exists('add_' . $args['location'] . '_page')) {
			switch ($args['location']) {
				case 'options':
				case 'submenu':
					$page = add_submenu_page($args['parent_slug'], $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function']);
					break;
				case 'menu':
					$page = add_menu_page($args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'], $args['icon_url'], $args['position']);
					break;
				default:
					return;
			}
			add_action('admin_print_styles-' . $page, array($this, 'settings_assets'));
		}
	}

	/**
	 * Prepare default settings page arguments
	 *
	 * @return mixed|void
	 */
	private function menu_settings()
	{
		return apply_filters(
			$this->base . 'menu_settings',
			array(
				'location'    => 'options', // Possible settings: options, menu, submenu.
				'parent_slug' => 'options-general.php',
				'page_title'  => __('Bricks Extended Settings', 'bricks-extended-learndash-addon'),
				'menu_title'  => __('Bricks Extended Settings', 'bricks-extended-learndash-addon'),
				'capability'  => 'manage_options',
				'menu_slug'   => $this->parent->_token . '_settings',
				'function'    => array($this, 'settings_page'),
				'icon_url'    => '',
				'position'    => null,
			)
		);
	}

	/**
	 * Container for settings page arguments
	 *
	 * @param array $settings Settings array.
	 *
	 * @return array
	 */
	public function configure_settings($settings = array())
	{
		return $settings;
	}

	/**
	 * Load settings JS & CSS
	 *
	 * @return void
	 */
	public function settings_assets()
	{

		// We're including the farbtastic script & styles here because they're needed for the colour picker
		// If you're not including a colour picker field then you can leave these calls out as well as the farbtastic dependency for the wpt-admin-js script below.
		wp_enqueue_style('farbtastic');
		wp_enqueue_script('farbtastic');

		// We're including the WP media scripts here because they're needed for the image upload field.
		// If you're not including an image upload then you can leave this function call out.
		wp_enqueue_media();

		wp_register_script($this->parent->_token . '-settings-js', $this->parent->assets_url . 'js/settings' . $this->parent->script_suffix . '.js', array('farbtastic', 'jquery'), '1.0.0', true);
		wp_enqueue_script($this->parent->_token . '-settings-js');
	}

	/**
	 * Add settings link to plugin list table
	 *
	 * @param  array $links Existing links.
	 * @return array        Modified links.
	 */
	public function add_settings_link($links)
	{
		$settings_link = '<a href="options-general.php?page=' . $this->parent->_token . '_settings">' . __('Settings', 'bricks-extended-learndash-addon') . '</a>';
		array_push($links, $settings_link);
		return $links;
	}

	/**
	 * Build settings fields
	 *
	 * @return array Fields to be displayed on settings page
	 */
	private function settings_fields()
	{

		$settings['standard'] = array(
			'title'       => __('Elements', 'bricks-extended-learndash-addon'),
			'description' => __('Select Which Element You want to turn on or turn off.', 'bricks-extended-learndash-addon'),
			'fields'      => array(
				// array(
				// 	'id'          => 'text_field',
				// 	'label'       => __('Some Text', 'bricks-extended-learndash-addon'),
				// 	'description' => __('This is a standard text field.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'text',
				// 	'default'     => '',
				// 	'placeholder' => __('Placeholder text', 'bricks-extended-learndash-addon'),
				// ),
				// array(
				// 	'id'          => 'password_field',
				// 	'label'       => __('A Password', 'bricks-extended-learndash-addon'),
				// 	'description' => __('This is a standard password field.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'password',
				// 	'default'     => '',
				// 	'placeholder' => __('Placeholder text', 'bricks-extended-learndash-addon'),
				// ),
				// array(
				// 	'id'          => 'secret_text_field',
				// 	'label'       => __('Some Secret Text', 'bricks-extended-learndash-addon'),
				// 	'description' => __('This is a secret text field - any data saved here will not be displayed after the page has reloaded, but it will be saved.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'text_secret',
				// 	'default'     => '',
				// 	'placeholder' => __('Placeholder text', 'bricks-extended-learndash-addon'),
				// ),
				// array(
				// 	'id'          => 'text_block',
				// 	'label'       => __('A Text Block', 'bricks-extended-learndash-addon'),
				// 	'description' => __('This is a standard text area.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'textarea',
				// 	'default'     => '',
				// 	'placeholder' => __('Placeholder text for this textarea', 'bricks-extended-learndash-addon'),
				// ),
				// array(
				// 	'id'          => 'single_checkbox',
				// 	'label'       => __('An Option', 'bricks-extended-learndash-addon'),
				// 	'description' => __('A standard checkbox - if you save this option as checked then it will store the option as \'on\', otherwise it will be an empty string.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'checkbox',
				// 	'default'     => '',
				// ),
				// array(
				// 	'id'          => 'select_box',
				// 	'label'       => __('A Select Box', 'bricks-extended-learndash-addon'),
				// 	'description' => __('A standard select box.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'select',
				// 	'options'     => array(
				// 		'drupal'    => 'Drupal',
				// 		'joomla'    => 'Joomla',
				// 		'wordpress' => 'WordPress',
				// 	),
				// 	'default'     => 'wordpress',
				// ),
				// array(
				// 	'id'          => 'radio_buttons',
				// 	'label'       => __('Some Options', 'bricks-extended-learndash-addon'),
				// 	'description' => __('A standard set of radio buttons.', 'bricks-extended-learndash-addon'),
				// 	'type'        => 'radio',
				// 	'options'     => array(
				// 		'superman' => 'Superman',
				// 		'batman'   => 'Batman',
				// 		'ironman'  => 'Iron Man',
				// 	),
				// 	'default'     => 'batman',
				// ),
				array(
					'id'          => 'multiple_checkboxes',
					'label'       => __('Elements', 'bricks-extended-learndash-addon'),
					'description' => __('Checked elements will display in the bricks editor.', 'bricks-extended-learndash-addon'),
					'type'        => 'checkbox_multi',
					'options'     => array(
						'square'    => 'Square',
						'circle'    => 'Circle',
						'rectangle' => 'Rectangle',
						'triangle'  => 'Triangle',
					),
					'default'     => array('circle', 'triangle'),
				),
			),
		);

		// $settings['extra'] = array(
		// 	'title'       => __('Extra', 'bricks-extended-learndash-addon'),
		// 	'description' => __('These are some extra input fields that maybe aren\'t as common as the others.', 'bricks-extended-learndash-addon'),
		// 	'fields'      => array(
		// 		array(
		// 			'id'          => 'number_field',
		// 			'label'       => __('A Number', 'bricks-extended-learndash-addon'),
		// 			'description' => __('This is a standard number field - if this field contains anything other than numbers then the form will not be submitted.', 'bricks-extended-learndash-addon'),
		// 			'type'        => 'number',
		// 			'default'     => '',
		// 			'placeholder' => __('42', 'bricks-extended-learndash-addon'),
		// 		),
		// 		array(
		// 			'id'          => 'colour_picker',
		// 			'label'       => __('Pick a colour', 'bricks-extended-learndash-addon'),
		// 			'description' => __('This uses WordPress\' built-in colour picker - the option is stored as the colour\'s hex code.', 'bricks-extended-learndash-addon'),
		// 			'type'        => 'color',
		// 			'default'     => '#21759B',
		// 		),
		// 		array(
		// 			'id'          => 'an_image',
		// 			'label'       => __('An Image', 'bricks-extended-learndash-addon'),
		// 			'description' => __('This will upload an image to your media library and store the attachment ID in the option field. Once you have uploaded an imge the thumbnail will display above these buttons.', 'bricks-extended-learndash-addon'),
		// 			'type'        => 'image',
		// 			'default'     => '',
		// 			'placeholder' => '',
		// 		),
		// 		array(
		// 			'id'          => 'multi_select_box',
		// 			'label'       => __('A Multi-Select Box', 'bricks-extended-learndash-addon'),
		// 			'description' => __('A standard multi-select box - the saved data is stored as an array.', 'bricks-extended-learndash-addon'),
		// 			'type'        => 'select_multi',
		// 			'options'     => array(
		// 				'linux'   => 'Linux',
		// 				'mac'     => 'Mac',
		// 				'windows' => 'Windows',
		// 			),
		// 			'default'     => array('linux'),
		// 		),
		// 	),
		// );

		$settings = apply_filters($this->parent->_token . '_settings_fields', $settings);

		return $settings;
	}

	/**
	 * Register plugin settings
	 *
	 * @return void
	 */
	public function register_settings()
	{
		if (is_array($this->settings)) {

			// Check posted/selected tab.
			//phpcs:disable
			$current_section = '';
			if (isset($_POST['tab']) && $_POST['tab']) {
				$current_section = $_POST['tab'];
			} else {
				if (isset($_GET['tab']) && $_GET['tab']) {
					$current_section = $_GET['tab'];
				}
			}
			//phpcs:enable

			foreach ($this->settings as $section => $data) {

				if ($current_section && $current_section !== $section) {
					continue;
				}

				// Add section to page.
				add_settings_section($section, $data['title'], array($this, 'settings_section'), $this->parent->_token . '_settings');

				foreach ($data['fields'] as $field) {

					// Validation callback for field.
					$validation = '';
					if (isset($field['callback'])) {
						$validation = $field['callback'];
					}

					// Register field.
					$option_name = $this->base . $field['id'];
					register_setting($this->parent->_token . '_settings', $option_name, $validation);

					// Add field to page.
					add_settings_field(
						$field['id'],
						$field['label'],
						array($this->parent->admin, 'display_field'),
						$this->parent->_token . '_settings',
						$section,
						array(
							'field'  => $field,
							'prefix' => $this->base,
						)
					);
				}

				if (!$current_section) {
					break;
				}
			}
		}
	}

	/**
	 * Settings section.
	 *
	 * @param array $section Array of section ids.
	 * @return void
	 */
	public function settings_section($section)
	{
		$html = '<p> ' . $this->settings[$section['id']]['description'] . '</p>' . "\n";
		echo $html; //phpcs:ignore
	}

	/**
	 * Load settings page content.
	 *
	 * @return void
	 */
	public function settings_page()
	{

		// Build page HTML.
		$html      = '<div class="wrap" id="' . $this->parent->_token . '_settings">' . "\n";
		$html .= '<h2>' . __('Bricks Extended Settings', 'bricks-extended-learndash-addon') . '</h2>' . "\n";

		$tab = '';
		//phpcs:disable
		if (isset($_GET['tab']) && $_GET['tab']) {
			$tab .= $_GET['tab'];
		}
		//phpcs:enable

		// Show page tabs.
		if (is_array($this->settings) && 1 < count($this->settings)) {

			$html .= '<h2 class="nav-tab-wrapper">' . "\n";

			$c = 0;
			foreach ($this->settings as $section => $data) {

				// Set tab class.
				$class = 'nav-tab';
				if (!isset($_GET['tab'])) { //phpcs:ignore
					if (0 === $c) {
						$class .= ' nav-tab-active';
					}
				} else {
					if (isset($_GET['tab']) && $section == $_GET['tab']) { //phpcs:ignore
						$class .= ' nav-tab-active';
					}
				}

				// Set tab link.
				$tab_link = add_query_arg(array('tab' => $section));
				if (isset($_GET['settings-updated'])) { //phpcs:ignore
					$tab_link = remove_query_arg('settings-updated', $tab_link);
				}

				// Output tab.
				$html .= '<a href="' . $tab_link . '" class="' . esc_attr($class) . '">' . esc_html($data['title']) . '</a>' . "\n";

				++$c;
			}

			$html .= '</h2>' . "\n";
		}

		$html .= '<form method="post" action="options.php" enctype="multipart/form-data">' . "\n";

		// Get settings fields.
		ob_start();
		settings_fields($this->parent->_token . '_settings');
		do_settings_sections($this->parent->_token . '_settings');
		$html .= ob_get_clean();

		$html     .= '<p class="submit">' . "\n";
		$html .= '<input type="hidden" name="tab" value="' . esc_attr($tab) . '" />' . "\n";
		$html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr(__('Save Settings', 'bricks-extended-learndash-addon')) . '" />' . "\n";
		$html     .= '</p>' . "\n";
		$html         .= '</form>' . "\n";
		$html             .= '</div>' . "\n";

		echo $html; //phpcs:ignore
	}

	/**
	 * Main Bricks_Extended_Learndash_Addon_Settings Instance
	 *
	 * Ensures only one instance of Bricks_Extended_Learndash_Addon_Settings is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Bricks_Extended_Learndash_Addon()
	 * @param object $parent Object instance.
	 * @return object Bricks_Extended_Learndash_Addon_Settings instance
	 */
	public static function instance($parent)
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self($parent);
		}
		return self::$_instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone()
	{
		_doing_it_wrong(__FUNCTION__, esc_html(__('Cloning of Bricks_Extended_Learndash_Addon_API is forbidden.')), esc_attr($this->parent->_version));
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup()
	{
		_doing_it_wrong(__FUNCTION__, esc_html(__('Unserializing instances of Bricks_Extended_Learndash_Addon_API is forbidden.')), esc_attr($this->parent->_version));
	} // End __wakeup()

	/**
	 * Get Elements
	 */
	public function get_elements()
	{
		$elements     = array();
		$elements_dir = __DIR__ . '/elements';
		$scan         = scandir($elements_dir);
		foreach ($scan as $result) {
			if ('.' === $result || '..' === $result) {
				continue;
			}
			if (pathinfo($result, PATHINFO_EXTENSION) === 'php' && strpos($result, 'element') === 0) {
				$elements[] = $result;
			}
		}
		return $elements;
	}

	/**
	 * Extended_Addons_for_Bricks_Builder Elements
	 */
	public function extended_Addons_for_Bricks_Builder_load_elements()
	{
		$file_names = $this->get_elements();
		return $file_names;
	}

	public function extended_Addons_for_Bricks_Builder_check_elements()
	{
		$file_names = array();
		$elements   = $this->get_elements();

		foreach ($elements as $element) {
			if ('on' === get_option('exafbrx_' . $element) || false === get_option('exafbrx_' . $element)) {
				$file_names[] = $element;
			}
		}

		return $file_names;
	}
}
