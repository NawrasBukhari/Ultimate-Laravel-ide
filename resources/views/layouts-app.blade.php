{{--Head links and metas goes here--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- HTML open tag -->
@include('includes.head')
<div id="particles-js">

<body class="black-content"> <!-- BODY open tag -->



{{--Body content goes here--}}
@yield('content')


{{--Application Javascript content goes here--}}
@include('includes.scripts')



</body> <!-- Body tag -->

</html> <!-- Html tag -->

