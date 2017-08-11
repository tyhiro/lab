<?php
namespace Other\Controller;


use Other\Model\Db\Result;
use Other\Model\Db\ResultSet\HydratingResultSet;
use Other\Model\Product;
use Other\Model\Strategy\HydrateProductStrategy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherController
{

    public function indexAction(Request $request)
    {
        ob_start();
        var_dump($request->attributes->all());

        $items = $this->getProductList();

        foreach ($items as $item) {
            var_dump($item);
        }
        $result = ob_get_clean();
        $response = new Response($result . rand());

        $date = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
        $response->setCache([
            'public'        => true,
            'etag'          => 'abcde',
            'last_modified' => $date,
            'max_age'       => 5,
            's_maxage'      => 5,
        ]);

        return $response;
    }

    /**
     * @return Result
     */
    private function getItems()
    {
        return new Result(
            [
                ['field1' => 'field1_value1', 'field2' => 'field2_value1'],
                ['field1' => 'field1_value2', 'field2' => 'field2_value2'],
            ]
        );
    }

    private function getProductList()
    {
        $result = $this->getItems();

        $resultSet = new HydratingResultSet(new Product(), new HydrateProductStrategy());

        $resultSet->initialize($result);

        return $resultSet;
    }
//
//    /**
//     * @return HydratingResultSet
//     */
//    private function getProductWishLists()
//    {
//        $result = $this->getItems();
//
//        $resultSet = new HydratingResultSet(new ProductWIshList());
//
//        $resultSet->initialize($result);
//
//        return $resultSet;
//    }
}
