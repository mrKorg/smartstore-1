$().ready(function () {

    //translit in aliases
    $('input[data-translit="true"]').liTranslit({
        elAlias: $('input[name="alias"]')
    });

    // bootstrap file load button
    $('input[type=file]').bootstrapFileInput();
    $('.file-inputs').bootstrapFileInput();


    //data table products
    var table = $('#products-table').DataTable({
        fixedHeader: true,
        "order": [[0, "desc"]]
    });

    //удаление товаров ajax'ом
    $('.product-delete').click(function () {
        var token = $('#products-table').data('token');
        var link = "/dashboard/product/delete";
        var id = $(this).data('id');
        var row = $(this).parent().parent();
        var text = $(row).find('.product').text();
        var message_block = $('#message');
        if (confirm(are_you_sure + ' ' + text + '?')) {
            $.ajax({
                url: link,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: token,
                    id: id,
                    product: text
                },
                success: function (e) {
                    if ($('.alert').is('.alert-success') || $('.alert').is('.alert-danger')) {
                        $('.alert').removeClass('alert-success');
                        $('.alert').removeClass('alert-danger');
                    }
                    $('.alert').addClass('alert-' + e.result);
                    $(message_block).text(e.message);
                }
            });
            $('.alert').slideDown(500);
            $(row).fadeOut(500);
            setTimeout(function () {
                $('.alert').slideUp(500);
            }, 5000)
        }
    });

    //удаление брендов ajax'ом
    $('.brand-delete').click(function () {
        var token = $('#products-table').data('token');
        var link = "/dashboard/brand/delete";
        var id = $(this).data('id');
        var row = $(this).parent().parent();
        var text = $(row).find('.brand').text();
        var message_block = $('#message');
        if (confirm(are_you_sure + ' ' + text + '?')) {
            $.ajax({
                url: link,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: token,
                    id: id,
                    brand: text
                },
                success: function (e) {
                    if ($('.alert').is('.alert-success') || $('.alert').is('.alert-danger')) {
                        $('.alert').removeClass('alert-success');
                        $('.alert').removeClass('alert-danger');
                    }
                    $('.alert').addClass('alert-' + e.result);
                    $(message_block).text(e.message);
                }
            });
            $('.alert').slideDown(500);
            $(row).fadeOut(500);
            setTimeout(function () {
                $('.alert').slideUp(500);
            }, 5000)
        }
    });

    //// datetimepicker
    $.datetimepicker.setLocale('ru');
    $('[name*="date"]').datetimepicker({
        format: 'Y-m-d H:i'
    });
    //$('#products-table tbody').on('click', 'tr', function () {
    //var data = table.row( this ).data();
    //window.location.replace("/dashboard/product/edit/"+data[0]);
    //} );

});
