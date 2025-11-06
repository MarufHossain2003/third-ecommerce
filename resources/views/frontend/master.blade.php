<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Multimedia BD</title>

    @include('frontend.includes.style')

</head>
<body>
    <noscript>
        <div style="background-color: #ffdddd; padding: 10px; border: 1px solid red; color: red;">
            ⚠️ আপনার ব্রাউজারে JavaScript চালু নেই। সাইটের সব ফিচার ব্যবহার করতে JavaScript চালু করুন।
        </div>
    </noscript>
    @include('frontend.includes.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.includes.footer')

    @include('frontend.includes.script')

    @stack('script')
</body>
</html>