@if (isset($errors) & count($errors) > 0)
    <div id="alerta_error">
        <ul class="list-unstyled mb-0" >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('success', false))
    <?php  $data = Session::get('success') ;?>
    @if (is_array($data))
        @foreach ($data as $message)
            <p id="message">{{ $message }}</p>
        @endforeach
    @else
        <p id="message">{{ $data }}</p>
    @endif
@endif