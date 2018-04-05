<?php

use DCST\Tree\Tree;
use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase
{
    public function testMakeFromFlatArray()
    {
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

        $expected = [
            1 => [
                'id' => 1,
                'name' => 'Level 1',
                'parentId' => 0,
                'nodes' => [
                    2 => [
                        'id' => 2,
                        'name' => 'Level 2',
                        'parentId' => 1,
                        'nodes' => [
                            3 => [
                                'id' => 3,
                                'name' => 'Level 3',
                                'parentId' => 2,
                                'nodes' => [],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $actual = Tree::makeFromFlatArray($flatArray);

        $this->assertEquals($expected, $actual);
    }

    public function testMakeFromFlatArrayShouldThrowInvalidArgumentExceptionWhenKeyDoesNotExists()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid identifier key');

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

        Tree::makeFromFlatArray($flatArray, 0, 'differentPrimaryKey');
    }

    public function testMakeFromFlatArrayShouldThrowInvalidArgumentExceptionWhenParentKeyDoesNotExists()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid parent key');

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

        Tree::makeFromFlatArray($flatArray, 0, 'id', 'differentParentKey');
    }
}
