
<template>
    <div>
        <!-- Slider -->
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on" v-for="data in banner">
                        <img v-bind:src="data.image" alt="slider-image" />
                        <div class="tp-caption sfl title-slide center" data-x="174" data-y="250" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">                              
                          {{ data.name }}
                        </div>  
                        <div class="tp-caption sfr desc-slide center" data-x="256" data-y="310" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">                       
                           {{ data.description }}
                        </div>    
                        <div class="tp-caption sfl flat-button-slider bg-orange" data-x="420" data-y="439" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a class="" v-bind:href="data.register">START A COURSE</a></div>
                         <div class="tp-caption sfr flat-button-slider" data-x="601" data-y="440" data-speed="1000" data-start="2500" data-easing="Power3.easeInOut"><a class="" v-bind:href="data.infomation">TAKE A TOUR</a></div>                    
                    </li>
                </ul>
            </div>
        </div><!-- /.tp-banner-container -->
        <div class="flat-row course row-bg">
            <div class = "container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 flat-pdr-100">                       
                        <h1 class="title-course">Choose The Design Tool You Want To Learn</h1>

                        <p class='flat-lh-25'>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p> 

                        <div class="flat-spacer"></div>  

                        <div class="flat-button-container">
                            <a class="flat-button orange" href="/khoa-hoc">VIEW ALL COURES</a>
                        </div> 
                    </div>

                    <div class="col-md-5 col-sm-12">
                        <div class="image-cs">
                            <ul class = "flat-course-images">
                            <li v-for='data in cscourses'>
                                <img v-bind:src="data.image" alt=""/> 
                            </li>
                        </ul>  
                        </div> 
                        
                    </div>                    

                </div>
            </div>
        </div><!-- /.flat-row -->
        <div class = " flat-row popular-course">
            <div class="container">
                <div class="flat-title-section">
                    <h1 class="title">POPULAR COURSES</h1>                
                </div>

                <div class="flat-course-grid button-right">
                    <div class="flat-course" v-for='data in cscourses'>
                        <div class="featured-post">             
                            <div class="overlay">
                                <div class="link"></div>
                            </div>

                            <a href="courses-single.html"><img v-bind:src="data.image" v-bind:alt="data.coursel"></a>
                        </div><!-- /.featured-post -->

                        <div class="course-content">
                            <h4><a href="courses-single.html"> {{ data.name }} </a> </h4>

                            <div class="price"> {{ data.price }} </div>   
                            
                            <ul class="course-meta review">
                                <li class="review-stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>

                                <li> 25 views </li>
                            </ul> 

                            <p> {{ data.description }}</p>

                            <ul class="course-meta desc">
                                <li>
                                    <h6> {{ data.duration }} month </h6> 
                                    <span> Course</span>
                                </li>

                                <li>
                                    <h6> {{ data.size }} </h6>
                                    <span> Class Size</span>
                                </li>

                                <li>
                                    <h6><span class="course-time"> {{ data.class_start }} -> {{ data.class_end }}</span></h6>
                                    <span> Class Duration</span>
                                </li>
                            </ul> 
                        </div><!-- /.course-content -->
                    </div>
                </div><!-- /.flat-course grid -->
            </div>
        </div> 
        <div class="flat-row join-us parallax parallax1 overlay bg-222">
            <div class="overlay bg-222">
                <div class="container">
                    <div class="row">

                        <div class="counter-content">
                            <span class="counter-prefix">Join</span>
                            <div class="numb-counter">
                                <div class="numb-count" data-to="9999999" data-speed="1000" data-waypoint-active="yes">0</div>
                            </div>          
                            <span class="counter-suffix">people</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>

                        <a href="contact.html" class="flat-button">JOIN NOW</a>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div>
        </div>

        <div class = " flat-row lastest-new">
            <div class="container">
                <div class="flat-title-section">
                    <h1 class="title">LATEST NEWS</h1>                
                </div>

                <div class="row post-lastest-new">
                    <div class="post col-md-4 col-xs-12 col-sm-6 flat-hover-zoom" v-for='data in lastest.slice (0,3)'>
                        <div class="featured-post">
                            <div class="entry-image">
                                <img v-bind:src="data.image" alt="image">
                            </div>
                        </div>

                        <div class="date-post">
                            <span class="numb"> {{ data.date }} </span>  
                            <span> {{data.month}} </span> 
                        </div>

                        <div class="content-post">
                            <h2 class="title-post">
                                <a href="flat-information.html"> {{ data.title }} </a>
                            </h2>

                            <div class="entry-content">
                                <p > {{ data.description }} </p>
                            </div><!-- /entry-post -->

                            <div class="entry-meta style1">
                                <p>Posted in:<span><a href="#"> {{ data.tags }}</a></span></p> 
                                <p>Tags:<span><a href="#"> {{ data.tags }}</a></span> </p>
                            </div>
                        </div><!-- /content-post -->
                    </div> 
                </div>
            </div>
        </div><!-- /.latest-new -->

        <section class="flat-row partners">
            <div class="container">
                <ul class="partners-slider">
                    <li v-for='data in partners'>
                        <img alt="owlcarousel-item-img" v-bind:src="data.logo"/>
                    </li>
                    
                </ul>
            </div>
        </section>

        <section class="flat-row testimonial" >
            <div class="container">
                <div class="testimonial-slider">
                    <div class="testimonial" v-for='data in datas'>
                        <div class="testimonial-content">
                            <blockquote>
                               {{data.blockquote}}
                            </blockquote> 
                        </div>
                        <div class="testimonial-meta">
                            <div class="testimonial-author">
                                <strong class="author-name">{{data.author_name}}</strong>
                                <div class="author-info"> {{data.author_info}} </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </section>

        <section class="flat-row news-letter">
            <div class="container">
                <div class="have-question">                       
                    <h2 class="">Have any question for us?</h2>

                    <p class="flat-lh-28">
                        Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                        Mirum est notare quam littera gothica, quam nunc putamus parum
                    </p> 

                    <div class="flat-button-container">
                        <a class="read-more" href="#">Go to QAs page</a>
                    </div> 
                </div>

                <div class="news-letter-form">
                    <div class="widget-mailchimb">
                        <h1 class="widget-title">NEWSLETTER</h1>
                        <p>Subscribe now and receive weekly newsletter with educational materials, new courses, interesting posts, popular books and much more!</p>
                        <form method="post" action="#" id="subscribe-form" data-mailchimp="true">
                            <div id="subscribe-content">
                                <div class="input-wrap email">
                                    <input type="text" id="subscribe-email" name="subscribe-email" placeholder="Your Email Here">
                                </div>
                                <div class="button-wrap">
                                    <button type="button" id="subscribe-button" class="subscribe-button" title="Subscribe now"> SUBSCRIBE </button>
                                </div>
                            </div>
                            <div id="subscribe-msg"></div>
                        </form>                       
                    </div>
                </div>
            </div>
        </section>                       
    </div>   
</template>
 
 <script type="text/javascript">
    import themepunchtool from './javascripts/jquery.themepunch.revolution.min.js';
    import slider from './javascripts/slider.js';


    export default{
        data(){
            return {
                
                banner:[ 
                    {
                      "image": "http://vinacademy.yez.vn/upload/banner/banner-1.jpg",
                      "name": "Khai giảng khóa học Photoshop",
                      "register": "http://vinacademy.yez.vn",
                      "infomation": "http://vinacademy.yez.vn",
                      "description": "khóa học dành cho người mới bắt đầu"
                    },
                    {
                      "image": "http://vinacademy.yez.vn/upload/banner/banner-4.jpg",
                      "name": "Khai Giảng Khóa Học Mới",
                      "register": "http://vins.com/admin/banner",
                      "infomation": "http://vins.com/admin/banner",
                      "description": "Khóa Học Mới"
                    },
                    {
                      "image": "http://vinacademy.yez.vn/upload/banner/banner-2.jpg",
                      "name": "abc",
                      "register": "http://vinacademy.yez.vn",
                      "infomation": "http://vinacademy.yez.vn",
                      "description": "abc"
                    }
                ],
                cscourses:[
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-blockchain-nang-cao.jpg",
                        "name": "Khóa học Lập trình Blockchain"
                        },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-angular-js.jpg",
                        "name": "Khóa học lập trình Angular"
                    },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-nodejs.jpg",
                        "name": "Khóa học Lập trình Node Js"
                    },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-ruby.jpg",
                        "name": "Khóa học Lập trình Ruby"
                    },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/java.png",
                        "name": "Khóa học lập trình Java"
                    },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-android.jpg",
                        "name": "Khóa học Lập trình Android"
                    },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-wordpress.jpg",
                        "name": "Khóa học Lập trình Wordpress"
                    },
                    {
                        "image": "http://vinacademy.yez.vn/upload/course/anh-ios.jpg",
                        "name": "Khóa học lập trình iOS"
                    }],
                // ftcourse:[],
                lastest:[],
                partners:[
                    {
                      "id": 8,
                      "name": "MKT",
                      "logo": "http://vinacademy.yez.vn/upload/partner/1.jpg"
                    },
                    {
                      "id": 7,
                      "name": "CTCP Ala",
                      "logo": "http://vinacademy.yez.vn/upload/partner/212-1441333242-59655e8fffa15a1e-1.jpg"
                    },
                    {
                      "id": 6,
                      "name": "534534",
                      "logo": "http://vinacademy.yez.vn/upload/partner/291-1441333256-36855e90008ac523-2.gif"
                    },
                    {
                      "id": 5,
                      "name": "Vins",
                      "logo": "http://vinacademy.yez.vn/upload/partner/171-1441333228-20855e8ffecda21d-1.gif"
                    },
                    {
                      "id": 3,
                      "name": "Caza",
                      "logo": "http://vinacademy.yez.vn/upload/partner/caza-logo-1.png"
                    },
                    {
                      "id": 2,
                      "name": "TT đào tạo Bk-Aptech",
                      "logo": "http://vinacademy.yez.vn/upload/partner/291-1441333256-36855e90008ac523.gif"
                    },
                    {
                      "id": 1,
                      "name": "Công ty CP Vinsofts",
                      "logo": "http://vinacademy.yez.vn/upload/partner/171-1441333228-20855e8ffecda21d.gif"
                    }
                    
                ],


                datas:[ {"image_cate":"images/index/Cate-01.jpg ","cate":"Cate-01","image_coursel":"images/index/course1.jpg","coursel":"Course1","courses":"1year ","introduce":"Celebrate success right, the only way, apple. To succeed you must believe. When you believe, you will succeed.","price":" $290","views":" 25 views","course":"nguyen van b ","classsize":"45 ","classduration":"7:00 - 10:00","date":"18 ","month":"2", "information":"Those Other College Expenses You Aren't Thinking About", "entrycontent":"Thousands of teenagers across the UK will have school lessons in mindfulness in an experiment designed to see if it can protect against mental illness.", "posted":"Hobbies", "tags":"education", "imageslogo":"images/clients/Logo-01.jpg", "blockquote":"You don't need a whole ecommerce system to sell your online courses. Paypal, Stripe payment methods integration can help you sell your courses out of the box. In the case you wanna use WooCommerce, this awesome WordPress LMS Plugin. ", "author_name":"Donald Simpson","author_info":"Founder & CEO, Arcade Systems", "imageblog":"images/blog/Blog-02.jpg"},{"image_cate":"images/index/Cate-01.jpg ","cate":"Cate-01","image_coursel":"images/index/course1.jpg","coursel":"Course1","courses":"1year ","introduce":"Celebrate success right, the only way, apple. To succeed you must believe. When you believe, you will succeed.","price":" $290","views":" 25 views","course":"nguyen van b ","classsize":"45 ","classduration":"7:00 - 10:00","date":"18 ","month":"2", "information":"Those Other College Expenses You Aren't Thinking About", "entrycontent":"Thousands of teenagers across the UK will have school lessons in mindfulness in an experiment designed to see if it can protect against mental illness.", "posted":"Hobbies", "tags":"education", "imageslogo":"images/clients/Logo-01.jpg", "blockquote":"You don't need a whole ecommerce system to sell your online courses. Paypal, Stripe payment methods integration can help you sell your courses out of the box. In the case you wanna use WooCommerce, this awesome WordPress LMS Plugin. ", "author_name":"Donald Simpson","author_info":"Founder & CEO, Arcade Systems", "imageblog":"images/blog/Blog-02.jpg"},{"image_cate":"images/index/Cate-01.jpg ","cate":"Cate-01","image_coursel":"images/index/course1.jpg","coursel":"Course1","courses":"1year ","introduce":"Celebrate success right, the only way, apple. To succeed you must believe. When you believe, you will succeed.","price":" $290","views":" 25 views","course":"nguyen van b ","classsize":"45 ","classduration":"7:00 - 10:00","date":"18 ","month":"2", "information":"Those Other College Expenses You Aren't Thinking About", "entrycontent":"Thousands of teenagers across the UK will have school lessons in mindfulness in an experiment designed to see if it can protect against mental illness.", "posted":"Hobbies", "tags":"education", "imageslogo":"images/clients/Logo-01.jpg", "blockquote":"You don't need a whole ecommerce system to sell your online courses. Paypal, Stripe payment methods integration can help you sell your courses out of the box. In the case you wanna use WooCommerce, this awesome WordPress LMS Plugin. ", "author_name":"Donald Simpson","author_info":"Founder & CEO, Arcade Systems", "imageblog":"images/blog/Blog-02.jpg"},{"image_cate":"images/index/Cate-01.jpg ","cate":"Cate-01","image_coursel":"images/index/course1.jpg","coursel":"Course1","courses":"1year ","introduce":"Celebrate success right, the only way, apple. To succeed you must believe. When you believe, you will succeed.","price":" $290","views":" 25 views","course":"nguyen van b ","classsize":"45 ","classduration":"7:00 - 10:00","date":"18 ","month":"2", "information":"Those Other College Expenses You Aren't Thinking About", "entrycontent":"Thousands of teenagers across the UK will have school lessons in mindfulness in an experiment designed to see if it can protect against mental illness.", "posted":"Hobbies", "tags":"education", "imageslogo":"images/clients/Logo-01.jpg", "blockquote":"You don't need a whole ecommerce system to sell your online courses. Paypal, Stripe payment methods integration can help you sell your courses out of the box. In the case you wanna use WooCommerce, this awesome WordPress LMS Plugin. ", "author_name":"Donald Simpson","author_info":"Founder & CEO, Arcade Systems", "imageblog":"images/blog/Blog-02.jpg"},{"image_cate":"images/index/Cate-01.jpg ","cate":"Cate-01","image_coursel":"images/index/course1.jpg","coursel":"Course1","courses":"1year ","introduce":"Celebrate success right, the only way, apple. To succeed you must believe. When you believe, you will succeed.","price":" $290","views":" 25 views","course":"nguyen van b ","classsize":"45 ","classduration":"7:00 - 10:00","date":"18 ","month":"2", "information":"Those Other College Expenses You Aren't Thinking About", "entrycontent":"Thousands of teenagers across the UK will have school lessons in mindfulness in an experiment designed to see if it can protect against mental illness.", "posted":"Hobbies", "tags":"education", "imageslogo":"images/clients/Logo-01.jpg", "blockquote":"You don't need a whole ecommerce system to sell your online courses. Paypal, Stripe payment methods integration can help you sell your courses out of the box. In the case you wanna use WooCommerce, this awesome WordPress LMS Plugin. ", "author_name":"Donald Simpson","author_info":"Founder & CEO, Arcade Systems", "imageblog":"images/blog/Blog-02.jpg"},
              
                ]       
                
            }
        },
        

        created:function(){
            this.axios.get('/api/course/banner').then((response)=>{
                this.cscourses=response.data.data;    
            });
            this.axios.get('/api/banner/list').then((response)=>{
             this.banner=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/banner/list').then((response)=>{
             this.banner=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });

            // this.axios.get('/api/course/feature-course').then((response)=>{
            //     this.ftcourse=response.data.data;
            //  // console.log('aaaaaaaaaa', response.data.data)
            // });
            this.axios.get('/api/news/lastest').then((response)=>{
                this.lastest=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
            
        },
    }
     
</script>
