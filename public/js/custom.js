/**
 * Created by Mohamed Abdelrazek on 01/03/17.
 */
$(function () {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-bottom-left",
        "onclick": null,
        "showDuration": "0",
        "hideDuration": "0",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "show",
        "hideMethod": "fadeOut"
    };
    var table = $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]

    });

    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        // other options
    });
    $('body').on('confirmed.bs.confirmation', '.delete-ajax', function (e) {
        e.preventDefault();
        var route = $(this).data('hreff');
        var token = $(this).data('token');
        var target_id = $(this).data('id');
        var button = $(this);

        $.ajax({
            type: "POST",
            data: {_method: 'delete', _token: token, id: target_id},
            url: route,
            success: function (data) {
                $('#toRemove-' + target_id).remove();
                if (data == 'Activated') {
                    toastr.success('', data);
                } else if (data == 'Activation Code Generated') {
                    toastr.success('', data);
                } else {
                    toastr.error('', data);
                }
                setTimeout(function () {
                    location.reload(1);
                }, 2000);
            },
            error: function (data) {
                if (data.status == 401 || data.status == 404) {
                    window.location = data.getResponseHeader('Location')
                }
                else {
                    var json = $.parseJSON(data.responseText);
                    var error = '';
                    $.each(json, function (k, v) {
                        error += v;
                    });
                    toastr.error('', error);
                }
            }
        });
    });
    $('#modal-form').on('show.bs.modal', function (e) {
        var route = $(e.relatedTarget).data('href');
        $.ajax({
            type: "get",
            data: {},
            url: route,
            success: function (data) {
                $("#modal-form .modal-content").html(data);
                var error_out = $(".modal-body").data("no_data");
                var success_data = $(".modal-body").data("success_data");
                $("#formTest").on("submit", function (e) {
                    var btn = $("[type='submit']").button('loading');
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: $(this).attr('action'),
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (msg) {
                            toastr.success('', msg);
                            setTimeout(function () {
                                location.reload(1);
                            }, 2000);
                        },
                        error: function (msg) {
                            if (msg.status == 401 || msg.status == 404) {
                                window.location = msg.getResponseHeader('Location')
                            }
                            $("#modal-form .modal-content .form-body .alert-danger").fadeOut(500);
                            var json = $.parseJSON(msg.responseText);
                            var error = '<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert"></button> <p>';
                            $.each(json, function (k, v) {
                                error += v + "</p>";
                            });
                            $("#modal-form .modal-content .form-body").prepend(error + '</div>');
                            btn.button('reset');
                        }
                    });
                });
            }
            , error: function (data) {
                if (data.status == 401 || data.status == 404) {
                    window.location = data.getResponseHeader('Location')
                }
            }
        });
    });
});