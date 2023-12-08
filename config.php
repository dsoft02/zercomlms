<?php
//define constants
define('API_URL', 'https://humanmanager.tangerinelms.com/www/api/v1');
define('CATEGORY_URL',API_URL.'/get_course_catalogue.php');
define('CATEGORY_COURSES_URL',API_URL.'/get_category_courses.php');
define('SUBCATEGORY_COURSES_URL',API_URL.'/get_sub_category_courses.php');


function getCategories(){
    $url = CATEGORY_URL;
    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        CURLOPT_TIMEOUT => 0,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    if(curl_errno($curl)){
        return false;
    }else{
        $resp = json_decode($response, true);
        return $resp;
    }

}

function getCategoryCourses($path){
    $url = CATEGORY_COURSES_URL.'?category='.$path;
    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        CURLOPT_TIMEOUT => 0,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    if(curl_errno($curl)){
        return false;
    }else{
        $resp = json_decode($response, true);
        return $resp;
    }

}


function getSubCategoryCourses($path){
    $url = SUBCATEGORY_COURSES_URL.'?'.$path;
    //echo $url;
    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        CURLOPT_TIMEOUT => 0,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    if(curl_errno($curl)){
        return false;
    }else{
        $resp = json_decode($response, true);
        return $resp;
    }

}