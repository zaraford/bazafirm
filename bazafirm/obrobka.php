<?php
    require_once 'db.php';
    $tradycyjny = filter_input(INPUT_POST, 'tradycyjny');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $strony = filter_input(INPUT_POST, 'strony', FILTER_VALIDATE_URL);
    $tel = filter_input(INPUT_POST, 'tel');
    $tel = str_replace(' ', '', $tel);
    // $tel = filter_input(INPUT_POST,$tel, FILTER_VALIDATE_INT);

    if (isset($_POST['btnDodaj'])) {
        $query = "INSERT INTO `notconfirmed`(`id`, `adres tradycyjny`, `adres email`, `adres strony`, `numer telefonu`) VALUES ('',:tradycyjny,:email,:strony,:tel);";
        $userQuery = $db->prepare($query);
        $userQuery->bindValue(':tradycyjny', $tradycyjny, PDO::PARAM_STR);
        $userQuery->bindValue(':email', $email, PDO::PARAM_STR);
        $userQuery->bindValue(':strony', $strony, PDO::PARAM_STR);
        $userQuery->bindValue(':tel', $tel, PDO::PARAM_STR);
        $userQuery->execute();
        $result = $userQuery->fetch();
        header('Location: index.php');
		exit("All GOOD");
    } else {
        $query = "SELECT `adres tradycyjny`,`adres email`,`adres strony`,`numer telefonu` FROM `firmy` WHERE `adres tradycyjny` LIKE '%:tradycyjny%'";
        $userQuery = $db->prepare($query);
        $userQuery->bindValue(':tradycyjny', $tradycyjny, PDO::PARAM_STR);
        $userQuery->bindValue(':email', $email, PDO::PARAM_STR);
        $userQuery->bindValue(':strony', $strony, PDO::PARAM_STR);
        $userQuery->bindValue(':tel', $tel, PDO::PARAM_STR);
        $userQuery->execute();
        $result = $userQuery->fetch();
        // if($result['adres email'] || $result['adres strony'] == null ){
        //     echo"Puste";
        // }
        header('Location: prezentacja.php');
		exit();
    }
?>