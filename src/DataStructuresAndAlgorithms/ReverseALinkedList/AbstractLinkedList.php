<?php

namespace App\DataStructuresAndAlgorithms\ReverseALinkedList;

abstract class AbstractLinkedList
{
    protected ?Node $head = null;
    private string $listAsString = '';

    /**
     * @return Node|null
     */
    public function getList(): ?Node
    {
        return clone $this->head;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        if (!is_null($this->head)) {
            $this->forEach($this->head, array($this, 'appendToString'));
        }

        return $this->listAsString;
    }

    protected function forEach(Node $node, $callback)
    {
        $nextNode = $node->getNexNode();

        $callback($node);

        if (!is_null($nextNode)) {
            $this->forEach($nextNode, $callback);
        }
    }

    private function appendToString($data)
    {
        if ($this->listAsString) {
            $this->listAsString .= ' ';
        }

        $this->listAsString .= $data->getData();
    }
}
