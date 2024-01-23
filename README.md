# Laravel Categories

[![Build Status](https://img.shields.io/travis/faustbrian/Laravel-Categories/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Laravel-Categories)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/laravel-categories.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Laravel-Categories.svg?style=flat-square)](https://github.com/faustbrian/Laravel-Categories/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Laravel-Categories.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Laravel-Categories)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require uptoolkit/laravel-categories
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Uptoolkit\Categories\CategoriesServiceProvider" && php artisan migrate
```

## Usage

## Nested Sets

Check [lazychaser/laravel-nestedset](https://github.com/lazychaser/laravel-nestedset) to learn how to create, update, delete, etc. categories.

## Setup a Model
``` php
<?php

namespace App;

use Uptoolkit\Categories\Traits\HasCategories;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasCategories;
}
```

## Examples

### Get an array with ids and names of categories (useful for drop-downs)
``` php
$post->categoriesList();
```

### Attach the Post Model these Categories
``` php
$post->syncCategories([Category::find(1), Category::find(2), Category::find(3)]);
```

### Detach the Post Model from these Categories
``` php
$post->syncCategories([]);
```

### Detach the Post Model from all Categories and attach it to the new ones
``` php
$post->syncCategories([Category::find(1), Category::find(3)]);
```

### Attach the Post Model to the given Category
``` php
$post->assignCategory(Category::find(1));
```

### Detach the Post Model from the given Category
``` php
$post->removeCategory(Category::find(1));
```

### Get all Posts that are attached to the given Category
``` php
Category::first()->entries(Post::class)->get();
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
