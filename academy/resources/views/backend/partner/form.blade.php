@extends('backend.layout.index')

@section('style')
    <!-- Bootstrap fileupload css -->
    <link href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
    <style>
        .form-group label {
            text-align: left !important;
        }
        .form-group {
            padding: 0 20px !important;
        }
    </style>
@endsection

@section('content')
	<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($partner) ? url('admin/partner/' . $partner->id) : url('admin/partner') }}" enctype='multipart/form-data'>
                                @if(isset($partner))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Tên đối tác</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $partner->name or "" }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Link</label>
                                        <input type="url" name="link" class="form-control" value="{{ $partner->link or "" }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label required">Logo</label>
                                        <div class="fileupload fileupload-{{isset($partner) ? 'exists' : 'new' }}" data-provides="fileupload">
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
                                                @if (isset($partner))
                                                    <img src="{{ $partner->getLogo() }}" alt="image" />
                                                @endif
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" name="logo_file" class="btn-default upload" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Mô tả</label>
                                        <textarea id="ckeditor" class="form-control" name="description" rows="5">{{ $partner->description or '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group text-right m-b-0">
                                    <label class="control-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                        <a href="{{ url('admin/partner') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
@endsection

@section('script')
    <!-- Bootstrap fileupload js -->
    <script src="plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
    <script>
        CKEDITOR.replace( 'ckeditor');
        jQuery.extend(jQuery.validator.messages, {
            accept: "Chỉ chấp nhận file ảnh",
        });

        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                logo_file: {
                    @if (!isset($partner))
                    required: true,
                    @endif
                    accept: "image/*"
                },
                link: {
                    url: true,
                },
            },
            messages: {
                name: "Chưa nhập tên",
                logo_file: {
                    required: "Chưa chọn Logo",
                },
                link: {
                    url: "Url không hợp lệ!",
                },
            },
        });
    </script>
@endsection