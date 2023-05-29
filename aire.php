<?php 
    require("filter_session.php");
    $query = "select * from aire";
    require("connection.php");
    $result=$con->query($query);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
    <a href="logout.php">Logout</a>
    <table border="1" cellspacing="0">
    <thead>
        <th>
            ID
        </th>
        <th>
            Libelle
        </th>
        <th>
            Ville
        </th>
        <th>
            Action
        </th>
    </thead>
        <?php 
            for($i = 0; $i<count($data);$i++){
                ?>
                <tr>
                    <td>
                        <?= $data[$i]["id"] ?>
                    </td>
                    <td>
                        <?= $data[$i]["libelle"] ?>
                    </td>
                    <td>
                        <?= $data[$i]["Ville"] ?>
                    </td>
                    <td>
                        <a href="reservation.php?id=<?=$data[$i]["id"] ?>">Reserver</a>
                    </td>
                </tr>
                
                <?php 
                
            }
        ?>
</table>

