<?php

namespace App\DataStructuresAndAlgorithms;

class TreeBuilder
{
    private ?TreeNode $rootNode = null;

    /**
     * @param  array  $data
     * @return TreeNode
     */
    public function buildFromArray(array $data): TreeNode
    {
        foreach ($data as $number) {
            $this->rootNode = $this->insert($this->rootNode, $number);
        }

        return $this->rootNode;
    }

    private function insert(?TreeNode $root, $data): TreeNode
    {
        if (is_null($root)) {
            return new TreeNode($data);
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
