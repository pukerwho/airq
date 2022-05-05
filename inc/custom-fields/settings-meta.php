<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Prolitec') )
  ->add_tab( __('Контакти'), array(
    Field::make( 'text', 'crb_address' . crb_get_i18n_suffix(), 'Адреса' ),
    Field::make( 'text', 'crb_email', 'Email' ),
    Field::make( 'text', 'crb_phone', 'Телефон' ),
    Field::make( 'text', 'crb_time', 'Час роботи' ),
  ))
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' )
  ));
}

?>