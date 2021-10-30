<?php

namespace App\DataStructuresAndAlgorithms\TreePostorderTraversal;

class PostOrderBuilder
{
    private string $result = '';

    public function build(Node $node): string
    {
        $this->getData($node);

        return trim($this->result, ' ');
    }

    private function getData(?Node $node){
        if(!is_null($node)){
            $this->result = sprintf('%u %s', $node->getData(), $this->result);
            $this->getData($node->getRight());
            $this->getData($node->getLeft());
        }
    }
}

