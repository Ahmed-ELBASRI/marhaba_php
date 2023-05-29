<?php
if (isset($_POST["nom"])) {
    $face1cin = $_FILES["face1cin"];
    $face2cin = $_FILES["face2cin"];
    $ext1 = explode(".",$face1cin["name"]);
    $ext2 = explode(".",$face2cin["name"]);
    if (!empty($_POST["nom"]) && !empty($_POST["tel"]) && !empty($_POST["nbrPer"]) && !empty($_POST["nbrVoi"]) && is_numeric($_POST["tel"]) && is_numeric($_POST["nbrPer"]) && is_numeric($_POST["nbrVoi"]) && $ext1[1]=="jpg" && $ext2["1"]=="jpg" && preg_match('/(05|06)[0-9]{8}/',$_POST["tel"])) {
        $nom = $_POST["nom"];
        $tel = $_POST["tel"];
        $nbrPer = $_POST["nbrPer"];
        $nbrVoi = $_POST["nbrVoi"];
        $recto=md5($ext1[0]);
        $verso=md5($ext2[1]);
        move_uploaded_file($face1cin["tmp_name"],$recto.".".$ext1[1]);
        move_uploaded_file($face2cin["tmp_name"],$verso.".".$ext2[1]);
        $query = "insert into passager values(NULL,:tel,:nomComplet,:nbrPersonnes,:nbrVoitures,:face1cin,:face2cin)";
        require("connection.php");
        $stmt = $con->prepare($query);
        $stmt->execute(array(":tel" => $tel, ":nomComplet" => $nom, ":nbrPersonnes" => $nbrPer, ":nbrVoitures" => $nbrVoi,":face1cin"=>$recto.".".$ext1[1],":face2cin"=>$verso.".".$ext2[1]));
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <a href="login.php">login</a>
        <br>
        <label for="">numero tel :</label>
        <input type="text" required pattern="(05|06)\d{8}$" name="tel">
        <br>
        <label for="">nom Complet :</label>
        <input type="text" required name="nom">
        <br>
        <label for="">nbr personnes :</label>
        <input type="text" required name="nbrPer">
        <br>
        <label for="">nbr voitures :</label>
        <input type="text" required name="nbrVoi">
        <br>
        <label for="">face 1 cin :</label>
        <input type="file" required name="face1cin">
        <br>
        <label for="">face 2 cin :</label>
        <input type="file" required name="face2cin">
        <br>
        <input type="submit">
    </form>
</body>

</html>