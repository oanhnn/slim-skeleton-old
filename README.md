Slim Skeleton
=============
[![Build Status](https://travis-ci.org/oanhnn/slim-skeleton.svg?branch=3.x)](https://travis-ci.org/oanhnn/slim-skeleton)
[![Join the chat at https://gitter.im/oanhnn/slim-skeleton](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/oanhnn/slim-skeleton?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

A skeleton for [Slim Framework v3](http://slimframework.com/) following MVC pattern.

Requirements
------------

* PHP >= 5.5.0
* slim/slim: ~3.0.0
* monolog/monolog: ~1.13

Optional:

* slim/twig-view: ^2.0
* slim/php-view: ^2.0
* slim/csrf: ^0.4.0
* slim/http-cache: ^0.3.0

Usage
-----

#### Create project
Using `composer` to create new project:

```shell
$ composer create-project oanhnn/slim-skeleton path/to/project --prefer-dist
```

Composer will create Slim project and all its dependencies under the `path/to/project` directory.

> If you don't have Composer yet, download it following the instructions on http://getcomposer.org/ or just run the following command:
> ```shell
> $ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
> ```

#### Build assets (css, js, ...)
```shell
$ composer build
```

#### Unit test
```shell
$ composer test
```

#### Run PHP build-in server
Run a build-in server on 0.0.0.0:8888
```shell
$ composer serve
```

Open web browser with address http://localhost:8888

#### Deploy project
To deploy a project using this skeleton, you can use [Deployer](http://deployer.org).   
See an example in [here](https://github.com/oanhnn/deployer-example).

#### Run task with gulp
// TODO

#### Directories structure
```
path/to/project
|
|-- app
|   |-- assets
|   |-- config
|   |-- lang
|   |-- src
|   |-- tests
|   \-- views
|   
|-- bin
|-- public
|   \-- assets
|
|-- tmp
|   |-- cache
|   \-- logs
|
\-- vendor

```

Contributing
------------

All code contributions must go through a pull request and approved by a core developer before being merged.
This is to ensure proper review of all the code.

Fork the project, create a feature branch, and send a pull request.

To ensure a consistent code base, you should make sure the code follows
the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

If you would like to help take a look at the [list of issues](https://github.com/oanhnn/slim-skeleton/issues).

Change log
----------

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

License
-------

Licensed under the MIT license. Please see [License File](LICENSE.md) for more information.