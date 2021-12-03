<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Handyman_Services_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-handyman-services-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-handyman-services' ),
				'family'      => esc_html__( 'Font Family', 'vw-handyman-services' ),
				'size'        => esc_html__( 'Font Size',   'vw-handyman-services' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-handyman-services' ),
				'style'       => esc_html__( 'Font Style',  'vw-handyman-services' ),
				'line_height' => esc_html__( 'Line Height', 'vw-handyman-services' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-handyman-services' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-handyman-services-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-handyman-services-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-handyman-services' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-handyman-services' ),
        'Acme' => __( 'Acme', 'vw-handyman-services' ),
        'Anton' => __( 'Anton', 'vw-handyman-services' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-handyman-services' ),
        'Arimo' => __( 'Arimo', 'vw-handyman-services' ),
        'Arsenal' => __( 'Arsenal', 'vw-handyman-services' ),
        'Arvo' => __( 'Arvo', 'vw-handyman-services' ),
        'Alegreya' => __( 'Alegreya', 'vw-handyman-services' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-handyman-services' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-handyman-services' ),
        'Bangers' => __( 'Bangers', 'vw-handyman-services' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-handyman-services' ),
        'Bad Script' => __( 'Bad Script', 'vw-handyman-services' ),
        'Bitter' => __( 'Bitter', 'vw-handyman-services' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-handyman-services' ),
        'BenchNine' => __( 'BenchNine', 'vw-handyman-services' ),
        'Cabin' => __( 'Cabin', 'vw-handyman-services' ),
        'Cardo' => __( 'Cardo', 'vw-handyman-services' ),
        'Courgette' => __( 'Courgette', 'vw-handyman-services' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-handyman-services' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-handyman-services' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-handyman-services' ),
        'Cuprum' => __( 'Cuprum', 'vw-handyman-services' ),
        'Cookie' => __( 'Cookie', 'vw-handyman-services' ),
        'Chewy' => __( 'Chewy', 'vw-handyman-services' ),
        'Days One' => __( 'Days One', 'vw-handyman-services' ),
        'Dosis' => __( 'Dosis', 'vw-handyman-services' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-handyman-services' ),
        'Economica' => __( 'Economica', 'vw-handyman-services' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-handyman-services' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-handyman-services' ),
        'Francois One' => __( 'Francois One', 'vw-handyman-services' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-handyman-services' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-handyman-services' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-handyman-services' ),
        'Handlee' => __( 'Handlee', 'vw-handyman-services' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-handyman-services' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-handyman-services' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-handyman-services' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-handyman-services' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-handyman-services' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-handyman-services' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-handyman-services' ),
        'Kanit' => __( 'Kanit', 'vw-handyman-services' ),
        'Lobster' => __( 'Lobster', 'vw-handyman-services' ),
        'Lato' => __( 'Lato', 'vw-handyman-services' ),
        'Lora' => __( 'Lora', 'vw-handyman-services' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-handyman-services' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-handyman-services' ),
        'Merriweather' => __( 'Merriweather', 'vw-handyman-services' ),
        'Monda' => __( 'Monda', 'vw-handyman-services' ),
        'Montserrat' => __( 'Montserrat', 'vw-handyman-services' ),
        'Muli' => __( 'Muli', 'vw-handyman-services' ),
        'Marck Script' => __( 'Marck Script', 'vw-handyman-services' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-handyman-services' ),
        'Open Sans' => __( 'Open Sans', 'vw-handyman-services' ),
        'Overpass' => __( 'Overpass', 'vw-handyman-services' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-handyman-services' ),
        'Oxygen' => __( 'Oxygen', 'vw-handyman-services' ),
        'Orbitron' => __( 'Orbitron', 'vw-handyman-services' ),
        'Patua One' => __( 'Patua One', 'vw-handyman-services' ),
        'Pacifico' => __( 'Pacifico', 'vw-handyman-services' ),
        'Padauk' => __( 'Padauk', 'vw-handyman-services' ),
        'Playball' => __( 'Playball', 'vw-handyman-services' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-handyman-services' ),
        'PT Sans' => __( 'PT Sans', 'vw-handyman-services' ),
        'Philosopher' => __( 'Philosopher', 'vw-handyman-services' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-handyman-services' ),
        'Poiret One' => __( 'Poiret One', 'vw-handyman-services' ),
        'Quicksand' => __( 'Quicksand', 'vw-handyman-services' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-handyman-services' ),
        'Raleway' => __( 'Raleway', 'vw-handyman-services' ),
        'Rubik' => __( 'Rubik', 'vw-handyman-services' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-handyman-services' ),
        'Russo One' => __( 'Russo One', 'vw-handyman-services' ),
        'Righteous' => __( 'Righteous', 'vw-handyman-services' ),
        'Slabo' => __( 'Slabo', 'vw-handyman-services' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-handyman-services' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-handyman-services'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-handyman-services' ),
        'Sacramento' => __( 'Sacramento', 'vw-handyman-services' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-handyman-services' ),
        'Tangerine' => __( 'Tangerine', 'vw-handyman-services' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-handyman-services' ),
        'VT323' => __( 'VT323', 'vw-handyman-services' ),
        'Varela Round' => __( 'Varela Round', 'vw-handyman-services' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-handyman-services' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-handyman-services' ),
        'Volkhov' => __( 'Volkhov', 'vw-handyman-services' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-handyman-services' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-handyman-services' ),
			'100' => esc_html__( 'Thin',       'vw-handyman-services' ),
			'300' => esc_html__( 'Light',      'vw-handyman-services' ),
			'400' => esc_html__( 'Normal',     'vw-handyman-services' ),
			'500' => esc_html__( 'Medium',     'vw-handyman-services' ),
			'700' => esc_html__( 'Bold',       'vw-handyman-services' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-handyman-services' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-handyman-services' ),
			'normal'  => esc_html__( 'Normal', 'vw-handyman-services' ),
			'italic'  => esc_html__( 'Italic', 'vw-handyman-services' ),
			'oblique' => esc_html__( 'Oblique', 'vw-handyman-services' )
		);
	}
}
