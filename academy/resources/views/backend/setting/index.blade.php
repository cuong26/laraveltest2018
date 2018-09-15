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
						<form class="form-horizontal" id="form" role="form" method="post" action="{{ url('admin/setting') }}" enctype='multipart/form-data'>
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
										<label class="control-label required">Số điện thoại</label>
										<input type="text" name="phone" id="phone" class="form-control" value="{{ $setting['phone'] or '' }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										<label class="control-label required">Email</label>
										@if(old('email'))
										<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
										@else
										<input type="email" name="email" id="email" class="form-control" value="{{ $setting['email'] or '' }}">
										@endif
										<span class="help-block">{{ $errors->first('email', ':message') }}</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                        <label class="control-label required">Địa chỉ</label>
                                        <textarea name="address" class="form-control" id="footer_content" cols="30" rows="5" value="{{ $setting['address'] or '' }}">{{ $setting['address'] or '' }}</textarea>
                                    </div>
                                </div>
							</div>

							<div class="row">
								<div class="col-md-12">
                                    <div class="form-group {{ $errors->has('footer_content') ? 'has-error' : '' }}">
                                        <label class="control-label required">Nội dung chân trang</label>
                                        <textarea id="ckeditor" name="footer_content" class="form-control" id="footer_content" cols="30" rows="5" value="{{ $setting['footer_content'] or '' }}">{{ $setting['footer_content'] or '' }}</textarea>
                                    </div>
                                </div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
										<label class="control-label">Facebook</label>
										<input type="text" name="facebook" id="facebook" class="form-control" value="{{ $setting['facebook'] or '' }}">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
										<label class="control-label">Youtube</label>
										<input type="text" name="youtube" id="youtube" class="form-control" value="{{ $setting['youtube'] or '' }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
										<label class="control-label">Twitter</label>
										<input type="text" name="twitter" id="twitter" class="form-control" value="{{ $setting['twitter'] or '' }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('linkedin') ? 'has-error' : '' }}">
										<label class="control-label">LinkedIn</label>
										<input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ $setting['linkedin'] or '' }}">
									</div>
								</div>
							</div>

							<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
								<label class="control-label required">Logo</label>
								<div class="fileupload fileupload-{{isset($setting['logo']) ? 'exists' : 'new' }}" data-provides="fileupload">
									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
										@if (isset($setting['logo']))
											<img src="{{ url('upload/setting/' . $setting['logo']) }}" alt="image" />
										@endif
									</div>
									<div>
										<button type="button" class="btn btn-default btn-file">
											<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
											<span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
											<input type="file" name="logo" class="btn-default upload" />
										</button>
									</div>
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
	<script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
	<!-- Bootstrap fileupload js -->
    <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script>

		CKEDITOR.replace( 'ckeditor');

		// validate phone
        jQuery.validator.addMethod("phone_number", function(phone_number, element) {
	        phone_number = phone_number.replace(/\s+/g, "");
	        return this.optional(element) || phone_number.length > 9 &&
	        phone_number.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
	    }, "Số điện thoại không hợp lệ");

	    jQuery.extend(jQuery.validator.messages, {
            accept: "Chỉ chấp nhận file ảnh",
        });

		$("#form").validate({
            rules: {
            	logo: {
                    @if (!isset($setting['logo']))
                    required: true,
                    @endif
                    accept: "image/*"
                },
                email: {
					required: true,
					email: true,
				},
                address: "required",
                phone: {
                	required: true,
		          	phone_number: true,
		        },
		        footer_content: "required",
		        linkedin: {
                    url: true,
                },
                facebook: {
                    url: true,
                },
                twitter: {
                    url: true,
                },
                youtube: {
                    url: true,
                },
            },
            messages: {
                email: {
					required: "Chưa nhập Email",
					email: "Email không đúng định dạng",
				},
                address: "Chưa nhập địa chỉ",
                phone: {
                	required: "Chưa nhập số điện thoại",
                },
                footer_content: "Chưa nhập nội dung chân trang",
                logo: {
                    required: "Chưa chọn Logo",
                },
                linkedin: {
                    url: "Url không hợp lệ!",
                },
                facebook: {
                    url: "Url không hợp lệ!",
                },
                twitter: {
                    url: "Url không hợp lệ!",
                },
                youtube: {
                    url: "Url không hợp lệ!",
                },
            },
        });
	</script>
@endsection