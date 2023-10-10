<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<style>
    table{
        border-collapse: collapse;
        width: 100%;
        color:brown;
        text-align: center;
    }
    td{
        background-color: aquamarine;
        color: black;
        text-align: center;
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll No</th>
        <?php
    $cnn = mysqli_connect("localhost","root","","test");
    $sqlQuery = "select * from try";
    $sqlQueryRun = mysqli_query($cnn,$sqlQuery);

    if($sqlQueryRun ->num_rows > 0){
        while($row = $sqlQueryRun -> fetch_assoc()){
            echo "<tr><td>". $row["txtID"]. "</td><td>". $row["txtName"]. "</td><td>". $row["txtRoll"] ."</td><td>"."</td></tr>";
        }
        echo "</table>";
    }
?>
</body>
</html>