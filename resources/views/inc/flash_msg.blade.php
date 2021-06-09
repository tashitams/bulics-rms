{{-- @if($errors->any())
    <div id="custom-alert" class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <h5 class="alert-heading">Oops error ...</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif --}}

@if(session()->has('success'))
    <div id="custom-alert" class="alert alert-success alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <h5 class="alert-heading"><i class="icon-check"></i> Success</h5>
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div id="custom-alert" class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <h5 class="alert-heading">Oops error ...</h5>
        {{ session('error') }}
    </div>
@endif

@if(session()->has('warning'))
    <div id="custom-alert" class="alert alert-warning alert-dismissible" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <h5 class="alert-heading"><i class="icon-attention"></i> Warning</h5>
        {{ session('warning') }}
    </div>
@endif
