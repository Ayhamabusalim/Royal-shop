$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#openSubCreateCategory").on("click", function () {
        $("#create-form-subcategory")[0].reset();
        $.ajax({
            url: "/get_categoriesJson",
            type: "GET",
            success: function (response) {
                let categorySelect = $('select[name="category_id"]');
                categorySelect
                    .empty()
                    .append(
                        '<option value="">-- choose category name --</option>'
                    );

                response.forEach((category) => {
                    categorySelect.append(
                        `<option value="${category.id}">${category.name}</option>`
                    );
                });
            },
            error: function () {
                alert("An error occurred while loading categories.");
            },
        });
    });
    $("#create-form-subcategory").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "/store_subcategories",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (res) {
                Swal.fire({
                    title: "Created!",
                    text: res.message,
                    icon: "success",
                });
                $("#ModelSubCreateCategory").modal("hide");
                $("#subcategory-table").DataTable().ajax.reload();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", "#btn_edit_subcategory", function (e) {
        e.preventDefault();

        let id = $(this).data("subcategory-id");

        $.ajax({
            url: "/edit_subcategories/" + id,
            type: "GET",
            success: function (response) {
                let data = response.subcategory;
                let categories = response.categories;

                // عبّي select الفئات الرئيسية (category)
                let $categorySelect = $("#category-select");
                $categorySelect.empty(); // نظف الخيارات القديمة

                categories.forEach((category) => {
                    let selected =
                        category.id === data.category_id ? "selected" : "";
                    $categorySelect.append(
                        `<option value="${category.id}" ${selected}>${category.name}</option>`
                    );
                });

                // عبّي باقي الحقول
                $("input[name='name']").val(data.name);
                $("input[name='slug']").val(data.slug);
                $("input[name='description']").val(data.description);
                $("input[name='meta_title']").val(data.meta_title);
                $("input[name='meta_description']").val(data.meta_description);

                if (data.image) {
                    let fullImagePath = data.image.startsWith("http")
                        ? data.image
                        : "/images/subcategories/" + data.image;

                    $("#preview-image")
                        .attr("src", fullImagePath)
                        .removeAttr("style")
                        .show();
                } else {
                    $("#preview-image").css("display", "none").attr("src", "");
                }

                $("#subcategory-id").val(data.id);
                $("#editModalSubCategory").modal("show");
            },
            error: function (response) {
                console.error("Error fetching category data", response);
                alert("An error occurred while fetching data.");
            },
        });
    });

    $("#edit-form-Subcategory").on("submit", function (e) {
        e.preventDefault();
        console.log("test");
        let id = $("#subcategory-id").val();
        let formData = new FormData(this);
        formData.append("_method", "PUT"); // 👈 هذا مهم جداً

        $.ajax({
            url: "/update_subcategories/" + id,
            type: "POST", // تبقى POST، لكن Laravel يعرف إنها PUT بسبب الـ _method
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                Swal.fire({
                    title: "Updated!",
                    text: res.message,
                    icon: "success",
                });
                $("#editModalSubCategory").modal("hide");
                $("#subcategory-table").DataTable().ajax.reload();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    $(document).on("click", "#btn_delete_subcategory", function (e) {
        e.preventDefault();
        let id = $(this).data("subcategory-id");
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
                    url: "/delete_subcategories/" + id,
                    type: "DELETE",
                    success: function (res) {
                        Swal.fire({
                            title: "Deleted!",
                            text: res.message,
                            icon: "success",
                        });
                        $("#subcategory-table").DataTable().ajax.reload();
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
