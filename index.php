<?php
include "includes/header.php";
include "includes/slider.php";
include "functions/userfunctions.php";
?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-2"></div>
                <hr>
                <div class="owl-carousel">


                    <?php
                    getAllTrending();
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="item">
                                <a href="productView.php?product=<?= $item['slug']; ?>">
                                    <div class=" card shadow">
                                        <div class="card-body">
                                            <img class="w-100 " height='300px' src="uploads/<?= $item['image'] ?>" alt="Product image">
                                            <h6 class="text-center text-dark"><?= $item['name']; ?></h6>
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
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About us</h4>
                <div class="underline mb-2"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi rerum voluptatibus eaque excepturi quisquam reprehenderit voluptates maiores aperiam beatae quos vel in officia ab sunt eius quaerat provident, distinctio fuga.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi rerum voluptatibus eaque excepturi quisquam reprehenderit voluptates maiores aperiam beatae quos vel in officia ab sunt eius quaerat provident, distinctio fuga.
                    <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi rerum voluptatibus eaque excepturi quisquam reprehenderit voluptates maiores aperiam beatae quos vel in officia ab sunt eius quaerat provident, distinctio fuga.
                </p>

            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">E-shop</h4>
                <div class="underline mb-2"></div><br>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right">Home</i></a><br>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right">About Us</i></a><br>
                <a href="categories.php" class="text-white"><i class="fa fa-angle-right">Our colections</i></a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right">My cart</i></a>
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <div class="underline mb-2"></div><br>
                <p class="text-white">
                    Nemanjina 1,
                    Beograd, Srbija
                </p>
                <a href="tel:+381645556664" class="text-white"><i class="fa fa-phone"></i>+381 645556664</a><br>
                <a href="mailto: xyz@gmail.com" class="text-white"><i class="fa fa-envelope"></i> xyz@gmail.com</a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.6710956565694!2d20.4571736!3d44.8078912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa979a545d5%3A0x60cf4ceb300aca4e!2z0J3QtdC80LDRmtC40L3QsCAxLCDQkdC10L7Qs9GA0LDQtA!5e0!3m2!1ssr!2srs!4v1674742824644!5m2!1ssr!2srs" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ <a href="#" target="_blank" class="text-dark">Dijana</a> <?= date('Y') ?></p>
    </div>
</div>
<?php include "includes/footer.php"; ?>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    });
</script>