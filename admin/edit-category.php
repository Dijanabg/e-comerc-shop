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
                $category = getById('categories', $id);
                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);
            ?>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4>Edit Category
                                <a href="category.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter category name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <input type="text" name="description" value="<?= $data['description']; ?>" placeholder="Enter description" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload image</label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="">Current image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                        <img src="../uploads/<?= $data['image']; ?>" height="50px" width="50px" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter meta title" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta description</label>
                                        <input type="text" name="meta_description" value="<?= $data['meta_description']; ?>" placeholder="Enter meta description" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta keywords</label>
                                        <input type="text" name="meta_keywords" value="<?= $data['meta_keywords']; ?>" placeholder="Enter meta keywords" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="checkbox" <?= $data['status'] ? "checked" : ""; ?> name="status">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Popular</label>
                                        <input type="checkbox" <?= $data['popular'] ? "checked" : ""; ?> name="popular">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_category_btn">UPDATE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Category not found";
                }
            } else {
                echo "Something went wrong";
            }
            ?>

        </div>
    </div>
</div>


<?php include "includes/footer.php";
?>