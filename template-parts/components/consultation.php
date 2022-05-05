<div class="w-full lg:w-8/12">
  <h2 class="text-3xl uppercase mb-10"><?php _e('Консультація', 'airq'); ?></h2>
  <div class="text-lg mb-6">
    <?php _e("Ми надаємо безкоштовну консультацію з будь-якого питання, що вас цікавить. Залишіть свій контакт, наш спеціаліст зв'яжеться з вами найближчим часом.", "airq"); ?>
  </div>
</div>
<div class="mb-6">
  <div>
    <?php get_template_part('template-parts/components/form-consultation'); ?>
  </div>
  <div class="form_consultation_success"><?php _e("Дякую, ми отримали вашу заявку. Найближчим часом ми з вами зв'яжемося.", "airq"); ?></div>
</div>
<div class="w-full lg:w-8/12">
  <div>
    <?php _e("Запитання, пов'язані з обладнанням або продукцією, комерційні пропозиції та запити надсилайте на адресу", "airq"); ?> <span class="text-orange-400"><?php echo carbon_get_theme_option('crb_email'); ?>. </span><?php _e("Для вирішення термінових питань дзвоніть за телефоном", "airq"); ?> <?php echo carbon_get_theme_option('crb_phone'); ?>
  </div>
</div>