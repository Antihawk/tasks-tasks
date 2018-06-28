<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
        $this->model = new Model();
		$this->view = new View();
	}
	
	function action_index()
	{
        if (isset($_POST['login_post'])){
            $this->model->login_data($_POST['user_name'], $_POST['user_password']);
        }
        if (isset($_POST['login_exit'])){
            $this->model->login_exit();
        }
	}
}

?>