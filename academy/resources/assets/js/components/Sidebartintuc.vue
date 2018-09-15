<template>
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
            <h5 class="widget-tihttp://vinacademy.yez.vn/tle">Featured courses</h5>
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
</template>
<script type="text/javascript">
	 export default{
        data(){
            return {
            	last:[],
                category:[],
                teacher:[],
                ftcourse:[],
        	}
        },
        created:function(){
   

            //this.danhsach_user();
            this.axios.get('/api/news/lastest').then((response) => {
                this.last=response.data.data;
            });    
            this.axios.get('/api/news-category/list').then((response) => {
                this.category=response.data.data;
            });
            this.axios.get('/api/teacher/list').then((response) => {
                this.teacher=response.data.data;
            });
            this.axios.get('/api/course/feature-course').then((response) => {
                this.ftcourse=response.data.data;    
            });
        },      
    } 
</script>
        
