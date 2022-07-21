<link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('landing/css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}" type="text/css">

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="mt-5 pt-5">
                <img src="{{ asset('landing/img/logo.png')}}" alt="Logo Trixie Fashion Store">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <h1 class="pt-4 error display-1 text-monoscope"><strong> Access Denied</strong></h1>
    </div>
        <div class="d-flex justify-content-center">
            <h5 class="error">silakan kembali ke halaman sebelumnya</h5>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ __('/')}}" class="btn btn-submit"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Kembali</a>
        </div>


</div>
