<?php

	class Model {

		protected $db;

		public function __construct(){

			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_BNAME);

			$this->db->set_charset('utf8');

		}

		// проверяем пользователя
		public function is_authorize($login, $password, $md5 = true){
			
			// защита от SQL иньекций
			$login = $this->db->real_escape_string($login);
			$password = $this->db->real_escape_string($password);

			if($md5){
				$password = md5($password);
			}

			// осуществляем добавление строки в таблицу
			$result = $this->db->query('SELECT * FROM `users` WHERE `LOGIN` = \''.$login.'\' AND `PASSWORD` = \''.$password.'\';');

			if(count($result->fetch_array(MYSQLI_ASSOC)) > 1){
				return true;
			} else {
				return false;
			}

		}

		public function get_data(){
			
		}

	}