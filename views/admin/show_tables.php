<?php
include "../../views/admin/header.php";
include_once "../../models/update_product.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
            <a class="btn btn-primary" href="./create_tables.php" role="button">Create Product</a>
            <?php 
              if(isset($_GET['success'])) {
            ?>
            <div class="alert alert-success">
                <?php
                    echo $_GET['success'];
                ?>
            </div>
            <?php
              }
            ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price sale</th>
                            <th>Price</th>
                            <th>Views</th>
                            <th>Method</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price sale</th>
                            <th>Price</th>
                            <th>Views</th>
                            <th>Method</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['ten_sp'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        $price_sale = $row['gia_km'];
                                        $formatted_price_sale = number_format($price_sale, 0, ',', '.');
                                        echo $formatted_price_sale;
                                        ?> VNĐ
                                    </td>
                                    <td>
                                        <?php
                                        $price = $row['gia'];
                                        $formatted_price = number_format($price, 0, ',', '.');
                                        echo $formatted_price;
                                        ?> VNĐ
                                    </td>
                                    <td>
                                        <?= $row['soluotxem'] ?>
                                    </td>
                                    <th>
                                <a href="./delete_tables.php?product_id=<?= $row['id_sp']?>">Delete</a>
                                ||
                                <a href="./edit_tables.php?product_id=<?= $row['id_sp']?>">Edit</a>
                            </th>
                                </tr>
                            <?php
                            }
                        } else {
                            echo 'No product found';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include "../../views/admin/footer.php";
?>

