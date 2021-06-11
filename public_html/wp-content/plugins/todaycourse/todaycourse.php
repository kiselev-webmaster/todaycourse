<?php
/*
Plugin Name: Курсы валют
Description: Плагин выводит курсы валют
Author: Киселев Денис
Version: 1.1.1

*/

add_shortcode( 'course', 'todayCourse' );
function todayCourse($attributes) {
	//$valutes = array('USD', 'EUR');
    static $rates;
    
    extract( shortcode_atts( array(
        'valutes' => array()
    ), $attributes ) );
 
    $valutes_arr = explode(",", $valutes);
    
    if ($rates === null) {
        $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
    }
    $html = '';
    $html .= '<div class="todayCourse">';
    foreach($valutes_arr as $valute){
	    $html .= '<div class="valute">';
	    $html .= '<span>'.$valute.': </span>'.$rates->Valute->$valute->Value;
	    $html .= '</div>';
    }
    $html .= '</div>';
    return $html;
}