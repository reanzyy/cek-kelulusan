<html lang="id">

<head>
    <base href="">
    <title>{{ $web->title ?? 'TITLE' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/files/logo/{{ $web->logo ?? 'LOGO.PNG'}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('fix-theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fix-theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <style>
        [v-cloak]>* {
            display: none;
        }

        [v-cloak]::before {
            content: "loading...";
        }
    </style>
</head>

<body class="landing-dark-bg" id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
    class="bg-white position-relative">
    <div class="d-flex flex-column flex-root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/svg/illustrations/landing.svg)">
                <div class="landing-header">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="/">
                                <h5 class="text-white">
                                    <img alt="Logo" src="/files/logo/{{ $web->logo ?? 'LOGO.png' }}"
                                        class="h-40px logo" /> &nbsp; &nbsp;
                                    {{ $web->title ?? 'TITLE' }}
                                </h5>
                            </a>
                            <a href="/login" class="btn btn-primary rounded-pill btn-sm">Masuk</a>
                        </div>
                    </div>
                </div>
                <div id="app" v-cloak>
                    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                        <!--begin::Alert-->
                        <div class="tex-center mb-6">
                            <img alt="Logo" src="/files/logo/graduates.png" width="180px">
                        </div>
                        <div
                            class="alert alert-dismissible bg-light-warning border border-primary d-flex flex-column flex-sm-row p-5">
                            <!--begin::Title-->
                            <h4 class="text-dark" id="demo"></h4>
                            <!--end::Content-->
                        </div>
                        <br>
                        <!--end::Alert-->
                        @if ($setting->status == 1)
                            <h3 class="text-white mb-15" id="title-info"></h3>
                            <div class="col-xl-12" v-if="currentDate() <= 0">
                                <div class="card box-shadow-sm">
                                    <div class="card-content collpase show">
                                        <div class="card-body card-dashboard text-center">
                                            <p class="text-dark">MASUKAN NIS DAN KLIK TOMBOL CEK</p>
                                            <form @submit.prevent="submitSearch">
                                                <div class="form-group text-center">
                                                    <input type="text" v-model="search" class="form-control"
                                                        id="maxlength-position-inside" placeholder="NIS"
                                                        maxlength="17" />
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success btn-sm">CEK
                                                    KELULUSAN</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div id="kick-start" class="card text-center bg-warning">
                                <div class="card-header rounded-2">
                                    <h4 class="card-title text-white">PENGUMUMAN KELULUSAN DITUTUP</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-0">
                <div class="landing-dark-bg pt-20">
                    <!--begin::Separator-->
                    <div class="landing-dark-separator"></div>
                    <div class="container">
                        <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                            <div class="d-flex align-items-center order-2 order-md-1">
                                <a href="#">
                                    <img alt="Logo" src="/files/logo/{{ $web->logo }}"
                                        class="h-15px h-md-20px" />
                                </a>
                                <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="#">© 2024
                                    {{ $web->title }}.</span>
                            </div>
                            <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                            transform="rotate(90 13 6)" fill="currentColor" />
                        <path
                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                            fill="currentColor" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('fix-theme/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('fix-theme/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('fix-theme/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('fix-theme/assets/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('fix-theme/assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('fix-theme/assets/js/custom/pages/pricing/general.js') }}"></script>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>


<script>
    new Vue({
        el: '#app',
        data: {
            web: JSON.parse(String.raw `{!! json_encode($web) !!}`),
            setting: JSON.parse(String.raw `{!! json_encode($setting) !!}`),
            search: '{{ $req_search }}',
            dt: '{!! $setting->date !!} {!! $setting->time !!}',
            dt2: '{{ $dt }}',

        },
        methods: {
            submitSearch: function() {
                // console.log(this.sort_by)
                window.location.href = `/?search=${this.search}`
            },

            currentDate() {
                let datedb = new Date(this.dt).getTime();
                let current = new Date().getTime();

                let distance = datedb - current;
                return distance;
            },

            currentTime() {
                let timedb = this.time;
                let timeok = this.time2;

                let distanceTime = timedb - timeok;
                return distanceTime;
            }
        }
    })
</script>


<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{!! $setting->date !!} {!! $setting->time !!}").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML =
            "<span class='badge badge-success'>HITUNG MUNDUR PENGUMUMAN</span> :  " + days + "Hari - " + hours +
            "Jam - " +
            minutes + "Menit - " + seconds + "Detik ";
        document.getElementById("title-info").innerHTML = "PENGUMUMAN KELULUSAN BELUM DIMULAI";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "PENGUMUMAN SUDAH DIBUKA";
            document.getElementById("title-info").innerHTML = "SILAHKAN CEK KELULUSAN ANDA";
        }
    }, 1000);
</script>
