<?php
/*
Template Name: ТОП Продукт
Template Post Type: products
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="primary" class="bg-white dark:bg-dark-lg pt-40">
  <div class="container">
    <div class="flex flex-wrap flex-col lg:flex-row lg:-mx-6 mb-12">
      <div class="w-full lg:w-1/2 lg:px-6">
        <div class="sticky top-28">
          <!-- Product photos -->
          <?php 
            $photos = carbon_get_the_post_meta('crb_product_photos');
          ?>
          <!-- First photo -->
          <div class="mb-6">
            <?php $photo_first_src = wp_get_attachment_image_src($photos[0], 'large'); ?>
            <a href="<?php echo $photo_first_src[0]; ?>" data-lightbox="product-gallery" data-title="<?php the_title(); ?>">
              <img src="<?php echo $photo_first_src[0]; ?>" loading="lazy" class="w-full h-full object-cover bg-custom-gray dark:bg-dark-xl rounded-lg"> 
            </a>
          </div>
          <!-- Other photos -->
          <div class="flex flex-wrap items-center -mx-3">
            <?php foreach ( array_slice($photos, 1) as $photo ): ?>
              <?php $photo_src = wp_get_attachment_image_src($photo, 'large'); ?>
              <div class="w-1/2 lg:w-1/4 px-3 mb-2">
                <a href="<?php echo $photo_src[0]; ?>" data-lightbox="product-gallery" data-title="<?php the_title(); ?>">
                  <img src="<?php echo $photo_src[0]; ?>" loading="lazy" class="w-full h-24 lg:h-32 object-cover bg-custom-gray dark:bg-dark-xl rounded-lg"> 
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-1/2 lg:px-6">
        <h1 class="text-3xl uppercase mb-6"><?php the_title(); ?></h1>
        <div class="content text-lg text-gray-700 dark:text-gray-200 mb-6">ароматизация средних помещений</div>
        <div class="border-b border-gray-300 pb-6 mb-6">
          <div class="inline-block bg-orange-400 text-lg text-white text-center rounded-lg cursor-pointer px-10 py-3 modal-js" data-modal="consultation"><?php _e('Замовити', 'airq'); ?></div>
        </div>
        <div class="mb-20">
          <h2 class="text-2xl uppercase mb-6">
            <?php _e('Опис', 'airq'); ?>
          </h2>
          <div class="content"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
    
    <!-- Content blocks -->
    <div class="mb-20">
      <?php 
        $blocks = carbon_get_the_post_meta('crb_product_top_content');
        foreach ($blocks as $block):
      ?>
        <div class="product-block flex flex-col odd:lg:flex-row even:lg:flex-row-reverse lg:items-center rounded-lg lg:-mx-4 mb-10 px-4 py-8">
          <div class="w-full lg:w-1/2 lg:px-4">
            <img src="<?php echo $block['crb_product_top_img']; ?>">
          </div>
          <div class="w-full lg:w-1/2 lg:px-4">
            <div class="content">
              <?php $block_text = $block['crb_product_top_text']; ?>
              <?php echo apply_filters( 'the_content', $block_text  ); ?> 
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <!-- Other products -->
      <div class="mb-12">
        <h2 class="text-3xl text-center uppercase mb-10"><?php _e('Інші продукти', 'airq'); ?></h2>
        <div class="flex flex-wrap lg:-mx-4">
          <?php 
            $current_id = get_the_ID();
            $custom_query = new WP_Query( array( 
            'post_type' => 'products', 
            'posts_per_page' => 3,
            'post__not_in' => array($current_id),
          ) );
          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="w-full lg:w-1/3 lg:px-4">
              <?php get_template_part('template-parts/components/products/card'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
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
                <span itemprop="name"><?php _e( 'Головна', 'airq' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_post_type_archive_link('products'); ?>" class="text-orange-400 dark:text-orange-200">
                <span itemprop="name"><?php _e( 'Товари', 'airq' ); ?></span>
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

<?php get_footer(); ?>