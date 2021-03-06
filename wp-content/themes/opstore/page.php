<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package opstore
 */

get_header(); 

global $post;
// sidebar options

$sidebarPosition = get_post_meta($post->ID, 'ultra_seven_page_sidebar', true);
$sidebarPosition = !empty( $sidebarPosition ) ? $sidebarPosition : 'default';

if($sidebarPosition == 'default'){
	$sidebarPosition = get_theme_mod('post_page_sidebars_layout','rightsidebar');
}

$main_class = 'col-md-12 col-sm-12 col-xs-12';
if( $sidebarPosition != 'nosidebar' ){
    $main_class = 'primary-content col-md-9 col-sm-9 col-xs-12';
}

/**
 * OPSTORE Title Banner
 */
$banner_enable = get_theme_mod('opstore_page_banner_show','show');
if( $banner_enable == 'show' ){
    opstore_title_banner();
}

?>

<main class="main single-pg  primary-padding">
    <div class="container">
        <div class="row">
            <?php 
            if ($sidebarPosition === 'leftsidebar' ): 
                $main_class .= ' pull-right';
            endif;
            ?>
            <div class="<?php echo esc_attr( $main_class ); ?>">
                
                    <?php 
                    while( have_posts() ): the_post();

                        get_template_part( 'template-parts/content', 'page' );
                    endwhile;
                    ?>
                <?php if( comments_open() ): ?>
                    <div class="comment-area p-pt clearfix">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php 
            if( $sidebarPosition!='nosidebar' ):
                ?>
                <aside class="sidebar col-sm-3 col-md-3 col-xs-12">
                    <?php get_sidebar(); ?>
                </aside>
                <?php
            endif;
            ?>
        </div>
    </div>
</main>
<!-- /.main-->

<?php
get_footer();
