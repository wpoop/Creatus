<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if(!thz_woo_version( '2.7' )){
	
		wc_get_template_part( 'single-product/related','2x');

	
}else{
	
	$show_product_related	= thz_get_option('woorel_mx/v','show');
	
	if('hide' == $show_product_related){
		$related_products = array();
	}
	
	if ( $related_products ) :
	
		global $product, $woocommerce_loop;
		
		$gutter  	= thz_get_woo_gutter();
		$columns 	= thz_get_woo_columns();
		$slickdata = ' data-space="' . $gutter . '" data-speed="300" data-dots="outside" data-autoplay="0" ';
		$slickdata .= 'data-autoplaySpeed="3000" data-fade="0" data-slidesToShow="' . $columns.'" data-slidesToScroll="' . $columns . '" data-infinite="0"';
		$slider_active	= count( $related_products ) > 1 ? 'thz-slick-active' :'thz-slick-inactive';
		
		$woocommerce_loop['columns'] = $columns;
?>
<div class="thz-product-related-row thz-content-row">
    <div class="thz-product-related-holder<?php thz_single_cmx('woorel_mx') ?>">
        <div class="thz-max-holder<?php thz_single_cmx('woorel_mx',true) ?>">
            <div class="thz-woo-related-holder">
                <h3 class="thz-woo-related-heading">
                   <?php echo esc_html( thz_get_option('wu_rt','Related Products') ); ?>
                </h3>
                <div class="thz-slick-holder thz-slick-show-multiple thz-woo-item-rel-holder">
                    <div class="thz-slick-slider <?php echo thz_sanitize_class($slider_active)?> thz-slick-initiating"<?php echo $slickdata?>>
                        <?php foreach ( $related_products as $related_product ) : ?><div class="thz-slick-slide" data-type="image">
                                <div class="thz-slick-slide-in">
                            <?php
                                $post_object = get_post( thz_woo_get_id( $related_product ) );
            
                                setup_postdata( $GLOBALS['post'] =& $post_object );  // phpcs:ignore WPThemeReview.WordPress.WP.GlobalVariablesOverride - This line is from WooCommerce plugin template override. Not changed by the theme.
            
                                wc_get_template_part( 'content', 'product_rel' ); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;

	wp_reset_postdata();

}