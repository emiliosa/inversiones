$(document).ready(function() {
    $('#dialog-modal').dialog({
        width: 1200,
        modal: true,
        autoOpen: false,
        buttons: {
            'Ok': function () {
                $(this).dialog("close");
            }
        },
        open: function (event, ui) {
            $.ajax({
                url: 'contraparte',
                type: 'GET',
                error: function (SMLHttpRequest, textStatus, errorThrown) {
                    console.log(data);
                },
                success: function (data) {
                    console.log(data);
                }
            });
        }});
    $('.contraparte').click(function () {
        $('#dialog-modal').dialog('open');
        return false;
    });
});