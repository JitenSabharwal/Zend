<?php
namespace Fc;

use Fc\src\Model\Fc;
use Fc\src\Model\FcTable;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(){
    	return [
    		'factories' => [
    			Model\FcTable::class => function($container){
    				$tableGateway = $container->get(Model\FcTableGateway::class);
    				return new Model\FcTable($tableGateway);
    			},
    			Model\FcTableGateway::class => function($container){
    				$dbAdapter = $container->get(AdapterInterface::class);
    				$resultSetPrototype = new ResultSet();
    				$resultSetPrototype->setArrayObjectPrototype(new Model\Fc());
            return new TableGateway('Albums', $dbAdapter, null, $resultSetPrototype);
    			}
    		],
    	];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\FcController::class => function($container) {
                    return new Controller\FcController(
                        $container->get(Model\FcTable::class)
                    );
                },
            ],
        ];
    }
}
?>