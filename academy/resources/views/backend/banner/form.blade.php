@extends('backend.layout.index')

@section('style')
	<!-- Bootstrap fileupload css -->
    <link href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
    <style>
        .form-group {
            padding: 0 20px !important;
        }

    </style>
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-xs-12">
					<div class="p-20">
						<form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($banner) ? url('admin/banner/' . $banner->id) : url('admin/banner') }}" enctype='multipart/form-data'>
							@if(isset($banner))
								{{ method_field('put') }}
							@endif
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label required">Tiêu đề Banner</label>
										<input type="text" name="name" id="name" class="form-control" value="{{ $banner->name or old('name') }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Vị Trí</label>
										<input type="number" name="location" id="location" class="form-control" value="{{ $banner->location or old('location') }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label required">Mô Tả Ngắn</label>
                                        <textarea name="description" class="form-control" id="footer_content" cols="30" rows="5" value="{{ $banner['description'] or '' }}">{{ $banner['description'] or '' }}</textarea>
                                    </div>
                                </div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label required">URL Đăng Ký</label>
										<input type="text" name="register" id="register" class="form-control" value="{{ $banner['register'] or '' }}">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label required">URL Thông Tin Chi Tiết</label>
										<input type="text" name="infomation" id="infomation" class="form-control" value="{{ $banner['infomation'] or '' }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Hiển thị trên trang chủ</label>
										<select class="form-control select2" name="status" >
											<option value="1" {{ isset($banner) && $banner->status == 1 ? 'selected' : '' }}>Có</option>
											<option value="0" {{ isset($banner) && $banner->status == 0 ? 'selected' : '' }}>Không</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label required">Ảnh Banner</label>
								<div class="fileupload fileupload-{{isset($banner) ? 'exists' : 'new' }}" data-provides="fileupload">
									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
										@if (isset($banner))
											<img src="{{ $banner->getImage() }}" alt="image" />
										@endif
									</div>
									<div>
										<button type="button" class="btn btn-default btn-file">
											<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
											<span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
											<input type="file" name="image_file" class="btn-default upload" />
										</button>
									</div>
								</div>
							</div>

							<div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Đồng ý</button>
                                <a href="{{ url('admin/banner') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
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
	<!-- Bootstrap fileupload js -->
    <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script>

	    jQuery.extend(jQuery.validator.messages, {
            accept: "Chỉ chấp nhận file ảnh",
        });

		$("#form").validate({
            rules: {
                name: {
                    required: true
                },
            	image_file: {
                    @if (!isset($banner))
                    required: true,
                    @endif
                    accept: "image/*"
                },
		        footer_content: "required",
                description: {
                    required: true,
                },
                register: {
                    required: true,
                    url: true,
                },
                infomation: {
                    required: true,
                    url: true,
                },
            },
            messages: {

                name: {
                	required: "Chưa nhập tên banner",
                },
                description: {
                    required: "Chưa nhập mô tả",
				},
                image_file: {
                    required: "Chưa chọn ảnh banner",
                },
                register: {
                    required: "Chưa nhập URL",
                    url: "Url không hợp lệ!",
                },
                infomation: {
                    required: "Chưa nhập URL",
                    url: "Url không hợp lệ!",
                },


            },
        });
	</script>
@endsection