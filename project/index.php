<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Website</title>
</head>
<style>
    body{
        background-color: whitesmoke;
    }
    input{
        width: 30%;
        height: 5%;
        border: 1px;
        border-radius: 5px;
        padding: 8px 15px 8px 15px;
        margin: 10px 0px 15px 0px;
        box-shadow: 1px 1px 2px 1px grey;
    }
</style>
<body>
    <form method = "post">
        <center>
            <input type="text" name="txtID" id="txtID" placeholder="Enter ID"><br>
            <input type="text" name="txtName" id="txtName" placeholder="Enter Name"><br>
            <input type="text" name="txtRoll" id="txtRoll" placeholder="Enter Roll No"><br>
            <input type="text" name="txtPass" id="txtPass" placeholder="Enter Password"><br>
            <input type="submit" value="Insert" name="btnIns" style="width: 10%;">
            <input type="submit" value="Update" name="btnUpdate" style="width: 10%;">
            <input type="submit" value="Delete" name="btnDelete" style="width: 10%;">
            <input type="submit" value="Search" name="btnSearch" style="width: 10%;">
            <input type="submit" value="Display Data" name="btnDisplay" style="width: 10%;">
        </center>
    </form>
</body>
</html>

<?php
$cnn = mysqli_connect("localhost","root","","test");

if(isset($_POST["btnDisplay"])){
    header('location:display.php');
}

if(isset($_POST["btnIns"])){
    $id = $_POST["txtID"];
    $name = $_POST["txtName"];
    $roll = $_POST["txtRoll"];
    $pass = $_POST["txtPass"];
    if ($id == "" or $name == "" or $roll == "" or $pass == ""){
        echo '<script>alert("Fields should not be empty")</script>';
    }else{
        $insQuery = "insert into try values('$id','$name','$roll','$pass')";
        mysqli_query($cnn,$insQuery);
    }
}

if(isset($_POST["btnUpdate"])){
    $id = $_POST["txtID"];
    $name = $_POST["txtName"];
    $roll = $_POST["txtRoll"];
    $pass = $_POST["txtPass"];
    $UpdateQuery = "update try set txtName='$name',txtRoll = '$roll', txtPass='$pass' where txtID='$id'";
    mysqli_query($cnn,$UpdateQuery);
}

if(isset($_POST["btnDelete"])){
    $id = $_POST["txtID"];
    if($_POST["txtID"] == ""){
        //echo 'Enter an ID to be Deleted';
        echo '<script>alert("Enter an ID to be Deleted")</script>';
    }else{
        $deleteQuery = "delete from try where txtID = '$id'";
        mysqli_query($cnn,$deleteQuery);
    }
}

if(isset($_POST["btnSearch"])){
    $Sid = $_POST["txtID"];
    $searchQuery="select * from try where txtID='$Sid'";
    $searchQueryRun = mysqli_query($cnn,$searchQuery);
    while($row = mysqli_fetch_array($searchQueryRun)){
        ?>
        <script>
            document.getElementById("txtID").value = "<?php echo $row['txtID']; ?>";
            document.getElementById("txtName").value = "<?php echo $row['txtName']; ?>";
            document.getElementById("txtRoll").value = "<?php echo $row['txtRoll']; ?>";
            document.getElementById("txtPass").value = "<?php echo $row['txtPass']; ?>";
        </script>
    <?php
}
}

?>