Slim Skeleton
=============

[![Join the chat at https://gitter.im/oanhnn/slim-skeleton](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/oanhnn/slim-skeleton?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

A skeleton for [Slim Framework v2](http://slimframework.com/) following MVC pattern.

Requirements
------------

* PHP 5.5.0 and up.
* mcrypt extension

Usage
-----
#### Create project
Using `composer` to create new project:

```shell
$ composer create-project oanhnn/slim-skeleton path/to/project
```

Composer will create Slim project and all its dependencies under the `path/to/project` directory.

> If you don't have Composer yet, download it following the instructions on http://getcomposer.org/ or just run the following command:
> ```shell
> $ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
> ```

#### Deploy project
To deploy a project using this skeleton, you can use [Deployer](http://deployer.org).   
See an example in [here](https://github.com/oanhnn/deployer-example).

#### Directories structure
```
path/to/project
|
|-- bin
|-- config
|-- public
|-- resources
|   |-- lang
|   |-- views
|
|-- src
|-- tests
|-- tmp
|   |-- cache
|   |-- logs
|
|-- vendor

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