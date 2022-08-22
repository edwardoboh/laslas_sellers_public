@if(count($errors))
<div class="alert alert-custom alert-danger fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-exclamation"></i></div>
    <div class="alert-text">
        <ul>
            @foreach($errors->all() as $error)
                <li class="alert-text">{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('failed'))
<div class="alert alert-custom alert-danger fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-exclamation"></i></div>
    <div class="alert-text">
        @if(is_array($message))
            <ul>
                @foreach($message as $msg)
                    <li>{!! $msg !!}</li>
                @endforeach
            </ul>
        @else
            {!! $message !!}
        @endif
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-custom alert-success fade show" role="alert">
    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
    <div class="alert-text">
        @if(is_array($message))
            <ul>
                @foreach($message as $msg)
                    <li>{!! $msg !!}</li>
                @endforeach
            </ul>
        @else
            {!! $message !!}
        @endif
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('warning'))
<div class="alert alert-custom alert-warning fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
        @if(is_array($message))
            <ul>
            @foreach($message as $msg)
                    <li>{!! $msg !!}</li>
            @endforeach
            </ul>
        @else
            {!! $message !!}
        @endif
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('info'))
<div class="alert alert-custom alert-info fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-info"></i></div>
    <div class="alert-text">
        @if(is_array($message))
            <ul>
                @foreach($message as $msg)
                    <li>{!! $msg !!}</li>
                @endforeach
            </ul>
        @else
            {!! $message !!}
        @endif
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
