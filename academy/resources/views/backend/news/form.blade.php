@extends('backend.layout.index')
@section('style')
    <!-- Bootstrap fileupload css -->
    <link href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />

    <style>
        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 24px !important;
        }
        #cke_1_contents {
            height: 400px !important;
        }
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
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#main" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Nội dung</span>
                        </a>
                    </li>
                    <li>
                        <a href="#comment" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs">Bình luận</span>
                        </a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" id="form" method="post" action="{{ isset($news) ? url('admin/news/' . $news->id) : url('admin/news') }}" enctype='multipart/form-data'>
                                @if(isset($news))
                                    {{ method_field('put') }}
                                @endif
                                    {{ csrf_field() }}
                                <div class="tab-content">
                                    <div class="tab-pane active" id="main">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label required">Tiêu đề</label>
                                                <input type="text" name="title" class="form-control" value="{{ $news->title or '' }}">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">URL thân thiện</label>
                                                <input type="text" name="alias" id="alias" class="form-control" value="{{ $news->alias or '' }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label required">Danh mục</label>
                                                <select name="category_id" class="form-control select2" data-placeholder="Chọn danh mục">
                                                    <option></option>
                                                    {!! $categories !!}
                                                </select>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Bài nổi bật</label>
                                                <select class="form-control select2" name="feature" >
                                                    <option value="1" {{ isset($news) && $news->feature == 1 ? 'selected' : '' }}>Có</option>
                                                    <option value="0" {{ isset($news) && $news->feature == 0 ? 'selected' : '' }}>Không</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Hiển thị bài viết</label>
                                                <select class="form-control select2" name="status" >
                                                    <option value="1" {{ isset($news) && $news->status == 1 ? 'selected' : '' }}>Có</option>
                                                    <option value="0" {{ isset($news) && $news->status == 0 ? 'selected' : '' }}>Không</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Thẻ từ khóa</label>
                                                <div class="tags-default">
                                                    <input type="text" class="form-control" name="tag" value="{{ $news->tag or '' }}" data-role="tagsinput" placeholder="Thêm tag"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label required">Ảnh đại diện</label>
                                                <div class="fileupload fileupload-{{isset($news) ? 'exists' : 'new' }}" data-provides="fileupload">
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px">
                                                        @if (isset($news))
                                                            <img src="{{ $news->getImage() }}" alt="image" />
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
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label required">Mô tả ngắn</label>
                                                <textarea name="description" cols="30" rows="5" class="form-control">{{ $news->description or '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label">Nội dung</label>
                                                <textarea id="ckeditor" class="form-control" name="content" rows="5">{{ $news->content or '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label">Thẻ tiêu đề</label>
                                                <textarea class="form-control" name="meta_title" rows="2">{{ $news->meta_title or '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label">Thẻ mô tả</label>
                                                <textarea class="form-control" name="meta_description" rows="2">{{ $news->meta_description or '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="comment">
                                        @if(isset($news) && count($news->comment))
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-bordered-custom m-b-20">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Tên người bình luận</th>
                                                    <th class="text-center">Trạng thái</th>
                                                    <th class="text-center">Nội Dung</th>
                                                    <th class="text-center">Hành động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($news->comment as $c)
                                                <tr>
                                                    <td>{{ $c->name }}</td>
                                                    <td class="text-center label-status">
                                                        @if($c->status)
                                                            <label class="label label-success">Đã kiểm duyệt</label>
                                                        @else
                                                            <label class="label label-warning">Chưa kiếm duyệt</label>
                                                        @endif
                                                    </td>
                                                    <td>{{ $c->content }}</td>
                                                    <td class="text-center">
                                                        <div class="hidden">{!! $c->content !!}</div>
                                                        @if($c->status)
                                                            <a href="javascript:void(0)" class="btn btn-warning check" title="Bỏ kiểm duyệt" data-id="{{ $c->id }}" data-status="{{ $c->status }}">
                                                                <i class="fa fa-thumbs-o-down"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)" class="btn btn-success check" title="Kiểm duyệt" data-id="{{ $c->id }}" data-status="{{ $c->status }}">
                                                                <i class="fa fa-thumbs-o-up"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" class="btn btn-danger detach" title="{{ __('table.delete') }}" data-url="{{ url('admin/news-comment/' . $c->id) }}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group text-right m-b-0">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary waves-effect w-md waves-light">Đồng ý</button>
                                            <a href="{{ url('admin/news') }}" type="button" class="btn btn-default waves-effect m-l-5">Hủy</a>
                                        </div>
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
    <script src="plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script>

        CKEDITOR.replace( 'ckeditor');

        jQuery.extend(jQuery.validator.messages, {
            accept: "Chỉ chấp nhận file ảnh",
        });

        jQuery.validator.addMethod("friendly_url", function(friendly_url, element) {
            return this.optional(element) || friendly_url.match(/^[A-z0-9.-]+$/);
        }, "Chỉ chấp nhận chữ, số và ký tự -");

        $("#form").validate({
            rules: {
                title: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }, 
                },
                category_id: "required",
                description: "required",
                image_file: {
                    @if (!isset($news))
                    required: true,
                    @endif
                    accept: "image/*"
                },
                alias: {
                    remote: {
                        url: "{{ url('admin/ajax/check-alias') }}",
                        type: "post",
                        data: {
                            alias: function() {
                                return $( "#alias" ).val();
                            },
                            table: 'news',
                            id: {{ isset($news) ? $news->id : 0 }},
                        },
                    },
                    friendly_url: true,
                }
            },
            messages: {
                title: "Chưa nhập tên",
                category_id: "Chưa chọn danh mục",
                description: "Mô tả không được để trống",
                image_file: {
                    required: "Chưa chọn ảnh đại diện",
                },
                alias: {
                    remote: "URL đã tồn tại",
                },
            },
        });

        // kiem duyet binh luan
    $('body').on('click', '.check', function() {
        var th = $(this);
        var id = $(this).data('id');
        var status = $(this).data('status');
        swal({
            title: 'Bạn có chắc muốn thay đổi trạng thái bình luận này?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then(function () {
            $.ajax({
                url: '{{ url('admin/ajax/check-comment') }}',
                data: {
                    table: 'news_comment',
                    id: id,
                    status: status 
                },
                success: function(data) {
                    if (data.status) {
                        th.attr('title', 'Bỏ kiểm duyệt');
                        th.closest('tr').find('.label-status').html('<label class="label label-success">Đã kiểm duyệt</label>');
                    } else {
                        th.attr('title', 'Kiểm duyệt');
                        th.closest('tr').find('.label-status').html('<label class="label label-warning">Chưa kiểm duyệt</label>');
                    }
                    th.data('status', data.status);
                    th.toggleClass('btn-warning').toggleClass('btn-success');
                    th.find('i').toggleClass('fa-thumbs-o-down').toggleClass('fa-thumbs-o-up');
                }
            });
        });
    });

    // xoa binh luan
    $('.detach').click(function() {
        var th = $(this).closest('tr');
        var url = $(this).data('url');
        swal({
            title: 'Bạn có chắc muốn xóa bản ghi này?',
            text: "Lưu ý: Thao tác này không thể khôi phục được",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then(function () {
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _method: 'delete',
                },
                success: function(data) {
                    if (data) {
                        swal({
                            title: 'Xóa thành công!',
                            type: 'success',
                        });
                        th.remove();
                    } else {
                        swal({
                            title: 'Không thể xóa!',
                            text: 'Mục này đã được sử dụng ở một vị trí khác',
                            type: 'error',
                        });
                    }
                }
            })
        })
    });
    </script>
@endsection