<?php get_header(); ?>

	<main id="primary" class="bg-white dark:bg-dark-lg">
		<div class="container pt-24 lg:pt-32">
			<h1 class="text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-12">
				<span class="sketch-underline"><?php the_archive_title(); ?></span></h1>
			<div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
        <div class="w-full lg:w-2/3 lg:px-4">
        	<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
        		<?php the_archive_description( '<div class="content">', '</div>' ); ?>
        	</div>
        	<div class="flex flex-wrap flex-col mb-6">
        		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!-- Post item -->
							<?php get_template_part('template-parts/posts/post-item'); ?>
						<!-- END Post item -->
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>	
					<div class="mb-6">
						<div class="flex justify-between items-center prose-a:inline-block prose-a:bg-indigo-500 prose-a:text-gray-200 prose-a:rounded prose-a:px-6 prose-a:py-3">
							<?php posts_nav_link(); ?>	
						</div>
						
					</div>
        </div>
        <div class="w-full lg:w-1/3 lg:px-4">
					<?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
				</div>
				
			</div>
		</div>
		
	</main><!-- #main -->

<?php get_footer(); ?>
