<body class="font-sans antialiased">
{{--<h1>{{__("New Order Created")}}</h1>--}}
{{--<a href="">{{__("View order") . " " . $order->code}}</a>--}}

<div class="max-w-screen-lg bg-indigo-500 shadow-2xl rounded-lg mx-auto text-center py-12 mt-4">
    <h2 class="text-3xl leading-9 font-bold tracking-tight text-white sm:text-4xl sm:leading-10">
        {{__("New Order Created")}}
    </h2>
    <div class="mt-8 flex justify-center">
        <div class="inline-flex rounded-md bg-white shadow">
            <a href="#" class="text-gray-700 font-bold py-2 px-6">
                {{__("View order") . " " . $order->code}}
            </a>
        </div>
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
</body>
