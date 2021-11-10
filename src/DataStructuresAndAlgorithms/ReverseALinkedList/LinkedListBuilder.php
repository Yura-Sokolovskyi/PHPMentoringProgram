<?php

namespace App\DataStructuresAndAlgorithms\ReverseALinkedList;

class LinkedListBuilder extends AbstractLinkedList
{
    /**
     * @param  array  $data
     * @return $this
     */
    public function buildFromArray(array $data): self
    {
        foreach ($data as $number) {
            $this->appendNode($this->head, $number);
        }

        return $this;
    }

    private function appendNode(?Node $node, $data)
    {
        if (is_null($node)) {
            $this->head = new Node($data);
        } else {
            $currentNodeData = $node->getData();
            if (is_null($node->getNexNode())) {
                if ($data < $currentNodeData) {
                    $node->setData($data);
                    $node->setNexNode(new Node($currentNodeData));
                } elseif ($data != $currentNodeData) {
                    $node->setNexNode(new Node($data));
                }
            } else {
                if ($data < $currentNodeData) {
                    $node->setData($data);
                    $this->appendNode($node->getNexNode(), $currentNodeData);
                } elseif ($data != $currentNodeData) {
                    $this->appendNode($node->getNexNode(), $data);
                }
            }
        }
    }
}
