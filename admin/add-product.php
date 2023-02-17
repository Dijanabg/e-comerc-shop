<?php
include_once "../middleware/adminMiddleWare.php";
include_once "includes/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Add Product</h4>
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
                                            <option value="<?= $item['id']; ?>"><?= $item['name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Name</label>
                                <input type="text" required name="name" placeholder="Enter product name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Slug</label>
                                <input type="text" required name="slug" placeholder="Enter slug" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Small description</label>
                                <input type="text" required name="small_description" placeholder="Enter small description" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Description</label>
                                <input type="text" required name="description" placeholder="Enter description" class="form-control mb-2 ">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Original_price</label>
                                <input type="text" required name="original_price" placeholder="Enter original price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Selling price</label>
                                <input type="text" required name="selling_price" placeholder="Enter selling price" class="form-control  mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0" for="">Quantity</label>
                                    <input type="text" required name="qty" placeholder="Enter quantity" class="form-control mb-2">
                                </div>
                                <div class="col-md-3  mb-2">
                                    <label class="mb-0" for="">Status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="mb-0" for="">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta title</label>
                                <input type="text" required name="meta_title" placeholder="Enter meta title" class="form-control mb-2 ">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta description</label>
                                <input type="text" required name="meta_description" placeholder="Enter meta description" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta keywords</label>
                                <input type="text" required name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "includes/footer.php";
?>