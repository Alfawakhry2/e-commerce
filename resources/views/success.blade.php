@if (session()->has('success'))
<div class="container">
    <div class="row align-items-center justify-content-center ">
        <div class="col col-4">
            <div class="alert alert-success">{{session()->get('success')}}</div>
        </div>
    </div>
</div>
@endif
