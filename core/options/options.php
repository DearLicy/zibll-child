<?php

// 这里我们设置为父主题前缀，将菜单挂载至父主题后台菜单
$prefix = 'child_options';

// 设置图片目录为子主题的路径
$imagepath = get_stylesheet_directory_uri() . '/img/';

    //开始构建
    CSF::createOptions($prefix, array(
        'menu_title'         => '子主题设置',
        'menu_slug'          => 'child_options',
        'framework_title'    => '子主题',
        'show_in_customizer' => true, //在wp-customize中也显示相同的选项
        'footer_text'        => '更优雅的wordpress主题-Zibll主题 V' . wp_get_theme()['Version'],
        'footer_credit'      => '<i class="fa fa-fw fa-heart-o" aria-hidden="true"></i> ',
        'theme'              => 'light',
    ));


// 创建一个示例菜单项，挂在'child-theme-features'下
// 'parent'      => 挂钩到上面创建的栏目ID，使这个新的部分成为其子部分
// 'title'       => 子菜单项的标题
// 'icon'        => 子菜单项的图标
// 'description' => 菜单项描述，显示在菜单顶部
// 'fields'      => 字段数组，定义了该菜单下的所有设置选项
CSF::createSection($prefix, array(
    'id'          => 'demo', // 指定该节将作为哪个父节的子节
    'title'       => '演示字段', // 子菜单项的标题
    'icon'        => 'fa fa-cog', // 子菜单项的图标
    'description' => '这里你可以配置子主题的各种高级选项.', // 菜单顶部的描述信息
    'fields'      => array(
        // 消息字段：显示一段HTML内容
        array(
            'type'    => 'submessage', // 字段类型
            'content' => '<p><b>消息字段：</b></p><p>支持自定义HTML</p>', // 自定义HTML内容
            'style'   => 'warning', // 消息样式（如：info, success, warning, danger）
        ),
        // 文本输入框
        array(
            'id'      => 'example_textfield', // 字段ID，用于存储数据时识别
            'type'    => 'text', // 字段类型
            'title'   => '文本字段示例', // 字段标题
            'subtitle'=> '这是一个简单的文本输入框', // 字段副标题
            'default' => '默认文本', // 默认值
            'desc'    => '提供给用户的额外说明.', // 描述信息
        ),
        // 开关字段
        array(
            'title'   => '启用/禁用某功能', // 字段标题
            'id'      => 'example_switcher', // 字段ID
            'class'   => 'compact', // CSS类，可以用来改变外观
            'type'    => 'switcher', // 字段类型
            'default' => true, // 默认状态，true为开启，false为关闭
            'desc'    => '根据开关状态执行不同的操作.', // 描述信息
        ),
        // 文本区域（多行文本）
        array(
            'id'      => 'example_textarea', // 字段ID
            'type'    => 'textarea', // 字段类型
            'title'   => '多行文本区域', // 字段标题
            'subtitle'=> '允许用户输入多行文本', // 字段副标题
            'desc'    => '适合长文本输入，如描述或备注.', // 描述信息
        ),
        // 图片上传器
        array(
            'id'      => 'example_image_upload', // 字段ID
            'type'    => 'media', // 字段类型，允许选择媒体文件（图片、视频等）
            'title'   => '上传图片', // 字段标题
            'subtitle'=> '选择并上传一张图片', // 字段副标题
            'desc'    => '用于展示或作为背景图片使用.', // 描述信息
        ),
        // 选择框
        array(
            'id'      => 'example_select', // 字段ID
            'type'    => 'select', // 字段类型
            'title'   => '选择框示例', // 字段标题
            'options' => array( // 可选值列表
                'option1' => '选项 1',
                'option2' => '选项 2',
                'option3' => '选项 3',
            ),
            'default' => 'option1', // 默认选择的值
            'desc'    => '从列表中选择一个选项.', // 描述信息
        ),
        // 颜色选择器
        array(
            'id'      => 'example_color_picker', // 字段ID
            'type'    => 'color', // 字段类型
            'title'   => '颜色选择器', // 字段标题
            'default' => '#ffffff', // 默认颜色值
            'desc'    => '选择一个颜色用于网站元素.', // 描述信息
        ),
        // 字段依赖性示例：仅当开关开启时显示文本框
        array(
            'id'      => 'dependent_text',
            'type'    => 'text',
            'title'   => '依赖性文本框',
            'dependency' => array('example_switcher', '=', '1'), // 当开关开启（值为1）时显示此字段
            'desc'    => '仅在上方开关开启时可见',
        ),
    ),
));

// 功能演示
CSF::createSection($prefix, array(
    'id'      => 'base',
    'title'       => '功能演示',
    'icon'        => 'fa fa-linode',
    'description' => '',
    'fields'      => array(
        array(
            'title'   => '彩色滚动条',
            'id'      => 'child_demo_func',
            'subtitle'=> '开启后将网站滚动条改成彩色',
            'class'   => 'compact',
            'type'    => 'switcher',
            'default' => false,
            'desc'    => '菜单字段在子主题目录下的<code>/core/options/options.php</code>，功能字段在子主题目录下的<code>/core/functions/functions.php</code>',
        ),
        array(
            'title'   => '启用维护模式',
            'id'      => 'maintenance_mode_switcher',
            'class'   => 'compact',
            'type'    => 'switcher',
            'default' => false, // 默认关闭
            'desc'    => '开启后，除管理员外的所有用户将看到维护页面.',
        ),
    ),
));