<?php

namespace App\DataStructuresAndAlgorithms\TreePostorderTraversal;

class Node
{
    private ?Node $left = null;
    private ?Node $right = null;

    public function __construct(private int $data)
    {
    }

    /**
     * @return ?Node
     */
    public function getLeft(): ?self
    {
        return $this->left;
    }

    public function setLeft(self $left): void
    {
        $this->left = $left;
    }

    /**
     * @return ?Node
     */
    public function getRight(): ?self
    {
        return $this->right;
    }

    public function setRight(self $right): void
    {
        $this->right = $right;
    }

    public function getData(): int
    {
        return $this->data;
    }
}
