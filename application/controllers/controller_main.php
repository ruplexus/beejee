<?php

	class Controller_Main extends Controller {

		function __construct(){

			$this->model = new Model_Main();
			$this->view = new View();

		}
	
		function action_index(){
			
			$is_authorize = false; 
			
			// проверяем авторизован ли пользователь
			if(isset($_SESSION['LOGIN']) && isset($_SESSION['PASSWORD']) && !empty($_SESSION['LOGIN']) && !empty($_SESSION['PASSWORD'])){

				if($this->model->is_authorize($_SESSION['LOGIN'], $_SESSION['PASSWORD'], false)){
					$is_authorize = true;
				}

			}

			// выходим из аккаунта
			if(isset($_POST['closed_session']) && !empty($_POST['closed_session'])){

				session_destroy();

				exit('1');

			}

			// обрабатываем запрос на добавление задачи
			if(isset($_POST['form_add_task']) && !empty($_POST['form_add_task'])){
				
				$status = $this->model->add_task($_POST['form_add_task_name'], $_POST['form_add_task_email'], $_POST['form_add_task_text'], $_POST['form_add_task_status']);
				
				if($status){
					exit('1');
				} else {
					exit('0');
				}

			}

			// обрабатываем запрос на редактирование задачи
			if(isset($_POST['form_edit_task']) && !empty($_POST['form_edit_task'])){
				
				if(!$is_authorize){
					exit('0');
				}

				$status = $this->model->edit_task($_POST['form_edit_task_task_id'], $_POST['form_edit_task_name'], $_POST['form_edit_task_email'], $_POST['form_edit_task_text'], $_POST['form_edit_task_status']);
				
				if($status){
					exit('1');
				} else {
					exit('0');
				}

			}

			// удаляем задачу из базы данных
			if(isset($_POST['delete_task']) && is_numeric($_POST['delete_task_id'])){

				if(!$is_authorize){
					exit('0');
				}

				$status = $this->model->delete_task($_POST['delete_task_id']);
				
				if($status){
					exit('1');
				} else {
					exit('0');
				}

			}

			$data = array();

			$data['IS_AUTH'] = $is_authorize;
			$data['LIST'] = $this->model->get_data();
	
			$this->view->generate('main_view.php', $data);

		}

	}