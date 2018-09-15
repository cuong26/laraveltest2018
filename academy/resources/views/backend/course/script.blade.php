<script>

    // gán vị trí tự động cho section
    function reOrderSection() {
        $('.section').each(function(i, e) {
            $(this).find('.section_number').val(i+1);
        });
    }

    // gán vị trí tự động cho lesson
    function reOrderLesson(number) {
        $('#collapse'+number).find('tbody tr').each(function(i, e) {
            $(this).find('.no').html(i+1);
            $(this).find('.lc').val(i+1);
        });
    }

    // add ckeditor
    CKEDITOR.replace( 'ckeditor');

    // validate ngày bắt đầu phải trước ngày kết thúc
    jQuery.validator.addMethod("date_after", function(value, element) {
        if ($('#course_start').val() && $('#course_end').val()) {
            var course_start = moment($('#course_start').val(), "DD/MM/YYYY");
            var course_end = moment($('#course_end').val(), "DD/MM/YYYY");
            return moment(course_end).isSameOrAfter(course_start);
        }
        return true;
    });

    // validate thời gian bắt đầu phải trước thời gian kết thúc
    jQuery.validator.addMethod("time_after", function(value, element) {
        if ($('#class_start').val() && $('#class_end').val()) {
            var class_start = moment($('#class_start').val(), "hh:mm a");
            var class_end = moment($('#class_end').val(), "hh:mm a");
            return moment(class_end).isSameOrAfter(class_start);
        }
        return true
    });

    $('.timepicker').timepicker({
        showMeridian: false,
        minuteStep: 1,
        showInputs: true,
    }).on('changeTime.timepicker', function(e) {
        $("#form").validate().element($('#class_start'));
        $("#form").validate().element($('#class_end'));
    });

    // khởi tạo số tự động cho price
    $('.autonumber').autoNumeric('init');

    // validate ngày bắt đầu phải trước ngày kết thúc
    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
    }).on('change', function() {
        $("#form").validate().element($('#course_start'));
        $("#form").validate().element($('#course_end'));
    });
    
    // validate image
    jQuery.extend(jQuery.validator.messages, {
        accept: "Chỉ chấp nhận file ảnh",
    });

    $("#form").validate({
        ignore: "",
        rules: {
            name: {
                required: true,
                normalizer: function(value) {
                    return $.trim(value);
                }
            },
            image_file: {
                @if (!isset($course))
                required: true,
                @endif
                accept: "image/*"
            },
            category_id: "required",
            teacher_id: "required",
            course_start: {
                required: true,
                date_after: true,
            },
            course_end: {
                required: true,
                date_after: true,
            },
            class_start: {
                required: true,
                time_after: true,
            },
            class_end: {
                required: true,
                time_after: true,
            },
            size: {
                required: true,
                number: true,
            },
            price: {
                required: true,
                number: true,
            },    
            level: "required",
            description: "required",
            address: "required", 
            'school_day[]' : "required",
        },
        messages: {
            name: "Chưa nhập tên",
            image_file: {
                required: "Chưa chọn ảnh",
            },
            category_id: "Chưa chọn danh mục khóa học",
            teacher_id: "Chưa chọn giảng viên",
            course_start: {
                required: "Chưa chọn ngày bắt đầu",
                date_after: "Ngày bắt đầu phải trước ngày kết thúc"
            },
            course_end: {
                required: "Chưa chọn ngày kết thúc",
                date_after: "Ngày kết thúc phải sau ngày bắt đầu"
            },
            class_start: {
                required: "Chưa chọn thời gian bắt đầu",
                time_after: "Thời gian bắt đầu phải trước thời gian kết thúc"
            },
            class_end: {
                required: "Chưa chọn thời gian kết thúc",
                time_after: "Thời gian kết thúc phải sau thời gian bắt đầu"
            },
            price: {
                required: "Chưa nhập giá",
                number: "Phải nhập số",
            },
            size: {
                required: "Chưa nhập số học viên",
                number: "Phải nhập số",
            },
            description: "Chưa nhập nội dung",
            address: "Chưa nhập địa chỉ",
            level: "Chưa chọn cấp học",
            'school_day[]': "Chưa chọn ngày học",
        },
        invalidHandler:  function(event, validator) {
            if(validator.errorList.length) {
                $('.content-page a[href="#' + $(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
            }
        },
    });

    $('input[name^="lesson_name"], input[name^="lesson_time"]').each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required: "Vui lòng nhập trường này"
            }
        });
    })

    // mở popup sửa tên
    $('body').on('click', '.edit', function() {
        $('#section-name').val($(this).closest('.panel-title').find('.collapsed').text());
        $('#section-count').val($(this).closest('.section').data('count'));
    });

    // sửa tên section
    $('#edit').click(function() {
        $('.section[data-count="'+$('#section-count').val()+'"] .title').text($('#section-name').val());
        $('input[name="section_name['+$('#section-count').val()+']"]').val($('#section-name').val());
    });

    // thêm mới lesson
    $('body').on('click', '.add', function() {
        var section = $(this).closest('.section');
        var subcount = section.find('.lesson-count').val();
        subcount++;
        $.ajax({
            url: '{{ url('admin/ajax/load-lesson') }}',
            data: {
                count: section.data('count'),
                subcount: subcount,
            },
            success: function(data) {
                section.find('tbody').append(data);
                section.find('.lesson-count').val(subcount);
                $('tr[data-count="'+subcount+'"] input').each(function () {
                    $(this).rules('add', {
                        required: true,
                        messages: {
                            required: "Vui lòng nhập trường này"
                        }
                    });
                });
            }
        });
    });

    // thêm mới section
    $('#add').click(function() {
        var count = $('#count').val();
        count++;
        $.ajax({
            url: '{{ url('admin/ajax/load-section') }}',
            data: {
                count: count,
            },
            success: function(data) {
                $('#section').append(data);
                $('#count').val(count);
            }
        })
    });

    // xóa section
    $('body').on('click', '.remove', function() {
        var section = $(this).closest('.section');
        swal({
            title: 'Xóa học phần này?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then(function () {
            section.remove();
            reOrderSection();
        })
    });

    // xóa lesson
    $('body').on('click', '.remove-lesson', function() {
        var tr = $(this).closest('tr');
        var number = $(this).closest('.section').data('count');
        swal({
            title: 'Xóa bài học này?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then(function () {
            tr.remove();
            reOrderLesson(number);
        })
    });

    // di chuyển lên xuống section
    $('body').on('click', '.up, .down', function(){
        var parent = $(this).parents(".section:first");
        if ($(this).is('.up')) {
            parent.insertBefore(parent.prev());
        } else {
            parent.insertAfter(parent.next());
        }
        reOrderSection();
    });

    // di chuyển lên xuống lesson
    $('body').on('click', '.up-lesson, .down-lesson', function(){
        var row = $(this).parents("tr:first");
        if ($(this).is('.up-lesson')) {
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }
        reOrderLesson($(this).closest('.section').data('count'));
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
                    table: 'course_comments',
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

    $(document).ready(function() {
        // select 2
        $('.select2_clear').select2({
            width: '100%',
            theme: 'bootstrap',
            placeholder: function() {
                $(this).data('placeholder');
            }
        });
    })
</script>