<?php
	require_once $globe->g_root() . '/Model/Database.php';
	
	class Event {
		function addEvent($poster, $title, $date, $description) {
			$globe = new Globe();
			
			$table = "event";
			$columns = 'event_poster_id, event_title, event_startdate, event_description';
			$values = ':event_poster_id, :event_title, :event_startdate, :event_description';
			$array = array(
				"event_poster_id" => $poster,
				"event_title" => $title,
				"event_startdate" => $date,
				"event_description" => $description
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->insert($table, $columns, $values, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}
		}

		function getAllEvents() {
			$table = 'event';

			$db = new Database();
			$resultArr = $db->selectAll($table);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}

		function getEventDetails($event_id) {
			$table = 'event';
			$columns = '*';
			$where = 'event_id = :event_id';
			$array = array(
				':event_id' => $event_id
			);

			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
	}
?>