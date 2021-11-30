<?php

namespace Test\DataStructuresAndAlgorithms\TreeTopView;

use App\DataStructuresAndAlgorithms\TreeBuilder;
use App\DataStructuresAndAlgorithms\TreeTopView\TreeTopViewBuilder;
use PHPUnit\Framework\TestCase;

class TreeTopViewBuilderTest extends TestCase
{
    public function testTreeTopView()
    {
        $tree = (new TreeBuilder())->buildFromArray([1, 2, 5, 3, 6, 4]);

        $this->assertEquals('1 2 5 6', (new TreeTopViewBuilder())->build($tree));
    }
}
