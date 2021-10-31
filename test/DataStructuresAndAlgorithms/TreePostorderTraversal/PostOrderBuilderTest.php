<?php

use App\DataStructuresAndAlgorithms\TreePostorderTraversal\PostOrderBuilder;
use App\DataStructuresAndAlgorithms\TreePostorderTraversal\TreeBuilder;
use PHPUnit\Framework\TestCase;

class PostOrderBuilderTest extends TestCase
{
    public function testPostorderTraversal()
    {
        $tree = (new TreeBuilder())->buildFromArray([1,2,5,3,6,4]);

        $this->assertEquals('4 3 6 5 2 1', (new PostOrderBuilder())->build($tree));
    }
}
