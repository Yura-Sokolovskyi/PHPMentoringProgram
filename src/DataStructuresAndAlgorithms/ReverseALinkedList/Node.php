<?php

namespace App\DataStructuresAndAlgorithms\ReverseALinkedList;

class Node
{
    private ?Node $nexNode = null;

    public function __construct(private int $data)
    {
    }

    /**
     * @param  Node|null  $nexNode
     * @return Node
     */
    public function setNexNode(?self $nexNode): self
    {
        $this->nexNode = $nexNode;

        return $this;
    }

    /**
     * @return ?Node
     */
    public function getNexNode(): ?self
    {
        return $this->nexNode;
    }

    /**
     * @param  int  $data
     */
    public function setData(int $data): void
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getData(): int
    {
        return $this->data;
    }
}
