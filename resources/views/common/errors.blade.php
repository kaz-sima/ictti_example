@if ($errors-> any())
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Warning Messages</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li><font color="red">{{ $error }}</font></li>
            @endforeach
        </ul>
    </div>
@endif

