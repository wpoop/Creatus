<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ) {
	return;
}

?>
<?php if (is_product()){?><div class="thz-column thz-col-1 thz-site-width"><?php }?>
<div class="woocommerce-message woocommerce-error" role="alert">
    <ul>
        <?php foreach ( $messages as $message ) : ?>
            <li><?php echo wc_kses_notice( $message ); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php if (is_product()){?></div><?php }?>
