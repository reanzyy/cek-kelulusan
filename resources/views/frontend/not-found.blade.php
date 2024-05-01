<html lang="id">

<head>
    <base href="">
    <title>{{ $web->title ?? 'TITLE' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/files/logo/{{ $web->logo ?? 'LOGO.PNG' }}" />
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

<body id="kt_body" class="landing-dark-bg" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
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
                            <img alt="Logo" src="/files/logo/sad.png" width="180px">
                        </div>
                        <br>
                        <br>
                        <div class="col-xl-12">
                            <div class="card box-shadow-0 border-info">
                                <div class="card-content collpase show">
                                    <div class="card-body card-dashboard text-center">
                                        <div>
                                            <div class="alert alert-danger mb-4" role="alert">
                                                <strong>NIS TIDAK DITEMUKAN</strong>
                                            </div>
                                        </div>
                                        <div class="text-center mb-4">
                                            <a href="/" class="btn btn-primary btn-sm">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <img alt="Logo" src="/files/logo/{{ $web->logo }}" class="h-15px h-md-20px" />
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
        },
        methods: {
            //
        }
    })
</script>
