<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 1:35 CH
 */

//tao ra cac link trong admin
function admin_url($url = '')
{
    return base_url('admin/'.$url);
}

function user_url($url = ''){
    return base_url('user/'.$url);
}

