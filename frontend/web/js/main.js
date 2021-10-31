$('#talabalar-fakultet_id').change(function(){
    let id = $(this).val();

    $.ajax({
        method: "get",
        url: "/ajax/guruh",
        data: { id: id},
        success: function(data) {
            $('#talabalar-guruh_id').html(data);
            // location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
});