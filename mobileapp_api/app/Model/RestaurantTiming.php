<?php



class RestaurantTiming extends AppModel
{

    public $useTable = 'restaurant_timing';



    public function isRestaurantOpen($day,$restaurant_id)
    {



        return $this->find('first', array(



           // 'contain'=>array('RestaurantMenu.RestaurantMenuItem.RestaurantMenuExtraItem'),
            'conditions' => array(

                'RestaurantTiming.restaurant_id' => $restaurant_id,
                'RestaurantTiming.day' => $day,






            ),


            'recursive' => 0

        ));


    }
    public function RestaurantOpen($restaurant_id)
    {



        return $this->find('all', array(

           // 'contain'=>array('RestaurantMenu.RestaurantMenuItem.RestaurantMenuExtraItem'),
            'conditions' => array(

                'RestaurantTiming.restaurant_id' => $restaurant_id,
            ),
            'fields' => array('RestaurantTiming.id, RestaurantTiming.day, RestaurantTiming.opening_time, RestaurantTiming.closing_time, RestaurantTiming.restaurant_id'),

            'recursive' => 0

        ));


    }
}


?>