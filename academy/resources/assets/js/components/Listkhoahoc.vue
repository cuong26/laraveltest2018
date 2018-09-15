
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
                                <a v-bind:href="'/khoa-hoc-chi-tiet/'+data.alias+''"><img v-bind:src="data.image" alt="Course1"></a>
                            </div>
                        </div><!-- /.featured-post -->

                        <div class="course-content" >
                            <h4><a v-bind:href="'/khoa-hoc-chi-tiet/'+data.alias+''"> {{data.name}} </a> </h4>

                               
                            
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
                                    <h6> {{data.durations}} tháng </h6>
                                    <span> Course</span>
                                </li>

                                <li>
                                    <h6> {{data.size}} </h6>
                                    <span> Class Size</span>
                                </li>

                                <li>
                                    <h6><span class="course-time"> {{ data.class_start}} - {{ data.class_end}} </span></h6>
                                    <span> Class Duration</span>
                                </li>
                            </ul> 
                                <a class="flat-button orange" v-bind:href="'/khoa-hoc-chi-tiet/'+data.alias+''">SEE MORE</a>
                            </div><!-- /.course-content -->
                    </div>
                </div><!-- / .post-wrap -->

            </div>
            <div id="app">
                <sidebarc></sidebarc>
            </div>

        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /main-content -->
</div>
</template>
<script>
import main from './javascripts/main.js';
import  switcher from './javascripts/switcher.js'
export default{
    data(){
        return {
            datas:[]
            
        }
    },
    created:function(){
        //this.danhsach_user();
        this.axios.get('/api/course/list-filter?alias=' + this.$route.params.Listkhoahoc + '').then((response)=>{
             this.datas=response.data.data;
             // console.log('aaaaaaaaaa', response.data.data)
        });        
    },
      
      // methods:{
      //     danhsach_user(){
      //      this.axios.get('http://599f807effe73c0011b9fcc5.mockapi.io/api/user').then((response)=>{
      //        this.datas=response.data;
      //       });
      //     }
      // }
}
 
 
 </script>


