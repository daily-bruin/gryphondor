<?php/*
Template Name: Football Gameday
*/ ?>
<?php get_header(); ?>
<?php 
	$banner_image_url = get_field('banner_image');
	$stories_tag = get_field('gameday_stories_tag');
	$feature_tag = get_field('featured_story_tag'); 
	$graphic_of_the_week = get_field('graphic_of_the_week');
	$comparing_stats_graphic = get_field('comparing_stats_graphic');
?>

<style>
	#feature-story {
		margin-top: 10px;
		position: relative;
	}

	.feature-content {
		position: absolute;
		bottom: 20px;
        background-color: rgba(255,255,255,0.6);
	}
</style>

<div class="container">
	<div class="row-fluid">
		<div class="span12">
		<img src=<?php echo $banner_image_url; ?> > 
		</div>
	</div>
	<div class="row-fluid">
		<div class="span8">
			<div class="span12" id="feature-story">
	            <?php 
					$args = array(
						'posts_per_page' => 1, 
						'tag' => $feature_tag);

					$posts = get_posts($args);

					foreach ($posts as $post) :
						setup_postdata($post);
						$categories = get_the_category($post->ID);
						echo the_post_thumbnail('large');

				?>
				<!--
				<div class="feature-date">
					<?php the_time('F j, Y'); ?>
				</div>
				-->
				<div class="feature-content">
				<div class="feature-title">
					<a class="heading" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</div>
				<div class="author">
						BY <?php the_author(); ?>
				</div>
				<div class="description">
					<p><?php echo get_the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">More &#187;</a>
					</p>
				</div>
				</div>
				<?php
					endforeach; 
				?>
			</div>

			<div class="span12">
	            <?php 
					$args = array(
						'tag' => $stories_tag);

					$posts = get_posts($args);

					foreach ($posts as $post) :
						setup_postdata($post);
						$categories = get_the_category($post->ID);
						echo the_post_thumbnail('large');

				?>
				<div class="feature-date">
					<?php the_time('F j, Y'); ?>
				</div>
				<div class="content">
					<a class="heading" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</div>
				<div class="author">
						BY <?php the_author(); ?>
				</div>
				<div class="description">
					<p><?php echo get_the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">More &#187;</a>
					</p>
				</div>

				<?php
					endforeach; 
				?>
			</div>
		</div>
		<div class="span4">
			<div class="row-fluid">
				<div class="span12">
					<h2>Graphic of the Week</h2>
					<img src=<?php echo $graphic_of_the_week; ?> > 
				</div>
				<div class="span12">
					<h2>Comparing Stats</h2>
					<img src=<?php echo $comparing_stats_graphic; ?> > 

				</div>
			</div>
		</div>
	</div>
</div>






<?php get_footer(); ?>
