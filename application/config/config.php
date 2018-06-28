<?php

    $config = array(
        'title' => "Tasks",
        'host' => "http://tasks-test-new/",
        'db' => array(
            'server' => '127.0.0.1',
            'username' => 'root',
            'password' => '123',
            'name' => 'task_bd',
            'charset' => 'utf8'
            )
    );      
//$config = array(
//        'title' => "Tasks",
//        'host' => "http://tasks-tasks.zzz.com.ua/",
//        'db' => array(
//            'server' => 'mysql.zzz.com.ua',
//            'username' => 'antihawk',
//            'password' => '7hjvf777ZX',
//            'name' => 'antihawk',
//            'charset' => 'utf8'
//            )
//    );    


    $connection = mysqli_connect(
        $config['db']['server'],
        $config['db']['username'],
        $config['db']['password'],
        $config['db']['name']
    );

    if ($connection == false){
    echo "Cant connect";
    echo mysqli_connect_error();
    exit();
    }

       
?>