<!-- =========================
 SECTION: LATEST NEWS   
============================== -->
<?php
$parallax_number_of_posts = get_theme_mod('parallax_one_latest_news_limit_post', 2);
$args = array( 'post_type' => 'post', 'posts_per_page' => $parallax_number_of_posts, 'order' => 'DESC','ignore_sticky_posts' => true );
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	$parallax_one_latest_news_title = get_theme_mod('parallax_one_latest_news_title',esc_html__('Latest news','parallax-one'));
	if($parallax_number_of_posts > 0) {
	?>
		<section class="brief " id="latestnews" role="region" aria-label="<?php esc_html_e('Latest blog posts','parallax-one'); ?>">
				<div class="container">
					<div class="row">
						<!-- BLOG HEADING / TEXT  -->
						<?php
							if(!empty($parallax_one_latest_news_title)){
								echo '<div class="section-header"><h2 class="dark-text">'.esc_attr($parallax_one_latest_news_title).'</h2><div class="colored-line"></div></div>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<div class="section-header"><h2 class="dark-text"></h2><div class="colored-line"></div></div>';
							}
						?>
						<!-- List post -->		
						<div class="content-area col-md-12 post-list index-post-list">
							<main itemscope itemtype="http://schema.org/Blog" id="main" class="site-main" role="main">
							<?php
							while (  $the_query->have_posts() ) :  $the_query->the_post();
							?>
								<article itemscope itemprop="blogPosts" itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class('border-bottom-hover'); ?> title="<?php printf( esc_html__( 'Blog post: %s', 'parallax-one' ), get_the_title() )?>">
									<div itemscope itemprop="image" class="col-md-3 icon-container white-text">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php 

												if ( has_post_thumbnail() ) :
													the_post_thumbnail('parallax-one-post-thumbnail-latest-news');
												else: ?>
													<img src="<?php echo parallax_get_file('/images/no-thumbnail-blog.jpg'); ?>" height="260" alt="<?php the_title(); ?>">
											<?php 
												endif; 
											?>
										</a>
									</div>
									<div class="col-md-9 info">
										<header class="entry-header">
											<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
											<div class="colored-line-left"></div>
											<div class="clearfix"></div>
											<div class="entry-meta">
												<span class="entry-date">
													<a href="<?php echo esc_url( get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')) ) ?>" rel="bookmark">
														<time itemprop="datePublished" datetime="<?php the_time( 'Y-m-d\TH:i:sP' ); ?>" title="<?php the_time( _x( 'l, F j, Y, g:i a', 'post time format', 'parallax-one' ) ); ?>" class="entry-date entry-published updated"><?php echo get_the_date('F j, Y'); ?></time>
													</a>
												</span>
												<span> <?php esc_html_e('by','parallax-one');?> </span>
												<span itemscope itemprop="author" itemtype="http://schema.org/Person" class="author-link">
													<span  itemprop="name" class="entry-author author vcard">
														<a itemprop="url" class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" rel="author"><?php the_author(); ?> </a>
													</span>
												</span>
											</div><!-- .entry-meta -->
										</header>
										<div itemprop="description" class="entry-content entry-summary">
											<?php the_excerpt(); ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more"><?php printf( esc_html__( 'Read more %s', 'textdomain' ), '<span class="screen-reader-text">  '.get_the_title().'</span>' ); ?></a>
										</div>
									</div>
								</article>
							<?php
							endwhile;
							wp_reset_postdata(); 
							?>
							</main>
						</div>
					</div>
				</div>
		</section>
<?php
	}
} ?>