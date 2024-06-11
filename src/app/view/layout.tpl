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
        <!-- 如果使用了组件的 icon 属性，还需要引入图标的 CSS 文件 -->
        <script src="{$pjax}"></script>
        <script src='{$nprogress}'></script>
        <link rel='stylesheet' href='{$nprogress_css}'/>
        <link rel="stylesheet" href="../static/pjax.css">
        <script src="../static/main.js"></script>
    {/if}
    <title>Hello, world!</title>
</head>
<body>

<a href="hello.html" target="_blank">
    <mdui-button>hello</mdui-button>
</a>

<h1>Hello,{$name}</h1>
<div id="container">
    {include file="$__template_file"}
</div>
{if !$__pjax}
    <script>
        var selectors = ["title", "#container"];
        var pjax = new Pjax({
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
        });
        nova.onload();
    </script>
{/if}
</body>
</html>