<?php get_header(); ?>

<main id="primary" class="bg-custom-gray dark:bg-dark-lg pt-28 lg:pt-24">
  <div class="relative bg-orange-200 dark:bg-gray-700 pt-20 lg:pt-32 pb-48">
    <div class="container">
      <h1 class="text-4xl text-gray-700 dark:text-gray-200 uppercase mb-10"><?php _e('Що ми робимо?', 'airq'); ?></h1>  
      <div class="text-xl">Prolitec ® <?php _e('є провідним постачальником послуг з ароматизації навколишнього середовища та нейтралізації комерційних запахів та допомагає брендам у 83 країнах покращити якість обслуговування клієнтів', 'airq'); ?>.</div>
    </div>
  </div>
  <div class="container -mt-32 pb-12">
    <?php 
      $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
      $query = new WP_Query( array( 
        'post_type' => 'services', 
        'posts_per_page' => 9,
        'order'    => 'DESC',
        'paged' => $current_page,
      ) );
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <div class="flex relative bg-white dark:bg-dark-xl rounded-lg p-6 mb-6">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div class="hidden lg:block mr-6 mt-2">
          <div class="w-4 h-4 flex items-center justify-center bg-gray-300 rounded-full"></div>
        </div>
        <div class="flex justify-between">
          <div class="mr-6">
            <div class="text-2xl mb-4"><?php the_title(); ?></div>
            <div class="w-full lg:w-10/12 text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aperiam, accusamus iste reiciendis ad quidem magnam necessitatibus.</div>  
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
          
        </div>
        
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer();