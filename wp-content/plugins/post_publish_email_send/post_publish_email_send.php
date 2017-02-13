<?php
/**
* Plugin Name: Plugin post publish email send
* Description: Плагин, которій отправляет почту при написании поста
* Version: 0.1
* Author: Andrew Melnik
* Author URI:
* License: GPLv2
 */
function post_publish_email_send($post_ID)
{
    $to = 'testov.netu.1@gmail.com';  //EMAIL отримувача
    $subject = 'У нас новий пост'; //Тема листа
    $message = 'У нас новий запис блогу на сайті. Запис має id='.$post_ID; //Контент листа з вказанням ID поста
    wp_mail($to, $subject, $message);
    return $post_ID;
}
add_action('publish_post', 'post_publish_email_send');
?>