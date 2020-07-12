<?php

/**
 * Plugin name: Form Mail Sender SMTP
 * Version: 1.0
 * Description: форма
 * Author: Aubury
 *
 */

## styles and scripts
function special_plugin_styles() {
    wp_register_style('contacts', plugins_url('contacts.css', __FILE__));
    wp_enqueue_style('contacts');
}
add_action( 'wp_enqueue_scripts', 'special_plugin_styles' );

##AJAX
add_action( 'wp_ajax_feedback_action', 'ajax_action_callback' );
add_action( 'wp_ajax_nopriv_feedback_action', 'ajax_action_callback' );

##shortcode
do_shortcode('[feedback]');
add_shortcode( 'feedback', 'feedback' );

## filter the_content
add_filter('the_content', 'do_shortcode', 11);



##Form
function feedback(){
    ob_start();

    ?>
 <div id="request">
    <form id="feedback" action="" method="post" name="request" class="col">
        <input type="text" id="name" name="name" placeholder="Ваше ім’я">
        <input type="tel" id="phone" name="phone" placeholder="Ваш телефон">
        <input type="email" id="email" name="email" placeholder="Ваш e-mail">
        <textarea name="message" id="message" placeholder="Ваш коментар"></textarea>
        <input type="submit" id="submit" class="button" value="Надіслати"><br>
    </form>
    </div>
 <?php

    return ob_get_clean();
}
add_action( 'wp_enqueue_scripts', 'feedback_scripts' );
function feedback_scripts() {

    // Обрабтка полей формы
    wp_enqueue_script( 'jquery-form' );

    // Подключаем файл скрипта
    wp_enqueue_script(
        'feedback',
        plugins_url('/feedback.js', __FILE__),
        array( 'jquery' ),
        1.0,
        true
    );

    // Задаем данные обьекта ajax
    wp_localize_script(
        'feedback',
        'feedback_object',
        array(
            'url'   => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'feedback-nonce' ),
        )
    );

}


function ajax_action_callback() {

    // Массив ошибок
$err_message = array();

	// Проверяем nonce. Если проверкане прошла, то блокируем отправку
	if ( ! wp_verify_nonce( $_POST['nonce'], 'feedback-nonce' ) ) {
        wp_die( 'Данные отправлены с левого адреса' );
    }

	// Проверяем на спам. Если скрытое поле заполнено или снят чек, то блокируем отправку
	if ( false === $_POST['anticheck'] || ! empty( $_POST['submitted'] ) ) {
        wp_die( 'Пошел нахрен, мальчик!(c)' );
    }

	// Проверяем полей имени, если пустое, то пишем сообщение в массив ошибок
	if ( empty( $_POST['name'] ) || ! isset( $_POST['name'] ) ) {
        $err_message['name'] = 'Будь ласка, введіть ваше ім\'я.';
    } else {
        $name = sanitize_text_field( $_POST['name'] );
    }

	// Проверяем полей емайла, если пустое, то пишем сообщение в массив ошибок
	if ( empty( $_POST['email'] ) || ! isset( $_POST['email'] ) ) {
        $err_message['email'] = 'Пожалуйста, введите адрес вашей электронной почты.';
    } elseif ( ! preg_match( '/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i', $_POST['email'] ) ) {
        $err_message['email'] = 'Адреса електронної пошти некоректний.';
    } else {
        $email = sanitize_email( $_POST['email'] );

    }

    // Проверяем полей сообщения, если пустое, то пишем сообщение в массив ошибок
    if ( empty( $_POST['phone'] ) || ! isset( $_POST['phone'] ) ) {
        $err_message['phone'] = 'Будь ласка, введіть ваше номер телефону.';
    } else {
        $phone = sanitize_textarea_field( $_POST['phone'] );
    }

	// Проверяем полей сообщения, если пустое, то пишем сообщение в массив ошибок
	if ( empty( $_POST['message'] ) || ! isset( $_POST['message'] ) ) {
        $err_message['message'] = 'Будь ласка, введіть ваше повідомлення.';
    } else {
        $message = sanitize_textarea_field( $_POST['message'] );
    }

	// Проверяем массив ошибок, если не пустой, то передаем сообщение. Иначе отправляем письмо
	if ( $err_message ) {
	    if(count($err_message) === 1){
	        wp_send_json_error( $err_message );
        }else{
            $error = "Дані введені некоректно або не повністю";
            wp_send_json_error( $error );
	    }

    } else {

        // Указываем адресата
        $email_to = 'aubury@vinash.netxi.in';

        // Если адресат не указан, то берем данные из настроек сайта
        if ( ! $email_to ) {
            $email_to = get_option( 'admin_email' );
        }

        $site_name = get_bloginfo( 'name' );

        $msg = '';
//        $msg .= "IP:" . getip() ."\r\n";
//        $msg .= "Имя: ".$name."\r\n";
//        $msg .= "Tелефон: ".$phone."\r\n";
//        $msg .= "Email: ".$email."\r\n";
//        $msg .= "Сообщение: ".$message."\r\n";

        $msg .= "<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        $msg .= "<meta http-equiv=\"Content-Type\" /><title>Mail</title><style>";
        $msg .= "#table_mail{
            min-height: 100px !important;
            border-collapse: collapse;
            max-width: 600px;
            width: 90%;
            margin: 10px auto;
            padding: 5px;
            font-family: 'Roboto';
            text-align: center;}";
        $msg .= "#table_mail *{
            border: 2px solid rgb(153, 152, 152);
            color: black;}";
        $msg .= "#table_mail th{
            background-color: rgb(238, 237, 237);
            font-size: 24px;
        }";
        $msg .= "#table_mail td.tfooter{
            text-align: center !important;
            background-color: rgb(238, 237, 237);
            font-size: 16px;
        }";
        $msg .= " #table_mail tr td:first-child{
            background-color: rgb(238, 237, 237);
            font-weight: 600;
            width: 20% ;
            text-align: right;
        }";
        $msg .= "#table_mail  tr  td{
            font-size: 18px;
            padding: 5px;
            font-style: italic;
        }";
        $msg .= "</style></head><body>";
        $msg .= "<table id=\"table_mail\">";
        $msg .= "<th colspan=\"2\" style=\'\'>Новое письмо</th>";
        $msg .= "<tr><td style=\"background-color: rgb(238, 237, 237);  text-align: right; width: 20%; font-weight: 600;\">IP</td><td>" . getip() ."</td></tr>";
        $msg .= "<tr><td style=\"background-color: rgb(238, 237, 237);  text-align: right; width: 20%; font-weight: 600;\">Имя</td><td>".$name."</td></tr>";
        $msg .= "<tr><td style=\"background-color: rgb(238, 237, 237);  text-align: right; width: 20%; font-weight: 600;\">Tелефон</td><td>".$phone."</td></tr>";
        $msg .= "<tr><td style=\"background-color: rgb(238, 237, 237);  text-align: right; width: 20%; font-weight: 600;\">Email</td><td>".$email."</td></tr>";
        $msg .= "<tr><td style=\"background-color: rgb(238, 237, 237);  text-align: right; width: 20%; font-weight: 600;\">Сообщение</td><td>".$message."</td></tr>";
        $msg .= "<tr><td colspan=\"2\" class=\"tfooter\" style=\" text-align: center; background-color: rgb(238, 237, 237); font-size: 16px;\"><a href=\"".esc_url(home_url('/'))."\" >".$site_name."</a></td></tr>";

        $msg .= " </table>";
        $msg .= "</body></html>";


        $headers ="From: $name <$email>\r\n".
                   "MIME-Version: 1.0" . "\r\n" .
                   "Content-type: text/html; charset=UTF-8" . "\r\n";

        // Отправляем письмо
        wp_mail( $email_to, 'Feedback', $msg, $headers );

        // Отправляем сообщение об успешной отправке
        $message_success = 'Повідомлення відправлено.';
        wp_send_json_success( $message_success );
    }

	// На всякий случай убиваем еще раз процесс ajax
	wp_die();

}
## Can't use WP's function here, so lets use our own
function getip(){
	if (isset($_SERVER)){
		 if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		 {
			  $ip_addr = $_SERVER["HTTP_X_FORWARDED_FOR"];
		 }
		 elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
		 {
			  $ip_addr = $_SERVER["HTTP_CLIENT_IP"];
		 }
		 else
		 {
			 $ip_addr = $_SERVER["REMOTE_ADDR"];
		 }
	}
	else
	{
		 if ( getenv( 'HTTP_X_FORWARDED_FOR' ) )
		 {
			  $ip_addr = getenv( 'HTTP_X_FORWARDED_FOR' );
		 }
		 elseif ( getenv( 'HTTP_CLIENT_IP' ) )
		 {
			  $ip_addr = getenv( 'HTTP_CLIENT_IP' );
		 }
		 else
		 {
			  $ip_addr = getenv( 'REMOTE_ADDR' );
		 }
	}
	return $ip_addr;
}
/**
 * Настройка SMTP
 *
 * @param PHPMailer $phpmailer объект мэилера
 */
function mihdan_send_smtp_email( PHPMailer $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'test.web2018.dp.ua';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = 465;
    $phpmailer->Username   = 'robot@test.web2018.dp.ua';
    $phpmailer->Password   = '3HMr6Ecf8Te!6.';
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->From       = 'robot@test.web2018.dp.ua';
    $phpmailer->FromName   = 'Any-Web';
}
add_action( 'phpmailer_init', 'mihdan_send_smtp_email' );