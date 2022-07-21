<link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('landing/css/auth.css') }}">
<script>
    $(document).ready(function() {
        $("button").click(function() {
            $("#div2").fadeIn("slow");
        });
    });
</script>


<div class="bg-content">
    <div class="container py-4">

        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white my-5  rounded-lg shadow-lg p-5">
                    <!-- Succes -->
                    <div class="tab-content   text-center text-monoscope">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('landing/img/success.png') }}" alt="" srcset="">
                        </div>
                        <span class="my-3 display-3"> success !!</span>
                        <p>Thank you, for ordering our product</p>
                        <!--  Succes page -->
                        <div id="nav-tab-card" class="tab-pane my-5 fade show active">
                            <a href="{{ route('index') }}" class="btn-mate btn rounded">Back to Home</a>
                            <a href="https://wa.me/6287823882049" class="btn-mate btn rounded">Kirim Bukti Transfer</a>
                        </div>

                        <span class="mt-1">if you have any isuess <a href="{{ url('/trixie/pages/contact') }}"
                                class="text-footer">contact us</a></span>
                        <!-- End -->
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>
