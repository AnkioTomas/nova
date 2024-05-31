<?php
return [
    'debug'=>true,//当前是否为调试模式
    'cache_driver' => 'nova\framework\cache\ApcuCacheDriver',//如果apcu不可用，则默认使用文件缓存
];