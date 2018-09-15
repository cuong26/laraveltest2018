
<template>
<div>
    <div class="page-title parallax parallax4"> 
        <div class="overlay"></div>            
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h2 class="title">Góc Tư Vấn</h2>
                    </div><!-- /.page-title-heading -->
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Courses Grid</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /page-title parallax -->
    <section class="main-content blog-posts blog-grid have-sidebar">
        <div class="container">
            <div class="blog-title">
                <h1 class="bold">Tin Tức</h1>
            </div>

            <div class="post-content">
                
                <div class="post-wrap clearfix">
                    <article class="post flat-hover-zoom"  v-for='data in datas ' >
                        <div class="featured-post" >
                            <div class="entry-image">
                              <a v-bind:href=" '/tin-chi-tiet/'+ data.alias +'' "><img v-bind:src="data.image" alt="image"></a>  
                            </div>
                        </div>

                        <div class="date-post">
                            <span class="numb"> {{ data.date }} </span>
                            <span> {{ data.month }} </span>
                        </div>

                        <div class="content-post">
                            <h2 class="title-post">
                                <a v-bind:href=" '/tin-chi-tiet/'+ data.alias +'' ">  {{data.title}}  </a>
                            </h2>

                            <div class="entry-content">
                                <p> {{data.description}}   </p>
                            </div>

                            <div class="entry-meta style1">
                                <p>Posted in:<span><a href="#"> {{ data.category }}  </a></span></p>
                                <p>Tags:<span><a href="#"> {{ data.tag }} </a></span> </p>
                            </div>
                        </div><!--  /content-post -->
                    </article><!-- /post -->

                </div><!-- /post-wrap -->
                    
                <div class="blog-pagination">
                    <ul class="flat-pagination">
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>                                
                        <li class="next">
                            <a href="#">Next</a>
                        </li>                               
                    </ul><!-- /.flat-pagination -->
                </div>
            </div>

            <div class="sidebar">
                <div class="widget widget-popular-news">
                    <h5 class="widget-title">Recent posts</h5>
                    <ul class="popular-news clearfix">
                        <li  v-for='data in last.slice (0,5)'>
                            <div class="thumb">
                                <img v-bind:src="data.image" alt="image">
                            </div>
                            <div class="text">
                                <a v-bind:href="'/tin-chi-tiet/'+data.alias+''"> {{ data.title }}</a>
                                <p> {{ data.date }}</p>
                            </div>
                        </li>
                        
                    </ul><!-- /popular-news clearfix -->
                </div><!-- /widget widget-popular-news -->
                <div class="widget widget-categories">
                    <h5 class="widget-title">Categories</h5>
                    <ul class="unstyled">
                        <li  v-for='data in category'>
                            <a v-bind:href="'/tin-tuc/'+data.alias+''"> {{data.name}} </a>
                            <span class="numb-right"> ({{ data.count }}) </span>
                        </li>
                    </ul>
                </div>
                <div class="widget widget-teacher">
                    <h5 class="widget-title">Browse by Teacher</h5>
                    <div class="text-teacher">
                        <p>Lorem ipsum sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <ul class="teacher-news clearfix">
                        <li  v-for='data in teacher'>
                            <div class="thumb">
                                <img v-bind:src="data.image" alt="image">
                            </div>
                            <div class="text">
                                <a href="#"> {{data.name}}  </a>
                                <p> {{ data.position }} </p> 
                            </div>
                            <ul class="flat-socials">
                                <li class="facebook">
                                    <a href="data.facebook"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="data.twitter"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="linkedin">
                                    <a href="data.linkedin"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li class="youtube">
                                    <a href="data.youtube"><i class="fa fa-youtube-play"></i></a>
                                </li>
                            </ul>
                        </li>

                    </ul><!-- /popular-news clearfix -->
                </div>

                <div class="widget widget-featured-courses">
                    <h5 class="widget-title">Featured courses</h5>
                    <ul class="featured-courses-news clearfix">
                        <li  v-for='data in ftcourse.slice (0,5)'>
                            <div class="thumb">
                                <img v-bind:src="data.image" alt="image">
                            </div>
                            <div class="text">

                                <a v-bind:href="'/khoa-hoc-chi-tiet/'+data.alias+''"> {{data.name}} </a>

                                <p> {{data.teacher}} </p>
                            </div>
                            <div class="review-rating">
                                <div class="flat-money">
                                    <p> {{data.price}} </p>
                                </div>
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
                            </div>
                        </li>
                       
                    </ul><!-- /popular-news clearfix -->
                </div><!-- /widget widget-popular-news -->
            </div><!-- /sidebar -->
        </div><!-- /container -->
    </section>       
</div>
               
</template>
<script>
    import main from './javascripts/main.js';
    import  switcher from './javascripts/switcher.js'

    export default{
        data(){
            return {
                datas:[],
                last:[],
                category:[],
                teacher:[],
                ftcourse:[]
            }
        },
        created:function(){
            //this.danhsach_user();
            this.axios.get('/api/news/list-filter?alias=' + this.$route.params.ListtintucId + '').then((response)=>{
                 this.datas=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/news/lastest').then((response)=>{
                 this.last=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/news-category/list').then((response)=>{
                 this.category=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/teacher/list').then((response)=>{
                 this.teacher=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course/feature-course').then((response)=>{
                 this.ftcourse=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
        },      
          
    }

</script>
