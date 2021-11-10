<?php

namespace App\DataStructuresAndAlgorithms\TreePostorderTraversal;

use App\DataStructuresAndAlgorithms\TreeNode;

class PostOrderBuilder
{
    private string $result = '';

    /**
     * @param  TreeNode  $node
     * @return string
     */
    public function build(TreeNode $node): string
    {
        $this->getData($node);

        return $this->result;
    }

    private function getData(?TreeNode $node)
    {
        if (! is_null($node)) {
            if ($this->result) {
                $this->result = ' '.$this->result;
            }

            $this->result = sprintf('%u%s', $node->getData(), $this->result);
            $this->getData($node->getRight());
            $this->getData($node->getLeft());
        }
    }
}
