<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>s3 Innovus </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        


        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
    
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

        
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    </head>

    <body id="body">

    	<div id="preloader">
    		<div class="book">
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		</div>
    	</div>

	    <!-- 
	    Header start
	    ==================== -->
	    <div class="navbar-default navbar-fixed-top" id="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">
                        <img class="logo-1" src="{{asset('img/logo_largo.png')}}" alt="LOGO" width="100%" height="100%">
	                    
	                </a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <nav class="collapse navbar-collapse" id="navbar">
	                <ul class="nav navbar-nav navbar-right list-group-horizontal" id="top-nav">
	                    <li class="current"><a href="#body">Inicio</a></li>
	                    <li><a href="#about">Nosotros</a></li>
	                    <li><a href="#service">Servicios</a></li>
	                    <li><a href="#contact">Contacto</a></li>
            @if (Route::has('login'))
                    @auth
                    <li><a href="{{ route('login') }}" >Acceder</a></li>
                    @if (Route::has('register'))
                    {{-- <li><a href="{{ route('register') }}">Nuevo Usuario</a></li> --}}
                    @endif
                    @else
                    <li><a href="{{ route('login') }}">Acceder</a></li>
                        @if (Route::has('register'))
                        {{-- <li><a href="{{ route('register') }}">Nuevo Usuario</a></li> --}}
                        @endif
                    @endauth
            @endif
	                </ul>
	            </nav><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </div>

	    <section id="hero-area">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="block">
	                        <h1 class="wow fadeInDown">A passionate web company</h1>
	                        <p class="wow fadeInDown" data-wow-delay="0.3s"> 
                                                        </p>
	                        <div class="wow fadeInDown" data-wow-delay="0.3s">
	                        	<a class="btn btn-default btn-home" href="#about" role="button">Get Started</a>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-6 wow zoomIn">
	                    <div class="block">
	                        <div class="counter text-center">
	                            <ul id="">
	                                <li>
	                                    <div class="dash days_dash">
                                           
                                            
                                            {{-- @forelse($reports as $report)
                                            <div class="digit">{{$report->reports_count}}</div>
                                            @empty
                                            <div class="digit">0</div>
                                            @endforelse --}}
                                             @if(!is_null($reports)) 
                                            <div class="digit">{{$reports->count()}}</div>
                                            @else
                                            <div class="digit">0</div>
                                            @endif 
	                                        <span class="dash_title">Reportes resueltos</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash days_dash">
	                                       
                                                @if(!is_null($projects)) 
                                                <div class="digit">{{$projects->count()}}</div>
                                                @else
                                                <div class="digit">0</div>
                                                @endif 
	                                        <span class="dash_title">Proyectos</span>
	                                    </div>
	                                </li>
                                    <li>
	                                    <div class="dash minutes_dash">
	                                        @if(!is_null($nuevos)) 
                                            <div class="digit">{{$nuevos->count()}}</div>
                                            @else
                                            <div class="digit">0</div>
                                            @endif 
	                                        <span class="dash_title">Reportes pendientes</span>
	                                    </div>
	                                </li>
	                                <li>
	                                    <div class="dash seconds_dash">
	                                        @if(!is_null($companies)) 
                                            <div class="digit">{{$companies->count()}}</div>
                                            @else
                                            <div class="digit">0</div>
                                            @endif 
	                                        <span class="dash_title">Organizaciones</span>
	                                    </div>
	                                </li>
                                    
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div><!-- .row close -->
	        </div><!-- .container close -->
	    </section><!-- header close -->
        <section id="about" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 wow fadeInLeft">
                    	<div class="sub-heading">
                    		<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam ipsa recusandae consequatur veniam, reiciendis odit quia eaque vel eius a.</h3>
                    	</div>
                        <div class="block">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla-mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, aspernatur.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="about-slider">
                        	<div class="init-slider">
                        		<div class="about-item">
                        			<img src="#" alt="" class="img-responsive">
                        		</div>
                        		<div class="about-item">
                        			<img src="#" alt="" class="img-responsive">
                        		</div>
                        		<div class="about-item">
                        			<img src="#" alt="" class="img-responsive">
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #about close -->
        <!-- 
        About start
        ==================== -->
 <!-- 
        Service start
        ==================== -->
        <section id="service" class="section">
            <div class="container">
                <div class="row">
                    <div class="heading wow fadeInUp">
                        <h2>Our service</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et <br> dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex</p>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="ion-android-desktop"></i>   
                                </span>
                            </div>
                            <div class="caption">
                                <h3>Fully Responsive</h3>
                                <p>Lorem ipsum dolor sit amet, con-sectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="ion-speedometer"></i>   
                                </span>
                            </div>
                            <div class="caption">
                            	<h3>Speed Optimized</h3>
                                <p>Lorem ipsum dolor sit amet, con-sectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="ion-ios-infinite-outline"></i>   
                                </span>
                            </div>
                            <div class="caption">
                                <h3>Tons of Feature</h3>
                                <p>Lorem ipsum dolor sit amet, con-sectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.9s">
                        <div class="service">
                            <div class="icon-box">
                            	<span class="icon">
                                    <i class="ion-ios-cloud-outline"></i>   
                                </span>
                            </div>
                            <div class="caption">
                                <h3>Cloud Option</h3>
                                <p>Lorem ipsum dolor sit amet, con-sectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .container close -->
        </section><!-- #service close -->

        <section id="call-to-action" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow text-center">
                        <div class="block">
                            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                <button class="btn btn-default btn-submit" type="submit">Get Notified</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #call-to-action close -->

        <!-- 
        Contact start
        ==================== -->
        <section id="contact" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="block">
                            <div class="heading wow fadeInUp">
                                <h2>Get In Touch</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et <br> dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 wow fadeInUp">
						<div class="block text-left">
							<div class="sub-heading">
								<h4>Contact Address</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quos maxime voluptate doloribus, voluptatum nemo vel ipsa in eligendi, ullam. Ducimus consequuntur labore error hic.</p>
							</div>
							<address class="address">
                                <hr>
								<p>Dhanmondi 32,<br> Dhaka,<br> Bangladesh</p>
                                <hr>
                                <p><strong>E:</strong>&nbsp;hello@foundry.net<br>
                                <strong>P:</strong>&nbsp;+614 3948 2726</p>
								
                                
							</address>
						</div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1 wow fadeInUp" data-wow-delay="0.3s">
                    	<div class="form-group">
                    	    <form action="#" method="post" id="contact-form">
                    	        <div class="input-field">
                    	            <input type="text" class="form-control" placeholder="Your Name" name="name">
                    	        </div>
                    	        <div class="input-field">
                    	            <input type="email" class="form-control" placeholder="Email Address" name="email">
                    	        </div>
                    	        <div class="input-field">
                    	            <textarea class="form-control" placeholder="Your Message" rows="3" name="message"></textarea>
                    	        </div>
                    	        <button class="btn btn-send" type="submit">Send me</button>
                    	    </form>

                    	    <div id="success">
                    	        <p>Your Message was sent successfully</p>
                    	    </div>
                    	    <div id="error">
                    	        <p>Your Message was not sent successfully</p>
                    	    </div>
                    	</div>
                    </div>
                </div>
            </div>
        </section>

        <section clas="wow fadeInUp">
        	<div class="map-wrapper">
        	</div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <p>Copyright &copy; <a href="http://www.Themefisher.com">Themefisher</a>| All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
            <script src="{{asset('js/vendor/modernizr-2.6.2.min.js')}}"></script>
            <script src="{{asset('js/vendor/jquery-1.10.2.min.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
            <script src="{{asset('js/jquery.lwtCountdown-1.0.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <script src="{{asset('js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('js/jquery.validate.min.js')}}"></script>
            <script src="{{asset('js/jquery.form.js')}}"></script>
            <script src="{{asset('js/jquery.nav.js')}}"></script>
            <script src="{{asset('js/jquery.sticky.js')}}"></script>
            <script src="{{asset('js/plugins.js')}}"></script>
            <script src="{{asset('js/wow.min.js')}}"></script>
            <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>
