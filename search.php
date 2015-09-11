<?php 
    
    include('connection.inc.php');
    if (isset($_GET['name'])) {
        $data = "%".$_GET['name']."%";
        $sql = 'SELECT * FROM employee WHERE name like ?';
        $stmt = $dbConnection->prepare($sql);
        $results = $stmt->execute(array($data));
        $rows = $stmt->fetchAll();
    }
    if(empty($rows)) {
        echo "<tr>";
            echo "<td colspan='4'>There were not records</td>";
        echo "</tr>";
    }
    else {
        foreach ($rows as $row) {
            echo "<tr>";
                echo "<td>".$row['employee_id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['telephone']."</td>";
            echo "</tr>";
        }
    }

?>