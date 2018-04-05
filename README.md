# PHP Helper - Tree

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Quick Installation

```bash
composer require danielcosta/tree
```

## Usage

To use, just get an array like bellow

```php
$flatArray = [
    [
        'id' => 1,
        'name' => 'Level 1',
        'parentId' => 0,
        'nodes' => [],
    ],
    [
        'id' => 3,
        'name' => 'Level 3',
        'parentId' => 2,
        'nodes' => [],
    ],
    [
        'id' => 2,
        'name' => 'Level 2',
        'parentId' => 1,
        'nodes' => [],
    ],
];
```

And pass it to the helper `Tree`, using `Tree::makeFromFlatArray($flatArray);`. The result will be exactly this:

```php
$result = Tree::makeFromFlatArray($flatArray);
print_r($result);
/*
Array
(
    [id] => 1
    [name] => Level 1
    [parentId] => 0
    [nodes] => Array
        (
            [0] => Array
                (
                    [id] => 2
                    [name] => Level 2
                    [parentId] => 1
                    [nodes] => Array
                        (
                            [0] => Array
                                (
                                    [id] => 3
                                    [name] => Level 3
                                    [parentId] => 2
                                    [nodes] => Array
                                        (
                                        )
                                )
                        )
                )
        )
)
*/
```

Optional parameters to this method are:

* $parentId = 0 - when you want to set the first level of the return
* string $key = 'id' - the primary key on your flat array
* string $parentKey = 'parentId' - the parent key on your flat array
* string $childKey = 'nodes' - where to put the child nodes

## Buy me a coffee

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4A6GYRWAGVMNG)

[ico-version]: https://img.shields.io/packagist/v/danielcosta/tree.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/danielcosta/tree/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/danielcosta/tree.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/danielcosta/tree.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/danielcosta/tree.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/danielcosta/tree
[link-travis]: https://travis-ci.org/danielcosta/tree
[link-scrutinizer]: https://scrutinizer-ci.com/g/danielcosta/tree/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/danielcosta/tree
[link-downloads]: https://packagist.org/packages/danielcosta/tree
[link-author]: https://github.com/danielcosta
[link-contributors]: ../../contributors
