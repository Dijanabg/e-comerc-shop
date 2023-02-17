<?php
//session_start();

include "functions/userfunctions.php";
include "includes/header.php";

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home / Colections /</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row ">
                    <h1 class="col-md-12">Our Collections</h1>
                    <hr>
                    <?php
                    $categories = getAllActive("categories");
                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-md-3 mb-2 ">
                                <a href="products.php?category=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img class="w-100 " height='200px' src="uploads/<?= $item['image'] ?>" alt="Category image">
                                            <h4 class="text-center"><?= $item['name']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No data available";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>