"use strict";


$(document).ready(function () {
    // Initialize the main datatable with default settings
    $("#datatable").DataTable({
        order: [[0, 'desc']] // Adjust the column index if 'id' is not the first column
    });

    // Initialize datatable-buttons with additional settings
    var a = $("#datatable-buttons").DataTable({
        lengthChange: false,
        buttons: ["copy", "excel", "pdf"],
        order: [[0, 'desc']] // Adjust the column index if 'id' is not the first column
    });

    // Initialize key-table datatable
    $("#key-table").DataTable({
        keys: true,
        order: [[0, 'desc']] // Adjust the column index if 'id' is not the first column
    });

    // Initialize responsive datatable
    $("#responsive-datatable").DataTable({
        order: [[0, 'desc']] // Adjust the column index if 'id' is not the first column
    });

    // Initialize selection-datatable with multi-select
    $("#selection-datatable").DataTable({
        select: {
            style: "multi"
        },
        order: [[0, 'desc']] // Adjust the column index if 'id' is not the first column
    });

    // Move buttons to the correct container
    a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    // Update select element styles
    $("#datatable_length select[name*='datatable_length']").addClass("form-select form-select-sm");
    $("#datatable_length select[name*='datatable_length']").removeClass("custom-select custom-select-sm");

    // Update dataTables length label styles
    $(".dataTables_length label").addClass("form-label");
});

// This is just a sample script. Paste your real code (javascript or HTML) here.

if ('this_is' == /an_example/) {
    of_beautifier();
} else {
    var a = b ? (c % d) : e[f];
}


// $(document).ready(function () {
//     $("#datatable").DataTable();
//     var a = $("#datatable-buttons").DataTable({
//         lengthChange: !1,
//         buttons: ["copy", "excel", "pdf"]
//     });
//     $("#key-table").DataTable({
//         keys: !0
//     }), $("#responsive-datatable").DataTable(), $("#selection-datatable").DataTable({
//         select: {
//             style: "multi"
//         }
//     }), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $("#datatable_length select[name*='datatable_length']").addClass("form-select form-select-sm"), $("#datatable_length select[name*='datatable_length']").removeClass("custom-select custom-select-sm"), $(".dataTables_length label").addClass("form-label")
// }); // This is just a sample script. Paste your real code (javascript or HTML) here.

// if ('this_is' == /an_example/) {
//     of_beautifier();
// } else {
//     var a = b ? (c % d) : e[f];
// }