

<template>
	<div>
		<head>
		<!-- Basic Page Needs -->
			<meta charset="utf-8">
			<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
			<title> {{ $route.params.Listkhoahoc }}</title>

			<meta name="author" content="themesflat.com">
			<meta name="description" content="free source">
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">

			<!-- Mobile Specific Metas -->
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


			<link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
			<link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
			<link href="icon/favicon.png" rel="shortcut icon">


			<!--[if lt IE 9]>
			    <script src="javascript/html5shiv.js"></script>
			    <script src="javascript/respond.min.js"></script>
			<![endif]-->
		</head>
	    <body>
		    <div class="windows8">
		        <div class="preload-inner">
		            <div class="wBall" id="wBall_1">
		                <div class="wInnerBall"></div>
		            </div>
		            <div class="wBall" id="wBall_2">
		                <div class="wInnerBall"></div>
		            </div>
		            <div class="wBall" id="wBall_3">
		                <div class="wInnerBall"></div>
		            </div>
		            <div class="wBall" id="wBall_4">
		                <div class="wInnerBall"></div>
		            </div>
		            <div class="wBall" id="wBall_5">
		                <div class="wInnerBall"></div>
		            </div>
		        </div>
		    </div>
		    <div class="header-inner-pages">
		        <div class="top">
		            <div class="container">
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="text-information">
		                            <p>Vinacademy - Đào Tạo Lập Trình Theo Dự Án</p>
		                        </div>
		                        <div class="right-bar">
		                            <ul class="flat-information">
		                                <li class="phone">
		                                    <a href="+61383766284" title="Phone number">{{ data.phone }}</a>
		                                </li>
		                                <li class="email">
		                                    <a href="mailto:AlitStudios@gmail.com" title="Email address"> {{ data.email }} </a>
		                                </li>
		                                <li class="email">
		                                    <a href="/lien-he" title="Email address"> Liên hệ</a>
		                                </li>
		                            </ul>
		                            <ul class="flat-socials">
		                                <li class="facebook">
		                                    <a v-bind:href="''+data.facebook+''">
		                                        <i class="fa fa-facebook"></i>
		                                    </a>
		                                </li>
		                                <li class="twitter">
		                                    <a v-bind:href="''+data.twitter+''">
		                                        <i class="fa fa-twitter"></i>
		                                    </a>
		                                </li>
		                                <li class="linkedin">
		                                    <a v-bind:href="''+data.linkedin+''">
		                                        <i class="fa fa-linkedin"></i>
		                                    </a>
		                                </li>
		                                <li class="youtube">
		                                    <a v-bind:href="''+data.youtube+''">
		                                        <i class="fa fa-youtube-play"></i>
		                                    </a>
		                                </li>
		                            </ul>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>      
		    </div><!-- /.header-inner-pages -->
			<div class="boxed">
				<header id="header" class="header clearfix"> 
				    <div class="container">
				        <div class="header-wrap clearfix">
				            <div  class="logo">
				                <a href="/" rel="home">
				                    <img v-bind:src="data.logo" alt="image">
				                </a>
				            </div><!-- /.logo -->            
				            <div class="nav-wrap">
		                        <div class="btn-menu">
		                            <span></span>
		                        </div><!-- //mobile menu button -->
		                        <nav id="mainnav" class="mainnav">
		                            <ul class="menu"> 
		                                <li v-for="data in menu"><a v-bind:href="data.link"  v-bind:class="{ 'has-sub': data.hasSub }"> {{ data.name }} </a>
		                                    <ul class="submenu"> 
		                                        <li v-for="sub in data.child"><a v-bind:href="sub.link"> {{ sub.name }} </a></li>  
		                                    </ul><!-- /.submenu -->

		                                </li> 
		                            </ul><!-- /.menu -->
		                        </nav><!-- /.mainnav -->    
		                    </div><!-- /.nav-wrap -->
				            <div id="s" class="show-search">
				                <a href="#"><i class="fa fa-search"></i></a>         
				            </div><!-- /.show-search -->

				            <div class="submenu top-search">
				                <div class="widget widget_search">
				                    <form class="search-form">
				                        <input type="search" class="search-field" placeholder="Search …" name="news">
				                        <input type="submit" class="search-submit">
				                    </form>
				                </div>
				            </div>
				        </div><!-- /.header-inner --> 
				    </div>
				</header><!-- /.header -->
				<div id="app">
					<List-khoa-hoc></List-khoa-hoc>
				</div>
				<footer class="footer">  
				    <div class="footer-widgets">   
				        <div class="container">
				            <div class="row">
				                <div class="col-md-3">  
				                    <div class="widget widget-text">
				                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.802368936629!2d105.7846551510074!3d21.040592292680177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab343be174b3%3A0x4b4d88def2a5bd8e!2zOCBQaGFuIFbEg24gVHLGsOG7nW5nLCBE4buLY2ggVuG7jW5nIEjhuq11LCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1524468196417" width="270" height="140" frameborder="0" style="border:0" allowfullscreen></iframe>
				                        <ul>
				                            <li class="address"> {{ data.address }} </li>
				                            <li class="phone"><a href="#">+ {{ data.phone }} </a></li>
				                            <li class="email"><a href="#"> {{ data.email }} </a></li>  
				                        </ul> 
				                    </div><!-- /.widget -->      
				                </div>

				                <div class="col-md-3">
				                    <div class="widget widget_tweets clearfix">
				                        <h5 class="widget-title">User Links</h5>
				                        <ul class="link-left">
				                            <li v-for="data in course.slice (0,5) ">
				                                <a v-bind:href="'/khoa-hoc/'+data.alias+''"> {{ data.name }} </a>
				                            </li>
				                        </ul>
				                    </div><!-- /.widget-recent-tweets -->
				                </div><!-- /.col-md-2 -->

				                <div class="col-md-3">
				                    <div class="widget widget_recent-courses" >
				                        <h5 class="widget-title">Recent Courses</h5>
				                        <ul class="recent-courses-news clearfix">
				                            <li v-for="data in rcourse.slice (0,2)">
				                                <div class="thumb">
				                                    <img src="/images/blog/Footer-02.png" alt="image">
				                                </div>
				                                <div class="text">
				                                  <a v-bind:href="'/khoa-hoc/'+data.alias+''"> {{ data.name }} </a>  
				                                </div>
				                                <div class="review-rating">
				                                    <ul class="flat-reviews">
				                                        <li class="star">
				                                            <a href="#"><i class="fa fa-star"></i></a>
				                                        </li>
				                                        <li class="star">
				                                            <a href="#"><i class="fa fa-star"></i></a>
				                                        </li>
				                                        <li class="star">
				                                            <a href="#"><i class="fa fa-star"></i></a>
				                                        </li>
				                                        <li class="star">
				                                            <a href="#"><i class="fa fa-star-half-o"></i></a>
				                                        </li>
				                                         <li class="star">
				                                            <a href="#"><i class="fa fa-star-o"></i></a>
				                                        </li>
				                                    </ul>
				                                    <p>25 Reviews</p>
				                                </div>
				                            </li>
				                        </ul>
				                    </div><!-- /.widget-quick-contact -->
				                </div><!-- /.col-md-4-->

				                <div class="col-md-3">
				                    <div class="widget widget-quick-contact">
				                        <h5 class="widget-title">Quick Contact</h5>
				                        <div class="row">
				                            <div class="col-md-12">
				                                <form class="flat-contact-form" id="contactform2" method="post" action="./contact/contact-process.php">

				                                    <input type="email" value="" tabindex="2" placeholder="Your Email" name="email" id="email-contact" required="">
				                                   
				                                    <textarea class="type-input" tabindex="3" placeholder="Message" name="message" id="message-contact" required=""></textarea> 

				                                    <button class="flat-button bg-orange"><i class="fa fa-long-arrow-right"></i></button>
				                                   
				                                </form><!-- /.comment-form -->     
				                            </div><!-- /.col-md-12 -->
				                        </div>
				                    </div><!-- /.widget .widget-instagram -->
				                </div>
				            </div><!-- /.row -->
				        </div><!-- /.container -->
				    </div><!-- /.footer-widgets -->
				</footer>
				<a class="go-top">
				    <i class="fa fa-chevron-up"></i>
				</a>

				<!-- Bottom -->
				<div class="bottom">
				    <div class="container">
				        <ul class="flat-socials-v1">
				            <li class="facebook">
				                <a href="#"><i class="fa fa-facebook"></i></a>
				            </li>
				            <li class="twitter">
				                <a href="#"><i class="fa fa-twitter"></i></a>
				            </li>
				            <li class="vimeo">
				                <a href="#"><i class="fa fa-vimeo"></i></a>
				            </li>
				            <li class="rss">
				                <a href="#"><i class="fa fa-rss"></i></a>
				            </li>
				        </ul>    
				        <div class="row">
				            <div class="container-bottom">
				                <div class="copyright"> 
				                       <p v-html="data.footer_content"></p> 
				                </div>
				            </div><!-- /.container-bottom -->
				        </div><!-- /.row -->
				    </div><!-- /.container -->
				</div>
			</div>
		</body>	
	</div>
</template>
<script>
	
    export default{
        data(){
	        return {
	        	datas:{},
		      	sub:[],
		        data:[],
		        menu:[],
		        course:[],
		        rcourse:[],
		        showSubMenu:false
	        }
	    },
        created:function(){

	            	
	        //this.danhsach_user();
	        this.axios.get('/api/course/list-filter?alias=' + this.$route.params.Listkhoahoc + '').then((response)=>{
             	this.datas=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
        	});        
	        this.axios.get('/api/course/lastest-course').then((response) => {
	            this.rcourse=response.data.data;
	             // console.log('aaaaaaaaaa', response.data.data)
	        });
	        this.axios.get('/api/course/list').then((response)=>{
	            this.course=response.data.data;
	             // console.log('aaaaaaaaaa', response.data.data)
	        });
	        this.axios.get('/api/setting/list').then((response)=>{
	            this.data=response.data.data;
	             // console.log('aaaaaaaaaa', response.data.data)
	        });
	        this.axios.get('/api/news/lastest').then((response)=>{
	            this.last=response.data.data;
	             // console.log('aaaaaaaaaa', response.data.data)
	        });
	        this.axios.get('/api/menu/list').then((response)=>{
	            this.menu= response.data.data;
	            
	            this.menu.forEach(e => {
	            	if(e.child && e.child.length > 0){
	            		e.hasSub = true
	            	}else{
	            		e.hasSub = false
	            	}
	            })
	        });
        },
      
    }
    
</script>  
