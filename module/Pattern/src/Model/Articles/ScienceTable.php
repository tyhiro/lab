<?php
namespace Pattern\Model\Articles;

/**
 * Class ScienceTable
 * @package Pattern\Model\Articles
 */
class ScienceTable implements ArticlesTableInterface
{
    /**
     * {@inheritdoc}
     */
    public function fetchAll()
    {
        return [
            [
                'name'=>'Science article name 1',
                'text'=>'Text science article 1'
            ],
            [
                'name'=>'Science article name 2',
                'text'=>'Text science article 3'
            ],
        ];
    }
}
