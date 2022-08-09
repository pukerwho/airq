<?php get_header(); ?>

	<main id="primary" class="bg-custom-gray dark:bg-dark-lg pt-40">
    <div class="container">
      <div class="mb-12">
        <div class="text-3xl lg:text-4xl text-center font-bold">
          <?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результаты поиска для запроса: %s', 'g-info' ), '<span>' . get_search_query() . '</span>' );
					?>
        </div>
      </div>
      <div class="flex flex-col lg:flex-row lg:-mx-8 pb-12">
        <!-- Основной поток -->
        <div class="w-full lg:w-8/12 justify-center px-0 lg:px-8 mx-auto">
          <div>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="mb-4"><a href="<?php the_permalink(); ?>" class="block bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded px-6 py-3"><?php the_title(); ?></a></div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>