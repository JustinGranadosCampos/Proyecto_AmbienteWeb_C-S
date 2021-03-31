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

    /*  Validations  */
    //Serial Number
    $("#txtSerialNumber").blur(function () {
        $("#txtSerialNumber").val($("#txtSerialNumber").val().replace(/ /g, ''));
        $("#txtSerialNumber").val($("#txtSerialNumber").val().replace(/[^a-zA-Z0-9]/g, ""));
        if (isBlank($("#txtModel").val())){
            console.log("Por favor llenar el campo");
        }
    });

    //Name
    $("#txtName").blur(function () {
        $("#txtName").val($("#txtName").val().trim());
        $("#txtName").val($("#txtName").val().replace(/[^a-zA-Z0-9]/g, " "));
        if (isBlank($("#txtModel").val())){
            console.log("Por favor llenar el campo");
        }
    });

    //Model
    $("#txtModel").blur(function () {
        $("#txtModel").val($("#txtModel").val().trim());
        $("#txtModel").val($("#txtModel").val().replace(/[^a-zA-Z0-9]/g, " "));
        if (isBlank($("#txtModel").val())){
            console.log("Por favor llenar el campo");
        }
    });

    //ISMP Status
    $("#txtIsmpStatus").blur(function () {
        $("#txtIsmpStatus").val($("#txtIsmpStatus").val().trim());
        $("#txtIsmpStatus").val($("#txtIsmpStatus").val().replace(/[^a-zA-Z0-9]/g, " "));
        if (isBlank($("#txtModel").val())){
            console.log("Por favor llenar el campo");
        }
    });

    //Asset
    $("#txtAsset").blur(function () {
        if (isBlank($("#txtModel").val())){
            console.log("Por favor llenar el campo");
        }
    });

    //Details
    $("#txtDetails").blur(function () {
        $("#txtDetails").val($("#txtDetails").val().trim());
        $("#txtDetails").val($("#txtDetails").val().replace(/[^a-zA-Z0-9]/g, " "));
    });

});

function isNumber(evt) {
    evt = (evt)
        ? evt
        : window.event;
    var charCode = (evt.which)
        ? evt.which
        : evt.keyCode;
    if (charCode < 48 || charCode > 57) {
        return false;
    }
    return true;
}

function isBlank(field){
    if (field.length == 0){
        return true;
    }
}
