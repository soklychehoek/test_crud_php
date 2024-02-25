<?php
//Connection
require("connection.php");
//Prepare
$statement =$pdo->prepare("select * from TblProduct");
//Execute Query
$statement->execute();
//Get Data
$productlist = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
  .btn{
            margin: 1px 3px;
         }
</style>
<body>
<div class="container">
    <h1>Product</h1>
    <a href="Add.php"> <button type="button" class="btn btn-warning" style="float: right" >+Add Product</button></a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Note</th>
      <th scope="col">Status</th>
      <th scope="col">Attachment</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php foreach($productlist as $key => $pro){?>
    <tr>
      <th scope="row"><?php echo $key +1 ?></th>
      <td><?php echo $pro['name']?></td>
      <td><?php echo $pro['price']?></td>
      <td><?php echo $pro['note']??"No Detail"?></td>
      <td><?php echo $pro['price'] > 20 ? "High Price" : "Low Price" ?></td>
      <td><img style="width: 30px; height: 30px"src="<?php echo $pro['image']?? "?>"></td>
      <td>
      <a href="delete.php?id=<?php echo $pro['id'] ?>" type="button" class="btn btn-danger"  ><i class="bi bi-trash"></i></button>
      <a href="edit.php?id=<?php echo $pro['id'] ?>"type="button" class="btn btn-success"  ><i class="bi bi-pencil-square"></i></button>
      </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
</div>
</body>
</html>