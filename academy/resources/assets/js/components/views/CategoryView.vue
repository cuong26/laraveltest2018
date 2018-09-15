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

<section class="main-content blog-posts course-single">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-title-single">
                    <h1 class="bold">  {{ datas.name }} </h1>
                    <ul class="course-meta review style2 clearfix">
                        <li class="author">
                            <div class="thumb">
                                <img v-bind:src="datas.teacher_image" alt="image">
                            </div>

                            <div class="text">
                                <a href="#"> {{ datas.teacher_name }} </a>
                                <p>Teacher</p>
                            </div>
                        </li>
                        <li class="categories">
                            <a href="#" class="course-name"> {{ datas.category_name }} </a>
                            <p>Categories</p>
                        </li>
                        <li class="review-stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            <i class="fa fa-star-o"></i>
                            <p>Reviews</p>
                        </li>

                        <li>25 Reviews</li>
                    </ul>

                    <div class="feature-post">
                        <img v-bind:src="datas.image" alt="image">
                    </div><!-- /.feature-post -->
                    <div class="course-widget-price">
                        <h4 class="course-title">COURSE FEATURES</h4>
                        <ul>
                            <li>
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <span>Starts</span>
                                <span class="time"> {{ datas.start_course }} </span>
                            </li>
                            <li>
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                <span>Duration</span>
                                <span class="time"> {{ datas.durations }} </span>
                            </li>
                            <li>
                                <i class="fa fa-leanpub" aria-hidden="true"></i>
                                <span>Class Duration</span>
                                <span class="time"> {{ datas.class_duration }} </span>
                            </li>
                            <li>
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                <span>Institution</span>
                                <span class="time"> {{datas.address}} </span>
                            </li>
                            <li>
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <span>Seats Available</span>
                                <span class="time"> {{ datas.seats_available }} </span>
                            </li>
                            <li>
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Level</span>
                                <span class="time"> {{ datas.level }} </span>
                            </li>
                        </ul>
                        <h5 class="bt-course">Course Price: <span> {{ datas.course_price }} </span></h5>
                        <b>
                        <a class="flat-button bg-orange btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" href="#">ENROLL THIS COURSE</a>
                        </b>
                    </div>
                    <div class="entry-content">
                        <p v-html="datas.information"></p> 
                        <ul class="curriculum">
                            <li class="section" v-for='data in subject'>
                                <h4 class="section-title"> {{ data.name }}</h4>
                                <ul class="section-content">
                                    <li class="course-lesson">
                                        <a href="#" class="lesson-title">{{ data.lesson.name }}</a>
                                        <a href="#" class="lesson-preview">Preview</a>
                                        <div class="fr">
                                            <span class="duration">2 house</span>
                                            <a href="#" class="attrachment">Pdf file</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>                        
                    </div><!-- /.entry-post -->
                </div><!-- /.main-post -->
                <div class="author-post">
                    <h4 class="title author-title">ABOUT INSTRUCTOR</h4>
                    <div class="author-body">
                        <div class="author-avatar">                 
                            <div class="thumb" id="thumb">
                                <img v-bind:src="datas.teacher_image" alt="image">
                            </div>
                        <div class="info clearfix">
                            <div class="text">
                                <h6><a href="#">  {{ datas.teacher_name }}</a></h6>
                                <p> {{ teach.position }} </p>

                                <ul class="flat-socials">
                                    <li class="facebook">
                                        <a v-bind:href="teach.facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a v-bind:href="teach.twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="linkedin">
                                        <a v-bind:href="teach.linkedin"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="youtube">
                                        <a v-bind:href="teach.youtube"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>

                            </div>
                            
                        </div><!--/.author-avatarr -->
                        <p class="desc"> {{ teach.information }} </p>
                    </div><!--/.author-info -->
                 </div><!--/.author-info -->

                
                    <div class="comment-post">
                        <div class="comment-list-wrap">
                            <h4 class="title comment-title">Comment ( {{ comment.length }} ) </h4>
                            <ul class="comment-list">
                                <li v-for=" data in comment">
                                    <article class="comment">
                                        <div class="comment-avatar">
                                            <img src="/images/blog/1singlev1.png" alt="image">
                                        </div>                  
                                        <div class="comment-detail">
                                            <div class="comment-meta">
                                                <p class="comment-author"><a href="#"> {{ data.name }} </a></p> 
                                                <p class="comment-date"><a href="">March 8, 2016 - 8:00am</a></p> 
                                            </div>

                                            <p class="comment-body"> {{ data.content }} </p>
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div><!-- /.comment-detail -->
                                    </article><!-- /.comment -->
                                </li>     
                            </ul><!-- /.comment-list -->
                        </div><!-- /.comment-list-wrap -->

                       <div id="respond" class="comment-respond">
                            <h4 class="title comment-title style1">Leave a comment</h4>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form class="flat-contact-form" id="contactform">
                            
                                <input type="text" value="" tabindex="1" placeholder="Name*" name="name" id="name" v-model="name" required="" style="">
                                
                                <input type="email" value="" tabindex="2" placeholder="Email" name="email" id="email-contact"  v-model="email">

                                <textarea class="type-input" tabindex="3" placeholder="Comment*" name="message" id="message-contact"  v-model="content" required=""></textarea>
                   
                            </form>
                            <button class="flat-button bg-orange" @click="sendcmt">Post Comment</button>
                        </div><!-- /#respond -->
                    </div><!-- /.comment-post -->
                </div><!-- /blog-title-single -->
            </div><!-- /col-md-8 -->
            <div id="app">
                <sidebarc></sidebarc>
            </div>
        </div><!-- /row -->  
    </div><!-- /container -->

    <div class="modal fade" id="exampleModalLong"  role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông Tin Đăng Ký</h5>
                </div>
                <div class="modal-body">
                    <form style="padding: 20px 35px;">
                        <div class="row">
                           <div class="col-md-6">
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Họ và tên</label>    
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="text" name="name" v-model="name2" style="height:30px;" v-validate="'required|alpha_spaces'">
                                        <span  style="color:red;"> {{ errors.first('name') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Giới Tính</label>   
                                        </div>
                                   </div>
                                   <div class="col-md-8 ">
                                         <b-form-select  v-model="selected" :options="options" style="height:30px;padding:0 12px;" v-validate="'required'" name="Gender" />
                                         <span  style="color:red;">{{ errors.first('Gender') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                               <label>CôngTy / Tổ chức</label>  
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                        <input  class="form-control" type="text" name="company" id="company" v-model="company" style="height:30px;" v-validate="'required'">
                                        <span  style="color:red;">{{ errors.first('company') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Facebook</label>
                                        </div>     
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="text" name="facebook" id="facebook" v-model="facebook" style="height:30px;" v-validate="'required'">
                                        <span  style="color:red;">{{ errors.first('facebook') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                           <label>Địa Chỉ</label> 
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="text" name="address" id="address" v-model="address" style="height:30px;" v-validate="'required'">
                                         <span  style="color:red;">{{ errors.first('address') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-3">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Hình thức thanh toán</label>  
                                        </div>
                                       
                                   </div>
                                   <div class="col-md-8"> 
                                        <select style="height:30px;background-color: white; padding:0 12px;" class="form-control">
                                            <option selected>Thanh toán trực tiếp</option>
                                        </select>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Ngày Sinh</label> 
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="text" name="birthday" id="birthday" v-model="birthday" style="height:30px;" v-validate="'required'">
                                         <span style="color:red;">{{ errors.first('birthday') }}</span>
                                   </div>
                               </div>

                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                           <label>Số điện thoại</label>  
                                        </div>     
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="text" name="phone" id="phone" v-model="phone" style="height:30px;" v-validate="'required'">
                                        <span style="color:red;">{{ errors.first('phone') }}</span>
                                   </div>
                               </div>

                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Chức vụ</label> 
                                        </div> 
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="text" name="position" id="position" v-model="positionC" style="height:30px;" v-validate="'required'">
                                        <span style="color:red;">{{ errors.first('position') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                            <label>Email</label> 
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                        <input class="form-control" type="email" name="email" id="email-contact" v-model="email2" v-validate="{ required: true, email: true }" style="height:30px;">
                                        <span style="color:red;">{{ errors.first('email') }}</span>
                                   </div>
                               </div>
                               <div class="row mt-1">
                                   <div class="col-md-4 p-0">
                                        <div class="style-label">
                                           <label>Ghi chú</label> 
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                       <textarea class="form-control" name="note" v-model="note" aria-label="With textarea" style="height:81px;" v-validate="'required'">
                                       </textarea>
                                        <span style="color:red;">{{ errors.first('note') }}</span>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="text-right Sbtn">
                                <a href="#" class="flat-button bg-orange btn btn-primary"  @click="postInfo">Đăng ký</a>
                                <a href="#" class="flat-button bg-orange btn btn-primary" data-dismiss="modal">Hủy bỏ</a>
                            </div> 
                        </div>
                    </form>       
                </div>
            </div>
        </div>
    </div>

</section><!-- /main-content -->
</div>
</template>
<style type="text/css">
    .style-label{
        float: right;
    }
    .p-0{
        padding: 0px;
    }
    .Sbtn{
        padding-right: 15px;
    }
    .modal-open{
        padding-right: 0 !important;
    }
    .form-control{
        margin-bottom: 0 !important;
    }
    .mt-1{
        margin-bottom: 20px;
    }
</style>
<script>
import main from '../javascripts/main.js';
import  switcher from '../javascripts/switcher.js';
import validate from '../javascripts/jquery-validate.js';
    export default{
        data(){
            return {
              datas: {},
              category:[],
              teacher:[],
              ftcourse:[],
              comment:[],
              teach:[],
              selected: null,
              name:'', email: '', content: '',
              name2:'', email2:'', birthday:'', address:'', phone:'', note:'',
              company:'', facebook:'', positionC:'',gender:'null',
              options: [
                { value: '1', text: 'Nam' },
                { value: '0', text: 'Nữ' },
              ],
            }
        },
        created:function(){
            //this.danhsach_user();
            this.axios.get('/api/course/detail?alias=' + this.$route.params.khoahocId + ' ').then((response)=>{
                this.datas=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course/detail?alias=' + this.$route.params.khoahocId + ' ').then((response)=>{
                this.teach=response.data.data.lecturer;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course/detail?alias=' + this.$route.params.khoahocId + ' ').then((response)=>{
                this.subject=response.data.data.section;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course-category/list').then((response) => {
                this.category=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/teacher/list').then((response) => {
                this.teacher=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course/feature-course').then((response) => {
                this.ftcourse=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/course-comment/list?alias=' + this.$route.params.khoahocId + '').then((response) => {
                this.comment=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
        },
        methods:{
            sendcmt:function(){
                this.axios.post('/api/course-comment/checkcomment', { name: this.name, email: this.email, content: this.content, parent_id:'0',
                    course_id:this.datas.id }).then((response) => { 
                this.name ='' ,this.email = '' , this.content =''       
                });        
            },

            postInfo:function(e){
                e.preventDefault();
                this.$validator.validateAll().then((result) => {
                    if (result) {
                    console.log('All is well');
                        this.axios.post('/api/student/create', { name: this.name2, email: this.email2, birthday: this.birthday, address: this.address, phone: this.phone, note: this.note, gender: this.gender 
                        })
                        .then((response) => {this.name2='', this.email2='', this.birthday='', this.address='', this.phone='', this.note='',this.gender});

                            $('#exampleModalLong').hide();
                            $('.modal-backdrop').hide();
                            console.log($('.modal'))
                            return;   
                    }
                    if(!result){
                        console.log('Oops!');                
                    }
                });
            }  
        },   
    } 
 </script>      
</body>
</html>
