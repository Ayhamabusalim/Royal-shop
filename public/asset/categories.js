const { data } = require("alpinejs");

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token]').attr("content"),
        },
    });

    $("#categories_table").DataTable({
        ajax: {
            url: "categoreis.index",
            type: "GET",
        },
        columns: [
            { data: "name" },
            { data: "slug" },
            { data: "description" },
            { data: "created at" },
            { data: "updated at" },
            { data: "action" },
        ],
    });
});
