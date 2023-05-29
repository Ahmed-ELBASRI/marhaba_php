<?php
require("filter_session.php");
if (!empty($_POST["dateReservation"])) {
    $dateReservation = $_POST["dateReservation"];
    $date= explode("T",$dateReservation);
    $date= explode("-",$date[0]);
    if(checkdate($date[1],$date[2],$date[0])){
        $idPassager = $_SESSION["id"];
        $idAire = $_GET["id"];
        require("connection.php");
        $query = "insert into reservation values(NULL,:idPassager,:idAire,:dateReservation)";
        $stmt = $con->prepare($query);
        $stmt->execute(array(":idPassager" => $idPassager, ":idAire" => $idAire, ":dateReservation" => $dateReservation));
        header("location: aire.php");
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
        <a href="logout.php">Logout</a>
        <label for="">date reservation :</label>
        <input type="date" required name="dateReservation">
        <br>
        <input type="submit" name="" id="">
    </form>
</body>

</html>