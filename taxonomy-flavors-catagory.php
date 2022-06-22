<?php get_header(); ?>

<?php 
  $categories = get_terms(array( 'taxonomy' => 'flavors-catagory' ));
  $current_cat_id = get_queried_object_id();
?>

<main id="primary" class="bg-custom-gray dark:bg-dark-lg pt-40">
  <div class="container pb-24">
    <h1 class="text-4xl text-center uppercase mb-12"><?php single_term_title(); ?></h1>
    <div class="flex items-center flex-wrap -mx-2 mb-6">
      <div class="px-2 mb-2"><a href="<?php echo get_post_type_archive_link('flavors'); ?>" class="inline-block bg-white dark:bg-dark-xl hover:bg-orange-100 dark:hover:bg-dark-md rounded px-4 py-2"><?php _e('Всі', 'airq'); ?></a></div>
      <?php foreach($categories as $category): ?>
        <?php $class_active = ( $category->term_id === $current_cat_id ) ? 'category-active' : ''; ?>
        <div class="px-2 mb-2"><a href="<?php echo get_term_link($category->term_id, 'flavors-catagory') ?>" class="inline-block bg-white dark:bg-dark-xl hover:bg-orange-100 dark:hover:bg-dark-md rounded px-4 py-2 <?php echo $class_active; ?>"><?php echo $category->name; ?></a></div>
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
          'tax_query' => array(
            array(
              'taxonomy' => 'flavors-catagory',
              'terms' => $current_cat_id,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="w-full lg:w-1/3 lg:px-4">
          <?php get_template_part('template-parts/components/flavors/card'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>

    <?php get_template_part('template-parts/components/consultation'); ?>
  </div>
</main>

<?php get_footer();