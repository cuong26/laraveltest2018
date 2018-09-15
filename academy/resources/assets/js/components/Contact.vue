 <template>
  <div >
    <div class="page-title parallax parallax4"> 
      <div class="overlay"></div>            
      <div class="container">
          <div class="row">
              <div class="col-md-12">                    
                  <div class="page-title-heading">
                      <h2 class="title">CONTACT US</h2>
                  </div><!-- /.page-title-heading -->
                  <div class="breadcrumbs">
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li>contact</li>
                      </ul>                   
                  </div><!-- /.breadcrumbs --> 
              </div><!-- /.col-md-12 -->  
          </div><!-- /.row -->  
      </div><!-- /.container -->                      
    </div><!-- /page-title parallax -->
    
    <section class="flat-row contact-page pad-top-134">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <div class="contact-content">
                  <div class="contact-address">
                      <div class="style1">                                    
                         <img src="images/icon/c1.png" alt="image">
                      </div> 
                      <div class="details">
                          <h5> Địa Chỉ </h5>
                          <p> {{ st.address }} </p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="contact-content">
                  <div class="contact-address">
                      <div class="style1">
                          <img src="images/icon/c2.png" alt="image">
                      </div>
                      <div class="details">
                          <h5> Số Điện Thoại </h5>
                          <p> {{ st.phone }} </p>
                          
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="contact-content">
                  <div class="contact-address">
                      <div class="style1">
                          <img src="images/icon/c3.png" alt="image">
                      </div>
                      <div class="details">
                          <h5> Email </h5>
                          <p> {{ st.email }} </p>
                      </div>
                  </div>
              </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="flat-spacer d74px"></div>
        </div>

        <div id="respond" class="comment-respond contact style2">
            <h1 class="title comment-title">Leave a Message</h1>
            <form  class="flat-contact-form style2 bg-dark height-small">
              <div class="field clearfix">      
                <div class="wrap-type-input">                    
                    <div class="input-wrap name">
                        <input type="text" value="" tabindex="1" placeholder="Name" name="name" id="name"  v-model='name' v-validate="'required|alpha'">
                        <span v-show="errors.has('name')" style=" color : red ;"> name bi thieu</span>

                    </div>
                    <div class="input-wrap email" :class="{error: errors.has('email')}">
                        <input type="email" value="" tabindex="2" placeholder="Email" name="email" id="email"  v-model='email' v-validate="'required|email'">
                        <span class="error" v-if="errors.has('email')">{{errors.first('email')}}</span>


                    </div>
                    <div class="input-wrap last Subject">
                        <input type="text" value="" placeholder="Subject (Optinal)" name="subject" id="subject"  v-model='subject' >
                    </div>  
                </div>
                <div class="textarea-wrap">
                    <textarea class="type-input" tabindex="3" placeholder="Message" name="message" id="message-contact"  v-model='message' v-validate="'required|alpha'"></textarea>
                    <span>{{ errors.first('message') }}</span> 

                </div>
              </div>
              <div class="submit-wrap"></div>
            </form><!-- /.comment-form --> 
          <button  class="flat-button bg-orange" @click="sendms" >Send Your Message</button>          
        </div><!-- /#respond -->
      </div><!-- /.container -->   
    </section>  
  </div>                
</template>
<script type="text/javascript" ></script>
<script>
  import switcher from './javascripts/switcher.js';
  import main from './javascripts/main.js';
  export default{
    data(){
      return {
        st:{},
        name: '', email: '',subject: '',message: '',
      }
    },
    created:function(){
      //this.danhsach_user();
      this.axios.get('/api/setting/list').then((response)=>{
           this.st=response.data.data;          
      });      
    },
    methods: {
      sendms:function(){
        this.axios.post('/api/contact/add', { name: this.name, email: this.email, subject: this.subjet, message: this.message
        }).
          then((response)=>{ 
            this.name ='' ,this.email = '' , this.subject = '', this.message =''         
          });
      }
    } 
  }  
</script>
 

