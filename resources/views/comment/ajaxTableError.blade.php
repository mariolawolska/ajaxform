@if($error == 'error')
<div class="text-danger" role="alert">
    This is a danger alert—check it out! {{ $error }}
</div>
@endif