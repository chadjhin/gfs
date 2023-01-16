<?php 
require '../vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

class Firestore
{
    protected $db;
    protected $name;
    public function __construct(string $collection)
    {
        $this->db = new FirestoreClient([
            'projectId'=> 'petik-357402'
        ]);

        $this->name = $collection;
    }

    public function getDocument(string $name)
    {
        return $this->db->collection($this->name)->document($name)->snapshot()->data();
    }
}
