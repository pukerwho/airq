<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', 'IN', array('templates/tpl_contact.php') )
    ->add_fields( array(
      Field::make( 'text', 'crb_contact_address', 'Адреса' ),
      Field::make( 'text', 'crb_contact_phone', 'Телефон' ),
      Field::make( 'text', 'crb_contact_mail', 'Email' ),
      Field::make( 'text', 'crb_contact_time', 'Час роботи' ),
  ) );
}

?>