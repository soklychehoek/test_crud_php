<?php
$error=[];
$name="";
$price="";
$note="";

if($_SERVER["REQUEST_METHOD"] == "POST"){  
//1.==create connection
require("connection.php");
//2.==GET DATA FORM FORM
$name = $_REQUEST["name"];
$price = $_REQUEST["price"];
$note = $_REQUEST["note"];

//Validation

if(!$name){
        $error[]="Name is required";
}
if(!$price){
        $error[]="Price is required";
}
if(empty($error)){
        //import global function
 require_once("globalfunction.php");     
 //upload imgaes
     $image=$_FILES['image'] ?? null;
     $imagepath = "";
     if ($image){
         //with random
        //$imagepath = "Image/".randomString(5) .$image['name'];
         //with date
         $imagepath = "Image/".date("YYMMDDhhmm") .$image['name'];
         move_uploaded_file ($image['tmp_name'],$imagepath);
       
    } 
 

//3.==prepare statement
$statement = $pdo->prepare(
    "Insert Into tblproduct(name,price,note,image)
        values(:name,:price,:note,:image)"
);
//4.==BLIND VALUE
$statement->bindValue(":name",$name);
$statement->bindValue(":price",$price);
$statement->bindValue("note",$note);
$statement->bindValue("image",$imagepath);
//5.==Execute
$statement->execute();
//6.==Redirect to list
header("Location: TestProduct.php");
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</head>
<style>
       .col-sm-1 {}
     body {
        padding: 20px;
         }
</style>
<body>
     <div class="add-new-product">
        <h1>Add Product</h1>
       <!--show msg error-->
       <?php require("error.php")?>
        <form  method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3 row">
                        <label for="proName" class="col-sm-1 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                        <input value="<?php echo $name ?>" id="proName" class="form-control" type="text" name="name">
                
                        </div>
                <div class="mb-3 row">
                        <label for="proPrice" class="col-sm-1 col-form-label">Price</label>
                        <div class="col-sm-10">
                        <input value="<?php echo $price ?>" id="proPrice" class="form-control"  type="price" name="price">
                        </div>
                </div>
                <div class="mb-3 row">
                        <label for="proNote" class="col-sm-1 col-form-label">Note</label>
                        <div class="col-sm-10">
                        <textarea value="<?php echo $note ?>" id="proNote" class="form-control"  type="text" name="note"></textarea>
                        </div>
                </div>
                <div class="mb-3 row">
                        <label for="proimage" class="col-sm-1 col-form-label">Photo</label>
                        <div class="col-sm-10">
                        <input id="proimage" class="form-control" type="file" name="image"/>
                </div>
                <button class="btn btn-success" type"submit" style="float: right">Save</button>
        </form>
    
    </div>
</body>
</html>