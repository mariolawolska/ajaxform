<!DOCTYPE html>

<html>
    @include('layout.head')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-12" >
                    @include('comment.table')

                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        {{ Session::forget('success') }}
                    </div>
                    @endif

                    @include('comment.form')
                    
                </div>
            </div>
        </div>
    </body>
</html>