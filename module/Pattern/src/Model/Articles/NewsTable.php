<?php
namespace Pattern\Model\Articles;

/**
 * Class NewsTable
 * @package Pattern\Model\Articles
 */
class NewsTable implements ArticlesTableInterface
{
    /**
     * {@inheritdoc}
     */
    public function fetchAll()
    {
        return [
            [
                'name'=>'News name 1',
                'text'=>'Text News 1'
            ],
            [
                'name'=>'News name 2',
                'text'=>'Text News 3'
            ]
        ];
    }
}
