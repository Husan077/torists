<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="google-site-verification" content="JINCMliWo8FNVpmbxXqkte-2b7KnLcZVJ_3sMzkBsrw" />
    @include('site.classes.head')
    <script language="JavaScript">

        window.onload = function () {
            document.addEventListener("contextmenu", function (e) {
                e.preventDefault();
            }, false);
            document.addEventListener("keydown", function (e) {
                //document.onkeydown = function(e) {
                // "I" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                    disabledEvent(e);
                }
                // "J" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                    disabledEvent(e);
                }
                // "S" key + macOS
                if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                    disabledEvent(e);
                }
                // "U" key
                if (e.ctrlKey && e.keyCode == 85) {
                    disabledEvent(e);
                }
                // "F12" key
                if (event.keyCode == 123) {
                    disabledEvent(e);
                }
            }, false);
            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
        }
        //edit: removed ";" from last "}" because of javascript error
    </script>

</head>
<body>
<div id="__next">
    @include('site.classes.header')
    @yield('content')
    @include('site.classes.footer')
</div>
</body>
@include('site.classes.script')
@include('sweetalert::alert')

</html>
