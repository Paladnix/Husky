<?php

/*
 *  默认入口:Index/index
 * 
 */


// APP_PATH 项目的根目录
define ('APP_PATH', __DIR__.'/');

// 默认开启DEBUG模式
//    define ('APP_DEBUG', true);

//   define ('APP_DEBUG_FRA', true);

// APP_URL 是本地项目的主目录
define ('APP_URL', 'http://localhost/Husky');

require './PHP_MVC/phpmvc.php';
