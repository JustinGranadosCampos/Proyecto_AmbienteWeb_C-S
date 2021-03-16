$(document).ready( function () {
    $("#cabinetTable").DataTable();
    $("#itemTable").DataTable();

    $("#formInventory").submit(function (e){
        
    });
    
    // function to show modal in index
    $("#btnNewItemBox").click(function(){
        $("#formInventory").trigger("reset");
        $("#modalItemBoxCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box Item");
    });

    // function to show modal in cabinet form
    $("#btnNewItemCabinet").click(function(){
        $("#formInventory").trigger("reset");
        $("#modalItemCabinetCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Cabinet Item");
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
} );