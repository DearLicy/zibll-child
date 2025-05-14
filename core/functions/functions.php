<?php

// 编写一个函数，用于输出彩色滚动条
// 这里用最简单的方式实现输出功能，挂钩在页面头部钩子wp_head，页面底部钩子为wp_footer
function child_demo_function() {
    // 这里的_child('child_demo_func')为获取子比主题后台菜单配置，其中的child_demo_func为后台菜单功能项的id
    if (_child('child_demo_func')) {
        echo '<style>::-webkit-scrollbar{width:10px;height:1px;}::-webkit-scrollbar-thumb{background-color:#12b7f5;background-image:-webkit-linear-gradient(45deg,rgba(255,93,143,1) 25%,transparent 25%,transparent 50%,rgba(255,93,143,1) 50%,rgba(255,93,143,1) 75%,transparent 75%,transparent);}::-webkit-scrollbar-track{-webkit-box-shadow:inset 0 0 5px rgba(0,0,0,0.2);background:#f6f6f6;}</style>';
    }

}
add_action('wp_head','child_demo_function');

// 检查并处理维护模式
function wp_maintenance_mode() {
    // 获取CSF框架中维护模式开关的状态
    $maintenance_mode_enabled = _child('maintenance_mode_switcher');

    // 如果维护模式开启且当前用户不是管理员，则显示维护页面
    if ($maintenance_mode_enabled && !current_user_can('manage_options')) {
        // 设置默认的维护信息和标题
        $blogname = get_bloginfo('name');
        $main_maintain_content = '<div>' . __('网站正在维护中...', 'textdomain') . '</div>';
        wp_die(
            $main_maintain_content,
            __('站点维护中 - ', 'textdomain') . $blogname,
            array('response' => 503) // 使用503 Service Unavailable作为HTTP状态码
        );
        exit; // 确保脚本在此处停止执行
    }
}

// 将上述函数挂钩到WordPress的get_header动作上
add_action('get_header', 'wp_maintenance_mode');