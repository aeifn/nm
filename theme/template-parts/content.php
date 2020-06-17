<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <div class="container">
<div class="row">
	<?php
    the_title('<h1 class="mx-auto">','</h1>');
    ?>
  </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <?php
    the_post_thumbnail('large', array ( 'class' => 'img-fluid w-100 col-md-6'));
	?>
</div>
</div>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php


		edit_post_link();

		?>

	</div><!-- .section-inner -->

</div>
</article><!-- .post -->