

@include('header')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Thêm thể loại</a> </div>
    <h1>Thể Loại</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Thêm Thể loại</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{route('theloai')}}" name="basic_validate" id="basic_validate"  novalidate="novalidate"  enctype="multipart/form-data">
               <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
               

               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label">Thể Loại</label>
                <div class="controls">
                  <input type="text" name="name" id="required" >
                   @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
             
             
              
              <div class="form-actions">
                <input type="submit" value="Thêm" class="btn btn-success"/>
             
             </div>
            </form>
         
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


