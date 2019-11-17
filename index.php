<?php
require_once('connection.php');
if(isset($_POST['submit'])){
	if(isset($_POST['firstname']) && !empty(trim($_POST['lastname']))){
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
	} else {
		echo "please input your firstname";
		die;
	}
	if(isset($_POST['password']) && !empty(trim($_POST['password']))){
		if(isset($_POST['conf_password']) && !empty(trim($_POST['conf_password']))){
			if($_POST['conf_password'] != $_POST['password']){
				echo "password n conf pass donot match";
				die;
			}
			/*if(strlen($pass)<= 7){
				echo "password shoulb be greater than 8 characters";
			}*/
			$pass = $_POST['password'];
			
		} else {
			die('456');
		}
	}
	$pass = password_hash($pass, PASSWORD_DEFAULT);
	
		
		if(isset($_POST["hobbies"])){
		$hobbies = '';
		foreach($_POST["hobbies"] as $row){
			$hobbies .= $row . ',';
		}
		$hobbies = substr($hobbies, 0, -2);

		
		
		if(isset($_POST["city"])){
		$city = '';
		foreach($_POST["city"] as $row){
			$city .= $row . ',';
		}
		$city = substr($city, 0, -2);
	
if (!isset($_FILES['photo']['tmp_name'])) {
echo "";
}else{
$file=$_FILES['photo']['tmp_name'];
$photo = $_FILES["photo"] ["name"];
//$image_name= addslashes($_FILES['photo']['name']);
$size = $_FILES["photo"] ["size"];
$error = $_FILES["photo"] ["error"];

		$photo = '';
		foreach($_FILES["photo"] ["name"] as $row){
			$photo .= $row . ',';
		}
		
		$photo = substr($photo, 0, -2);

		move_uploaded_file($_FILES['photo']['tmp_name'], "web/".$_FILES['photo']['name']);
	
				

		
	$results = mysqli_query($connect, 'INSERT INTO image (firstname, lastname, email, password, hobbies, city, photo) VALUES ("'.$fname.'", "'.$lname.'", "'.$email.'", "'.$pass.'", "'.$hobbies.'", "'.$city.'", "'.$photo.'")');
	if($results){
		echo "You have submited your information successfully";
	} else{
		echo mysqli_error($connect);
	}
	}
}
	}
}

	
	
	
		
?>

<!DOCTYPE HTML>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
div{
	margin: 20px auto 0;
}
error{
	
}

</style>
</head>
<body>
	<form method='post' enctype="multipart/form-data" id="selct_hobbies" >
		<div>
			<label>Firstname:<input type='text' name='firstname' value='' /></label>
		</div>
		<div>
			<label>Lastname:<input type='text' name='lastname' value='' /></label>
		</div>
		<div>
			<label>Email:<input type='email' name='email' value='' /></label>
		</div>
		<div>
			<label>Password:<input type='password' id="pwsd" name='password' value='' /></label>
		</div>
		<div>
			<label>Confrim Password:<input type='password' name='conf_password' value='' /></label>
		</div>
		<div>
			<select id="hobbies" name="hobbies[]" multiple="multiple">
				<option value="">Select Your Hobbies</option>
				<option value="reading">Reading</option>
				<option value="writting">Writting</option>
				<option value="cooking">Cooking</option>
				<option value="baking">Baking</option>
				<option value="swmming">Swmming</option>
			</select>
		</div>
		<div>
			<input type="checkbox" name="city[]" value="php">php</br>
			<input type="checkbox" name="city[]" value="c#">c#</br>
			<input type="checkbox" name="city[]" value="css">css</br>
			<input type="checkbox" name="city[]" value="html">html</br>
			<input type="checkbox" name="city[]" value="java">java</br>
			<input type="checkbox" name="city[]" value="js">ja</br>
			<input type="checkbox" name="city[]" value="perl">perl</br>
		</div>
		<div>
			<label>Upload Photo:<input type="file" name="photo[]" multiple="multiple"></label>
		</div>
		<div>
			<input type='submit' name='submit' value='submit' />
		</div>	
	</form>

<?php

	//	$dir = glob('images/{*.jpg,*.png}',GLOB_BRACE);
		//print_r($dir);
?>


</body>
</html>


</script>


		 <script src="https://code.jquery.com/jquery-3.4.1.min.js">
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
		
		
    <script src="jquery.validate.min"></script>
    <script>
        $('form').validate({
            rules: {
                firstname: 'required',
				lastname: 'required',
                email: {
                    required: true,
                    email: true
                },
                password: 'required',
                conf_password: {
                    required: true,
					 maxlength: 8,
                    equalTo: '#pwsd'
                },
                photo: {
                    required: true,
                }
            },
            hobbies: {
                required: true
            }
        },

            city: {
                required: true
            }
        });



    </script>


