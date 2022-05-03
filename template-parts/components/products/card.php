<div class="relative">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="mb-4">
    <!-- Product photos -->
    <?php 
      $photos = carbon_get_the_post_meta('crb_product_photos');
      $photo_first_src = wp_get_attachment_image_src($photos[0], 'large');
      $photo_second_src = wp_get_attachment_image_src($photos[1], 'large');
    ?>
    <img src="<?php echo $photo_first_src[0]; ?>" data-product-photo-first="<?php echo $photo_first_src[0]; ?>" data-product-photo-second="<?php echo $photo_first_src[1]; ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-96 object-cover bg-custom-gray dark:bg-dark-xl rounded-lg">
  </div>
  <div class="text-lg uppercase"><?php the_title(); ?></div>
</div>