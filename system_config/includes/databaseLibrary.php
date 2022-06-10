<?php
class Database {

	function create_database($data)
	{
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');
		if(mysqli_connect_errno())
			return false;
		$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);
		$mysqli->close();
		return true;
	}

	function create_tables($data)
	{
		
		$conn = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);
		if(mysqli_connect_errno())
			return false;

		if (!$conn->select_db($data['database'])) {
		    $msg = "Sorry ".$data['database']." databse NOT EXISTS Please import The database first";
			return ['st'=>false,'msg'=>$msg];
			exit();
		}else{

			if ($result = $conn->query("select 1 from settings")) {
				return ['st'=>true,'msg'=>''];
			}else {
				$msg = "sorry Setting table not exits Please import The database first";
				return ['st'=>false,'msg'=>$msg];
			}

			
		}

	}

	function registration($data){
			$conn = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);
			if(mysqli_connect_errno())
				return false;

			$version = 2.5;
			$conn->query("SET sql_mode = ''");
			$form_data = array(
				'site_name' => $data['base_url'],
				'username'  => $data['name'],
				'email'  => $data['email'],
				'script_name'  => "Qmenu",
				'version'  => $version,
			);

			
			$form_data = json_encode($form_data);
			$ch = curl_init("https://thinkncode.net/site_api/install-script");  
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $form_data);                   
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($ch, CURLOPT_POST, 1);                                          
			$result = curl_exec($ch);
			curl_close($ch);
			$result = json_decode($result);
			$username = mysqli_real_escape_string($conn,$data['name']);
			$email = mysqli_real_escape_string($conn,$data['email']);
			$password = md5(mysqli_real_escape_string($conn,$data['pass']));
			$user_role =  1;
			$site_id =  $result->site_id;
			if(isset($site_id) && $site_id !=0):
				$dt = new DateTime('now',new DateTimezone('Asia/Dhaka'));
	       		$date = $dt->format('Y-m-d H:i:s');

				$get = "SELECT * FROM settings WHERE site_id ='$site_id'"; 
				$result = $conn->query($get);
				if(isset($result) && $result->num_rows > 0){
					$update = "UPDATE settings SET site_id=$site_id,version='$version',created_at='$date' WHERE site_id=".$site_id;

					$insert = $conn->multi_query($update);

				}else{
					$sql = "INSERT INTO settings (site_id,version,created_at) VALUES ($site_id,'$version','$date')";

					$insert = $conn->multi_query($sql);
				}
				if($insert){
					return true;
				}else{
					echo $conn->error;
				}
			endif;
	}

}



