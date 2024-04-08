<?php
include "../../views/admin/header.php";
include_once "../../models/update_product.php";

$productId = $_GET['product_id'];
$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_sp = ?");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

$productId = $product['id_sp'];
$productName = $product['ten_sp'];
$productPrice = $product['gia'];
$productDiscount = $product['gia_km'];
$productImg = $product['hinh'];
$productView = $product['soluotxem'];
$productDesc = $product['mota'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $id = $_POST['id'];

    $sql = "UPDATE sanpham SET ten_sp = :name, mota= :des, gia= :price, gia_km= :sale WHERE id_sp= :id ";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':des', $des);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':sale', $sale);
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();

   echo "Successfully";
   echo "<br>";
   echo "<a href='./show_tables.php'>Back To Table</a>";
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <h2>Edit Product</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="form-group">
        <label for="productPrice">Id Product:</label>
        <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" value="<?= $productId ?>" name = "id">
      </div>
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" class="form-control" id="productName" placeholder="Enter product name" value="<?= $productName?>" name = "name">
      </div>
      <div class="form-group">
        <label for="productDescription">Product Description:</label>
        <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description" value="<?= $productDesc?>" name="des"></textarea>
      </div>
      <div class="form-group">
        <label for="productPrice">Product Price:</label>
        <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" value="<?= $productPrice?>" name="price">
      </div>
      <div class="form-group">
        <label for="productPrice">Product Price Sale:</label>
        <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" value="<?= $productDiscount?>" name = "sale">
      </div>
     
     
      <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include "../../views/admin/footer.php";
?>