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
                            <a class="flat-button orange" href="courses.html">VIEW ALL COURES</a>
                        </div> 
                    </div>

                    <div class="col-md-5 col-sm-12"> 
                        <ul class = "flat-course-images">
                            <li v-for='data in cscourses'>
                                <img v-bind:src="data.image" v-bind:alt="data.name"/> 
                            </li>
                        </ul>  
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
                    <div class="flat-course"  v-for='data in ftcourse'>
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
                                <div class="numb-count" data-to="2912093" data-speed="1000" data-waypoint-active="yes">0</div>
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
                    <div class="post col-md-4 col-xs-12 col-sm-6 flat-hover-zoom" v-for='data in lastest'>
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
                                <a href="flat-information.html"> {{ data.description }} </a>
                            </h2>

                            <div class="entry-content">
                                <p v-html="data.content ">   </p>
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
                        <img v-bind:alt="data.name" v-bind:src="data.logo"/>
                    </li>
                    
                </ul>
            </div>
        </section>

        <section class="flat-row testimonial" >
            <div class="container">
                <div class="testimonial-slider">
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <blockquote>
                               Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                        Mirum est notare quam littera gothica, quam nunc putamus parum
                            </blockquote> 
                        </div>
                        <div class="testimonial-meta">
                            <div class="testimonial-author">
                                <strong class="author-name">student</strong>
                                <div class="author-info"> student123 </div>
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
     export default{
      data(){
        return {
          banner:[ ],
          cscourses:[],
          ftcourse:[],
          lastest:[],
          partners:[]     
        }
      },
     created:function(){
        //this.danhsach_user();
        this.axios.get('/api/banner/list').then((response)=>{
             this.banner=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
        this.axios.get('/api/course/banner').then((response)=>{
             this.cscourses=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
        this.axios.get('/api/course/feature-course').then((response)=>{
             this.ftcourse=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
        this.axios.get('/api/news/lastest').then((response)=>{
             this.lastest=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
        this.axios.get('/api/partner/list').then((response)=>{
             this.partner=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
            });
      },
  }

</script>
