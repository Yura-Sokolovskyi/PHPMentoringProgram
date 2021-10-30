<?php

namespace App\DataStructuresAndAlgorithms\TreePostorderTraversal;

class TreeBuilder
{
    private ?Node $rootNode = null;

    public function buildFromArray(array $data): Node
    {
        foreach ($data as $number) {
            $this->rootNode = $this->insert($this->rootNode, $number);
        }

        return $this->rootNode;
    }

    private function insert(?Node $root, $data): Node
    {
        if (is_null($root)) {
            return new Node($data);
        } else {
            if ($data <= $root->getData()) {
                $current = $this->insert($root->getLeft(), $data);
                $root->setLeft($current);
            } else {
                $current = $this->insert($root->getRight(), $data);
                $root->setRight($current);
            }

            return $root;
        }
    }
}
