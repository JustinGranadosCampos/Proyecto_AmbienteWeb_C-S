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

    $("#btnAddNewCabinet").click(function () {
        $("#modalAddCabinet").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("Add Cabinet");
    });

    $("#btnNewItemBox").click(function () {
        $("#modalItemBoxCRUD").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Box Item");
    });

    $(document).ready(function () {
        $("#modalItemBoxEdit").modal("show");
        $(".modalEdit-header").css("color", "#343a40");
        $(".modalEdit-header").css("color", "#343a40");
        $(".modalEdit-title").text("Edit Box Item");
    });

    // $(document).ready(function () {
    //     $("#modalItemCabinetEdit").modal("show");
    //     $(".modalEdit-header").css("color", "#343a40");
    //     $(".modalEdit-header").css("color", "#343a40");
    //     $(".modalEdit-title").text("Edit Cabinet Item");
    // });

    $(document).ready(function () {
        $("#modalBoxEdit").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title-Box").text("Edit Box");
    });

    $(document).ready(function () {
        $("#modalCabinetEdit").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("Edit Cabinet");
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

    $("#btnNewCabinetLevel").click(function () {
        $("#modalAddNewCabinetLevel").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title").text("New Cabinet Level");
    });

    $('#btnCancelCabinetLevel').click(function () {
        $("#modalEditCabinetLevel").modal("hide");
    });

    $('#btnCancelEditItemCabinet').click(function () {
        $("#modalEditItemCabinet").modal("hide");
    });

    /*  Validations  */
    //Serial Number
    $("#txtSerialNumber").blur(function () {
        $("#txtSerialNumber").val($("#txtSerialNumber").val().replace(/ /g, ''));
        $("#txtSerialNumber").val($("#txtSerialNumber").val().replace(/[^a-zA-Z0-9]/g, ""));
        if (isBlank($("#txtModel").val())) {
        }
    });

    //Name
    $("#txtName").blur(function () {
        $("#txtName").val($("#txtName").val().trim());
        $("#txtName").val($("#txtName").val().replace(/[^a-zA-Z0-9]/g, " "));
        if (isBlank($("#txtModel").val())) {
        }
    });

    //Model
    $("#txtModel").blur(function () {
        $("#txtModel").val($("#txtModel").val().trim());
        $("#txtModel").val($("#txtModel").val().replace(/[^a-zA-Z0-9]/g, " "));
        if (isBlank($("#txtModel").val())) {
        }
    });

    //ISMP Status
    $("#txtIsmpStatus").blur(function () {
        $("#txtIsmpStatus").val($("#txtIsmpStatus").val().trim());
        $("#txtIsmpStatus").val($("#txtIsmpStatus").val().replace(/[^a-zA-Z0-9]/g, " "));
        if (isBlank($("#txtModel").val())) {
        }
    });

    //Asset
    $("#txtAsset").blur(function () {
        if (isBlank($("#txtModel").val())) {
        }
    });

    //Details
    $("#txtDetails").blur(function () {
        $("#txtDetails").val($("#txtDetails").val().trim());
        $("#txtDetails").val($("#txtDetails").val().replace(/[^a-zA-Z0-9]/g, " "));
    });

    /***  END VALIDATION ***/

    //**************************************//

    /* *** Delete Item Box *** */
    $('.btnDeleteItemBox').click(function (e) {
        e.preventDefault(); // prevent form submit
        let val = window.location.search;
        const urlParams = new URLSearchParams(val);
        let id = urlParams.get('id');

        swal({
            title: "Item will be deleted!",
            text: "Are you sure you want to delete the item?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Continue",
                    value: "catch",
                },
            },
        }).then((value) => {
            switch (value) {
                case "catch":
                    $.ajax({
                        type: "POST",
                        url: "/includes/delete/deleteItemBox.php",
                        data: { "id": id },
                        success: function (response) {
                            // console.log("Respuesta de PHP: "+response);
                            validateDeleteSuccess(response, "Item", "../../masterPages/box_items.php")
                        },
                        error: function () {
                            swal("ERROR", "Data was not sent correctly", "error");
                        }
                    });
                    break;
            }
        });
    });

    /******************************************/

    /* *** Delete Box *** */
    $('.btnDeleteBox').click(function (e) {
        e.preventDefault(); // prevent form submit
        let val = window.location.search;
        const urlParams = new URLSearchParams(val);
        let id = urlParams.get('id');

        swal({
            title: "This Box will be deleted!",
            text: "Are you sure you want to delete this box?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Continue",
                    value: "catch",
                },
            },
        }).then((value) => {
            switch (value) {
                case "catch":
                    $.ajax({
                        type: "POST",
                        url: "/includes/delete/deleteBox.php",
                        data: { "id": id },
                        success: function (response) {
                            // console.log("Respuesta de PHP: "+response);
                            validateDeleteSuccess(response, "Box", "../../masterPages/box_management.php");
                        },
                        error: function () {
                            swal("ERROR", "Data was not sent correctly", "error");
                        }
                    });
                    break;
            }
        });
    });

    /* *** Delete Cabinet *** */
    $('.btnDeleteCabinet').click(function (e) {
        e.preventDefault(); // prevent form submit
        let val = window.location.search;
        const urlParams = new URLSearchParams(val);
        let id = urlParams.get('id');

        swal({
            title: "This Cabinet will be deleted!",
            text: "Are you sure you want to delete this Cabinet?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Continue",
                    value: "catch",
                },
            },
        }).then((value) => {
            switch (value) {
                case "catch":
                    $.ajax({
                        type: "POST",
                        url: "/includes/delete/deleteCabinet.php",
                        data: { "id": id },
                        success: function (response) {
                            // console.log("Respuesta de PHP: "+response);
                            validateDeleteSuccess(response, "Cabinet", "../../masterPages/cabinet_management.php");
                        },
                        error: function () {
                            swal("ERROR", "Data was not sent correctly", "error");
                        }
                    });
                    break;
            }
        });
    });

    //*******************************************************************************

    //***************//
    // Cabinet Level //
    //***************//

    /* Insert Cabinet Level */
    $('#btnSaveNewCabinetLevel').click(function () {
        if ($('#txtLevel_Number').val() != '' && $('#txtLabelCabinetLevel').val() != '' &&
            $('#txtIdCabinet_CL').val() > 0 && $('#txtIdItem_CL').val() > 0) {

            let id = $('#txtIdNextCabinetLevel').val();
            let lvlNumber = $('#txtLevel_Number').val();
            let label = $('#txtLabelCabinetLevel').val();
            let idCabinet = $('#txtIdCabinet_CL').val();
            let idItem = $('#txtIdItem_CL').val();

            $.ajax({
                type: "POST",
                url: "/includes/inserts/insert_new_cabinet_level.php",
                data: { "id": id, "lvlNumber": lvlNumber, "label": label, "idCabinet": idCabinet, "idItem": idItem },
                success: function (response) {
                    validateInsertSuccess(response, "Cabinet Level", "/masterPages/cabinet_level.php");
                },
                error: () => {
                    swal("Error", "Data was not sent correctly", "error");
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    /* SHOW DATA ON MODAL (CABINET LEVEL)*/
    $(document).on('click', '#btnEditCabinetLevel', function () {

        /* Get selected row values */
        let row = $(this).closest("tr");
        let idCabinet = parseInt(row.find('td:eq(0)').text());
        let id = parseInt(row.find('td:eq(1)').text());
        let lvlNumber = parseInt(row.find('td:eq(2)').text());
        let label = row.find('td:eq(3)').text();
        let idItem = row.find('td:eq(4)').text();

        $.ajax({
            type: "POST",
            url: "/includes/selects/select_all_cabinets.php",
            data: { "idCabinet": idCabinet },
            success: response => {
                let content = '';
                if (response > 0 || response != null) {
                    let data = $.parseJSON(response);
                    for (let i in data) {
                        if (idCabinet == data[i].value) {
                            content += '<option value="' + data[i].value + '" selected>' + data[i].name + '</option>';
                        } else {
                            content += '<option value="' + data[i].value + '">' + data[i].name + '</option>';
                        }
                    }
                    $('#txtEditIdCabinet_CL').html(content);
                }
            },
            error: () => {
                swal("ERROR", "Data was not sent correctly", "error");
            }
        });

        $.ajax({
            type: "POST",
            url: "/includes/selects/select_all_itemsCabinet.php",
            data: { "idItem": idItem },
            success: response => {
                let content = '';
                if (response > 0 || response != null) {
                    let data = $.parseJSON(response);
                    for (let i in data) {
                        if (idItem == data[i].name) {
                            content += '<option value="' + data[i].id + '" selected>' + "[" + data[i].serialNumber + "] " + data[i].name + '</option>';
                        } else {
                            content += '<option value="' + data[i].id + '">' + "[" + data[i].serialNumber + "] " + data[i].name + '</option>';
                        }
                    }
                    $('#txtEditIdItem_CL').html(content);
                }
            },
            error: () => {
                swal("ERROR", "Data was not sent correctly", "error");
            }
        });

        /* Show modal after 1.8s */
        setTimeout(() => {
            $("#modalEditCabinetLevel").modal("show");
            $(".modal-header").css("color", "#343a40");
            $(".modal-header").css("color", "#343a40");
            $(".modal-title-CabinetLevel").text("Edit Cabinet Level");
        }, 1800);

        /* Set all the values*/
        $('#txtEditIdNextCabinetLevel').val(id);
        $('#txtEdiLevel_Number').val(lvlNumber);
        $('#txtEditLabelCabinetLevel').val(label);
        $('#txtEditIdCabinet_CL').val(idCabinet);
        $('#txtEditIdItem_CL').val(idItem);
    });

    /* Update Cabinet Level */
    $('#btnSaveEditCabinetLevel').click(function () {
        if ($('#txtEdiLevel_Number').val() != '' && $('#txtEditLabelCabinetLevel').val() != '' &&
            $('#txtEditIdCabinet_CL').val() > 0 && $('#txtEditIdItem_CL').val() > 0) {

            let id = $('#txtEditIdNextCabinetLevel').val();
            let lvlNumber = $('#txtEdiLevel_Number').val();
            let label = $('#txtEditLabelCabinetLevel').val();
            let idCabinet = $('#txtEditIdCabinet_CL').val();
            let idItem = $('#txtEditIdItem_CL').val();

            $.ajax({
                type: "POST",
                url: "/includes/updates/update_cabinet_level.php",
                data: { "id": id, "lvlNumber": lvlNumber, "label": label, "idCabinet": idCabinet, "idItem": idItem },
                success: response => {
                    validateUpdateSuccess(response, "Cabinet Level", "/masterPages/cabinet_level.php");
                },
                error: () => {
                    swal("Error", "Data was not sent correctly", "error");
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    /* Delete Cabinet Level */
    $('#btnDeleteEditCabinetLevel').click(function (e) {
        e.preventDefault();
        let id = $('#txtEditIdNextCabinetLevel').val();
        swal({
            title: "This Cabinet level will be deleted!",
            text: "Are you sure you want to delete it?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Continue",
                    value: "catch",
                },
            },
        }).then((value) => {
            switch (value) {
                case "catch":
                    $.ajax({
                        type: "POST",
                        url: "/includes/delete/delete_cabinet_level.php",
                        data: { "id": id },
                        success: response => {
                            validateDeleteSuccess(response, "Cabinet Level", "/masterPages/cabinet_level.php");
                        },
                        error: () => {
                            swal("Error", "Data was not sent correctly", "error");
                        }
                    });
                    break;
            }
        });
    });

    // END Cabinet Level //

    //******************************************************************************************

    //***************//
    // Item Cabinet //
    //**************//

    /* Insert Item Cabinet */
    $('#btnSaveItemCabinet').click(function () {
        if ($('#serial-number').val() != '' && $('#item-name').val() != '' &&
            $('#item-asset').val() > 0 && $('#item-model').val() != '' && $('#ismpStatus').val() != '') {

            let id = $('#idItemCabinet').val();
            let sn = $('#serial-number').val();
            let itemName = $('#item-name').val();
            let asset = $('#item-asset').val();
            let model = $('#item-model').val();
            let ismp = $('#ismpStatus').val();
            let details = $('#details').val();

            $.ajax({
                type: "POST",
                url: "/includes/inserts/insert_new_item_cabinet.php",
                data: { "id": id, "sn": sn, "itemName": itemName, "asset": asset, "model": model, "ismp": ismp, "details": details },
                success: function (response) {
                    validateInsertSuccess(response, "Item Cabinet", "/masterPages/cabinet_items.php");
                },
                error: () => {
                    swal("Error", "Data was not sent correctly", "error");
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    /* SHOW DATA ON MODAL (ITEM CABINET)*/
    $(document).on('click', '#btnEditItemCabinet', function () {

        /* Get selected row values */
        let row = $(this).closest("tr");
        let id = parseInt(row.find('td:eq(0)').text());
        let sn = row.find('td:eq(1)').text();
        let name = row.find('td:eq(2)').text();
        let asset = parseInt(row.find('td:eq(3)').text());
        let model = row.find('td:eq(4)').text();
        let ismp = row.find('td:eq(5)').text();
        let details = row.find('td:eq(6)').text();

        /* Show modal */
        $("#modalEditItemCabinet").modal("show");
        $(".modal-header").css("color", "#343a40");
        $(".modal-header").css("color", "#343a40");
        $(".modal-title-ItemCabinet").text("Edit Item Cabinet");

        /* Set all the values */
        $('#txtEditIdIC').val(id);
        $('#txtEditSerialNumberIC').val(sn);
        $('#txtEditNameIC').val(name);
        $('#txtEditAssetIC').val(asset);
        $('#txtEditModelIC').val(model);
        $('#txtEditismpStatusIC').val(ismp);
        $('#txtEditDetailsIC').val(details);

    });

    /* Update Item Cabinet */
    $('#btnSaveEditItemCabinet').click(function () {
        if ($('#txtEditSerialNumberIC').val() != '' && $('#txtEditNameIC').val() != '' &&
            $('#txtEditAssetIC').val() > 0 && $('#txtEditModelIC').val() != '' &&
            $('#txtEditismpStatusIC').val() != '') {

            /* Get selected row values */
            let id = $('#txtEditIdIC').val();
            let sn = $('#txtEditSerialNumberIC').val();
            let itemName = $('#txtEditNameIC').val();
            let asset = $('#txtEditAssetIC').val();
            let model = $('#txtEditModelIC').val();
            let ismp = $('#txtEditismpStatusIC').val();
            let details = $('#txtEditDetailsIC').val();

            $.ajax({
                type: "POST",
                url: "/includes/updates/update_item_cabinet.php",
                data: { "id": id, "sn": sn, "itemName": itemName, "asset": asset, "model": model, "ismp": ismp, "details": details },
                success: response => {
                    validateUpdateSuccess(response, "Item Cabinet", "/masterPages/cabinet_items.php");
                },
                error: () => {
                    swal("Error", "Data was not sent correctly", "error");
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    /* Delete Item Cabinet */
    $('#btnDeleteEditItemCabinet').click(function (e) {
        e.preventDefault();
        let id = $('#txtEditIdIC').val();
        swal({
            title: "This Item will be deleted!",
            text: "Are you sure you want to delete it?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Continue",
                    value: "catch",
                },
            },
        }).then((value) => {
            switch (value) {
                case "catch":
                    $.ajax({
                        type: "POST",
                        url: "/includes/delete/delete_item_cabinet.php",
                        data: { "id": id },
                        success: response => {
                            validateDeleteSuccess(response, "Item Cabinet", "/masterPages/cabinet_items.php");
                        },
                        error: () => {
                            swal("Error", "Data was not sent correctly", "error");
                        }
                    });
                    break;
            }
        });
    });

    // END Item Cabinet //

    /********************************************************************/

     //*******//
    // Loan //
   //******//

    // Box Item
    $(document).ready(function () {
        
    });

   /********************************************************************/
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

function isBlank(field) {
    if (field.length == 0) {
        return true;
    }
}

function validateDeleteSuccess(response, data, url) {
    if (response == "success") {
        swal({
            "title": data + " Deleted!",
            "text": "The " + data + " was sucessfully deleted!",
            "icon": "info"
        }).then(function () {
            location.replace(url);
        });
    }
    else {
        swal({
            "title": "ERROR!",
            "text": "The " + data + " item was not deleted!",
            "icon": "error"
        }).then(function () {
            location.replace(url);
        });
    }
}

function validateInsertSuccess(response, data, url) {
    if (response == "success") {
        swal({
            "title": data + " Added!",
            "text": "The " + data + " was sucessfully added!",
            "icon": "success"
        }).then(function () {
            location.replace(url);
        });
    }
    else {
        swal({
            "title": "ERROR!",
            "text": "The " + data + " item was not added!",
            "icon": "error"
        }).then(function () {
        });
    }
}

function validateUpdateSuccess(response, data, url) {
    if (response == "success") {
        swal({
            "title": data + " Updated!",
            "text": "The " + data + " was sucessfully updated!",
            "icon": "success"
        }).then(function () {
            location.replace(url);
        });
    }
    else {
        swal({
            "title": "ERROR!",
            "text": "The " + data + " item was not updated!",
            "icon": "error"
        }).then(function () {
        });
    }
}