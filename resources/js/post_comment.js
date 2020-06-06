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
        },
        success: function (data) {
            $('#ajaxCommentTable').html(data.personsJson);
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
 * Delete Comment Table
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
            },
            success: function (data) {
                $('#ajaxCommentTable').html(data.personsJson);
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

   