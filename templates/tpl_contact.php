<?php
/*
Template Name: Контакти
*/
?>

<?php get_header(); ?>

<main id="primary" class="bg-custom-gray dark:bg-dark-lg pt-24">
  <div class="relative h-[75vh]">
    <img src="https://static.tildacdn.com/tild6537-3531-4537-a364-633230303830/fonstolaru_420143_19.jpg" alt="" class="w-full h-full absolute top-0 left-0 object-cover">
    <div class="container h-full flex items-center">
      <div class="relative bg-white text-white rounded-xl bg-opacity-10 backdrop-filter backdrop-blur-xl py-8 px-10">
        <h1 class="text-4xl text-center uppercase mb-6"><?php _e('Контакти', 'airq'); ?></h1>
        <div class="mb-4"><?php echo carbon_get_theme_option('crb_address'); ?></div>
        <div class="mb-4">
          <a href="tel:<?php echo carbon_get_theme_option('crb_phone'); ?>"><?php echo carbon_get_theme_option('crb_phone'); ?></a>
        </div>
        <div class="mb-4">
          <a href="mailto:<?php echo carbon_get_theme_option('crb_email'); ?>"><?php echo carbon_get_theme_option('crb_email'); ?></a>
        </div>
        <div><?php echo carbon_get_theme_option('crb_time'); ?></div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>