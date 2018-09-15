<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<!-- Daterangepicker -->
<script src="plugins/moment/moment.js"></script>
<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Datepicker -->
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- Select 2 -->
<script src="plugins/select2/js/select2.min.js"></script>

<!-- jQuery Validation -->
<script src="plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/js/additional-methods.min.js"></script>

<!--C3 Chart-->
<script type="text/javascript" src="plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="plugins/c3/c3.min.js"></script>

<!-- Sweet-Alert  -->
<script src="plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
	// ajax csrf token
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// validate error
	$.validator.setDefaults({
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else if (element.hasClass('select2-hidden-accessible')) {     
				error.insertAfter(element.next('span'));
			} else if (element.hasClass('upload')) {
				error.insertAfter(element.closest('.fileupload'));
			} else {
				error.insertAfter(element);
			}
		}
	});

	// validate form
	$('#form').submit(function() {
		$(this).validate();
	})

	$(document).ready(function() {

		// close alert
		window.setTimeout(function() {
		    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
		        $(this).remove(); 
		    });
		}, 2000);

		// colspan td
		$('.merge-col').attr('colspan', $('.table th').length);

		// select 2
		$('.select2').select2({
			width: '100%',
			theme: 'bootstrap',
			allowClear: true,
			placeholder: function() {
				$(this).data('placeholder');
			}
		});

		$('.select2-hidden-accessible').on('change', function() {
			$(this).valid();
		});

		// delete action
		$('.delete').click(function() {
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
		                	window.location.reload();
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
	}).ajaxStart(function () {
		$('#loading').show();
	}).ajaxStop(function () {
		$('#loading').hide();
	});
</script>