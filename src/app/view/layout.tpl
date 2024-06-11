<!doctype html>
<html lang="zh-CN" class="mdui-theme-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>

    {if !$__pjax}
        {include file="cdn.tpl"}
        <link rel="stylesheet" href="{$mdui_css}">
        <script src="{$mdui}"></script>
        <script src="{$pjax}"></script>
        <script src='{$nprogress}'></script>
        <link rel='stylesheet' href='{$nprogress_css}'/>
        <link rel="stylesheet" href="../static/main.css">
        <script src="../static/translate.js"></script>
        <script src="../static/main.js"></script>
    {/if}
    <title>Hello, world!</title>
</head>
<body>

<a href="hello.html" target="_blank">
    <mdui-button class="ignore">hello,tes</mdui-button>
</a>

<h1>Hello,{$name}</h1>
<div id="container" class="container">
    {include file="$__template_file"}
</div>
{if !$__pjax}
    <script>
        Translate.language.setLocal('chinese_simplified'); //设置本地语种（当前网页的语种）。如果不设置，默认自动识别当前网页显示文字的语种。 可填写如 'english'、'chinese_simplified' 等，具体参见文档下方关于此的说明。
        Translate.service.use('client.edge'); //设置机器翻译服务通道，直接客户端本身，不依赖服务端 。相关说明参考 http://translate.zvo.cn/43086.html
       // translate.selectLanguageTag.show = false;
        //lang="zh-CN"
        // translate.changeLanguage('english');
        //English,简体中文,繁体中文,日本語,русский,한국어
       // Translate.selectLanguageTag.languages = 'english,chinese_simplified,chinese_traditional,japanese,russian,korean';
        Translate.execute();//进行翻译
        //
        var selectors = ["title", "#container"];
        var pjax = new Pjax({
            cacheBust: false,
            elements: "a", // default is "a[href], form[action]"
            selectors: selectors
        });

        // Pjax 开始时执行的函数
        document.addEventListener("pjax:send", function () {
            NProgress.start();

            for (let selector of selectors) {
                var container = document.querySelector(selector);
                container.classList.add("fade-leave-active");
            }

            nova.onunload();
            nova.onload = function () {
                console.log("onload");
            }
            //Translate.execute();
        });

        // Pjax 完成之后执行的函数
        document.addEventListener("pjax:complete", function () {
            NProgress.done();
            for (let selector of selectors) {
                var container = document.querySelector(selector);
                container.classList.remove("fade-leave-active");
                container.classList.add("fade-enter");
                setTimeout(function() {
                    var container = document.querySelector(selector);
                    container.classList.remove("fade-enter");
                    container.classList.add("fade-enter-active");
                }, 10);
            }

            nova.onload();
            nova.onunload = function () {
                console.log("onunload");
            }
            Translate.execute();
        });
        nova.onload();
    </script>
{/if}
</body>
</html>