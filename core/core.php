<?php

// 获取插件菜单设置
// 例如：菜单id为 aut_url
// 则通过：_child('aut_url') 获取这里的内容
if (!function_exists('_child')) {
    function _child($option = '', $default = null) {
        $options = get_option('child_options');
        return (isset($options[$option])) ? $options[$option] : $default;
    }
}

// 载入文件，这是子比主题引入文件的函数调用示例，详见父主题目录下的inc/inc.php第80行zib_require()函数
zib_require(array(
    'core/options/options', // 配置文件
    'core/functions/functions', // 功能函数
), true);
