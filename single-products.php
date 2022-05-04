<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="primary" class="bg-white dark:bg-dark-lg pt-40">
  <div class="container">
    <div class="flex flex-wrap flex-col lg:flex-row lg:-mx-6 mb-20">
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
          <div class="inline-block bg-orange-400 text-lg text-white text-center rounded-lg px-10 py-3"><?php _e('Замовити', 'airq'); ?></div>
        </div>
        <div class="mb-20">
          <details class="bg-light rounded-lg border-b border-gray-300 pb-6 mb-6">
            <summary class="flex justify-between items-center cursor-pointer">
              <div class="text-2xl uppercase">
                <?php _e('Опис', 'airq'); ?>
              </div>
              <div class="details-plus text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
              </div>
              <div class="details-minus text-orange-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                </svg>
              </div>
            </summary> 
            <div class="content py-3">
              <?php the_content(); ?>
            </div>
          </details>

          <details class="bg-light rounded-lg mb-6">
            <summary class="flex justify-between items-center cursor-pointer">
              <div class="text-2xl uppercase">
                <?php _e('Характеристики', 'airq'); ?>
              </div>
              <div class="details-plus text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
              </div>
              <div class="details-minus text-orange-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                </svg>
              </div>
            </summary> 
            <div class="content py-6">
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Принцип роботи","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_how_work'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Об'єм покриття","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_objem'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Розмір","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_size'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Маса","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_weight'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Температура приміщення","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_temp'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Вологість приміщення","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_vologist'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Споживана потужність","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_potuzhnist'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Тип живлення","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_type_on'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Стійкість до перепадів напруги","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_stiikist'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Резервне живлення","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_other_power'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Рівень шуму","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_noise'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Компресор","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_compresor'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Потужність компресора","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_power_compresor'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Розміщення","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_rozmishennya'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Режим роботи","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_regim_rabotu'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Кількість режимів","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_qty_regims'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Наявність вентилятора","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_has_fan'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Режими вентилятора","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_regim_fan'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Перемикання інтервалу","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_change_interval'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Розташування клапана","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_position_klapan'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Картридж з аромарідкістю","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_cartridg_aroma'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Об'єм картриджа","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_objem_cartridg'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Витрати аромату","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_vitraty_aromaty'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Необхідність чищення","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_need_clean'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Матеріал корпуса","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_material_korpus'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Захист","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_defend'); ?></div>
              </div>
              <div class="flex items-center mb-4">
                <div class="w-4 h-4 bg-gray-300 rounded-full mr-2"></div>
                <div class="mr-2"><?php _e("Кольори","airq"); ?>:</div>
                <div><?php echo carbon_get_the_post_meta('crb_product_colors'); ?></div>
              </div>
            </div>
          </details>
        </div>
      </div>
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

<?php get_footer();