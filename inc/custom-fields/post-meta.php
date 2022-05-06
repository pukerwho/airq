<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$employees_labels = array(
    'plural_name' => 'Employees',
    'singular_name' => 'Employee',
);

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'products' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_product_description', 'Короткий опис' ),
      Field::make( 'media_gallery', 'crb_product_photos', 'Фотографії' )->set_type( array( 'image' ) ),
      
      Field::make( 'checkbox', 'crb_product_top', 'Топ?' ),
      Field::make( 'complex', 'crb_product_top_content', 'Blocks' )->set_conditional_logic( array(
        array(
          'field' => 'crb_product_top',
          'value' => '1', 
          'compare' => '=',
        )
      ))->set_layout('tabbed-horizontal')->add_fields( array(
        Field::make( 'rich_text', 'crb_product_top_text', 'Контент' ),
        Field::make( 'image', 'crb_product_top_img', 'Картинка' )->set_value_type( 'url'),
      )),
      Field::make( 'separator', 'crb_separate_charakter', 'Характеристики' ),
      Field::make( 'text', 'crb_product_how_work', 'Принцип роботи' ),
      Field::make( 'text', 'crb_product_objem', "Об'єм покриття" ),
      Field::make( 'text', 'crb_product_size', 'Розмір' ),
      Field::make( 'text', 'crb_product_weight', 'Маса' ),
      Field::make( 'text', 'crb_product_temp', 'Температура приміщення' ),
      Field::make( 'text', 'crb_product_vologist', 'Вологість приміщення' ),
      Field::make( 'text', 'crb_product_potuzhnist', 'Споживана потужність' ),
      Field::make( 'text', 'crb_product_type_on', 'Тип живлення' ),
      Field::make( 'text', 'crb_product_stiikist', 'Стійкість до перепадів напруги' ),
      Field::make( 'text', 'crb_product_other_power', 'Резервне живлення' ),
      Field::make( 'text', 'crb_product_noise', 'Рівень шуму' ),
      Field::make( 'text', 'crb_product_compresor', 'Компресор' ),
      Field::make( 'text', 'crb_product_power_compresor', 'Потужність компресора' ),
      Field::make( 'text', 'crb_product_rozmishennya', 'Розміщення' ),
      Field::make( 'text', 'crb_product_regim_rabotu', 'Режим роботи' ),
      Field::make( 'text', 'crb_product_qty_regims', 'Кількість режимів' ),
      Field::make( 'text', 'crb_product_has_fan', 'Наявність вентилятора' ),
      Field::make( 'text', 'crb_product_regim_fan', 'Режими вентилятора' ),
      Field::make( 'text', 'crb_product_change_interval', 'Перемикання інтервалу' ),
      Field::make( 'text', 'crb_product_position_klapan', 'Розташування клапана' ),
      Field::make( 'text', 'crb_product_cartridg_aroma', 'Картридж з аромарідкістю' ),
      Field::make( 'text', 'crb_product_objem_cartridg', "Об'єм картриджа" ),
      Field::make( 'text', 'crb_product_vitraty_aromaty', 'Витрати аромату' ),
      Field::make( 'text', 'crb_product_need_clean', 'Необхідність чищення' ),
      Field::make( 'text', 'crb_product_material_korpus', 'Матеріал корпуса' ),
      Field::make( 'text', 'crb_product_defend', 'Захист' ),
      Field::make( 'text', 'crb_product_colors', 'Кольори' ),

  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'flavors' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_flavors_colors', 'Кольори' )->set_layout('tabbed-vertical')->add_fields( array(
        Field::make( 'color', 'crb_flavor_color', 'Кольор' ),
      )),
      Field::make( 'text', 'crb_flavors_subtitle', 'Підзаголовок' ),
      Field::make( 'text', 'crb_flavors_family', 'Сімейство' ),
      Field::make( 'text', 'crb_flavors_collections', 'Колекція' ),
      Field::make( 'complex', 'crb_flavors_tags', 'Tags' )->add_fields( array(
        Field::make( 'text', 'crb_flavors_tag', 'Tag' ),
      )),
  ) );  
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'services' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_services_description', 'Короткий опис' ),
  ) );  
}

?>