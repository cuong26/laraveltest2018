
<template>
    <div>
        <div class="page-title parallax parallax4"> 
            <div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">COURSES GRID 3 COLUMNS</h2>
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
        <section class="main-content blog-posts flat-row course-list have-sidebar">
            <div class="container">
                <div class="blog-title clearfix">
                    <h1 class="bold">LIST COURSES</h1>
                </div>
                <div class="row_course">
                    <div class="post-content">
                        <div class="flat-post-ordering clearfix">
                            <div class="sort-views">
                                <label class="modern-select">
                                    <select name="select_category" class="orderby">
                                        <option value="menu_order" selected="selected">Select Category</option>
                                        <option value="Accessories">Accessories</option>
                                        <option value="mobile_app">Mobile App</option>
                                        <option value="fashion_design">Fashion Desin</option>
                                        <option value="web_design">Web Design</option>
                                    </select>
                                </label>

                                <label class="modern-select">
                                     <select name="select_category" class="orderby">
                                        <option value="menu_order" selected="selected">Sort by</option>
                                        <option value="newest">Newest</option>
                                        <option value="oldest">Oldest</option>
                                    </select>
                                </label>
                                <div class="list-grid">
                                    <a data-layout = "course-grid" class="course-grid-view" href="#"><i class="fa fa-th" aria-hidden="true"></i></a>
                                    <a data-layout = "course-list" class="course-list-view active" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="post-warp clearfix">
                            <div class="flat-course flat-hover-zoom"  v-for='data in datas'>
                                <div class="featured-post">             
                                    <div class="overlay">
                                        <div class="link"></div>
                                    </div>
                                    
                                    <div class="entry-image">
                                        <a v-bind:href="'/khoa-hoc/'+data.alias+''"><img v-bind:src="data.image" alt="Course1"></a>
                                    </div>
                                </div><!-- /.featured-post -->

                                <div class="course-content" >
                                    <h4><a v-bind:href="'/khoa-hoc/'+data.alias+''"> {{data.name}} </a> </h4>

                                       
                                    
                                    <ul class="course-meta review clearfix">
                                        <li class="author">
                                            <div class="thumb">
                                                <img v-bind:src="data.image_teacher" alt="image">
                                            </div>

                                            <div class="text">
                                                <a href="#"> {{data.teacher}} </a>
                                                <p> {{ data.category }} </p>
                                            </div>
                                        </li>
                                        <li class="review-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>

                                        <li> 200 views </li>
                                    </ul> 

                                    <p> {{ data.description }}</p>

                                    <ul class="course-meta desc">
                                        <li>
                                            <h6> {{data.durations}} </h6>
                                            <span> Course</span>
                                        </li>

                                        <li>
                                            <h6> {{data.size}} </h6>
                                            <span> Class Size</span>
                                        </li>

                                        <li>
                                            <h6><span class="course-time"> {{ data.class_duration}} </span></h6>
                                            <span> Class Duration</span>
                                        </li>
                                    </ul> 
                                        <a class="flat-button orange" v-bind:href="'/khoa-hoc/'+data.alias+''">SEE MORE</a>
                                </div><!-- /.course-content -->
                            </div>
                        </div><!-- / .post-wrap -->

                        <div class="blog-pagination">
                            <ul class="flat-pagination">
                                <li><span class="active">1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>                                
                                <li class="next">
                                    <a href="#">Next</a>
                                </li>                               
                            </ul><!-- /.flat-pagination -->
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="widget widget-categories">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="unstyled">
                                <li  v-for='data in category'>
                                    <a href="#"> {{data.name}} </a>
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
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /main-content -->
    </div>
</template>
<script type="text/javascript" src="javascript/switcher.js"></script>
<script type="text/javascript" src="javascript/main.js"></script>
<script>
    export default{
        data(){
            return {
                datas:[],
                category:[],
                teacher:[],
                ftcourse:[]
            }
        },
        created:function(){
            //this.danhsach_user();
            this.axios.get('/api/course/list').then((response)=>{
                 this.datas=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course-category/list').then((response)=>{
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


