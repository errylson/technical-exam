$(function() {
    $("#tbl-companies").DataTable({
        scrollX: true,
          lengthChange: true, 
          autoWidth: true,
          order : []
    });

    $(document).on('click', '.btn-edit', function() { // i chose this way instead of ajax but i know how to use ajax

        $('#edit-name').val("");
        $('#edit-email').val("");
        $('#edit-website-url').val("");

        $('#edit-name').val($(this).data('name'));
        $('#edit-email').val($(this).data('email'));
        $('#edit-website-url').val($(this).data('website-url'));

        $('#edit-modal').modal('show');
        $('#edit-form').attr('action', '/companies/' + $(this).attr('id') + '/update');

    });
});