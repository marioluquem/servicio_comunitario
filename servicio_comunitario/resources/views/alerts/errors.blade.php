@if (\Illuminate\Support\Facades\Session::has('message-error'))
    <div class="alert-danger alert-dismissible" role="alert" style="height: 30px; font-size: 14px; padding-top: 5px; text-align: center;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! \Illuminate\Support\Facades\Session::get('message-error') !!}
    </div>
@endif