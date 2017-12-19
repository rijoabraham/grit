<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name:front-page
 * @package grit
 */
get_header(); ?>
<!-- banner Page
    ==========================================-->

<?php
$disable1    = get_theme_mod( 'grit_header_check' ) == 1 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'home-banner' );?>
<?php endif;?>
<!-- about us Page
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_about_check' ) == 1 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'about' );?>			
<?php endif;?>
<!-- contact us Page
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_contact_check' ) == 1 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'home-contact' );?>
<?php endif;?>
<!-- our works block
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_work_check' ) == 0 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'ourwork' );?>
<?php endif;?>
<!-- the process block
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_process_check' ) == 1 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'process' );?>
			
<?php endif;?>
<!-- Company counter section
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_counter_check' ) == 1 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'counts' );?>  			
<?php endif;?>
<!-- /Company counter section --> 

<!-- Testimonials Section
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_testimonial_check' ) == 0 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'testimonials' );?>  
<?php endif;?>
<!-- latest news block
    ==========================================-->
<?php
$disable1    = get_theme_mod( 'grit_latest_news_check' ) == 1 ? true : false ;
if ( grit_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php  get_template_part( 'section-part/section', 'latest-news' );?> 
<?php endif;?>
<?php
get_footer();