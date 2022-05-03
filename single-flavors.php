<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<main id="primary" class="bg-custom-gray dark:bg-dark-lg pt-40">
  <div class="container">
    <div class="flex flex-wrap flex-col lg:flex-row lg:-mx-6 mb-20">
      <div class="w-full lg:w-1/2 lg:px-6">
        <!-- Photo -->
        <div>
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-full">
        </div>
      </div>
      <div class="w-full lg:w-1/2 lg:px-6">
        <h1 class="text-4xl uppercase mb-6"><?php the_title(); ?></h1>
        <div class="text-3xl text-gray-700 dark:text-gray-200 uppercase mb-10"><?php echo carbon_get_the_post_meta('crb_flavors_subtitle'); ?></div>
        <div class="flex items-center flex-wrap -mx-2 mb-6">
          <?php 
            $tags = carbon_get_the_post_meta('crb_flavors_tags');
            foreach ($tags as $tag): 
          ?>
            <div class="px-2 mb-2"><div class="inline-block bg-white dark:bg-dark-xl hover:bg-orange-100 dark:hover:bg-dark-md rounded px-4 py-2"><?php echo $tag['crb_flavors_tag']; ?></div></div>
          <?php endforeach; ?>
        </div>
        <div class="content mb-6"><?php the_content(); ?></div>
        <div class="text-lg mb-6">
          <h4 class="uppercase mb-2"><?php _e('Колірна гама аромату', 'airq'); ?></h4>
        </div>
        <div class="text-lg mb-6">
          <h4 class="uppercase mb-2"><?php _e('Сімейство', 'airq'); ?></h4>
          <div><?php echo carbon_get_the_post_meta('crb_flavors_family'); ?></div>
        </div>
        <div class="text-lg mb-6">
          <h4 class="uppercase mb-2"><?php _e('Колекція', 'airq'); ?></h4>
          <div><?php echo carbon_get_the_post_meta('crb_flavors_collections'); ?></div>
        </div>
        <div class="inline-block bg-orange-400 text-lg text-white text-center rounded-lg px-10 py-3"><?php _e('Консультація', 'airq'); ?></div>
      </div>
    </div>
    <!-- Other flovers -->
    <div class="mb-12">
      <?php 
        $current_terms = wp_get_post_terms(  get_the_ID() , 'flavors-catagory', array( 'parent' => 0 ) );
        $current_term = $current_terms[0];
      ?>
      <h2 class="text-3xl text-center uppercase mb-10"><?php _e('Схожі аромати', 'airq'); ?></h2>
      <div class="flex flex-wrap lg:-mx-4">
        <?php 
          $current_id = get_the_ID();
          $custom_query = new WP_Query( array( 
          'post_type' => 'flavors', 
          'posts_per_page' => 3,
          'post__not_in' => array($current_id),
          'tax_query' => array(
            array(
              'taxonomy' => 'flavors-catagory',
              'terms' => $current_term->term_id,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
        if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
          <div class="w-full lg:w-1/3 lg:px-4">
            <?php get_template_part('template-parts/components/flavors/card'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
  <!-- Хлебные крошки -->
  <div class="border-y dark:border-none bg-white dark:bg-dark-lg border-gray-300 py-3">
    <div class="container">
      <div class="flex items-center">
        <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <ul class="flex items-center flex-wrap">
            <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
              <a itemprop="item" href="<?php echo home_url(); ?>" class="text-orange-400 dark:text-orange-200">
                <span itemprop="name"><?php _e( 'Главная', 'airq' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_post_type_archive_link('flavors'); ?>" class="text-orange-400 dark:text-orange-200">
                <span itemprop="name"><?php _e( 'Ароматы', 'airq' ); ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
              <span itemprop="name"><?php the_title(); ?></span>
              <meta itemprop="position" content="3" />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- END Хлебные крошки -->
</main>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer();