$(document).ready(function () {
    // https://sweetalert.js.org/guides/
    $(document).on('click', '.delete_product_btn', function (e) {
        e.preventDefault();
        var id = $(this).val();
        // alert(id);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'product_id': id,
                            'delete_product_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                //console.log(response);
                                swal("Good job!", "Product deleted successfully!", "success");
                                $("#products_table").load(location.href + " #products_table");//mora razmak u poslednjem pre #
                            } else if (response == 500) {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
            });
    });
});