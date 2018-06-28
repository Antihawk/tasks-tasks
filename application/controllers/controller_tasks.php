<?php

class Controller_tasks extends Controller
{
    function __construct()
	{
        $this->model = new Model_tasks();
        $this->view = new View();
    }

	function action_index($page = 1, $sort = "sort-by-name")
	{
        $this->action_page_index($page, $sort);
        
	}
    
    function action_page($page = 1, $sort = "sort-by-name")
	{
        $this->action_page_index($page, $sort);
    }
    
    function action_page_index ($page = 1, $sort = "sort-by-name"){
        $data = $this->model->get_data_from_server($page, $sort);
        
        foreach ($data['1'] as $values => $data_tasks){
            if (isset($_POST['update_post'.$data_tasks['id']])){
                $update_data = true;
                $update_id = $data_tasks['id'];
                $old_image_name = $data_tasks['image'];
            }
        }
        $bool_result = false;
        if ($update_data == true) {
            if($_POST['inp-name-update'] == "" || $_POST['inp-email-update'] == "" || $_POST['inp-text-update'] == ""){
                $message = "Заполните пустые поля!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
                $bool_result = $this->model->update_data_onserver($update_id, $_POST['inp-name-update'], $_POST['inp-email-update'], $_POST['inp-text-update'], $_POST['checkbox-update'], $_FILES["picture-update"]["name"], $_FILES["picture-update"]["tmp_name"], $_FILES["picture-update"]["size"], $old_image_name);
                $data = $this->model->get_data_from_server($page, $sort);
            }
            if($bool_result){
                $message = "Данные успешно обновленны!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else {
                $message = "Ошибка обновления данных!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        
        if ($_SESSION['user_name'] == "admin") {
            $this->view->generate('tasks_view_admin.php', 'template_view.php', $data);
        }
        else {
            $this->view->generate('tasks_view.php', 'template_view.php', $data);
        }
    }
    
}

?>