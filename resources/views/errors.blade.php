@if ($errors->any())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <ul class="alert alert-danger align-content-center list-unstyled">
                @foreach ($errors->all() as $error )
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
