<?php

	class Controller_Auth extends Controller {

		function __construct(){

			$this->model = new Model_Auth();
			$this->view = new View();

		}
	
		function action_index(){
			
			$is_authorize = false; 

			if(isset($_SESSION['LOGIN']) && isset($_SESSION['PASSWORD']) && !empty($_SESSION['LOGIN']) && !empty($_SESSION['PASSWORD'])){

				if($this->model->is_authorize($_SESSION['LOGIN'], $_SESSION['PASSWORD'], false)){
					header('Location: /');exit;
				}

			}

			// авторизуемся
			if(isset($_POST['form_auth']) && !empty($_POST['form_auth']) && $is_authorize == false){

				$checking = false;

				if(isset($_POST['form_auth_login']) && !empty($_POST['form_auth_login']) && isset($_POST['form_auth_password']) && !empty($_POST['form_auth_password'])){
					$checking = true;
				}

				$checking = $this->model->is_authorize($_POST['form_auth_login'], $_POST['form_auth_password']);

				if($checking){

					// формируем простые сессии авторизации
					$_SESSION['LOGIN'] = $_POST['form_auth_login'];
					$_SESSION['PASSWORD'] = md5($_POST['form_auth_password']);

					exit('1');

				} else {
					exit('0');
				}

			}

			$data = $this->model->get_data();
	
			$this->view->generate('auth_view.php', $data);

		}

	}