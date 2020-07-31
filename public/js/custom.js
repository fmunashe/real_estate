$('#dob').datepicker({
    clearBtn: true,
    format: "dd-mm-yyyy"
});

$('#com_date').datepicker({
    clearBtn: true,
    format: "dd-mm-yyyy"
});


function deleteData(url) {
    $("#deleteForm").attr('action', url);
}

function setPaymentData(standId, clientId) {
    $("#stand_id").attr('value', standId);
    $("#client_id").attr('value', clientId);
}

function deleteFormSubmit() {
    //console.log('formSubmit');
    $("#deleteForm").submit();
}

function paymentFormSubmit() {
    $("#paymentForm").submit();
}

function onSelectLocation() {
    if ($("#location_id").val() == "") {
        $('#locationReport').attr('href', '');
    } else {
        $('#locationReport').attr('href', '/reports/location?id=' + $("#location_id").val());
    }
}

function printDiv(id) {
    var divToPrint=document.getElementById(id);

    var newWin=window.open('','Print-Window');

    newWin.document.open();

    newWin.document.write('<html> <header><link rel="stylesheet" href="/libs/admin-lte/css/adminlte.min.css"></header>' +
        '<body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

    newWin.document.close();

    setTimeout(function(){newWin.close();},10);

}

