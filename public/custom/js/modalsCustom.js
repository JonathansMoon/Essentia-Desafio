$(function() {
    // Envia dados ao modal ao abrir
    $('#screenshotModalUpdate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var title = button.data('title')
        var subtitle = button.data('subtitle')
        var description = button.data('description')
        $('#edit-form').attr('action', '/screenshot/' + id)

        var modal = $(this)
        if(title) {
            modal.find('#title').val(title)
            modal.find('#subtitle').val(subtitle)
            modal.find('#description').val(description)
        }
        modal.find('.modal-title').text('Update screenshot ' + title)
    });
    // Apaga dados do modal ao fechar
    $('#screenshotModalUpdate, #screenshotModalCreate').on('hidden.bs.modal', function (e) {
    $(this)
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
        $('.error').remove();
    });

    // Dá focus
    $('#screenshotModalUpdate, #screenshotModalCreate').on('shown.bs.modal', function () {
        $('#title').trigger('focus');
    });

});

$(document).ready(function() {
    if ($('#errorsUpdate').length){
        $('#screenshotModalUpdate').modal('show');
    }
    if ($('#errorsCreate').length){
        $('#screenshotModalCreate').modal('show');
    }
});
