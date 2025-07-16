$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#categories_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/categories", // نفس route لعرض الصفحة
            type: "GET",
        },
        columns: [
            { data: "Image", name: "Image" },
            { data: "Name", name: "Name" },
            { data: "Slug", name: "Slug" },
            { data: "Description", name: "Description" },
            { data: "Created_at", name: "Created_at" },
            { data: "Updated_at", name: "Updated_at" },
            { data: "Action", name: "Action", orderable: false, searchable: false },
        ],
    });
});
