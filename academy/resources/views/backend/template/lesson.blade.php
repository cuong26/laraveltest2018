<tr data-count="{{$subcount}}">
	<td>
		<span class="no">{{$subcount}}</span>
		<input type="hidden" class="lc" name="lesson_number[{{$count}}][{{$subcount}}]" value="{{ $lesson->number or $subcount }}" class="form-control" required>
	</td>
	<td>
		<div class="form-group">
			<input type="text" name="lesson_name[{{$count}}][{{$subcount}}]" value="{{ $lesson->name or '' }}" class="form-control" required>
		</div>
	</td>
	<td>
		<div class="form-group">
			<input type="number" name="lesson_time[{{$count}}][{{$subcount}}]" value="{{ $lesson->time or '' }}" class="form-control lesson-time" required>
		</div>
	</td>
	<td>
		<a class="btn btn-info waves-effect waves-light up-lesson" href="javascript:void(0)" title="Di chuyển lên trên"><i class="fa fa-arrow-up"></i></a>
		<a class="btn btn-warning waves-effect waves-light down-lesson" href="javascript:void(0)" title="Di chuyển xuống dưới"><i class="fa fa-arrow-down"></i></a>
		<a class="btn btn-danger waves-effect waves-light remove-lesson" href="javascript:void(0)" title="Xóa"><i class="fa fa-times"></i></a>
	</td>
</tr>