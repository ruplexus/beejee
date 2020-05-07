<?php

	class Model_Main extends Model {

		// добавляем задачу в базу данных
		public function add_task($name, $email, $text, $status){
			
			// защита от SQL иньекций
			$name = $this->db->real_escape_string($name);
			$email = $this->db->real_escape_string($email);
			$text = $this->db->real_escape_string($text);
			$status = $this->db->real_escape_string($status);

			// отключаем тэги (защита от XSS)
			$text = htmlspecialchars($text);

			// осуществляем добавление строки в таблицу
			$result = $this->db->query('INSERT INTO `tasks`(`NAME`, `EMAIL`, `TEXT`, `STATUS`, `CREATED`) VALUES (\''.$name.'\', \''.$email.'\', \''.$text.'\', \''.$status.'\', \''.date('Y-m-d H:i:s').'\');');

			if($result){
				return true;
			} else {
				return false;
			}

		}

		// редактируем задачу в базе данных
		public function edit_task($task_id, $name, $email, $text, $status){
			
			// защита от SQL иньекций
			$name = $this->db->real_escape_string($name);
			$email = $this->db->real_escape_string($email);
			$text = $this->db->real_escape_string($text);
			$status = $this->db->real_escape_string($status);

			// отключаем тэги (защита от XSS)
			$text = htmlspecialchars($text);

			// осуществляем добавление строки в таблицу
			$result = $this->db->query('UPDATE `tasks` SET `NAME` = \''.$name.'\', `EMAIL` = \''.$email.'\', `TEXT` = \''.$text.'\', `STATUS` = \''.$status.'\', `LAST_CHANGE` = \''.date('Y-m-d H:i:s').'\' WHERE `ID` = '.$task_id.';');

			if($result){
				return true;
			} else {
				return false;
			}

		}

		// удаляем задачу из базы данных
		public function delete_task($task_id){

			// осуществляем добавление строки в таблицу
			$result = $this->db->query('DELETE FROM `tasks` WHERE `ID` = \''.$task_id.'\';');

			if($result){
				return true;
			} else {
				return false;
			}

		}

		// получаем список задач
		public function get_list(){
			
			$result = $this->db->query('SELECT * FROM `tasks` ORDER BY `ID` DESC;');

			$rows = array();

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = $row;
			}

			return $rows;
			
		}

		public function get_data(){
			return $this->get_list();
		}

	}