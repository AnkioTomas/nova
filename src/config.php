<?php
return [
    'debug'=>true,//当前是否为调试模式
    'timezone'=>'Asia/Shanghai',//时区
    'default_route'=>true,//启用默认路由，nova默认根据url自动解析到AnyModule/AnyController/AnyMethod方法，如果设置为false，则需要手动配置路由
    'cache_driver' => 'nova\framework\cache\ApcuCacheDriver',//如果apcu不可用，则默认使用文件缓存
    'render_engine' => 'nova\framework\render\SmartyRender',//默认使用smarty模板引擎
];