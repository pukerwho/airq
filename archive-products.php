<?php get_header(); ?>

<?php $categories = get_terms(array( 'taxonomy' => 'flavors-catagory' )); ?>

<main id="primary" class="bg-white dark:bg-dark-lg pt-40">
  <div class="container pb-24">
    <h1 class="text-4xl text-center uppercase mb-6"><?php _e('Обладнання для ароматизації', 'airq'); ?></h1>
    <div class="w-full lg:w-2/3 text-xl text-center text-gray-700 dark:text-gray-300 mb-20 mx-auto"><?php _e('Обладнання, яке ми виробляємо пройшло тест якості та сертифіковане як безпечне та екологічне', 'airq'); ?></div>
    <!-- Top product -->
    <?php 
      $query = new WP_Query( array( 
        'post_type' => 'products', 
        'posts_per_page' => 1,
        'order'    => 'DESC',
        'meta_query' => array(
          'relation' => 'AND',
          array(
            'key'       => '_crb_product_top',
            'value'     => 'yes',
            'compare'   => '='
          ),
        )
      ) );
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
    <div class="flex items-center flex-wrap lg:-mx-4 mb-12">
      <div class="w-full lg:w-4/12 px-4">
        <div class="bg-custom-gray dark:bg-dark-xl rounded-lg">
          <!-- Product photos -->
          <?php 
            $top_photos = carbon_get_the_post_meta('crb_product_photos');
            $top_photo_first_src = wp_get_attachment_image_src($top_photos[0], 'large');
            $top_photo_second_src = wp_get_attachment_image_src($top_photos[1], 'large');
          ?>
          <img src="<?php echo $top_photo_first_src[0]; ?>" data-product-photo-first="<?php echo $top_photo_first_src[0]; ?>" data-product-photo-second="<?php echo $top_photo_second_src[1]; ?>" alt="<?php the_title(); ?>" loading="lazy">
        </div>
      </div>
      <div class="w-full lg:w-8/12 px-4 mt-4 lg:-mt-4">
        <div>
          <div class="text-2xl text-gray-700 dark:text-gray-300 mb-4"><?php _e('Преміум обладнання для дому','airq'); ?></div>
          <h2 class="text-3xl mb-6"><?php the_title(); ?></h2>
          <div class="text-xl text-gray-800 dark:text-gray-300 mb-4"><?php _e('Аромат для будинку, який чудово помітний, ідеально поєднується та ідеально простий', 'airq'); ?></div>
          <div>
            <a href="<?php the_permalink(); ?>" class="inline-block border border-orange-400 rounded-lg px-8 py-2"><?php _e('Докладніше', 'airq'); ?></a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
    <div class="flex flex-wrap lg:-mx-4 mb-20">
      <?php 
        $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
        $query = new WP_Query( array( 
          'post_type' => 'products', 
          'posts_per_page' => -1,
          'order'    => 'DESC',
          'paged' => $current_page,
          'post__not_in' => array(274, 380),
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