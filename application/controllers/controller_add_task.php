<?php

class Controller_add_task extends Controller
{
    
    function __construct()
	{
		$this->model = new Model_add_task();
		$this->view = new View();
	}
	
	function action_index()
	{	
        
        $this->view->generate('add_task_view.php', 'template_view.php');
        
        $bool_result = false;
        if (isset($_POST['do_post'])){
            if( $_POST['inp-name'] == "" || $_POST['inp-email'] == "" || $_POST['inp-text'] == ""){
                $message = "Заполните пустые поля!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
                $bool_result = $this->model->send_data_toserver($_POST['inp-name'], $_POST['inp-email'], $_POST['inp-text'], 
                                                            $_FILES["picture"]["name"], $_FILES["picture"]["tmp_name"],
                                                            $_FILES["picture"]["size"]);
            }
            
            if($bool_result){
                $message = "Данные успешно отправленны!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else {
                $message = "Ошибка отправки данных!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
	}
    
}

?>