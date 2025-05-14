# Zibll Child Theme Framework

![Zibll Child Theme Screenshot](https://count.getloli.com/@zibll_child?name=zibll_child&theme=random&padding=7&offset=0&align=top&scale=1&pixelated=1&darkmode=auto)

## 项目简介

这是一个专为Zibll主题设计的现代化子主题开发框架，提供标准化的开发结构和高效的功能扩展方案。本框架采用模块化设计，完美适配Zibll主题8.x版本，帮助开发者快速构建功能丰富的子主题。

## ✨ 核心优势

### 🚀 模块化开发架构
- **功能与配置分离**：`functions.php`仅负责核心加载，功能与选项独立存放
- **智能自动加载**：通过`core/core.php`统一管理依赖加载
- **配置集中管理**：所有主题选项通过`core/options/options.php`统一配置

### 🛡️ 安全稳定
- **配置安全获取**：`_child()`函数自动处理选项获取
- **更新无忧**：独立于父主题的更新机制
- **标准化结构**：符合WordPress最佳实践的子主题结构

### ⚡ 高效开发
```php
// 智能依赖加载系统
zib_require(array(
    'core/options/options', // 配置文件
    'core/functions/functions', // 功能函数
), true);
```

## 目录结构

```
zibll_child/
├── core/                  # 核心代码目录
│   ├── functions/         # 功能函数目录
│   │   └── functions.php  # 功能函数主文件
│   ├── options/           # 主题选项目录
│   │   └── options.php     # 主题选项配置
│   └── core.php           # 核心加载文件
├── functions.php          # 主题入口文件
├── style.css              # 主题样式表
└── screenshot.jpg         # 主题截图
```

## 🛠️ 安装使用

### 基本安装
1. 下载zip压缩包
2. 上传至`/wp-content/themes/`
3. 在WordPress后台启用子主题

### 开发者使用
1. 克隆仓库到主题目录：
```bash
cd wp-content/themes
git clone https://github.com/yourrepo/zibll-child.git
```
2. 激活主题

## 功能模块

### 核心加载系统 (`core/core.php`)
```php
// 安全获取选项值
$value = _child('option_name', 'default_value');

// 智能加载模块
zib_require([
    'core/modules/new-module'
], true);
```

### 功能函数 (`core/functions/functions.php`)
存放所有自定义功能函数，例如：
```php
// 添加自定义短代码
add_shortcode('custom_shortcode', 'custom_shortcode_handler');

// 注册自定义小工具
add_action('widgets_init', 'register_custom_widgets');
```

### 主题选项 (`core/options/options.php`)
使用CSF框架创建主题选项页面：
```php
CSF::createSection($prefix, [
    'title' => '基本设置',
    'fields' => [
        // 选项字段配置
    ]
]);
```

## 开发指南

### 添加新功能
1. 在`core/functions/functions.php`中添加功能代码
2. 如需新选项，在`core/options/options.php`中添加字段
3. 通过`_child()`函数获取选项值

### 覆盖父主题模板
将需要修改的父主题模板文件复制到子主题对应目录，例如：
```
父主题: /zibll/header.php 
子主题: /zibll-child/header.php
```

## 开源协议

GPLv3 © 2025 [李初一]

---

💡 **专业提示**：本框架已预置Zibll主题最佳实践结构，建议通过子主题扩展功能而非直接修改父主题。

需要帮助？请提交[Issue](https://github.com/yourrepo/zibll-child/issues)
