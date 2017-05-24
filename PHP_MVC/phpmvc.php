<?php

defined ('APP_DEBUG') or define ( 'APP_DEBUG', false);
defined ('APP_DEBUG_FRA') or define ( 'APP_DEBUG_FRA', false);
// 初始化框架的根目录为当前目录
defined ('FRAME_PATH') or define ( 'FRAME_PATH', __DIR__.'/' );
defined ('APP_PATH') or define ( 'APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/' );
defined ('CONFIG_PATH') or define ( 'CONFIG_PATH', APP_PATH.'config/' );
defined ('RUNTIME_PATH') or define ( 'RUNTIME_PATH', APP_PATH.'runtime/' );

require CONFIG_PATH.'config.php';

require FRAME_PATH.'Core.class.php';

$PHP_MVC = new Core;

$PHP_MVC->run();
