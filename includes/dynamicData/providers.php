<?php
namespace BricksExtended\DynamicData;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Providers {
	/**
	 * Holds the providers
	 *
	 * @var array
	 */
	private $providers_keys = [];

	/**
	 * Holds the providers instances
	 *
	 * @var array
	 */
	private $providers = [];

	/**
	 * Holds the tags instances
	 *
	 * @var array
	 */
	private $tags = [];

	public function __construct( $providers ) {
		$this->providers_keys = $providers;
	}

	public static function register( $providers = [] ) {
		$instance = new self( $providers );

		add_action( 'init', [ $instance, 'register_providers' ], 10000 );
		add_action( 'rest_api_init', [ $instance, 'register_providers' ], 7 );
		add_action( 'wp', [ $instance, 'register_tags' ], 8 );
		add_action( 'admin_init', [ $instance, 'register_tags' ], 8 );
		add_action( 'rest_api_init', [ $instance, 'register_tags' ], 8 );
		add_filter( 'bricks/dynamic_tags_list', [ $instance, 'add_tags_to_builder' ] );
		add_filter( 'bricks/frontend/render_data', [ $instance, 'render' ], 10, 3 );
		add_filter( 'bricks/dynamic_data/render_content', [ $instance, 'render' ], 15, 3 );
	}

	public function register_providers() {
		foreach ( $this->providers_keys as $provider ) {
			$classname = '\BricksExtended\DynamicData\Providers\Provider_' . str_replace( ' ', '_', ucwords( str_replace( '-', ' ', $provider ) ) );

			if ( $classname::load_me() ) {
				$this->providers[ $provider ] = new $classname( str_replace( '-', '_', $provider ) );
			}
		}
	}

	public function register_tags() {
		foreach ( $this->providers as $key => $provider ) {
			$this->tags = array_merge( $this->tags, $provider->get_tags() );
		}
	}

	public function get_tags() {
		return $this->tags;
	}

	/**
	 * Adds tags to the tags picker list (used in the builder)
	 *
	 * @param array $tags
	 * @return array
	 */
	public function add_tags_to_builder( $tags ) {
		$list = $this->get_tags();

		foreach ( $list as $tag ) {
			if ( isset( $tag['deprecated'] ) ) {
				continue;
			}

			$tags[] = [
				'name'  => $tag['name'],
				'label' => $tag['label'],
				'group' => $tag['group']
			];
		}

		return $tags;
	}

	/**
	 * Dynamic tag exists in $content: Replaces dynamic tag with requested data
	 *
	 * @param string  $content
	 * @param WP_Post $post
	 *
	 * @return void
	 */
	public function render( $content, $post, $context = 'text' ) {
		preg_match_all( '/{([\w\-\s\.\/:\(\)\'|,]+)}/', $content, $matches );

		if ( empty( $matches[0] ) ) {
			return $content;
		}

		// Get a list of tags to exclude from the Dynamic Data logic
		$exclude_tags = apply_filters( 'bricks/dynamic_data/exclude_tags', [] );

		foreach ( $matches[1] as $key => $match ) {
			$tag = $matches[0][ $key ];

			if ( in_array( $match, $exclude_tags ) ) {
				continue;
			}

			$value = $this->get_tag_value( $match, $post, $context );

			$content = str_replace( $tag, $value, $content );
		}

		return $content;
	}

	/**
	 * Get the value of a dynamic data tag
	 *
	 * @param string  $tag (without {})
	 * @param WP_Post $post
	 * @return void
	 */
	public function get_tag_value( $tag, $post, $context = 'text' ) {
		// Keep the original tag to be used later on in case we don't replace nonexistent tags
		$original_tag = $tag;

		$tags = $this->get_tags();

		// Check if tag has arguments
		$args = strpos( $tag, ':' ) > 0 ? explode( ':', $tag ) : [];

		if ( ! empty( $args ) ) {
			$tag = array_shift( $args );
		}

		if ( ! array_key_exists( $tag, $tags ) ) {
			/**
			 * If true, Bricks replaces not existing DD tags with an empty string
			 *
			 * true caused unwanted replacement of inline <script> & <style> tag data.
			 *
			 * Set to false @since1.4 to render all non-matching DD tags (#2ufh0uf)
			 */
			$replace_tag = apply_filters( 'bricks/dynamic_data/replace_nonexistent_tags', false );

			return $replace_tag ? '' : '{' . $original_tag . '}';
		}

		$provider = $tags[ $tag ]['provider'];

		return $this->providers[ $provider ]->get_tag_value( $tag, $post, $args, $context );
	}
}