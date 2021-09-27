<?php
    	/* Subscribe form */
		function Subscribing($var){
			require 'DB/db_conn.php';
			if(isset($_POST['submit_2']))
			{
				$email = strtolower($_POST['email']);

				if(empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
				{
					echo '<script>if(confirm("Invalid Email, try again !")){
									window.location.href = "http://localhost/weather'?><?php echo($var)?>"
								}else{
									window.location.href = "http://localhost/weather<?php echo($var)?>"
								}
						</script>';?><?php
				}else{
					$conn = getDB();
					$sql = "INSERT INTO subscribing(email) VALUES('".$email."')";
					$results = mysqli_query($conn, $sql);
			
					if($results === false){
						echo '<script>if(confirm("Error try again !")){
							window.location.href = "http://localhost/weather'?><?php echo($var)?>"
						}else{
							window.location.href = "http://localhost/weather<?php echo($var)?>"
						}
						</script>';?><?php
					}else{
						echo '<script>alert("Success Operation !");</script>';
					}
				}       
			}
		}
?>