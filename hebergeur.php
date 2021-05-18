<?php

if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $error = 1;

    if ($_FILES['image']['size'] <= 3000000){

        $informationsImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray = array ('jpg', 'png', 'jpeg', 'gif');

        if (in_array($extensionImage, $extensionsArray))
        {
            $address = "uploads/".time().rand().rand().'.'.$extensionImage;
            move_uploaded_file($_FILES['image']['tmp_name'], $address);
            $error = 0;



        }
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hebergeur d'image</title>
</head>
<body>
    <style>
        *{ margin: 15px;
        text-align : center;}

        main {width : 1000px;
        height: 500px;
        background: grey;
        margin: auto;}

        h2 {
            background: red;
            height: 50px;
            color : white;
            font-family : georgia;
        }

        button {text-align : center;
        margin-top: 50px;
            
        }

        input {
            margin-top: 100px;
        }

        #image {
            max-width : 400px;
        }
    </style>
    <header>
        <h1 class="titre">Herbergeur d'image php Amaury</h1>
    </header>    
    <div>
        <h2>Photoshoot</h2>

        <?php
        if(isset($error) && $error == 0){

            echo'<img id="image" src="'.$address.'" />
                <input type="texte" value="http://localhost:8081/Testt/'.$address.'"/>';
        }
        else if (isset($error) && $error ==1){
                echo "Votre image ne peut pas être envoyée, vérifiez la taille ou l'extension";
        }
       
        ?>

        <main>
                <form method="post" action ='hebergeur.php' enctype="multipart/form-data">
                    <p>
                        <input type="file" name='image' /> <br/>
                        <button type="submit">Envoyer</button>

        </main>
    </div>




</body>
</html>