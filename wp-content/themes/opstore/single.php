<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package opstore
 */

get_header(); 

$banner_enable = get_theme_mod('opstore_page_banner_show','show');
if( $banner_enable == 'show' ){
    opstore_title_banner();
}
?>

<main class="main blog-single-main p-pb single-pg ">
    <div class="blog-single">
        <div class="container">
            <?php get_template_part( 'template-parts/single/layout', 'one' ); ?>
        </div>
    </div>
    <!--blog-->
</main>
<!-- /.main-->

<?php
get_footer();
?>
