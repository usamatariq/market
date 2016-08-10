<?php
	require_once $globe->g_root() . '/COMMON/Model/Database.php';
	
	class Job {		
		function addJob($poster, $title, $type, $pay, $startdate, $starttime, $enddate, $endtime, $venue, $description, $status) {
			$globe = new Globe();			
				
			date_default_timezone_set('Asia/Singapore');//to shift to head.php
	
			$date = date('Y-m-d  H:i:s');
			$time = date ('H:i:s');
			$expiry = date('Y-m-d', strtotime("+60 days", strtotime($date)));
			
			$table = "job";
			$columns = 'job_poster_id, job_title, job_date, job_expirydate, job_time, job_type_id, job_pay, job_startdate, job_starttime, job_enddate, job_endtime, job_venue, job_description, job_status';
			$values = ':job_poster_id, :job_title, :job_date, :job_expirydate, :job_time, :job_type_id, :job_pay, :job_startdate, :job_starttime, :job_enddate, :job_endtime, :job_venue, :job_description, :job_status';
			$array = array(
				"job_poster_id" => $poster,
				"job_title" => $title,
				"job_date"=>$date,
				"job_expirydate"=>$expiry,
				"job_time"=>$time,
				"job_type_id" => $type,
				"job_pay" => $pay,
				"job_startdate" => $startdate,
				"job_starttime" => $starttime,
				"job_enddate" => $expiry,
				"job_endtime" => $endtime,
				"job_venue"=> $venue,
				"job_description" => $description,
				"job_status" => $status
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
		
		function updateJob($jobID, $poster, $title, $type, $pay, $venue, $description) {
			$globe = new Globe();			
				
			date_default_timezone_set('Asia/Singapore');
	
			$date = date('Y-m-d');
			$time = date ('H:i:s');
			
			$table = "job";
			$set = 'job_poster_id=:job_poster_id, 
					job_title=:job_title,  
					job_time=:job_time, 
					job_type_id=:job_type_id, 
					job_pay=:job_pay,  
					job_venue=:job_venue, 
					job_description=:job_description';
						
			$where = 'job_id=:job_id';
			$array = array(
				":job_id" => $jobID,
				":job_poster_id" => $poster,
				":job_title" => $title,
				":job_time"=>$time,
				":job_type_id" => $type,
				":job_pay" => $pay,
				":job_venue"=> $venue,
				":job_description" => $description
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->update($table, $set, $where, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}
		}	
		
		//not in use refer to getJobs()
		function getAllJobs() {
			$table = 'job';

			$db = new Database();
			$resultArr = $db->selectAll($table);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}

		function getJobs($search, $jobtype, $sort, $page=0, $limit=0) {
			
			//SEARCH
			$parts = explode(" ",trim($search));
			$clauses=array();
			
			foreach ($parts as $part){
			$clausestext[]=" job_description LIKE '%" .$part."%'";
			$clausestitle[]=" job_title LIKE '%" .$part."%'";
			}
			
			$clausetext=implode('AND' ,$clausestext);
			$clausetitle=implode('AND' ,$clausestitle);
			
			//FILTER
			$type = " job_type_id = '" .$jobtype."'";
			$status =" job_status = '1'";
			$today = date("Y-m-d");
			$dateStatus = " job_enddate > '".$today."'";
			
			if ($jobtype=='0')
			{
				$clause =  '('.$clausetext.'OR'.$clausetitle.')';
			} else
					{
					$clause =  '('.$clausetext.'OR'.$clausetitle.')'.'AND'.$type;
					}
			$clause .= 'AND'.$status;
			$clause .= 'AND'.$dateStatus;
			$table = 'job';
			$columns = '*';
			$where = $clause;
			
			// DATA
			$db = new Database();
			$resultArr = $db->search($table, $columns, $where, $sort, $page, $limit);
	
			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
			
		function getUserPostedJobs($username, $sort='job_enddate', $page=0, $limit=0) {
			$table = 'job';
			$columns = '*';
			$where = 'job_poster_id = '.$username.' AND job_status = 1';

			$db = new Database();
			$resultArr = $db->search($table, $columns, $where, $sort, $page, $limit);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}

		function countUserPostedJobs($username) {
			$table = 'job';
			$columns = '*';
			$where = 'job_poster_id = :job_poster_id';
			$array = array(
				':job_poster_id' => $username
			);
			
			$db = new Database();
			$resultArr = $db->countSel($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
		
		function getUserAppliedJobs($username, $sort='job_enddate', $page=0, $limit=0) {
			$table = 'employ, job';
			$columns = '*';
			$where = 'employ.applier = '.$username.' AND employ.id = job.job_id AND employ.status = "0" AND job_status = 1';

			$db = new Database();
			$resultArr = $db->search($table, $columns, $where, $sort, $page, $limit);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
		
		function checkUserAppliedJobs($userid,$jobid) {
			$table = 'employ';
			$columns = '*';
			$where = 'employ.id=:jobid AND employ.applier=:applier';
			$array = array(
				':jobid' => $jobid,
				':applier' => $userid
			);
			
			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);
				
				if(is_array($resultArr)) {
					return $resultArr;
				}
				else {
				return false;
				}	
			
		}
		
		function getApplicants($jobID) {
			$table = 'employ';
			$columns = '*';
			$where = 'employ.id = :jobid';
			$array = array(
				':jobid' => $jobID
			);

			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}

		function acceptApplicant($jobID, $applicant) {
			$table = 'employ';
			$set = 'accepted=:accepted';
			$where = 'id=:jobID AND applier=:applicant';
			$array = array(
				':accepted' => 1,
				':jobID' => $jobID,
				':applicant' => $applicant
			);

			$db = new Database();
			$result = $db->update($table, $set, $where, $array);

			return true;
		}

		function rejectApplicant($jobID, $applicant) {
			$table = 'employ';
			$set = 'accepted = :accepted';
			$where = 'id = :jobid AND applier = :applicant';
			$array = array(
				':accepted' => 2,
				':jobid' => $jobID,
				':applicant' => $applicant
			);

			$db = new Database();
			$result = $db->update($table, $set, $where, $array);

			return $result;
		}
		
		function signupForJob($applier, $jobID) {
			$globe = new Globe();

			$table = "employ";
			$columns = 'applier, id, accepted';
			$values = ':applier, :id, :accepted';
			$array = array(
				"applier" => $applier,
				"id" => $jobID,
				"accepted" => 0
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
		
		function removeJob($userID,$jobID)	{
			$globe = new Globe();
			
			$table1 = "job";
			$table2 = "employ";
			$condition1 = "job_poster_id = :job_poster_id AND job_id = :job_id";
			$condition2 = 'id = :job_id';
			$array1 = array(
				':job_poster_id' => $userID,
				':job_id' => $jobID
			);
			$array2 = array(
				':job_id' => $jobID
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->deleteRowByCondition($table1, $condition1, $array1)) {
				$db->deleteRowByCondition($table2, $condition2, $array2);
					return true;
				}
				else {
					return false;
				}	
			}	
		}
		
		function closeJob($userID,$jobID) {
			$globe = new Globe();			
				
			$table = "job";
			$set = 'job_status=:job_status ';						
			$where = 'job_poster_id=:job_poster_id AND job_id = :job_id';
			$array = array(
				":job_status" => 0,
				":job_poster_id" => $userID,
				":job_id" => $jobID
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->update($table, $set, $where, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}
		}
		
		function openJob($userID,$jobID) {
			$globe = new Globe();			
				
			$table = "job";
			$set = 'job_status=:job_status ';						
			$where = 'job_poster_id=:job_poster_id AND job_id = :job_id';
			$array = array(
				":job_status" => 1,
				":job_poster_id" => $userID,
				":job_id" => $jobID
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->update($table, $set, $where, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}
		}
		
		
		function unapplyJob($userID,$jobID)	{
			$globe = new Globe();

			$table = "employ";
			$condition = "applier = :applier_id AND id = :job_id";
			$array = array(
				':applier_id' => $userID,
				':job_id' => $jobID
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->deleteRowByCondition($table, $condition, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}	
		}
		
		function deleteUnapplyJob($userID,$jobID) {
			$globe = new Globe();			
				
			$table = "employ";
			$set = 'status=:status ';						
			$where = 'applier=:applier_id AND id = :job_id';
			$array = array(
				":status" => 1,
				":applier_id" => $userID,
				":job_id" => $jobID
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->update($table, $set, $where, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}
		}
			
		
		function getJobFromID($job_id) {
			$table = 'job';
			$columns = '*';
			$where = 'job_id = :job_id';
			$array = array(
				':job_id' => $job_id
			);

			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		
		}
		
		function getPosterFromID($job_id) {
			$table = 'job';
			$columns = '*';
			$where = 'job_id = :job_id';
			$array = array(
				':job_id' => $job_id
			);

			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['job_poster_id'];
			}
			return false;
		
		}

		function getAllJobtype() {
			$table = 'job_type';

			$db = new Database();
			$resultArr = $db->selectAll($table);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
		
		function getJobtypeFromTypeid($jobtype_id) {
			$table = 'job_type';
			$columns = '*';
			$where = 'jobtype_id = :jobtype_id';
			$array = array(
				':jobtype_id' => $jobtype_id
			);

			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['jobtype_name'];
			}
			return false;
		
		}

		function getAllJobBudget() {
			$table = 'job_type';

			$db = new Database();
			$resultArr = $db->selectAll($table);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
		
		function getJobBudgetFromBudgetid($jobtype_id) {
			$table = 'job_type';
			$columns = '*';
			$where = 'jobtype_id = :jobtype_id';
			$array = array(
				':jobtype_id' => $jobtype_id
			);

			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['job_budget'];
			}
			return false;
		
		}
		
		
	}
?>