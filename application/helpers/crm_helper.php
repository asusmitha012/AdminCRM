<?php


function bread_crump_maker($breadcrump)
{
    $bread_crump_data = "";
    if (isset($breadcrump) && !empty($breadcrump)) {
        if (is_array($breadcrump)) {
            foreach ($breadcrump as $crump) {
                if (isset($crump['link']) && !empty($crump['link'])) {
                    $bread_crump_data = $bread_crump_data . '<li class="breadcrumb-item"><a href = "' . $crump['link'] . '">' . $crump['title'] . '</a></li>';
                } else if (isset($crump['function']) && !empty($crump['function'])) {
                    $bread_crump_data = $bread_crump_data . '<li class="breadcrumb-item"><a href = "javascript:void(0);" onclick="' . $crump['function'] . '">' . $crump['title'] . '</a></li>';
                } else {
                    $bread_crump_data = $bread_crump_data . '<li class="breadcrumb-item">' . $crump['title'] . '</li>';
                }
            }
        } else {
            $bread_crump_data = $breadcrump;
        }
    }
    return $bread_crump_data;
}

function RandString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $sc = '@#$!';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $sp = $sc[rand(0, strlen($sc) - 1)];
    return str_shuffle($sp . $randomString);
}


?>