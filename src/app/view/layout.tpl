<!doctype html>
<html lang="zh-CN" class="mdui-theme-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>

    {if !$pjax}

    <link rel="stylesheet" href="https://unpkg.com/mdui@2/mdui.css">
    <script src="https://unpkg.com/mdui@2/mdui.global.js"></script>
    <!-- 如果使用了组件的 icon 属性，还需要引入图标的 CSS 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/pjax@0.2.8/pjax.js"></script>
        <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
        <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
    {/if}
    <title>Hello, world!</title>
</head>
<body>

<a href="hello.html" target="_blank"><mdui-button>hello</mdui-button></a>

<h1>Hello,{$name}</h1>
<div id="container">
    {include file="$__template_file"}
</div>
{if !$pjax}
<script>
    var pjax = new Pjax({
        elements: "a", // default is "a[href], form[action]"
        selectors: ["title", "#container"]
    });
    // Pjax 开始时执行的函数
    document.addEventListener("pjax:send", function () {
        // 进度条默认已经加载 20%
        NProgress.start();
        //移除其他页面的事件

    });

    // Pjax 完成之后执行的函数
    document.addEventListener("pjax:complete", function () {
        NProgress.done();
    });
</script>
{/if}
</body>
</html>