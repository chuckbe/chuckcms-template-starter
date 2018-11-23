<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta name="google-site-verification" content="bE0I5-3dkHpMW80FTgcR7LqL58lFi_Uzx9CQMK4qQHA" />-->
        
        <title>@yield('title')</title>
        
        @yield('meta')

        @if(array_key_exists('raw', $template->fonts))
        <link href="https://fonts.googleapis.com/css?family={{ $template->fonts['raw'] }}" rel="stylesheet" type="text/css" />
        @endif
        @foreach($template->css as $cssKey => $cssValue)
            @if($cssValue['asset'] == 'true')
                <link rel="stylesheet" href="{{ asset($cssValue['href']) }}" type="text/css" />
            @endif
            @if($cssValue['asset'] == 'false')
                <link rel="stylesheet" href="{{ $cssValue['href'] }}" type="text/css" />
            @endif
        @endforeach
        @yield('css')

    </head>
    <body>
        
        <div class="body">
            <div class="container">
                @yield('content')
            </div>
        </div>

        @foreach($template->js as $jsKey => $jsValue)
            @if($jsValue['asset'] == 'true')
                <script src="{{ asset($jsValue['href']) }}"></script>
            @endif
            @if($jsValue['asset'] == 'false')
                <script src="{{ $jsValue['href'] }}"></script>
            @endif
        @endforeach

        <script type="text/javascript">
            var path = window.location.pathname.split('/');
            path = path[path.length-1];
            if (path !== undefined) {
              $("ul.navbar-nav")
                .find("a[href$='" + path + "']") // gets all links that match the href
                .parents('li')  // gets all list items that are ancestors of the link
                .addClass('active');
            }
            if (window.location =='http://www.chuck.be/' || window.location =='http://beta.chuck.be/'){
                $("ul.navbar-nav")
                .find('li').first() // get first list item
                .addClass('active');
            }

            (function($){
                $(document).ready(function(){
                    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
                        event.preventDefault(); 
                        event.stopPropagation(); 
                        $(this).parent().siblings().removeClass('open');
                        $(this).parent().toggleClass('open');
                    });
                });
            })(jQuery);
        </script>

        @yield('scripts')

        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-85594949-1"></script> -->
        <script>
          // window.dataLayer = window.dataLayer || [];
          // function gtag(){dataLayer.push(arguments)};
          // gtag('js', new Date());

          // gtag('config', 'UA-85594949-1');
        </script>

    </body>    

</html>