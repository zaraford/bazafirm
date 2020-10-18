<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="001-home.ico">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza firm od Vlada</title>
</head>
<body>
    <div id="logo">Baza firm od Vlada</div>
    <div id="wrapper">
            <form action="obrobka.php" method="post">
                <div class="columns">
                    <!-- <label for="Adres tradycyjny">Adres tradycyjny</label> -->
                    <input type="text" id="Adres tradycyjny" name="tradycyjny" placeholder="Adres tradycyjny" require>
                </div>
                <div class="columns">
                    <!-- <label for="Adres email">Adres email</label> -->
                    <input type="text" id="Adres email" name="email" placeholder="Adres email" require>
                </div>
                <div class="columns">
                    <!-- <label for="Adres strony">Adres strony internetowej</label> -->
                    <input type="text" id="Adres strony" name="strony" placeholder="Adres strony internetowej" require> 
                </div>
                <div class="columns">
                    <!-- <label for="Numer tel">Numer telefonu</label> -->
                    <input type="text" id="Numer tel" name="tel" placeholder="Numer telefonu" require>      
                </div>
                <div class="columns">
                    <input type="submit" id='dontvisible'>
                </div>
                <div class="columns">
                    <input type="submit" name="btnDodaj" value="Dodaj">
                </div>
                <div class="columns">
                    <input type="submit" name="btnSzukaj" value="Szukaj">
                </div>
            </form>
        </div>
        <?php
        
        
        
        ?>
    </body>
</html>