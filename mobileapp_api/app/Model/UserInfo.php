<?php


class UserInfo extends AppModel
{
    public $useTable = 'user_info';
    public $primaryKey = 'user_id';


    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'type' => 'RIGHT',
            'fields' => array('User.id','User.email','User.active','User.role')
        )


    );


    public $hasMany = array(
        'Address' => array(
            'className' => 'Address',
            'foreignKey' => 'user_id',


        ),
        'RestaurantFavourite' => array(
            'className' => 'RestaurantFavourite',
            'foreignKey' => 'user_id',


        ),

        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'user_id',


        )
    );

   /* public $hasMany = array(
        'Employment' => array(
            'className' => 'Employment',
            'foreignKey' => 'user_id',


        ),

        'Education' => array(
            'className' => 'Education',
            'foreignKey' => 'user_id',


        ),
        'HonourAndAward' => array(
            'className' => 'HonourAndAward',
            'foreignKey' => 'user_id',


        ),

        'UserTopic' => array(
            'className' => 'UserTopic',
            'foreignKey' => 'user_id',


        ),

        'Connection' => array(
            'className' => 'Connection',
            'foreignKey' => 'user_id',


        ),

        'Answer' => array(
            'className' => 'Answer',
            'foreignKey' => 'user_id',


        ),

        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'user_id',


        ),

        'DirectAnswer' => array(
            'className' => 'DirectAnswer',
            'foreignKey' => 'answerer_user_id',


        ),
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'user_id',
        )



        /*'DirectQuestion' => array(
        'className' => 'DirectQuestion',
        'foreignKey' => 'questioner_user_id',


        ),
        'DirectAnswer' => array(
        'className' => 'DirectAnswer',
        'foreignKey' => 'answerer_user_id',


        ),
    );
*/


    public function loginRestaurantAndRiderAndUserWithPhone($phone_number)
    {

        if ($phone_number != "") {
            $userData = $this->find('all', array(
                'conditions' => array(
                    'UserInfo.phone' => $phone_number

                )
            ));

            if (empty($userData)) {


                return false;

            }
        }
        if ($userData[0]['User']['block'] == 0) {
            if($userData[0]['User']['role'] == "user" || $userData[0]['User']['role'] == "hotel" || $userData[0]['User']['role'] == "rider") {
                return $userData;
            }else{

                return "203";

            }
        } else {

            return false;


        }



    }


    public function getUserDetailsFromEmail($email){
        $this->Behaviors->attach('Containable');
        return $this->find('all', array(
            'conditions' => array(
                'User.email' => $email
            ),
            'contain' => array(
                'User'

            ),
            'recursive' => 0

        ));

    }

    public function getUserDetailsFromID($user_id){
       // $this->Behaviors->attach('Containable');
        return $this->find('first', array(
            'conditions' => array(
                'UserInfo.user_id' => $user_id
            ),
            'recursive' => 0
        ));

    }
    public function getObjectUserDetailsFromID($user_id){
        //$this->Behaviors->attach('Containable');
        return $this->find('first', array(
            'conditions' => array(
                'UserInfo.user_id' => $user_id
            ),
            'fields' => array('User.id','User.email','User.active'),
            'recursive' => 0


        ));

    }
    public function isPhoneAlreadyExist($phone_number){ /* irfan function*/

        return $this->find('count', array(
            'conditions' => array('UserInfo.phone' => $phone_number)
        ));

    }
    public function searchUser($keyword){

        return $this->find('all', array(

            'conditions' => array(
                'OR' => array(

                    array('UserInfo.first_name LIKE' => '%'.$keyword.'%'),
                    array('UserInfo.last_name LIKE' => '%'.$keyword.'%'),
                    array('UserInfo.phone LIKE' => '%'.$keyword.'%'),
                    array('User.email LIKE' => '%'.$keyword.'%'),
            ))
        ));

    }

    public function beforeSave($options = array())
    {



        if (isset($this->data[$this->alias]['first_name']) && isset($this->data[$this->alias]['last_name'])
           ) {

            $first_name = strtolower($this->data[$this->alias]['first_name']);
            $last_name = strtolower($this->data[$this->alias]['last_name']);






            $this->data['UserInfo']['first_name'] = ucwords($first_name);
            $this->data['UserInfo']['last_name'] = ucwords($last_name);


        }
        return true;
    }

    public function temporaryUpdation(){


        return $this->updateAll(array('UserInfo.online'=>0),
            array('User.role'=>"rider"));
    }

    /*public function getUserDetails($user_id){
    $this->Behaviors->attach('Containable');
    return $this->find('all', array(
    'conditions' => array(
    'UserInfo.user_id' => $user_id
    ),
    'contain' => array(
    'User', 'UserCategory.Category','Skill'

    )

    ));

    }*/





}?>