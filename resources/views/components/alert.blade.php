<div class="alert alert-{{$type}} alert-dismissible fade show" role="alert">
    {{$message}}

    @if($dismiss)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
</div>