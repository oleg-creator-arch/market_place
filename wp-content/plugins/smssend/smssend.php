<?php

/*
  Plugin Name: Sms send plugin
  Plugin URI: http://shikarno.net
  Description: sms send plugin
  Author: Anton Parsh
  Version: 1.0
  Author URI: http://shikarno.net
 */

// Подключаем интерфейс для доступа к API
$dir = plugin_dir_path(__FILE__);

require_once($dir . 'smsimple.class.php');

add_action('woocommerce_new_order', 'create_invoice_for_wc_order',  1, 1);
function create_invoice_for_wc_order($order_id)
{
	$sms = new SMSimple(array(
		'url'      => 'http://api.smsimple.ru',
		'username' => 'intorginvest', // имя учетной записи
		'password' => 'intorginvest12345', // и пароль
	));
	global $order;
	$order = new WC_Order($order_id);

	$order_note = $order->get_customer_note();

	$phone = $order->get_billing_phone();

	$order = wc_get_order($order_id);

	$order_data = $order->get_data(); // The Order data

	$order_id = $order_data['id'];

	$order_total = $order_data['total'];


	## BILLING INFORMATION:

	$order_billing_first_name = $order_data['billing']['first_name'];
	$order_billing_last_name = $order_data['billing']['last_name'];
	$order_billing_email = $order_data['billing']['email'];
	$order_billing_phone = $order_data['billing']['phone'];
	$order_billing_address_1 = $order_data['billing']['address_1'];
	$order_payment_method_title = $order_data['payment_method_title'];

	try {

		// Подключаемся к сервису
		$sms->connect();
		$origin_id = 67557;
		$my_message = 'Информация о заказе на сайте grundsolo.ru ID: "' . $order_id . '" ----------------------------------------------------------------------------------------------------------------------  Сумма заказа: ' . $order_total . 'руб. Адрес доставки: ' . $order_billing_address_1 . '. ФИО:' . $order_billing_first_name . ' ' . $order_billing_last_name . '. Телефон: ' . $order_billing_phone . '. Электронная почта:' . $order_billing_email . '. Способ оплаты: ' . $order_payment_method_title . '. Дополнительная информация:' . $order_note . '';
		$message_id = $sms->send($origin_id, $phone,    $my_message);

		// В случае успешной отправки получаем $message_id, по которому можно проверить статус доставки сообщения
		print 'Сообщение #' . $message_id . ' отослано.';
	} catch (SMSimpleException $e) {
		print $e->getMessage();
	}
	echo $my_message;
}
