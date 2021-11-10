<?php

namespace App\DataStructuresAndAlgorithms\ReverseALinkedList;

class ReversedLinkedListBuilder extends AbstractLinkedList
{
    /**
     * @param  Node  $node
     * @return $this
     */
    public function build(Node $node): self
    {
        $this->forEach($node, [$this, 'setNextNode']);

        return $this;
    }

    protected function setNextNode(Node $node)
    {
        $this->head = $node->setNexNode($this->head);
    }
}
