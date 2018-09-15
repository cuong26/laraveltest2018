<div class="panel-group section" data-count="{{ $count }}">
      <div class="panel panel-primary panel-color">
            <div class="panel-heading">
                  <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse{{ $count }}" class="collapsed title">{{ $section->name or 'Chưa có tiêu đề' }}</a>
                        <a href="javascript:void(0)" class="pull-right remove" title="Xóa"><i class="fa fa-times"></i></a>
                        <a href="javascript:void(0)" class="pull-right edit" data-toggle="modal" data-target="#modal" title="Sửa"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" class="pull-right down" title="Di chuyển xuống dưới"><i class="fa fa-arrow-down"></i></a>
                        <a href="javascript:void(0)" class="pull-right up" title="Di chuyển lên trên"><i class="fa fa-arrow-up"></i></a> 
                        <a href="javascript:void(0)" class="pull-right add" title="Thêm"><i class="fa fa-plus"></i></a>
                  </h4>
            </div>
            <div id="collapse{{ $count }}" class="panel-collapse collapse in">
                  <div class="panel-body">
                        <input type="hidden" name="section_name[{{ $count }}]" value="{{ $section->name or 'Chưa có tiêu đề' }}">
                        <input type="hidden" name="section_number[{{ $count }}]" class="section_number" value="{{ $section->number or $count }}">
                        <input type="hidden" class="lesson-count" value="{{ isset($section) && $section->lesson->count() ? $section->lesson->count() : 0 }}">
                        <div class="table-responsive">
                              <table class="table table-bordered table-bordered-custom m-0">
                                    <thead>
                                          <tr>
                                                <th>Số</th>
                                                <th>Tên bài học</th>
                                                <th>Thời lượng (phút)</th>
                                                <th>Hành động</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @if(isset($section) && $section->lesson->count())
                                          @foreach($section->lesson as $lesson)
                                                @include('backend.template.lesson', ['count' => $count, 'subcount' => $lesson->number])
                                          @endforeach
                                          @endif
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>