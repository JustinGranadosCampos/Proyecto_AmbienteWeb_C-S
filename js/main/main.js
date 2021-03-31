$(document).ready(function () {
    $("#cabinetTable").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
    $("#itemTable").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

    // *** Show modals in pages *** //

    $("#btnNewItemBox").click(function () {
        $("#modalItemBoxCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box Item");
    });

    $("#modalItemBoxEdit").modal("show");
    $(".modalEdit-header").css("color", "#343a40");
    $(".modalEdit-header").css("color", "#343a40");
    $(".modalEdit-title").text("Edit Box Item");

    $("#modalBoxEdit").modal("show");
    $(".modal-header").css("color", "#343a40");
    $(".modal-header").css("color", "#343a40");
    $(".modal-title").text("Edit Box");

    $("#modalCabinetEdit").modal("show");
    $(".modal-header").css("color", "#343a40");
    $(".modal-header").css("color", "#343a40");
    $(".modal-title").text("Edit Cabinet");

    $("#btnAddNewCabinet").click(function () {
        $("#modalAddCabinet").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("Add Cabinet");
    });

    $("#btnNewItemCabinet").click(function () {
        $("#modalItemCabinetCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Cabinet Item");
    });

    $("#btnNewUser").click(function () {
        $("#modalAddUser").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New User");
    });

    $("#btnNewBox").click(function () {
        $("#modalAddBox").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box");
    });

    $("#btnNewCabinet").click(function () {
        $("#modalAddCabinet").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box");
    });

    // ************************************* //
});