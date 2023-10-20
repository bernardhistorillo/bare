<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}
    {{--    <link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet">--}}
    {{--    <style>--}}
    {{--        * {--}}
    {{--            font-family: Arial, serif;--}}
    {{--        }--}}
    {{--        .text-white {--}}
    {{--            color:#ffffff;--}}
    {{--        }--}}
    {{--    </style>--}}

    <style>
        /*! CSS Used from: https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css */
        :root{--bs-blue:#0d6efd;--bs-indigo:#6610f2;--bs-purple:#6f42c1;--bs-pink:#d63384;--bs-red:#dc3545;--bs-orange:#fd7e14;--bs-yellow:#ffc107;--bs-green:#198754;--bs-teal:#20c997;--bs-cyan:#0dcaf0;--bs-black:#000;--bs-white:#fff;--bs-gray:#6c757d;--bs-gray-dark:#343a40;--bs-gray-100:#f8f9fa;--bs-gray-200:#e9ecef;--bs-gray-300:#dee2e6;--bs-gray-400:#ced4da;--bs-gray-500:#adb5bd;--bs-gray-600:#6c757d;--bs-gray-700:#495057;--bs-gray-800:#343a40;--bs-gray-900:#212529;--bs-primary:#0d6efd;--bs-secondary:#6c757d;--bs-success:#198754;--bs-info:#0dcaf0;--bs-warning:#ffc107;--bs-danger:#dc3545;--bs-light:#f8f9fa;--bs-dark:#212529;--bs-primary-rgb:13,110,253;--bs-secondary-rgb:108,117,125;--bs-success-rgb:25,135,84;--bs-info-rgb:13,202,240;--bs-warning-rgb:255,193,7;--bs-danger-rgb:220,53,69;--bs-light-rgb:248,249,250;--bs-dark-rgb:33,37,41;--bs-primary-text:#0a58ca;--bs-secondary-text:#6c757d;--bs-success-text:#146c43;--bs-info-text:#087990;--bs-warning-text:#997404;--bs-danger-text:#b02a37;--bs-light-text:#6c757d;--bs-dark-text:#495057;--bs-primary-bg-subtle:#cfe2ff;--bs-secondary-bg-subtle:#f8f9fa;--bs-success-bg-subtle:#d1e7dd;--bs-info-bg-subtle:#cff4fc;--bs-warning-bg-subtle:#fff3cd;--bs-danger-bg-subtle:#f8d7da;--bs-light-bg-subtle:#fcfcfd;--bs-dark-bg-subtle:#ced4da;--bs-primary-border-subtle:#9ec5fe;--bs-secondary-border-subtle:#e9ecef;--bs-success-border-subtle:#a3cfbb;--bs-info-border-subtle:#9eeaf9;--bs-warning-border-subtle:#ffe69c;--bs-danger-border-subtle:#f1aeb5;--bs-light-border-subtle:#e9ecef;--bs-dark-border-subtle:#adb5bd;--bs-white-rgb:255,255,255;--bs-black-rgb:0,0,0;--bs-body-color-rgb:33,37,41;--bs-body-bg-rgb:255,255,255;--bs-font-sans-serif:system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--bs-font-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--bs-gradient:linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));--bs-body-font-family:var(--bs-font-sans-serif);--bs-body-font-size:1rem;--bs-body-font-weight:400;--bs-body-line-height:1.5;--bs-body-color:#212529;--bs-emphasis-color:#000;--bs-emphasis-color-rgb:0,0,0;--bs-secondary-color:rgba(33, 37, 41, 0.75);--bs-secondary-color-rgb:33,37,41;--bs-secondary-bg:#e9ecef;--bs-secondary-bg-rgb:233,236,239;--bs-tertiary-color:rgba(33, 37, 41, 0.5);--bs-tertiary-color-rgb:33,37,41;--bs-tertiary-bg:#f8f9fa;--bs-tertiary-bg-rgb:248,249,250;--bs-body-bg:#fff;--bs-body-bg-rgb:255,255,255;--bs-link-color:#0d6efd;--bs-link-color-rgb:13,110,253;--bs-link-decoration:underline;--bs-link-hover-color:#0a58ca;--bs-link-hover-color-rgb:10,88,202;--bs-code-color:#d63384;--bs-highlight-bg:#fff3cd;--bs-border-width:1px;--bs-border-style:solid;--bs-border-color:#dee2e6;--bs-border-color-translucent:rgba(0, 0, 0, 0.175);--bs-border-radius:0.375rem;--bs-border-radius-sm:0.25rem;--bs-border-radius-lg:0.5rem;--bs-border-radius-xl:1rem;--bs-border-radius-2xl:2rem;--bs-border-radius-pill:50rem;--bs-box-shadow:0 0.5rem 1rem rgba(var(--bs-body-color-rgb), 0.15);--bs-box-shadow-sm:0 0.125rem 0.25rem rgba(var(--bs-body-color-rgb), 0.075);--bs-box-shadow-lg:0 1rem 3rem rgba(var(--bs-body-color-rgb), 0.175);--bs-box-shadow-inset:inset 0 1px 2px rgba(var(--bs-body-color-rgb), 0.075);--bs-emphasis-color:#000;--bs-form-control-bg:var(--bs-body-bg);--bs-form-control-disabled-bg:var(--bs-secondary-bg);--bs-highlight-bg:#fff3cd;--bs-breakpoint-xs:0;--bs-breakpoint-sm:576px;--bs-breakpoint-md:768px;--bs-breakpoint-lg:992px;--bs-breakpoint-xl:1200px;--bs-breakpoint-xxl:1400px;}
        *,::after,::before{box-sizing:border-box;}
        @media (prefers-reduced-motion:no-preference){
            :root{scroll-behavior:smooth;}
        }
        body{margin:0;font-family:var(--bs-body-font-family);font-size:var(--bs-body-font-size);font-weight:var(--bs-body-font-weight);line-height:var(--bs-body-line-height);color:var(--bs-body-color);text-align:var(--bs-body-text-align);background-color:var(--bs-body-bg);-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:transparent;}
        h5{margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;color:var(--bs-heading-color,inherit);}
        h5{font-size:1.25rem;}
        p{margin-top:0;margin-bottom:1rem;}
        img{vertical-align:middle;}
        table{caption-side:bottom;border-collapse:collapse;}
        tbody,td,tr{border-color:inherit;border-style:solid;border-width:0;}
        .d-inline{display:inline!important;}
        .d-inline-block{display:inline-block!important;}
        .w-100{width:100%!important;}
        .mb-0{margin-bottom:0!important;}
        .mb-3{margin-bottom:1rem!important;}
        .mb-4{margin-bottom:1.5rem!important;}
        .p-3{padding:1rem!important;}
        .px-4{padding-right:1.5rem!important;padding-left:1.5rem!important;}
        .py-5{padding-top:3rem!important;padding-bottom:3rem!important;}
        .text-start{text-align:left!important;}
        .text-center{text-align:center!important;}
        a, .text-white {
            color:#ffffff!important;
        }
        @media (min-width:768px){
            .p-md-5{padding:3rem!important;}
            .px-md-5{padding-right:3rem!important;padding-left:3rem!important;}
        }
        /*! CSS Used from: http://wearebare.test/css/app.css?id=c6cf3d2642d7b224237b6c6296b4f76c */
        .bg-color-3{background-color:rgba(75, 55, 44, 0.89)!important;}
        .bg-color-9{background-color:#9E8877!important;}
        /*! CSS Used from: Embedded */
        *{font-family:Arial, serif;}
    </style>
</head>

<body class="">
<table style="border:0; width:100%">
    <tr>
        <td class="text-center p-3 p-md-5">
            <div class="w-100 d-inline-block bg-color-9" style="max-width:600px">
                <div class="bg-color-3 text-center py-5" style="background-image:url('{{ config('app.prod_url') . '/img/home/bg-2.webp' }}')">
                    <img src="{{ config('app.prod_url') . '/img/home/bare-white.png' }}" class="d-inline" width="150" alt="{{ config('app.name') }}" />
                </div>

                <div class="text-start px-4 px-md-5 py-5">
                    <h5 class="text-white mb-4">BARE New Inquiry</h5>

                    <p class="text-white mb-3">Dear Support Team,</p>

                    <p class="text-white mb-3">We have received a new message from a user seeking assistance. Please find the details below:</p>

                    <p class="text-white mb-0">Name: {{ $data['name'] }}</p>
                    <p class="text-white mb-3">Email: {{ $data['email'] }}</p>

                    <p class="text-white mb-0">Message:</p>
                    <p class="text-white mb-3">{{ $data['message'] }}</p>

                    <p class="text-white mb-3">---</p>

                    <p class="text-white mb-3">Please take the necessary steps to address this user's inquiry as soon as possible. If you require any additional information or clarification, please reach out to the user directly using the provided email address.</p>

                    <p class="text-white mb-0">Thank you for your prompt attention to this matter.</p>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
