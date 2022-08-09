<?php get_header(); ?>

<?php 
  $categories = get_terms(array( 'taxonomy' => 'flavors-catagory' )); 
  $tags = get_terms(array( 'taxonomy' => 'aromat-tags' )); 
?>

<main id="primary" class="bg-custom-gray dark:bg-dark-lg pt-40">
  <div class="container pb-24">
    <h1 class="text-4xl text-center uppercase mb-6"><?php _e('Аромати', 'airq'); ?></h1>
    <div class="text-xl text-center text-gray-700 dark:text-gray-300 mb-12"><?php _e('У нашій колекції понад 1000 унікальних ароматів', 'airq'); ?></div>
    <div class="flex flex-wrap flex-col lg:flex-row lg:-mx-6">
      <div class="w-full lg:w-1/4 lg:px-6">
        <div class="mb-2"><a href="<?php echo get_post_type_archive_link('flavors'); ?>" class="block bg-white dark:bg-dark-xl hover:bg-orange-100 dark:hover:bg-dark-md rounded px-4 py-2"><?php _e('Всі', 'airq'); ?></a></div>
        <?php foreach($categories as $category): ?>
          <div class="mb-2"><a href="<?php echo get_term_link($category->term_id, 'flavors-catagory') ?>" class="block bg-white dark:bg-dark-xl hover:bg-orange-100 dark:hover:bg-dark-md rounded px-4 py-2"><?php echo $category->name; ?></a></div>
        <?php endforeach; ?>
      </div>
      <div class="w-full lg:w-3/4 lg:px-6">
        <div class="flex items-center flex-wrap -mx-1 mb-6">
          <?php foreach($tags as $tag): ?>
            <div class="px-1 mb-2"><a href="<?php echo get_term_link($tag->term_id, 'aromat-tags') ?>" class="block bg-gray-200 border border-gray-400 dark:bg-dark-xl hover:bg-orange-100 dark:hover:bg-dark-md rounded px-4 py-2"><?php echo $tag->name; ?></a></div>
          <?php endforeach; ?>
        </div>
        <div class="flex flex-wrap lg:-mx-4 mb-20">
          <?php 
            $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
            $query = new WP_Query( array( 
              'post_type' => 'flavors', 
              'posts_per_page' => -1,
              'order'    => 'DESC',
              'paged' => $current_page,
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="w-full lg:w-1/3 lg:px-4">
              <?php get_template_part('template-parts/components/flavors/card'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    

    <?php get_template_part('template-parts/components/consultation'); ?>
  </div>
</main>

<?php get_footer();