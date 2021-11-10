<?php

namespace App\DataStructuresAndAlgorithms\TreeTopView;

use App\DataStructuresAndAlgorithms\TreeNode;

class TreeTopViewBuilder
{
    private array $results = [];

    /**
     * @param  TreeNode  $node
     * @return string
     */
    public function build(TreeNode $node): string
    {
        $this->getData($node);

        return implode(' ', array_values($this->results));
    }

    private function getData(?TreeNode $node, int $index = 0)
    {
        if (!is_null($node)) {
            if (!array_key_exists($index, $this->results)) {
                $this->results[$index] = $node->getData();
            }

            $this->getData($node->getRight(), $index + 1);
            $this->getData($node->getLeft(), $index - 1);
        }
    }
}