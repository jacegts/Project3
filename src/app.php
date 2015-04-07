<?php 
    session_start();
	$app->get('/', function () {
	//require('../src/Views/LoginForm.html');
            require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'LoginForm.html');
	   // echo "Forward Unto Dawn";
	});

	$app->get('/hello/:name', function ($name) {
		echo "Hello, $name";
	});
        
        $app->get('/profile', function () {
            require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Profile.php');
	});


	$app->post('/auth', function () use ($app){

            $SQLAuth = new \Common\Authentication\SQLiteAuth($_POST['username'], $_POST['password']);
                    //$postData->username, $postData->password);
            if($SQLAuth->authenticate()===1)
            {

                echo "Authentication Successful"; 
                echo $app->response()->setStatus(200);
                echo $app->response()->getStatus();
//                $_SESSION["username"]==$_POST['username'];
//                $_SESSION["password"]==$_POST['password'];
                
            }
            if($SQLAuth->authenticate()!==1)
            {
                
                echo $app->response()->setStatus(401);
                echo $app->response()->getStatus();
                //header("Status:401");
//                http_response_code(401);
                echo "Authentication Failed";
//
//                return var_dump(http_response_code());
            }
            //echo "got here";
            
            //echo "instantiate controller here and pass the request object to it... ";
		
	});
        
        $app->post('/api',function () use($app){
           echo 'api endpoint'; 
           $SQLAuth = new \Common\Authentication\SQLiteAuth($_POST['username'],$_POST['password']);
           if($SQLAuth->authenticateA($_POST['authKey'])!==1)
            {  
                echo $app->response()->setStatus(403);
                echo $app->response()->getStatus();
            }
            if($SQLAuth->authenticate()!==1)
            {
                echo $app->response()->setStatus(401);
                echo $app->response()->getStatus();
            }
            if($SQLAuth->authenticate()===1)
            {
                echo $app->response()->setStatus(200);
                echo $app->response()->getStatus();
            }
        });

//	$app->post('/register', function (){
//	   //Test Code   
//
//	});

	$app->get('/register', function(){
	   require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'RegistrationForm.html');
	});


	$app->run();