<?php 
	$app->get('/', function () {
	//require('../src/Views/LoginForm.html');
            require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'LoginForm.html');
	   // echo "Forward Unto Dawn";
	});

	$app->get('/hello/:name', function ($name) {
		echo "Hello, $name";
	});

	$app->post('/auth', function () {
            //$postData = $this->request->getPost();
            
            //need to work on getting post object through slim
            
            //$username = $this->app->request->post('username');
            //$password = $this->app->request->post('password');
            $SQLAuth = new \Common\Authentication\SQLiteAuth($_POST['username'], $_POST['password']);
                    //$postData->username, $postData->password);
            if($SQLAuth->authenticate()===1)
            {
                echo "Authentication Successful";
            }
            if($SQLAuth->authenticate()!==1)
            {
                echo "Authentication Failed";
            }
            //echo "got here";
            
            //echo "instantiate controller here and pass the request object to it... ";
		
	});
        
        $app->post('/api',function (){
           echo 'api endpoint'; 
           $SQLAuth = new \Common\Authentication\SQLiteAuth($_POST['username'],$_POST['password']);
           if($SQLAuth->authenticateA($_POST['authKey'])!==1)
            {
               //send success http code
               //error out authKey not valid
               return "HTTP error code";
            }
            if($SQLAuth->authenticate()!==1)
            {
                //error out user/pass not valid
                return "HTTP error code";
            }
            if($SQLAuth->authenticate()===1)
            {
                //auth successful
                return "HTTP success code";
            }
        });

	$app->post('/register', function (){
	echo 'post crap';

	});
	$app->get('/register', function(){
	echo 'get crap';
	});


	$app->run();