<?php

namespace App\DataStructuresAndAlgorithms\ReverseALinkedList;

class ReversedLinkedListBuilder extends AbstractLinkedList
{
    public function build(Node $node): self
    {
        $this->forEach($node, array($this, 'setNextNode'));

        return $this;
    }

    protected function setNextNode(Node $node){
        $this->head = $node->setNexNode($this->head);
    }
}

