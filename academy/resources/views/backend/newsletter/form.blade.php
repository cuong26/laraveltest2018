@extends('backend.layout.index')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-xs-12">
					<div class="p-20">
						<form class="form-horizontal" id="form" role="form" method="post" action="{{ isset($newsletter) ? url('admin/newsletter/' . $newsletter->id) : url('admin/newsletter') }}">
							@if(isset($newsletter))
							{{ method_field('put') }}
							@endif
							{{ csrf_field() }}

							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label class="col-md-2 control-label required">Email</label>
								<div class="col-md-8">
									<input type="email" name="email" id="email" class="form-control" value="{{ $newsletter->email or old('email') }}">
									<span class="help-block">{{ $errors->first('email', ':message') }}</span>
								</div>
								
							</div>

							<div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Đồng ý</button>
                                <a href="{{ url('admin/newsletter') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
                            </div>
						</form>
					</div>
				</div>

			</div>
			<!-- end row -->

		</div> <!-- end card-box -->
	</div><!-- end col -->
</div>
<!-- end row -->
@endsection

@section('script')
	<script>
		$("#form").validate({
			rules: {
				email: {
					required: true,
					email: true,
					remote: {
				        url: "{{ url('admin/ajax/check-mail') }}",
				        type: "post",
				        data: {
				          	email: function() {
					            return $( "#email" ).val();
					        },
				          	table: 'newsletter',
				          	id: {{ isset($newsletter) ? $newsletter->id : 0 }},
				        },
				    }
				},
			},
			messages: {
				email: {
					required: "Chưa nhập Email",
					email: "Email không đúng định dạng",
					remote: "Email đã tồn tại trong hệ thống",
				},
			},
		});
	</script>
@endsection