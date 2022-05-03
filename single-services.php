<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="primary bg-white" itemscope itemtype="http://schema.org/Article">
  <div class="bg-custom-gray dark:bg-dark-lg pt-40">
    <div class="container pb-48">
      <h1 class="text-4xl text-center uppercase mb-10" itemprop="headline"><?php the_title(); ?></h1>
      <div class="w-full lg:w-9/12 mx-auto">
        <div class="text-xl mb-6">Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Officiis iure harum cumque fugit, eveniet quasi, reprehenderit accusantium laudantium iusto repudiandae.</div>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="w-full lg:w-9/12 mx-auto">
      <div><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="relative bg-orange-200 rounded-lg shadow-lg p-2 -mt-40 mb-10" loading="lazy" itemprop="image"></div>
      <div class="content mb-20" itemprop="articleBody"><?php the_content(); ?></div>
      
    </div>
    <div class="mb-20">
      <?php get_template_part('template-parts/components/consultation'); ?>
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
              <a itemprop="item" href="<?php echo get_post_type_archive_link('services'); ?>" class="text-orange-400 dark:text-orange-200">
                <span itemprop="name"><?php _e( 'Послуги', 'airq' ); ?></span>
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