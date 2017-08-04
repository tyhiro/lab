<?php
namespace Queue\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QueueController
{

    public function indexAction(Request $request)
    {
        ob_start();
        var_dump($request->attributes->all());

        $result = ob_get_clean();

        $response = new Response($result . rand());

        $date = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
        $response->setCache([
            'public'        => true,
            'etag'          => 'abcde',
            'last_modified' => $date,
            'max_age'       => 10,
            's_maxage'      => 10,
        ]);

        return $response;
    }
}