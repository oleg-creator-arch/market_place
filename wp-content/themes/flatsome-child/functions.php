<?php
// Add custom Theme Functions here
	
// удаляем текущий вывод цены
//add_filter( 'woocommerce_get_price_html', 'hide_all_wc_prices', 100, 2);
//



/*
add_filter('woocommerce_after_shop_loop_item_title', 'my_woocommerce_get_price', 15);
function my_woocommerce_get_price($product) {
	global $product;
	$cur_price = $product->get_price();
    $kurs_cb = get_currency_cb('EUR'); // получить курс EUR
    $new_price = $cur_price * ($kurs_cb['kurs']); // делим рудли на EUR
	$new_price = round($new_price, 0, PHP_ROUND_HALF_DOWN); // округлить до целого числа
	//$new_price .= ' РУБ';
	echo '</span></span>';
	echo $new_price;
    echo '<span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"> ₽</span>';
}*/
/*
	function return_custom_price($price, $product) {
	    $kurs_cb = get_currency_cb('EUR');
    $price = round(($price * ($kurs_cb['kurs'])), 1, PHP_ROUND_HALF_DOWN); // где 70 - ваш курс
		
    return $price;
}
add_filter('woocommerce_get_price', 'return_custom_price', 10, 2);

function get_currency_cb($code_valute = 'EUR', $time_cash = '60' ) {
    if ($code_valute != 'USD' && $code_valute != 'EUR') $code_valute = 'EUR';
    if ($time_cash <= 0) $time_cash = 60; // время кеширования в минутах
 
    $name_cash = 'cash_kurs_cb';
    $cached = get_transient($name_cash);
    if ($cached !== false && $cached['code'] == $code_valute) {
        $kurs_cb = $cached;
        return $kurs_cb;
    } 
    else {
        libxml_use_internal_errors(true);
        $kurs_cb_xml = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp");
        if ($kurs_cb_xml === false) {
            echo "Ошибка загрузки XML\n";
            foreach(libxml_get_errors() as $error) {
                echo "\t", $error->message;
            }
            $kurs_cb = $cached;
            return $kurs_cb;
        }     
        else
        {
            foreach ($kurs_cb_xml->Valute as $valute) {
                if ((string)$valute->CharCode == $code_valute) {
                    $kurs_cb['date'] = (string)$kurs_cb_xml['Date'];
                    $kurs_cb['kurs'] = (string)$valute->Value;
                    $kurs_cb['code'] = $code_valute;      
                    break;
                }
            }
            $kurs_cb['kurs'] = round(str_replace(',','.',$kurs_cb['kurs']),2);
            set_transient($name_cash, $kurs_cb, MINUTE_IN_SECONDS * $time_cash);
            return $kurs_cb;
        }
    }

}

*/
add_filter( 'woocommerce_product_tabs', 'wootabs_rename', 98 );
function wootabs_rename( $tabs ) {
$tabs['additional_information']['title'] = __( 'Характеристики' );
return $tabs;
}