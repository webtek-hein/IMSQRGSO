<?php

     include 'config.php';
	 
	 // Check whether username or password is set from android	
     if(isset($_POST['username']) && isset($_POST['password']))
     {
		  // Innitialize Variable
		  $result='';
	   	  $username = $_POST['username'];
        $password = $_POST['password'];
		  
        //query the hash
        $hashsql = 'SELECT password FROM user WHERE username = :username';
        $hashstmt = $conn->prepare($hashsql);
        $hashstmt->bindParam(':username', $username, PDO::PARAM_STR);
        $hashstmt->execute();
        $hashpasswords = $hashstmt->fetchAll();
        if ($hashstmt->rowCount()) {
          $salt;
          foreach ($hashpasswords as $hashpassword) {
            $salt = $hashpassword['password'];
          }
          if (password_verify($password, $salt)) {
            $result = "true";
          } else {
            $result = "false";
          }
        } else {
          $result = "false";
        }
		  // Query database for row exist or not
         /* $sql = 'SELECT * FROM user WHERE  username = :username AND password = :password';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);
          $stmt->bindParam(':password', $password, PDO::PARAM_STR);
          $row = $stmt->execute();
          if($stmt->rowCount())
          {
          		$result = "true";
          }  
          elseif(!$stmt->rowCount())
          {
			  	$result="false";
          }*/
		  
		  // send result back to android
   		  echo $result;
  	}
?>