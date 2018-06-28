<div class="container">
    <div class="row">
        <div class="col-sm-auto col-md-auto col-lg-auto task-box">
            <div class="row row-eq-height">

                <div class="col-sm-auto col-md-auto col-lg-auto">
                    <form method="POST" action="" id="add-item-form" enctype="multipart/form-data">
                        <div class="form" >
                            <div class="form-group">
                                <label class="task-label" for="task-name">Имя:</label>
                                <input type="text" class="form-control" id="task-name" placeholder="Введите ваше имя" name="inp-name">
                            </div>
                            <div class="form-group">
                                <label class="task-label" for="task-email">E-mail:</label>
                                <input type="email" class="form-control" id="task-email" placeholder="Введите ваш e-mail" name="inp-email">
                            </div>
                            <div class="form-group">
                                <label class="task-label" for="task-text">Текст задачи:</label>
                                <textarea class="form-control" id="task-text" placeholder="Введите текст задачи..." rows="5" name="inp-text"></textarea>
                            </div>
                            <div class="form-group">
                                <p><input type="file" class="" value="Добавить фото" id="image-input" name="picture" form="add-item-form"></p> 
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-sm-auto col-md-auto col-lg-auto">
                    <div class="row">
                        <div class="col-sm-auto col-md-auto col-lg-auto">
                            <p><img class="task-image border" src="images/noimage.png" alt="No image available" id="image-preview"></p>
                                  
                        </div>
                    </div>
                </div>

                <div class="col-sm-auto col-md-auto col-lg-auto">
                    <div class="">
                        <p><input type="submit" class="btn btn-success task-button" value="Добавить" name="do_post" form="add-item-form"></p>
                        <p><button class="btn btn-primary" data-toggle="modal" data-target="#modal-preview" onclick="return functionPrev();" id="mod-but">Предварительный <br> просмотр</button></p>
                    </div>
                </div>
                
                <?php
                    include 'application/views/modal.php';
                ?>
                
            </div>

        </div>
    </div>
</div>
<?php
    echo '<script src="'.CONST_host.'js/modal-data.js"></script>';
    echo '<script src="'.CONST_host.'js/load-image-preview.js"></script>';
?>