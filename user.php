<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Utilisateurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;  
            background-color: #403644;        
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
         
        }
        h1{
            text-align: center;
            margin-top: 85px;
            margin-bottom: 70px;
            color: white;
        }
 
        nav {
            background-color: rgb(255,255,255);
            color: white;
            padding: 15px;
        }
        
 
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            text-align: right;
            
        }
        nav img{
            width:13vw;
            text-align: center;
            margin-top:18px;
        }
        .log{
            margin-top: 13px;
        }
 
        #inscription, #connexion {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFB6C1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        #inscription:hover{
            background-color: #D8BFD8;
        }
 
        #connexion:hover{
            background-color: #F0E68C;
        }
 
        #contenu{
            display:flex;
            justify-content: space-between;
        }
        #txt{
            color:white;
            font-family:Impact,fantasy;
            font-size:20px;
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-top: 25vh;
        }
        form{
        display: flex;
        justify-content: space-between;
        margin: 1%;
        padding: 1%;
        border: solid 2px black;
        width: 85%;
        margin-left:50px;
        border-radius: 15px;
        background-color:#cacadaf5;
        box-shadow: 5px 5px 10px;
        transition: transform 0.3s ease;
        }
        form:hover {
         transform: scale(1.05);
        }
        form p{
         font-size: 13px;
         color: black;
        }
        input[type="submit" i]{
            padding: 10px 20px;
            background-color: #FFB6C1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        input[type="submit" i]:hover{
            background-color: #D8BFD8;
        }
        </style>
</head>
<body>
    <nav> 
        <div id="contenu"> 
            <div> 
                <a href='./indexadmin.php'><img class="logo" src="Asset/quizzeo.png"></a>
            </div>
            <div class='log'> 
             <a href="./index.php" id="inscription">Deconnexion</a> 
            </div>
        </div>
    </nav>

    <h1>Liste Utilisateurs</h1>
    <?php
    session_start(); 
    

    $file=fopen("user.csv","r"); 

    
    while (($line = fgetcsv($file)) !== false) { 
        while (($line = fgetcsv($file)) !== false) { 

        ?>
        <form action="traitement_activation.php?route=<?php echo $line[3]; ?>" method="post"> 
            <p><?php echo $line[0]; ?></p> 
            <p><?php echo $line[3]; ?></p> 
            <p><?php echo $line[4]; ?></p> 
        <div class='supp'>
            <input type="submit" name="action" value="<?php echo  $line[6]; ?>"> 
        </div> 
        </form>
        <?php
        }
    }


fclose($file); 
?>
</body>
</html>