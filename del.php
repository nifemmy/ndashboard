<?php
require_once('connect.php');



$gid =$_GET['id'] ?? '' ;
if(isset($_POST['btn_delete']) && isset($gid)){
        $sql="DELETE FROM employee WHERE id = ?";
        $stmt =$conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $id= $_POST['id'];
        $stmt->execute();

if($stmt){
      $_SESSION['message'] = 'Employee deleted successfully!';
      header('location: index.php');
      return;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>


<p>ARE YOU SURE TO DELETE Employer WITH ID <?=  $gid   ?></p>
    <form action="del.php" method="post">
    <input type="hidden" name="id" value="<?= $gid ?>">
    <button type="submit" name="btn_delete">Delete</button>
    <button type="button" onclick="location.href='index.php' return;">Cancel</button>
    </form>
</body>
</html>