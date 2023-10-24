RBAC Manager for Yii 2
======================
GUI manager for RBAC (Role Base Access Control) Yii2. Easy to manage authorization of user.

Documentation
-------------
- [Authorization Guide](http://www.yiiframework.com/doc-2.0/guide-security-authorization.html). Important, read this
  first before you continue.
- [Basic Configuration](docs/configuration.md)
- [Basic Usage](docs/basic-usage.md).
- [User Management](docs/user-management.md).
- [Using Menu](docs/using-menu.md).
- [Api](https://xandrkat.github.io/yii2-radmin/index.html).

Installation
------------

### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require xandrkat/yii2-radmin
```

or

```
composer require xandrkat/yii2-radmin
```

Or, you may add

```
"xandrkat/yii2-radmin": "*"
```

to the require section of your `composer.json` file and execute `php composer.phar update` or `composer update`.

### Install From the Archive

In your application config, add the path alias for this extension.

```php
return [
    ...
    'aliases' => [
        '@radmin' => 'path/to/your/extracted',
        // for example: '@xandrkat/radmin' => '@app/extensions/xandrkat/yii2-radmin-2.0.0',
    ]
];
```

