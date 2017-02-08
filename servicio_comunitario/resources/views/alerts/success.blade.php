@if (\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert-success alert-dismissible" role="alert" style="height: 30px; font-size: 14px; padding-top: 5px; text-align: center;" id="mensaje">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! \Illuminate\Support\Facades\Session::get('message') !!}
        </div>
        <script type='text/javascript'>setTimeout(function(){$('#mensaje').hide();},6000)</script>
@endif