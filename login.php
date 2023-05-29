<?php 
    if(isset($_POST["nom"])){

    
    if(!empty($_POST["nom"]) && !empty($_POST["tel"]) && is_numeric($_POST["tel"])){
        $nom=$_POST["nom"];
        $tel=$_POST["tel"];
        require("connection.php");
        $query = "select * from passager where tel = :tel and nomComplet = :nomComplet ";
        $stmt=$con->prepare($query);
        $stmt->execute(array(":tel"=>$tel,":nomComplet"=>$nom));
        $data = $stmt->fetch();
        if($nom == $data["nomComplet"] && $tel == $data["tel"]){
            session_start();
            $_SESSION["nom"]=$nom;
            $_SESSION["id"]=$data["id"];
            header("location: aire.php");
            exit();
        }
        header("location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="#" method="post">
        <label for="">nom Complet :</label>
        <input type="text" required name="nom">
        <br>
        <label for="">numero tel :</label>
        <input type="text" required name="tel">
        <br>
        <input type="submit" name="" id="">
    </form>
</body>
</html>