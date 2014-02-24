<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{lang}}" dir={{dir}}> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="{{lang}}" dir={{dir}}> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="{{lang}}" dir={{dir}}> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{lang}}" dir={{dir}}> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{page_title}}</title>
    <meta name="description" content="{{meta_description}}">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/assets/css/main.min.css">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="/assets/js/html5shiv.min.js"><\/script>')</script>
    <![endif]-->

    {{headerSheets}}
    {{headerScripts}}
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->
{{mainContent}}


<script src="/assets/js/main.min.js"></script>
{{footerScripts}}
<script>
    var _gaq = [
        ['_setAccount', '{{analyticsID}}'],
        ['_trackPageview']
    ];
    (function (d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>
</body>
</html>