<div class="relative mb-10">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="mb-4"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-auto object-cover"></div>
  <div class="text-lg text-center uppercase mb-2"><?php the_title(); ?></div>
  <div class="text-center opacity-75"><?php echo carbon_get_the_post_meta('crb_flavors_subtitle'); ?></div>
</div>