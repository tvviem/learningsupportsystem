@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-dismissible alert-danger fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach($errors->all() as $error)
            <li><strong>{!! $error !!}</strong></li>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-dismissible alert-success fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {!! session()->get('success') !!} </strong>
    </div>
@endif
@if(session('warning'))
    <div class="notification is-warning">
        <button class="delete" data-dismiss="notification" aria-label="Close"></button>
        <strong> {!! session()->get('warning') !!} </strong>
    </div>
      
    {{-- <div class="alert alert-dismissible alert-warning fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        
    </div> --}}
@endif
@if(session('error'))
    <div class="alert alert-dismissible alert-danger fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {!! session()->get('error') !!} </strong>
    </div>
@endif
@if(session('info'))
    <div class="alert alert-dismissible alert-info fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {!! session()->get('info') !!} </strong>
    </div>
@endif