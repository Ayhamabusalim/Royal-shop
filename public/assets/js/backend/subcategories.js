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
});
