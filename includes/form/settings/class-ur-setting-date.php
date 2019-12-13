<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * UR_Setting_Date Class
 *
 * @package  UserRegistration/Form/Settings
 */
class UR_Setting_Date extends UR_Field_Settings {

	/**
	 * Contructor.
	 */
	public function __construct() {
		$this->field_id = 'date_advance_setting';
	}

	/**
	 * Settings Feild Output.
	 *
	 * @param array $field_data Render field data in html.
	 */
	public function output( $field_data = array() ) {
		$this->field_data = $field_data;
		$this->register_fields();
		$field_html = $this->fields_html;
		return $field_html;
	}

	/**
	 * Advance Fields.
	 */
	public function register_fields() {
		$fields = array(
			'custom_class'   => array(
				'label'       => __( 'Custom Class', 'user-registration' ),
				'data-id'     => $this->field_id . '_custom_class',
				'name'        => $this->field_id . '[custom_class]',
				'class'       => $this->default_class . ' ur-settings-custom-class',
				'type'        => 'text',
				'required'    => false,
				'default'     => '',
				'placeholder' => __( 'Custom Class', 'user-registration' ),

			),

			'date_format'    => array(
				'type'        => 'select',
				'data-id'     => $this->field_id . '_date_format',
				'label'       => __( 'Date Format', 'user-registration' ),
				'name'        => $this->field_id . '[date_format]',
				'class'       => $this->default_class . ' ur-settings-date-format',
				'placeholder' => '',
				'default'     => 'Y-m-d',
				'required'    => false,
				'options'     => array(
					'Y-m-d'  => date( 'Y-m-d' ) . ' (Y-m-d)',
					'F j, Y' => date( 'F j, Y' ) . ' (F j, Y)',
					'm/d/Y'  => date( 'm/d/Y' ) . ' (m/d/Y)',
				),
			),

			'set_current_date'    => array(
				'type'        => 'select',
				'data-id'     => $this->field_id . '_set_current_date',
				'label'       => __( 'Set Current Date as Default Date', 'user-registration' ),
				'name'        => $this->field_id . '[set_current_date]',
				'class'       => $this->default_class . ' ur-settings-set-current-date',
				'default'     => '',
				'required'    => false,
				'options'     => array(
					'today' => 'Yes',
					''      => 'No',
				),
			),
		);

			$this->render_html( $fields );
	}
}

return new UR_Setting_Date();
