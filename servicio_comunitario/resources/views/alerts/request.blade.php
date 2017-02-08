@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert" style="height: 30px; font-size: 14px; padding-top: 5px; text-align: center;" id="mensaje">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    <script type='text/javascript'>setTimeout(function(){$('#mensaje').hide();},6000)</script>
@endif


