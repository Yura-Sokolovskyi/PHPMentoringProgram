<?php

namespace App\DataStructuresAndAlgorithms;

class TreeNode
{
    private ?TreeNode $left = null;
    private ?TreeNode $right = null;

    public function __construct(private int $data)
    {
    }

    /**
     * @return ?TreeNode
     */
    public function getLeft(): ?self
    {
        return $this->left;
    }

    /**
     * @param  TreeNode  $left
     */
    public function setLeft(self $left): void
    {
        $this->left = $left;
    }

    /**
     * @return ?TreeNode
     */
    public function getRight(): ?self
    {
        return $this->right;
    }

    /**
     * @param  TreeNode  $right
     */
    public function setRight(self $right): void
    {
        $this->right = $right;
    }

    /**
     * @return int
     */
    public function getData(): int
    {
        return $this->data;
    }
}
