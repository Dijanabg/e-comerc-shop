<?php
include_once "../middleware/adminMiddleWare.php";
include_once "includes/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getById('products', $id);

                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);

            ?>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4>Edit Product
                                <a href="products.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12  mb-2">
                                        <label for="">Select category</label>

                                        <select name="category_id" class="form-select">
                                            <option selected>Select category</option>
                                            <?php
                                            $category = getAll("categories");

                                            if (mysqli_num_rows($category) > 0) {
                                                foreach ($category as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category'] = $item['id'] ? "selected" : ""; ?>><?= $item['name'] ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Name</label>
                                        <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter product name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Slug</label>
                                        <input type="text" required name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Small description</label>
                                        <input type="text" required name="small_description" value="<?= $data['small_description']; ?>" placeholder="Enter small description" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Description</label>
                                        <input type="text" required name="description" value="<?= $data['description']; ?>" placeholder="Enter description" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Original_price</label>
                                        <input type="text" required name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter original price" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Selling price</label>
                                        <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter selling price" class="form-control  mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Upload image</label>
                                        <input type="hidden" name="old_image" value=" <?= $data['image']; ?>">
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label class="mb-0" for="">Current image</label>
                                        <img src="../uploads/<?= $data['image']; ?>" alt="Product image" width="50px" height="50px">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0" for="">Quantity</label>
                                            <input type="text" required name="qty" value="<?= $data['qty']; ?>" placeholder="Enter quantity" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-3  mb-2">
                                            <label class="mb-0" for="">Status</label><br>
                                            <input type="checkbox" name="status" <?= $data['status'] == '0' ? '' : 'checked'; ?>>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-0" for="">Trending</label><br>
                                            <input type="checkbox" name="trending" <?= $data['trending'] == '0' ? '' : 'checked'; ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Meta title</label>
                                        <input type="text" required name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter meta title" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Meta description</label>
                                        <input type="text" required name="meta_description" value="<?= $data['meta_description']; ?>" placeholder="Enter meta description" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Meta keywords</label>
                                        <input type="text" required name="meta_keywords" value="<?= $data['meta_keywords']; ?>" placeholder="Enter meta keywords" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product not found";
                }
            } else {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
</div>


<?php include "includes/footer.php";
?>