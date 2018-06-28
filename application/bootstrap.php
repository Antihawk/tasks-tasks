<?php

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';


define("CONST_host", "http://tasks-test-new/");
//define("CONST_host", "http://tasks-tasks.zzz.com.ua/");

require_once 'core/route.php';
Route::start(); 

?>