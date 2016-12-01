<?php
namespace Fc\Controller;

use Fc\Model\FcTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

require_once 'vendor/Lib/fusioncharts.php';

class FcController extends AbstractActionController 
{
    private $table;

    public function __construct(FcTable $table){
        $this->table = $table;
    }
   
    //Used to the index action which will render index.phtml that has a chart with static data
    // link -> __ServerName__/fc/index or __ServerName__/fc/index
    public function indexAction()
    {   
    }
    
    //Used to the index action which will render index.phtml that has a chart with data returned from the database
    //link -> __ServerName__/fc/db/
    public function dbAction()
    {   
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
    }   
}	
?>