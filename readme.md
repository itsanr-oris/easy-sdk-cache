## 简介

Easy sdk Cache扩展组件包

[![Latest Stable Version](https://poser.pugx.org/f-oris/easy-sdk-cache/v)](//packagist.org/packages/f-oris/easy-sdk-cache) [![Total Downloads](https://poser.pugx.org/f-oris/easy-sdk-cache/downloads)](//packagist.org/packages/f-oris/easy-sdk-cache) [![Latest Unstable Version](https://poser.pugx.org/f-oris/easy-sdk-cache/v/unstable)](//packagist.org/packages/f-oris/easy-sdk-cache) [![License](https://poser.pugx.org/f-oris/easy-sdk-cache/license)](//packagist.org/packages/f-oris/easy-sdk-cache)

## 安装

通过composer引入扩展包

```bash
composer require f-oris/easy-sdk-cache:^2.0
```

Publish配置信息

```bash
php artisan vendor:publish --provider="Foris\Easy\Sdk\Cache\ServiceProvider"
```

## 使用

通过服务容器，获取Cache实例，按照[easy-cache](https://github.com/itsanr-oris/easy-cache)使用说明进行调用即可

```php
<?php

$app = new \Foris\Easy\Sdk\Application();
$app->get('cache')->put('key', 'value', 600);

```

## License

MIT License

Copyright (c) 2019-present F.oris <us@f-oris.me>

