$(function () {

    getClients();

    $(document).on('click', '.delete-client', function () {

        realThis = $(this)

        $("#" + realThis.attr('ref') + "").attr('style', 'opacity: 0.5');

        $.post("src/ClientHandler.php?deleteClient", { id: realThis.attr('ref') }, function (data) {

            if (data.success === true) {

                $("#" + realThis.attr('ref') + "").remove();

            } else {

                $("#" + realThis.attr('ref') + "").attr('style', '');

            }

        })

    })

    $(document).on('submit', 'form', function (e) {

        e.preventDefault();

        submit = $(this).find('button[type=submit]')

        submit.addClass('disabled')

        $.post("src/ClientHandler.php?saveClient", $(this).serialize(), function (data) {


            if (data.success === true) {

                setTimeout(function () {

                    submit.removeClass('disabled')

                    getClients()
                    $(".form-control").each(function () {
                        $(this).val('')
                    })
                    $(".form-control").first().focus()

                }, 2000)

            } else {

                submit.removeClass('disabled')

            }

        })

    })

})

function getClients() {

    $.when($(".clients").html('<span class="text-muted">Searching for clients...</span>')).done(function () {

        $.getJSON("src/ClientHandler.php?getClients", function (data) {

            const results = data.results;

            $.when($(".clients").html('')).done(function () {

                $.each(results, function (key, row) {

                    addClient(row.id, row.first_name, row.last_name, row.email)

                })

            })

        })

    })



}

function addClient(id, first_name, last_name, email) {

    $(".clients").append(

        '<div class="mt-2" id="' + id + '"><b>' + first_name + ' ' + last_name + '</b><br/>' +
        email +
        '<br/><a href="javascript:void(0)" ref="' + id + '" class="text-danger delete-client" style="font-size: 14px; text-decoration: none;">Excluir</a><br/></div>'

    )

}