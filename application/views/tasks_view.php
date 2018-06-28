<?php
    echo '<link href="'.CONST_host.'css/mystyle/tasks-style.css" rel="stylesheet" type="text/css">';
?>
   
<div class="container">
    <div class="row">
        <div class="col col-lg-8 col-md-8 col-sm-8">
            <div class="row row-eq-height pull-right">

                <div class="col-sm-auto col-md-auto col-lg-auto">
                    <div class="sort-bor">
                        <?php
                        if($data['2']['tasks_exist'] == 1){
                            if ($data['2']['sort'] == NULL || $data['2']['sort'] == "sort-by-name"){
                                echo '<div class="sort sort-1"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-name-desc">Имя <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></div>';
                            }
                            else if ($data['2']['sort'] == "sort-by-name-desc"){
                                echo '<div class="sort sort-1"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-name">Имя <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span></a></div>';
                            }
                            else {
                                echo '<div class="sort sort-1"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-name">Имя</a></div>';
                            }

                            if ($data['2']['sort'] == "sort-by-email"){
                                echo '<div class="sort sort-2"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-email-desc">E-mail <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></div>';
                            }
                            else if ($data['2']['sort'] == "sort-by-email-desc"){
                                echo '<div class="sort sort-2"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-email">E-mail <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span></a></div>';
                            }
                            else {
                                echo '<div class="sort sort-2"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-email">E-mail</a></div>';
                            }

                            if ($data['2']['sort'] == "sort-by-status"){
                                echo '<div class="sort sort-3"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-status-desc">Статус <span class="glyphicon glyphicon-sort-by-attributes"></span></a></div>';
                            }
                            else if($data['2']['sort'] == "sort-by-status-desc"){
                                echo '<div class="sort sort-3"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-status">Статус <span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a></div>';
                            }
                            else{
                                echo '<div class="sort sort-3"><a href="'.CONST_host.'tasks/page/'.$data['2']['page'].'/sort-by-status">Статус</a></div>';
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
    foreach ($data['1'] as $values => $data_tasks){
?>

<div class="container">
    <div class="row">
        <div class="col col-lg-8 col-md-8 col-sm-8 task-box">
            <div class="row row-eq-height">

                <div class="col col-lg-5 col-md-5 col-sm-5">
                    <div class="panel-group">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <label class="task-label" for="">Имя:</label>
                            </div>
                            <div class="panel-body">
                                <p class="task-text"><?php echo $data_tasks['name']; ?></p>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <label class="task-label" for="task-email">E-mail:</label>
                            </div>
                            <div class="panel-body">
                                <p class="task-text"><?php echo $data_tasks['email']; ?></p>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <label class="task-label" for="">Текст задачи:</label>
                            </div>
                            <div class="panel-body">
                                <p class="task-text"><?php echo $data_tasks['text']; ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col col-lg-7 col-md-7 col-sm-7">
                    <div class="row">
                        <div class="col col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                            <div class="task-done">
                                <div class="text-center mbot">
                                    <?php
                                        if ($data_tasks['done'] == "0"){
                                            echo '<p class="glic-text-not-done border">Выполнено <span class="glyphicon glyphicon-remove"></span></p>';
                                        }else{
                                            echo '<p class="glic-text-done border">Выполнено <span class="glyphicon glyphicon glyphicon-ok"></span></p>';    
                                        }
                                    ?>
                                </div>
                                <div class="text-center border">
                                    <img class="task-image" src="<?php echo CONST_host. $data_tasks['image']; ?>" alt="No image available">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <ul class="pager">
                <?php
                if($data['2']['tasks_exist'] == 1){
                    if ($data['2']['page'] > 1){
                        echo '<li class="previous"><a href="'.CONST_host.'tasks/page/' .($data['2']['page'] - 1).'/'.$data['2']['sort'].'">&larr; Назад</a></li>';
                    }
                    if ($data['2']['page'] < $data['2']['total_pages']){
                        echo '<li class="next"><a href="'.CONST_host.'tasks/page/' .($data['2']['page'] + 1).'/'.$data['2']['sort'].'">Вперед &rarr;</a></li>';
                    }
                }
                else{
                    echo '<h1>Заданий еще нет!</h1>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
    