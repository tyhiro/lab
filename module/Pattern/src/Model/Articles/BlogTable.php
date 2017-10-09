<?php
namespace Pattern\Model\Articles;

/**
 * Class BlogTable
 * @package Pattern\Model\Articles
 */
class BlogTable implements ArticlesTableInterface
{
    /**
     * {@inheritdoc}
     */
    public function fetchAll()
    {
        return [
            [
                'name'=>'Blog name 1',
                'text'=>'Text blog 1'
            ],
            [
                'name'=>'Blog name 2',
                'text'=>'Text blog 2'
            ],
            [
                'name'=>'Blog name 3',
                'text'=>'Text blog 3'
            ],
            [
                'name'=>'Blog name 4',
                'text'=>'Text blog 4'
            ]

        ];
    }
}
