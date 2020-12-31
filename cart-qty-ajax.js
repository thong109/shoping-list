Trang chủ » Wordpress » [WooCommerce] Cập nhật giỏ hàng động khi thay đổi số lượng sản phẩm
[WooCommerce] Cập nhật giỏ hàng động khi thay đổi số lượng sản phẩm
Thứ Năm, 15/11/2018 by Hoàng Quách


 
0
SHARES
FacebookFacebook MessengerGmailViberSkype
Mặc định WooCommerce không cập nhật giỏ hàng khi bạn thay đổi số lượng sản phẩm trên giỏ hàng WooCommerce. Sử dụng nút cộng/trừ số lượng cho mỗi sản phẩm bạn có thêm vào giỏ hàng và để cập nhật mới giỏ hàng bạn cần nhấn nút cập nhật bên cạnh giỏ hàng. Tuy nhiên, nhiều bạn muốn cập nhật giỏ hàng động ngay sau khi khách hàng thêm hoặc bớt số lượng sản phẩm trên trang giỏ hàng. Trong bài viết này mình sẽ hướng dẫn các bạn làm sao để cập nhật giỏ hàng mà không cần nhấn nút cập nhật.



Bạn thêm dòng sau vào tệp functions.php của bạn.

//Enqueue Ajax Scripts
function enqueue_cart_qty_ajax() {
 
    wp_register_script( 'cart-qty-ajax-js', get_template_directory_uri() . '/js/cart-qty-ajax.js', array( 'jquery' ), '', true );
    wp_localize_script( 'cart-qty-ajax-js', 'cart_qty_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'cart-qty-ajax-js' );
 
}
add_action('wp_enqueue_scripts', 'enqueue_cart_qty_ajax');
 
function ajax_qty_cart() {
 
    // Set item key as the hash found in input.qty's name
    $cart_item_key = $_POST['hash'];
 
    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );
 
    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );
 
    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );
 
    // Update the quantity of the item in the cart
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }
 
    // Refresh the page
    echo do_shortcode( '[woocommerce_cart]' );
 
    die();
 
}
 
add_action('wp_ajax_qty_cart', 'ajax_qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'ajax_qty_cart');
Tiếp đến, bạn tạo file cart-qty-ajax.js và chép vào nội dung dưới đây.


 
jQuery( function( $ ) {

    $( document ).on( 'change', 'input.qty', function() {

        var item_hash = $( this ).attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
        var item_quantity = $( this ).val();
        var currentVal = parseFloat(item_quantity);

        function qty_cart() {

            $.ajax({
                type: 'POST',
                url: cart_qty_ajax.ajax_url,
                data: {
                    action: 'qty_cart',
                    hash: item_hash,
                    quantity: currentVal
                },
                success: function(data) {
                    $( '.view-cart-popup' ).html(data);
                }
            });  

        }

        qty_cart();

    });

});