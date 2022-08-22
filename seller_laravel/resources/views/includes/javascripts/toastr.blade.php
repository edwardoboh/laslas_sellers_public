<script type="module">

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(count($errors))
    toastr.error("<ul> @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</url>", "Error");
    @endif

    @if ($message = Session::get('failed_toastr'))
    toastr.error("@if(is_array($message))<ul>@foreach($message as $msg)<li>{!! $msg !!}</li>@endforeach</ul> @else {!! $message !!} @endif", "Error");
    @endif

    @if ($message = Session::get('success_toastr'))
    toastr.success("@if(is_array($message))<ul>@foreach($message as $msg)<li>{!! $msg !!}</li>@endforeach</ul> @else {!! $message !!} @endif", "Success");
    @endif

    @if ($message = Session::get('info_toastr'))
    toastr.info("@if(is_array($message))<ul>@foreach($message as $msg)<li>{!! $msg !!}</li>@endforeach</ul> @else {!! $message !!} @endif", "Info!!!");
    @endif

    @if ($message = Session::get('warning_toastr'))
    toastr.warning("@if(is_array($message))<ul>@foreach($message as $msg)<li>{!! $msg !!}</li>@endforeach</ul> @else {!! $message !!} @endif", "Warning!!!");
    @endif
</script>
