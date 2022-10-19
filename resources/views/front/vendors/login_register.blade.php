<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PCs & Parts</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{url('front/assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('front/assets/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{url('front/assets/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{url('front/assets/css/style.css')}}">
       <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <!-- <link rel="shortcut icon" href="{{url('front/assets/ico/favicon.png')}}"> -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('front/assets/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('front/assets/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('front/assets/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{url('front/assets/ico/apple-touch-icon-57-precomposed.png')}}">
        <style type="text/css">
            body{
             background-image: url"https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg?auto=compress&cs=tinysrgb&w=600";
         }
        </style>

    </head>

    <body style="background-color:skyblue;">


        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <!-- <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Bootstrap</strong> Login &amp; Register Forms</h1>
                            <div class="description">
                            	<p>
	                            	This is a free responsive <strong>"login and register forms"</strong> template made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com" target="_blank"><strong>AZMIND</strong></a>, 
	                            	customize and use it as you like!
                            	</p>
                            </div>
                        </div>
                    </div> -->
                   
                    
                    <div class="row">
                        @if(Session::has('error_message'))
                                          <div class="alert alert-warning alert-dismissible " role="alert">
                                             <strong>Error!</strong>{{Session::get('error_message')}}
                                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                    @endif

                                    @if(Session::has('success_message'))
                                          <div class="alert alert-warning alert-dismissible " role="alert">
                                             <strong>Success!</strong>{{Session::get('success_message')}}
                                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                    @endif

                                    @if ($errors->any())
                                       <div class="alert alert-warning alert-dismissible " role="alert">
                                            <!-- <strong>Error:</strong> <?php implode('', $errors->all('<div>:message</div>')); ?> -->
                                            @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                      </div>
                                  @endif

                        <div class="col-sm-5">
                               

                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form"  class="login-form" action="{{url('admin/login')}}"  method = "post">@csrf
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Username</label>
				                        	<input type="email" name= "email" id ="email" placeholder="Username or email..." class="form-username form-control" required="" >
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name= "password" id="password" placeholder="Password..." class="form-password form-control" required="">
				                        </div>
				                        <button type="submit" class="btn">Sign in!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">

                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
                                <!-- <form id ="vendorForm" action="{{url('/vendor/register')}}" method="post" >@csrf -->

	                            <div class="form-bottom">
                                  
				                    <form role="vendorForm" action="{{url('vendor/register')}}" method="post" class="registration-form">@csrf
				                    	<div class="form-group">
				                    		<label class="sr-only" for="vendorname">Name</label>
				                        	<input type="text" name="name" placeholder="Enter your name..." class="form-first-name form-control" id="vendorname" required="" >
				                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="vendormobile">Mobile</label>
                                            <input type="text" name="mobile" placeholder="Enter your phone number..." class="form-first-name form-control" id="vendormobile" required="">
                                        </div>
				                        
				                        <div class="form-group">
				                        	<label class="sr-only" for="vendoremail">Email</label>
				                        	<input type="email" name="email" placeholder="Email..." class="form-email form-control" id="vendoremail" required="">
				                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" >Password</label>
                                            <input type="password" id="vendorpassword" placeholder="Password" class="form-email form-control" name="password" required="">
                                        </div>
				                        
				                        <button type="submit" class="btn">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <!-- <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by Anli Zaimi at <a href="http://azmind.com" target="_blank"><strong>AZMIND</strong></a> 
        					having a lot of fun. <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer> -->

        <!-- Javascript -->
        <script src="{{url('front/assets/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{url('front/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('front/assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{url('front/assets/js/scripts.js')}}"></script>
        
        <!--[if lt IE 10]>
            <script src="{{url('front/assets/js/placeholder.js')}}"></script>
        <![endif]-->

    </body>

</html>