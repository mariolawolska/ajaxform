

<div class="container">
    <h3 class="jumbotron">Laravel Ajax Validation</h3>
    <div class="alert alert-danger" style="display:none"></div>
    <form>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" id="name">
        </div>


        <div class="form-group">
            <label>email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" id="email">
        </div>


        <div class="form-group">
            <strong>comment</strong>
            <input type="text" name="comment" class="form-control" placeholder="comment" id="comment">
        </div>

        <div class="form-group">
            <button class="btn btn-success" id="submit">Submit</button>
        </div>
    </form>
</div>

<script>
    $(function () {

        $(document).on("click", "#submit", function (e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: "/public/form",
                method: 'PUT',
                data: {
                    name: $('#name').val(),
                    type: $('#email').val(),
                    price: $('#comment').val()
                },
                success: function (data) {
                    $.each(data.errors, function (key, value) {
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p>' + value + '</p>');
                    });
                }

            });
        });
    });
</script>
