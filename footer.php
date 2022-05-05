<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package G-Info
 */

?>

<footer class="bg-gray-200 dark:bg-dark-md border-t-8 border-orange-400 dark:border-dark-xl py-12 lg:py-20">
  <div class="container">
    <div class="flex justify-between flex-wrap lg:-mx-4">
      <div class="w-full lg:w-4/12 lg:px-4 mb-6 lg:mb-0">
        <div class="w-full lg:w-7/12">
          <div class="mb-4"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/prolitec_logo.png" alt="Logo" class="w-full"></a></div>
          <div>© Prolitec 2005 - 2022</div>  
        </div>
        
      </div>
      <div class="w-full lg:w-4/12 lg:px-4 mb-6 lg:mb-0">
        <h3 class="uppercase mb-4"><?php _e('Навігація', 'airq'); ?></h3>
        <div>
          <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => 'div',
            'menu_class' => 'flex flex-col'
          ]); ?> 
        </div>
      </div>
      <div class="w-full lg:w-4/12 lg:px-4 mb-6 lg:mb-0">
        <h3 class="uppercase mb-4"><?php _e('Контакти', 'airq'); ?></h3>
        <!-- PHONE -->
        <div class="flex items-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 3l-6 6m0 0V4m0 5h5M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
          </svg>
          <div><a href="tel:<?php echo carbon_get_theme_option('crb_phone'); ?>"><?php echo carbon_get_theme_option('crb_phone'); ?></a></div>
        </div>
        <!-- PHONE -->

        <!-- TIME -->
        <div class="flex items-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <div><?php echo carbon_get_theme_option('crb_time'); ?></div>
        </div>
        <!-- TIME -->

        <!-- LOCATION -->
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <div><?php echo crb_get_i18n_theme_option('crb_address'); ?></div>
        </div>
        <!-- LOCATION -->
      </div>
    </div> 
  </div>
</footer>

<!-- CALLBACK MODAL -->
<div class="modal" data-modal="callback">
  <div class="modal_content bg-white dark:bg-dark-lg w-full lg:w-2/5">
    <div class="modal_content_close">
      ✖️
    </div>
    <div class="mt-6">
      <!-- ФОРМА -->
      <h2 class="text-3xl uppercase mb-10"><?php _e('Зворотній дзвінок', 'airq'); ?></h2>
      <form name="form_callback">
        <input type="tel" name="Телефон" placeholder="Ваш телефон" class="w-full custom-input" required>
        <button type="submit" class="w-full block bg-orange-400 hover:bg-orange-500 text-white rounded px-4 py-2">
          <?php _e('Замовити зворотній дзвінок', 'airq'); ?>
        </button>
      </form>
      <div class="form_callback_success hidden bg-orange-100 dark:bg-dark-xl rounded-lg p-4"><?php _e("Ми отримали вашу заявку. Найближчим часом ми з вами зв'яжемося.", "airq"); ?></div>
      </div>
      <!-- END ФОРМА -->
    </div>
  </div>
</div>
<!-- END CALLBACK MODAL -->

<!-- CONSULTATION MODAL -->
<div class="modal" data-modal="consultation">
  <div class="modal_content bg-white dark:bg-dark-lg w-full lg:w-3/5">
    <div class="modal_content_close">
      ✖️
    </div>
    <div class="mt-6">
      <h2 class="text-3xl uppercase mb-10"><?php _e('Консультація', 'airq'); ?></h2>
      <div class="text-lg mb-6">
        <?php _e("Ми надаємо безкоштовну консультацію з будь-якого питання, що вас цікавить. Залишіть свій контакт, наш спеціаліст зв'яжеться з вами найближчим часом.", "airq"); ?>
      </div>
      <div class="mb-6">
        <div>
          <?php get_template_part('template-parts/components/form-consultation'); ?>
        </div>
      </div>
      <div class="form_consultation_success hidden bg-orange-100 dark:bg-dark-xl rounded-lg p-4"><?php _e("Ми отримали вашу заявку. Найближчим часом ми з вами зв'яжемося.", "airq"); ?></div>
      <div>
        <?php _e("Запитання, пов'язані з обладнанням або продукцією, комерційні пропозиції та запити надсилайте на адресу", "airq"); ?> <span class="text-orange-400"><?php echo carbon_get_theme_option('crb_email'); ?>. </span><?php _e("Для вирішення термінових питань дзвоніть за телефоном", "airq"); ?> <?php echo carbon_get_theme_option('crb_phone'); ?>
      </div>
    </div>
  </div>
</div>
<!-- END CONSULTATION MODAL -->

<div class="modal-bg hidden"></div>

<!-- not use -->
<div class="current-lang"></div>
<!-- END not use -->

<?php wp_footer(); ?>

</body>
</html>
