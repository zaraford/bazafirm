<?php

require_once 'panel.php';
require_once 'db.php';

 if(isset($_POST['select'])){
				$selectid = htmlspecialchars($_POST['text']);
				$query = "SELECT * FROM `notconfirmed` WHERE `id` = '$selectid' ";
				$userQuery = $db->prepare($query);
				$userQuery->execute();
				$result = $userQuery->fetch();
				$id = $result['id'];
				$tradycyjny = $result['adres tradycyjny'];
				$email = $result['adres email'];
				$strony = $result['adres strony'];
                $tel = $result['numer telefonu'];
                if(isset($_POST['dodania'])){
					// $query = "INSERT INTO `firmy`(`id`, `adres tradycyjny`, `adres email`, `adres strony`, `numer telefonu`) VALUES ('','$tradycyjny','$email','$strony','$tel')";
					// $userQuery = $db->prepare($query);
					// $userQuery->execute();
                    print("Test1");
                    header('Location: panel.php');
		                exit("All GOOD");
				}
				if(isset($_POST['edit'])){
					// $query = "UPDATE `notconfirmed` SET `id`='',`adres tradycyjny`='$tradycyjny',`adres email`='$email',`adres strony`='$strony',`numer telefonu`='$tel' WHERE id = '$id' ;";
					// $userQuery = $db->prepare($query);
					// $userQuery->execute();
                    print("Test2");
                     header('Location: panel.php');
		                exit("All GOOD");
				}
				if(isset($_POST['delete'])){
					$query = "DELETE FROM `notconfirmed` WHERE id = '$id'";
					$userQuery = $db->prepare($query);
					$userQuery->execute();
                    print("Test3");
                     header('Location: panel.php');
		                exit("All GOOD");
				}
            }

?>