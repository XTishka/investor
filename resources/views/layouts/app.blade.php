<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">

            <nav class="hidden md:flex space-x-10">
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    You are logged in as: {{ auth()->user()->name }}
                </a>
            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="{{ route('logout') }}"
                   class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

</div>

@yield('content')

<script type="text/javascript">
    $("#country").change(function () {
        $.ajax({
            url: "{{ route('wisher.countries') }}?country=" + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#property_id').html(data.html);
            }
        });
    });

    $("#week_id").change(function () {
        $.ajax({
            url: "{{ route('wisher.wishlist') }}?week=" + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#wishes').html(data.html);
            }
        });

        {{--$.ajax({--}}
        {{--    url: "{{ route('wisher.wish_qty') }}?week=" + $(this).val(),--}}
        {{--    method: 'GET',--}}
        {{--    success: function (data) {--}}
        {{--        $('#available_wishes').html(data.html);--}}
        {{--    }--}}
        {{--});--}}
    });
</script>
</body>
</html>
