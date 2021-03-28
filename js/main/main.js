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

    // $("#formInventory").submit(function (e){

    //     e.preventDefault();
    //     let boxNumber = $("#cboBoxNumber").val();
    //     let serialNumber = $("#txtSerialNumber").val();
    //     let name = $("#txtName").val();
    //     let asset = $("#txtAsset").val();
    //     let model = $("#txtModel").val();
    //     let ismpStatus = $("#txtIsmpStatus").val();
    //     let details = $("#txtDetails").val();
    //     $.ajax({
    //         type: "POST",
    //         url: "./controller/BoxController.php",
    //         data: {"data_1": boxNumber, "data_2": serialNumber, "data_3": name, "data_4": asset, "data_5": model, "data_6": ismpStatus, "data_7": details},
    //         success: function(data){
    //             console.log(data);
    //             // $("#btnSaveBoxItem").attr('data-dismiss', 'modal');
    //         }
    //     })
    // });

    // function to show modal in index
    $("#btnNewItemBox").click(function () {
        // $("#formInventory").trigger("reset");
        $("#modalItemBoxCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box Item");
    });

    $("#modalItemBoxEdit").modal("show");
    $(".modalEdit-header").css("color", "#343a40");
    $(".modalEdit-header").css("color", "#343a40");
    $(".modalEdit-title").text("Edit Box Item");

    // function to show modal in cabinet form
    $("#btnNewItemCabinet").click(function () {
        // $("#formInventory").trigger("reset");
        $("#modalItemCabinetCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Cabinet Item");
    });

    $("#btnNewUser").click(function () {
        // $("#formInventory").trigger("reset");
        $("#modalAddUser").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New User");
    });

    $("#btnNewBox").click(function () {
        // $("#formInventory").trigger("reset");
        $("#modalAddBox").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box");
    });

    $("#btnNewCabinet").click(function () {
        // $("#formInventory").trigger("reset");
        $("#modalAddCabinet").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box");
    });


    // $("#formInventory").load(function(e){
    //     e.preventDefault();
    //     $("#formInventory").submit()
    //     // label = $.trim($("#boxLabel").val());
    //     // serial_number = $.trim($("#serialNumber").val());
    //     // name = $.trim($("#iName").val());
    //     // asset = $.trim($("#iAsset").val());
    //     // model = $.trim($("#iModel").val());
    //     // ismp_status = $.trim($("#iISMP_stat").val());
    //     // detail = $.trim($("#iDetail").val());

    //     $.ajax({
    //         url: "../model/ItemsBox.inc.php",
    //         type: "POST",
    //         dataType: "json",
    //         data: {label}
    //     })
    // });
});