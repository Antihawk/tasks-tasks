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
                    <form method="POST" action="" id="update-item-form<?php echo $data_tasks['id']; ?>" enctype="multipart/form-data">
                        <div class="form" >
                            <div class="form-group">
                                <label class="task-label-admin" for="task-name">Имя:</label>
                                <input type="text" class="form-control" id="task-name" name="inp-name-update" value="<?php echo $data_tasks['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="task-label-admin" for="task-email">E-mail:</label>
                                <input type="email" class="form-control" id="task-email" name="inp-email-update" value="<?php echo $data_tasks['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="task-label-admin" for="task-text">Текст задачи:</label>
                                <textarea class="form-control" id="task-text" rows="5" name="inp-text-update"><?php echo $data_tasks['text']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <p><input type="file" class="" value="Добавить фото" id="image-update<?php echo $data_tasks['id']; ?>" name="picture-update" onClick="load_prev(this.id)"></p> 
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col col-lg-7 col-md-7 col-sm-7">
                    <div class="col col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                        <div class="text-center">
                            <p class="margin-bottom-right-column-elements"><img class="task-image border" src="<?php echo CONST_host. $data_tasks['image']; ?>" alt="No image available" id="image-preview<?php echo $data_tasks['id']; ?>"></p>
                        </div>
                        <div class="checkbox margin-bottom-right-column-elements">
                            <?php
                                if ($data_tasks['done'] == "0"){
                            ?>
                                    <label><input type="checkbox" value="1" id="checkbox-input" name="checkbox-update" form="update-item-form<?php echo $data_tasks['id']; ?>">Выполнено</label>
                             <?php   }else{ ?>
                                    <label><input type="checkbox" value="1" id="checkbox-input" name="checkbox-update" form="update-item-form<?php echo $data_tasks['id']; ?>" checked>Выполнено</label>   
                             <?php } ?>
                            
                        </div> 
                        <p class="margin-bottom-right-column-elements"><input type="submit" class="btn btn-success task-button" value="Обновить" name="update_post<?php echo $data_tasks['id']; ?>" form="update-item-form<?php echo $data_tasks['id']; ?>"></p>   
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


<script type="text/javascript">
    function prev(str) {
        document.getElementById("image-update" + str).onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image-preview" + str).src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    }

    function load_prev(element_id) {
        var str = element_id;
        str = str.substring(12);
        prev(str);
    }
</script>
    
    