$(function () {
    loadCommentTable('view');

    $(document).on("click", "#addCommentForm", function () {
        loadCommentTable('add');
    });
    $(document).on("click", ".deleteCommentForm", function () {
        var personId = $(this).attr('personId');
        deleteCommentTable(personId);
    });
});

/**
 * Load Comment Table
 */
function loadCommentTable(flow) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        url: "/public/ajaxRequest",
        data: {
            'form': $('#commentForm').serialize(),
            'flow': flow
        },
        beforeSend: function () {
//                    $('#loaderBox').modal('show');
        },
        success: function (data) {
            $('#ajaxCommentTable1').html(data.personsJson1);
            $('#countPersonsBox').html(data.countPersonsJson);
            $('#personsError').html(data.personsError);
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
}
/**
 * Load Comment Table END
 */


function deleteCommentTable(personId) {

    if (confirm('Are you sure you want to save this thing into the database?')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: "/public/destroy",
            data: {
                'id': personId
            },
            beforeSend: function () {
//                    $('#loaderBox').modal('show');
            },
            success: function (data) {
                $('#ajaxCommentTable1').html(data.personsJson1);
//                    $('#ajaxCommentTable2').html(data.personsJson2);
                    $('#countPersonsBox').html(data.countPersons);
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    }
}

   