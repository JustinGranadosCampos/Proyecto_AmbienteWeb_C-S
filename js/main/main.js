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

    $('#cboCabinetNumber').selectpicker();
    $('#cboCabinetLabel').selectpicker();

    $('#cboCabinetNumber').change(function () {
        $('#cboCabinetLabel').val("Select Cabinet Label");
        var id = parseInt($('#cboCabinetNumber').val());
        load_data('sub_category_data', id);
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

    $(document).ready(function () {
        $("#modalItemCabinetEdit").modal("show");
        $(".modalEdit-header").css("color", "#343a40");
        $(".modalEdit-header").css("color", "#343a40");
        $(".modalEdit-title").text("Edit Cabinet Item");
    });

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
        load_data('category_data', '');
    });

    $("#btnEdit").click(function () {
        load_data('category_data', '');
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

    // *** ********************************* *** //

    /**/
    $("#btnSaveItemCabinet").click(function () {
        alert("Entré a la función");
        var label = $('#cboCabinetLabel option:selected').html();
        console.log(label);
        $.ajax({
            url: "cabinet_items.php",
            method: "POST",
            cache: false,
            data: "label=" + label,
            beforeSend: function () { // callback que se ejecutará antes de enviar la solicitud
                console.log("Enviando por medio de post");
            },
        });
    });
    /**/

    // ************************************* //

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
                        url: "./includes/delete/deleteItemBox.php",
                        data: { "id": id },
                        success: function (response) {
                            // console.log("Respuesta de PHP: "+response);
                            validateDeleteSuccess(response, "Item", "./box_items.php")
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
                        url: "./includes/delete/deleteBox.php",
                        data: { "id": id },
                        success: function (response) {
                            // console.log("Respuesta de PHP: "+response);
                            validateDeleteSuccess(response, "Box", "./box_management.php");
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
                        url: "./includes/delete/deleteCabinet.php",
                        data: { "id": id },
                        success: function (response) {
                            // console.log("Respuesta de PHP: "+response);
                            validateDeleteSuccess(response, "Cabinet", "./cabinet_management.php");
                        },
                        error: function () {
                            swal("ERROR", "Data was not sent correctly", "error");
                        }
                    });
                    break;
            }
        });
    });

    // Cabinet Level //

    /* Insert Cabinet Level */
    $('#btnSaveNewCabinetLevel').click(function () {
        if ($('#txtLevel_Number').val() != '' && $('#txtLabelCabinetLevel').val() != '' &&
            $('#txtIdCabinet_CL').val() > 0 && $('#txtIdItem_CL').val() > 0) {
            $.ajax({
                type: "POST",
                url: "./includes/inserts/insert_new_cabinet_level.php",
                data: "data",
                success: response => {
                    swal({
                        title: "Cabinet Level Added",
                        text: "New Cabinet Level Added",
                        icon: "success",
                        dangerMode: true,
                        buttons: {
                            catch: {
                                text: "Continue",
                                value: "catch",
                            },
                        },
                    }).then((value) => {
                        switch (value) {
                            case "catch":
                                location.reload();
                                break;
                        }
                    });
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    /* Update Cabinet Level */
    $('#btnSaveNewCabinetLevel').click(function () {
        if ($('#txtLevel_Number').val() != '' && $('#txtLabelCabinetLevel').val() != '' &&
            $('#txtIdCabinet_CL').val() > 0 && $('#txtIdItem_CL').val() > 0) {
            $.ajax({
                type: "POST",
                url: "./includes/updates/update_cabinet_level.php",
                data: "data",
                success: response => {
                    swal({
                        title: "Cabinet Level Added",
                        text: "New Cabinet Level Added",
                        icon: "success",
                        dangerMode: true,
                        buttons: {
                            catch: {
                                text: "Continue",
                                value: "catch",
                            },
                        },
                    }).then((value) => {
                        switch (value) {
                            case "catch":
                                location.reload();
                                break;
                        }
                    });
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    /* Delete Cabinet Level */
    $('#btnSaveNewCabinetLevel').click(function () {
        if ($('#txtLevel_Number').val() != '' && $('#txtLabelCabinetLevel').val() != '' &&
            $('#txtIdCabinet_CL').val() > 0 && $('#txtIdItem_CL').val() > 0) {
            $.ajax({
                type: "POST",
                url: "./includes/deletes/delete_cabinet_level.php",
                data: "data",
                success: response => {
                    swal({
                        title: "Cabinet Level Added",
                        text: "New Cabinet Level Added",
                        icon: "success",
                        dangerMode: true,
                        buttons: {
                            catch: {
                                text: "Continue",
                                value: "catch",
                            },
                        },
                    }).then((value) => {
                        switch (value) {
                            case "catch":
                                location.reload();
                                break;
                        }
                    });
                }
            });
        } else {
            swal("Error", "Plese fill out the blank spaces", "info");
        }
    });

    // END Cabinet Level //
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

function load_data(type, cabinet_id) {
    let parameters = { "type": type, "id": cabinet_id };
    $.ajax({
        url: "load_data.php",
        method: "POST",
        cache: false,
        data: parameters,
        success: function (data) {
            var content = '';
            if (data > 0 || data != null) {
                data = $.parseJSON(data);
                for (let i in data) {
                    content += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                if (type == "category_data") {
                    $('#cboCabinetNumber').html(content);
                    $('#cboCabinetNumber').selectpicker('refresh');
                } else {
                    $('#cboCabinetLabel').html(content);
                    $('#cboCabinetLabel').selectpicker('refresh');
                }
            }
        },
        error: function () {
            alert("Error");
        }
    });
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