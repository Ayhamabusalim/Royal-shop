$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#create-form-category").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "/store_category",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (res) {
                Swal.fire({
                    title: " Created !",
                    text: res.message,
                    icon: "success",
                });
                $("#ModelCreateCategory").modal("hide");
                $("#category-table").DataTable().ajax.reload();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $(document).on("click", "#btn_edit_category", function (e) {
        e.preventDefault();

        let id = $(this).data("category-id");

        $.ajax({
            url: "/edit_category/" + id,
            type: "GET",
            success: function (response) {
                if (response.status) {
                    let data = response.data;
                    $("#category-id").val(data.id);
                    $("input[name='name']").val(data.name);
                    $("input[name='slug']").val(data.slug);
                    $("input[name='description']").val(data.description);
                    $("input[name='meta_title']").val(data.meta_title);
                    $("input[name='meta_description']").val(
                        data.meta_description
                    );
                    if (data.image) {
                        let fullImagePath = data.image.startsWith("http")
                            ? data.image
                            : "/images/categories/" + data.image;
                        $("#preview-image").attr("src", fullImagePath).show();
                    } else {
                        $("#preview-image").hide();
                    }
                    $("#editModalCategory").modal("show");
                } else {
                    alert("Failed to fetch category data.");
                }
            },
            error: function (response) {
                console.error("Error fetching category data");
            },
        });
    });

    $("#edit-form-category").on("submit", function (e) {
        e.preventDefault();
        let id = $("#category-id").val();
        let formData = new FormData(this);
        $.ajax({
            url: "/update_category/" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (res) {
                console.log(res);
                Swal.fire({
                    title: " Updated !",
                    text: res.message,
                    icon: "success",
                });
                $("#editModalCategory").modal("hide");
                $("#category-table").DataTable().ajax.reload();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", "#btn_delete_category", function (e) {
        e.preventDefault();
        let id = $(this).data("category-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/delete_category/" + id,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (res) {
                        Swal.fire({
                            title: "Deleted!",
                            text: res.message,
                            icon: "success",
                        });
                        $("#category-table").DataTable().ajax.reload();
                    },
                    error: function (res) {
                        Swal.fire({
                            title: "Delete failed!",
                            text:
                                res.responseJSON?.message ||
                                "An unexpected error occurred.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
});
