<?php get_header(); ?>

<?php $categories = get_terms(array( 'taxonomy' => 'flavors-catagory' )); ?>

<main id="primary" class="bg-white dark:bg-dark-lg pt-40">
  <div class="container pb-24">
    <h1 class="text-4xl text-center uppercase mb-6"><?php _e('Обладнання для ароматизації', 'airq'); ?></h1>
    <div class="w-full lg:w-2/3 text-xl text-center text-gray-700 dark:text-gray-300 mb-20 mx-auto"><?php _e('Обладнання, яке ми виробляємо пройшло тест якості та сертифіковане як безпечне та екологічне', 'airq'); ?></div>
    <!-- Top product -->
    <div class="flex items-center flex-wrap lg:-mx-4 mb-12">
      <div class="w-full lg:w-4/12 px-4">
        <div class="bg-custom-gray dark:bg-dark-xl rounded-lg">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/touch-rec.png" alt="">
        </div>
      </div>
      <div class="w-full lg:w-8/12 px-4 mt-4 lg:-mt-4">
        <div>
          <div class="text-2xl text-gray-700 dark:text-gray-300 mb-4"><?php _e('Преміум обладнання для дому','airq'); ?></div>
          <h2 class="text-3xl mb-6">The Aera diffuser</h2>
          <div class="text-xl text-gray-800 dark:text-gray-300 mb-4"><?php _e('Аромат для будинку, який чудово помітний, ідеально поєднується та ідеально простий', 'airq'); ?></div>
          <div>
            <a href="<?php the_permalink(); ?>" class="inline-block border border-orange-400 rounded-lg px-8 py-2"><?php _e('Докладніше', 'airq'); ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap lg:-mx-4 mb-20">
      <?php 
        $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
        $query = new WP_Query( array( 
          'post_type' => 'products', 
          'posts_per_page' => 9,
          'order'    => 'DESC',
          'paged' => $current_page,
        ) );
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="w-full lg:w-1/3 lg:px-4 mb-6">
          <?php get_template_part('template-parts/components/products/card'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>

    <?php get_template_part('template-parts/components/consultation'); ?>
  </div>
</main>

<?php get_footer();