<?php declare(strict_types=1);

namespace DCST\Tree;

class Tree
{
    public static function makeFromFlatArray(
        array &$data,
        $parentId = 0,
        string $key = 'id',
        string $parentKey = 'parentId',
        string $childKey = 'nodes'
    ) {
        $branch = [];

        foreach ($data as $k => $v) {
            if (!isset($v[$key])) {
                throw new \InvalidArgumentException('Invalid identifier key');
            }

            if (!isset($v[$parentKey])) {
                throw new \InvalidArgumentException('Invalid parent key');
            }

            if ($v[$parentKey] == $parentId) {
                $childNodes = static::makeFromFlatArray($data, $v[$key], $key, $parentKey, $childKey);
                if ($childNodes) {
                    $v[$childKey] = $childNodes;
                }
                $branch[$v[$key]] = $v;
                unset($data[$k]);
            }
        }

        return $branch;
    }
}
