<?php
session_start();
require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;

class firestore
{
    protected $db;
    protected $name;
        public function __construct(string $collection)  //function to connect to firestore
        {
        $this->db = new FirestoreClient([    //set the database with the firestore projectid
            'projectId' => 'petik-357402'  //set projectid of the databse in firestore
        ]);
        $this->name = $collection;  // put the collection value to the variable this->name
        //$docRef = $db->collection('samples/php/cities')->document('SF');
        //$snapshot = $docRef->snapshot();
        }
        public function getDocument(string $name)  //function to get all data from admin 
        {

            try
            {
                if($this->db->collection($this->name)->document($name)->snapshot()->exists()){  //check if document exists

                    return $this->db->collection($this->name)->document($name);  // return the value to the function call
                }
                else
                {
                    throw new Exception(message:'Document does not exists');
                }
            }
            catch(Exception $exception)
            {
                return $exception->getMessage();
            }
            
            
        }

        public function getWhere(string $field, string $operator, $value, string $field2, string $operator2, $value2)  //login function for admin
        {
            try
            {
                //$arr = [];
                $query = $this->db->collection($this->name)->where($field, $operator, $value,$field2, $operator2, $value2)->documents()->rows();
            if(!empty($query))
            {
                
                //$_SESSION['admin_id'] = $this->db->collection($this->name)->document('3yBsyU7BYV4APf0vR4oD')->snapshot()->id(); //need this to set the seesion to each user (3yBsyU7BYV4APf0vR4oD is the admin document- need to make function if want to access other users)
                //$_SESSION['admin_id'] = true;
                $_SESSION['admin_id'] = '3yBsyU7BYV4APf0vR4oD'; //need this to set the seesion to each user (3yBsyU7BYV4APf0vR4oD is the admin document- need to make function if want to access other users)
                

    
                /*foreach ($query as $item)
                {
                    $arr[] = $item->data();
                }*/
                //printf('successful log in');
                //printf($_SESSION['user_id']);
                if(isset($_SESSION['admin_id']))
				{
                    header("Location:./admin/dashboard.php?login=success/session/set");
                    exit();
                }
                else
                {
                    header("Location:./admin/dashboard.php?login=success/session/not/set");
                    exit();
                }
            }
                else
                {
                    throw new Exception(message:'Document does not exists or wrong user and pass');
                }
                //return $arr;
            }
            catch(Exception $exception)
            {
                $message = $exception->getMessage();
                header("Location: index.php?login=$message");
                exit();
            }


        }
        public function getuser(string $field, string $operator, $value, string $field2, string $operator2, $value2)  //login function for user
        {
            //try
            //{
                //$arr = [];
                //$query = $this->db->collection($this->name)->where($field, $operator, $value,$field2, $operator2, $value2)->documents()->rows();
                $query = $this->db->collection($this->name)->where($field, $operator, $value,$field2, $operator2, $value2)->documents()->rows();
            if(!empty($query))
            {
                $docRef = $this->db->collection($this->name)->document( $value2);
                $snapshot = $docRef->snapshot();
                if ($snapshot->data()['STATUS']=='DEACTIVATED') {
                    header("Location: index(orig).php?message=account deactivated/deleted");
                }
                else
                {
                $_SESSION['user_id'] = $this->db->collection($this->name)->document($value2)->snapshot()->id(); //need this to set the seesion to each user
                //$_SESSION['user_id'] = true;


    
                /*foreach ($query as $item)
                {
                    $arr[] = $item->data();
                }*/
                //printf('successful log in');
                //printf($_SESSION['user_id']);
                if(isset($_SESSION['user_id']))
				{
                    
                    $docRef =$this->db->collection($_SESSION['usertype'])->document($_SESSION['user_id'])->collection('subscription')->document('sub_details');
                    $exists=  $docRef->snapshot()->exists();
                    $snapshot = $docRef->snapshot();
                    if(!$exists || $exists  && ($snapshot->data()['status'] =='CANCELLED'))
                {
                    $id=$_SESSION['user_id'];
                    $type=$_SESSION['usertype'];
                    header("Location:userpage/subscription.php?login=success/session/setid=$id=$type");
                    exit();
                }
                else 

                    $id=$_SESSION['user_id'];
                    $type=$_SESSION['usertype'];
                    header("Location:userpage/userdashboard.php?login=success/session/setid=$id=$type");
                    exit();




                }
                else
                {
                    header("Location:userpage/userdashboard.php?login=success/session/not/set");
                    exit();
                }
            }
            }
                else
                {
                    //throw new Exception(message:'Document does not exists or wrong user and pass');
                    header("Location: index(orig).php?error=Document does not exists or wrong user and pass");
                }
                //return $arr;
           // }


        
        }
        public function newDocument(string $name, array $data = [])  //add new document(users)
        {
            try{
                $this->db->collection($this->name)->document($name)->create($data);
                return true;
            }catch (Exception $exception)
            {
                return $exception->getMessage();
            }
        }
        public function newCollection(string $name, string $doc_name, array $data = [])  //new collection sample function
        {
            try{

                $this->db->collection($name)->document($doc_name)->create($data);
                return true;
            } catch (Exception $exception)
            {
                return $exception->getMessage();
            }
        }

        public function dropDocument(string $name)
        {
            $this->db->collection($this->name)->document($name)->delete();
        }

        public function dropCollection(string $name)
        {
            $document = $this->db->collection($name)->limit(number: 1)->documents();
            while(!$document->isEmpty())
            {
                foreach($document as $item)
                {
                    $item->reference()->delete();
                }
            }
        }

        public function newUserCollection(string $name, string $doc_name, array $data = []) 
        {
            try{

                if($this->db->collection($name)->document($doc_name)->snapshot()->exists())
                {
                    return $this->db->collection($name)->document($doc_name);
                }
                else
                {
                    $this->db->collection($name)->document($doc_name)->create($data);
                    printf('created');
                }
                

            } catch (Exception $exception)
            {
                $message2 = $exception->getMessage();
                
                //$value = $this->db->collection($name)->document($doc_name);
                header("Location: signup.php?signup=$message2");
                exit();
            }
        }

        public function addiduser(array $data = [])   //sample add user with randomize unique id
        {
            try{
                $addedDocRef = $this->db->collection($this->name)->add($data);
                
                printf('Added document with ID: %s' . PHP_EOL, $addedDocRef->id());
            }catch (Exception $exception)
            {
                return $exception->getMessage();
            }
        }
        public function adduser(string $name, array $data = [])  //add new user based on username
        {
            try{
                if( $this->db->collection($this->name)->document($name)->snapshot()->exists())
                {
                    throw new Exception(message:'username already taken');
                }
                else
                {

                    $this->db->collection($this->name)->document($name)->create($data);
                }
            }catch (Exception $exception)
            {
                $message2 = $exception->getMessage();
                header("Location: signup.php?login=$message2");
                exit();
            }
        }
        public function checkpet(string $name)  //check pet if username exists
        {
            
                if( $this->db->collection($this->name)->document($name)->snapshot()->exists())
                {
                    return true;
                }
        }
        public function checkvet(string $name)  //check vet if username exists
        {
                if( $this->db->collection($this->name)->document($name)->snapshot()->exists())
                {
                    return true;
                }
        }
        /*public function viewuser(string $name)  //function to get all data from admin 
        {

            try
            {
                if($this->db->collection($this->name)->document($name)->snapshot()->exists()){  //check if document exists

                    return $this->db->collection($this->name)->document($name);  // return the value to the function call
                }
                else
                {
                    throw new Exception(message:'Document does not exists');
                }
            }
            catch(Exception $exception)
            {
                return $exception->getMessage();
            }
            
            
        }*/
        public function add_sub_detail(string $name, array $data = [])  //add new user based on username
        {
            try{
                    $this->db->collection($this->name)->document($name)->collection('subscription')->document('sub_details')->set($data);
                    return true;
            }catch (Exception $exception)
            {
                $message2 = $exception->getMessage();
                header("Location: subscription.php?login=$message2");
                exit();
            }
        } 
        public function update_sub_detail(string $name)  //add new user based on username
        {
            try{
                    $ref= $this->db->collection($this->name)->document($name)->collection('subscription')->document('sub_details')->delete();
                    

                    return true;
            }catch (Exception $exception)
            {
                $message2 = $exception->getMessage();
                echo $message2;
                //header("Location: asas.php?login=$message2");
                exit();
            }
        } 
}
?>