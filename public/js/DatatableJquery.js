$(document).ready(function () {
    var table = $('#table_properties').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
        },
        scrollX: true,
        scrollCollapse: true,
        info: true,
        searching: true
    });
});

$(document).ready(function () {
    var table = $('#table_properties_show').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
        },
        info: false,
        searching: false,
        "bPaginate": false
    });
});

$(document).ready(function () {
    var table = $('#table_properties_edit_create').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
        },
        scrollX: true,
        scrollCollapse: true,
        info: false,
        searching: false,
        "bPaginate": false
    });
});
