$(document).ready( function () {
    $("#cabinetTable").DataTable();
    $("#itemTable").DataTable();
    
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

    $("#formInventory").load(function(e){
        e.preventDefault();
        label = $.trim($("#boxLabel").val());
        serial_number = $.trim($("#serialNumber").val());
        name = $.trim($("#iName").val());
        asset = $.trim($("#iAsset").val());
        model = $.trim($("#iModel").val());
        ismp_status = $.trim($("#iISMP_stat").val());
        detail = $.trim($("#iDetail").val());

        $.ajax({
            url: "../model/ItemsBox.inc.php",
            type: "POST",
            dataType: "json",
            data: {label}
        })
    });

    
    // var radioValue = $("input[name='exampleRadios']:checked").val();
    // if(radioValue){
    //     $("#cabinetTable").hide();
    //     $("#itemTable").DataTable();
    // }else{
    //     $("#itemTable").hide();
    //     $("#cabinetTable").show();
    //     $("#cabinetTable").DataTable();
    // }

    // $("input[type='radio']").click(function(){
    //     radioValue = $("input[name='exampleRadios']:checked").val();
    //     if(radioValue){
    //         // $("#cabinetTable").hide();
    //         $("#cabinetTable").css("display","none");
    //         $("#itemTable").DataTable();
    //     }else{
    //         $("#itemTable").hide();
    //         $("#cabinetTable").show();
    //         $("#cabinetTable").DataTable();
    //     }
    // });
} );

// var locationInput = document.getElementById('location');
// // var itemTable = document.getElementById('itemTabel');
// // itemTable.DataTable();

// function carg(elemento){
//     d = elemento.value;
//     console.log(d);

//     if(d != "3"){
//         locationInput.disabled = true;
// 	locationInput.value = "";
//     }else{
//         locationInput.disabled = false;
//     }
// }