<?php
    echo '<link href="'.CONST_host.'css/mystyle/modal-style.css" rel="stylesheet" type="text/css" />';
?>

<div id="modal-preview" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Предварительный просмотр</h4>
              </div>

            <div class="modal-body">
                <table>
                    <tr>
                        <td>
                            <div class="panel panel-default panel-width">
                                <div class="panel-heading">
                                    <label class="task-label" for="">Имя:</label>
                                </div>
                                <div class="panel-body">
                                    <p class="" id="modal-name"></p>
                                </div>
                            </div>
                        </td>
                        <td rowspan="2" class="td-align-top">
                            <div class="task-done">
                                <div class="text-center">
                                    <img class="task-image" src="images/noimage.png" alt="No image available" id="modal-image">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="panel panel-default panel-width">
                                <div class="panel-heading">
                                    <label class="task-label" for="task-email">E-mail:</label>
                                </div>
                                <div class="panel-body">
                                    <p class="task-text" id="modal-email"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="panel panel-default panel-bottom">
                                <div class="panel-heading">
                                    <label class="task-label" for="">Текст задачи:</label>
                                </div>
                                <div class="panel-body">
                                    <p class="task-text" id="modal-text"></p>
                                </div>
                            </div>
                        </td>
                        
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>

    </div>
</div>
 
