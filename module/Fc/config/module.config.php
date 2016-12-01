<?php
/*
    This page is used for routing all the request recieved from the browser
    This page recieves a request send it to the required controller which then return a action that is then send to the required View template      
*/
	namespace Fc;
	use Zend\Router\Http\Segment;
	use Zend\ServiceManager\Factory\InvokableFactory;
 	
 	return [
 		
 		'router' => [
 			'routes' => [
 				'fc' => [
 					'type' => Segment::class,
 					'options' => [
                    'route' => '/fc/[:action][/][:id]',
                    'constraints' => [
                    	'action' =>  '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' =>[
                        'controller' => Controller\FcController::class,
                        'action'     => 'index',
              			],
                    ],
 				]
 			],
 		],
 		'view_manager' => [
	 			'template_path_stack' => [
	            'fc' => __DIR__ . '/../view',
        	],
 		],
 	];
?>