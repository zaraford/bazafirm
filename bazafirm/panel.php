<?php
session_start();

require_once 'db.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'pass');
		
		// echo $login . " " .$password;
		
		$userQuery = $db->prepare('SELECT id,password FROM admins WHERE login = :login');
		$userQuery->bindValue(':login', $login, PDO::PARAM_STR);
		$userQuery->execute();
		
		// echo $userQuery->rowCount();
		
		$user = $userQuery->fetch();
		
		// echo $user['id'] . " " . $user['password'];
		
		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['logged_id'] = $user['id'];
			unset($_SESSION['bad_attempt']);
		} else {
			$_SESSION['bad_attempt'] = true;
			header('Location: admin.php');
			exit();
		}
			
	} else {
		
		header('Location: admin.php');
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="002-settings.ico">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="panel.css">
	<title>Panel</title>
</head>
<body>
	<table>
            <tr>
				<th>
                    Id
                </th>
                <th>
                    Adres tradycyjny
                </th>
                <th>
                    Adres email
                </th>
                <th>
                    Adres strony
                </th>
                <th>
                    Numer telefonu
				</th>
                <th>
                    Dodania wpisu
				</th>
				<th>
                    Edit
				</th>
				<th>
                   	Delete
                </th>
				<?php
					include_once 'panelobr.php';
					$query = "SELECT * FROM `notconfirmed`";
					$userQuery = $db->prepare($query);
					$userQuery->execute();
					foreach($userQuery as $result){
							echo "<tr>";
							
							echo "<td>".$result["id"]."</td>";
							echo "<td>".$result["adres tradycyjny"]."</td>";
							echo "<td>".$result["adres email"]."</td>";
							echo "<td>".$result["adres strony"]."</td>";
							echo "<td>".$result["numer telefonu"]."</td>";
							echo "<form method=\"post\" action=\"panelobr.php\">";
							echo "<td>"."<input type=\"submit\" name=\"dodania\" value=\"Dodania wpisu\">"."</td>";
							echo "<td>"."<input type=\"submit\" name=\"edit\" value=\"Edit\">"."</td>";
							echo "<td>"."<input type=\"submit\" name=\"delete\" value=\"Delete\">"."</td>";
							echo "</form>";

							echo "</tr>";
					}
				?>
			</tr>
	</table>
	<form method="post" action="panelobr.php">
	<label for="text">Ktore chesz wybrac id:</label>
				<input type="text" id="text" name="text">
				<input type="submit" name="select" value="Select">	
			<p><a href="logout.php">Wyloguj się!</a></p>
				</form>
		<!-- <iframe src="panelbazafirmy.php" width="70%" height="500px" frameborder="0"></iframe> -->
</body>
</html>