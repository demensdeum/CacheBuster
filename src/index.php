<?php
$dir_path = __DIR__;
$dirs = glob($dir_path . '/*', GLOB_ONLYDIR);
if (count($dirs) > 0) {
    usort($dirs, function($a, $b) {
        return intval($a) - intval($b);
    });
    $largest_dir = end($dirs);
    $dirname = basename($largest_dir);
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . $_SERVER['REQUEST_URI'] . '/' . $dirname;
    $current_url = str_replace("index.php", "", $current_url);
    header("Location: $current_url");
    exit;
} else {
    echo "No numeric folder in script directory!";
}