

@include('header')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Thêm Bài Viết</a> </div>
    <h1>Viết Bài</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Thêm Bài Viết</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{route('tin')}}" name="basic_validate" id="basic_validate"  novalidate="novalidate"  enctype="multipart/form-data">
               <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
                <div >
                <label class="control-label">Hình Bài Viết </label>
                <div class="controls">
                  <input type="file" name="Hinh">
                
                </div>
                <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Thể loại</label>
              <div class="controls">
                <select name="theloai">
                  @foreach ($thu as  $tl)
                      <option value="{{$tl->id}}">{{$tl->name}}</option>
                    
                  @endforeach
                </select>
              </div>
            </div>

              </div>

               <div class="form-group{{ $errors->has('tieude') ? ' has-error' : '' }}">
                <label class="control-label">Tiêu Đề</label>
                <div class="controls">
                  <input type="text" name="tieude" id="required" >
                   @if ($errors->has('tieude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tieude') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
               <div class="form-group{{ $errors->has('tomtat') ? ' has-error' : '' }}">
                <label class="control-label">Tóm Tắt</label>
                <div class="controls">
                  <textarea  name="tomtat" ></textarea>
                   @if ($errors->has('tomtat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tomtat') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
              <div class="control-group">
                
                <label class="control-label">Nội Dung</label>
              </div>
        
                <div class="control-group">
               
               <td> <form >
      			
              <textarea  name="noidung" id="12"></textarea>
                @if ($errors->has('noidung'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noidung') }}</strong>
                                    </span>
                                @endif
      			<script>CKEDITOR.replace('12');</script>
   				</form>
        </td>
             
             
              
              <div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-success"/>
             
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>

               
              </thead>
              <tbody>
               
              
                <!-- <tr class="odd gradeX">
                  <td>123456</td>
               
                </tr>
                
              -- <tr class="even gradeC">
                  <td>2</td>
                  <td>Liên</td>
                  <td>Lien@gmail.com</td>
                   <td class="center"><a href="">Edit</a></td>
                  <td class="center"><a href="">Delete</a></td>
                </tr>
                <tr class="odd gradeA">
                  <td>3</td>
                  <td>Dũng</td>
                  <td>Dung@gmail.com</td>
                  <td class="center"><a href="">Edit</a></td>
                  <td class="center"><a href="">Delete</a></td>
                </tr>
                <tr class="even gradeA">
                  <td>4</td>
                  <td>Hòa</td>
                  <td>Hoa@yahoo.com</td>
                 <td class="center"><a href="">Edit</a></td>
                  <td class="center"><a href="">Delete</a></td>
                </tr>-->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>


</body>
</html>


