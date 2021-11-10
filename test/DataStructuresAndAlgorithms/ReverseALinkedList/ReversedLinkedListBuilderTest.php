<?php

use App\DataStructuresAndAlgorithms\ReverseALinkedList\LinkedListBuilder;
use App\DataStructuresAndAlgorithms\ReverseALinkedList\ReversedLinkedListBuilder;
use PHPUnit\Framework\TestCase;

class ReversedLinkedListBuilderTest extends TestCase
{
    public function testReversedLinkedList()
    {
        $listBuilder = (new LinkedListBuilder())->buildFromArray([1,1,4,1,3,2,3,1,4,1,1]);
        $list = $listBuilder->getList();

        $this->assertEquals('1 2 3 4', $listBuilder->toString());

        $this->assertEquals(1, $list->getData());
        $this->assertEquals(2, $list->getNexNode()->getData());
        $this->assertEquals(3, $list->getNexNode()->getNexNode()->getData());
        $this->assertEquals(4, $list->getNexNode()->getNexNode()->getNexNode()->getData());
        $this->assertNull($list->getNexNode()->getNexNode()->getNexNode()->getNexNode());

        $reversedListBuilder = (new ReversedLinkedListBuilder())->build($list);
        $reversedList = $reversedListBuilder->getList();

        $this->assertEquals(4, $reversedList->getData());
        $this->assertEquals(3, $reversedList->getNexNode()->getData());
        $this->assertEquals(2, $reversedList->getNexNode()->getNexNode()->getData());
        $this->assertEquals(1, $reversedList->getNexNode()->getNexNode()->getNexNode()->getData());
        $this->assertNull($reversedList->getNexNode()->getNexNode()->getNexNode()->getNexNode());

        $this->assertEquals('4 3 2 1', $reversedListBuilder->toString());
    }
}
