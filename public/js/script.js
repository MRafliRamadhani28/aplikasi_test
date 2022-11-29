// FILENAME
$('#showForm').on('change', 'input[type="file"]', function() {
	$(this).next('.custom-file-label').html(event.target.files[0].name);
});

// SWEETALERT
const Toast = Swal.mixin({
	toast: true,
	position: 'bottom-end',
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
	didOpen: (toast) => {
	toast.addEventListener('mouseenter', Swal.stopTimer)
	toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
})

function sweetalert(icon, title) {
	Toast.fire({
		icon: icon,
		title: title
	})
}

// READ
$(document).ready(function(){
    readData();
});

function readData() {
	const action = $('#setForms').data('action');
	$('#example2').DataTable().destroy();
	$.ajax({
		type: "get",
		url: `/${action}/readData`,
		datatype: 'html',
		async: false,
		success: function(data) {
			$('#tBody').html(data);
			// $('#dataTable').DataTable();
			$('.ctooltip').tooltip({ trigger: "hover", placement: "bottom" });
			
			  var table = $('#example2').DataTable( {
			    lengthChange: false,
			    buttons: [ 'copy', 'excel', 'pdf', 'print']
			  });
			
			  table.buttons().container()
			    .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		}
	});
}

function showForm(id) {
	const action = $('#setForms').data('action');
	if(id == null) {
		$.get(`/${action}/showForm`, {}, function(data) {
			$('#showForm').html(data);
			$('#modal-add').modal('show');

			$('.single-select').select2({
			    theme: 'bootstrap4',
			    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			    placeholder: $(this).data('placeholder'),
			    allowClear: Boolean($(this).data('allow-clear')),
			});
		});
	} else {
		$.get(`/${action}/showForm?id=`+id, {}, function(data) {
			$('#showForm').html(data);
			$('#modal-edit').modal('show');

      $('.single-select').select2({
          theme: 'bootstrap4',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
          placeholder: $(this).data('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
      });
		});
	}
}

// FORM CSRF
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

// FORM ADD
$('#showForm').on('submit', '.form-add', function(e){
    $('.close').click();
    e.preventDefault();
	$.ajax({
		type:'POST',
		url: $(this).attr('action'),
		data: $(this).serialize(),
		success: (data) => {
			if(data == "") {
				readData();
				sweetalert('success', 'Data added successfully');
			} else {
				$('#showForm').html(data);
        $('#modal-add').modal('show');

				$('.single-select').select2({
			    theme: 'bootstrap4',
			    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			    placeholder: $(this).data('placeholder'),
			    allowClear: Boolean($(this).data('allow-clear')),
			});
			}
		}
	});
});

// FORM EDIT
$('#showForm').on('submit', '.form-edit', function(e){
	$('.close').click();
	e.preventDefault();
	$.ajax({
		type:'POST',
		url: $(this).attr('action'),
		data: $(this).serialize(),
		success: (data) => {
			if(data == "") {
				readData();
				sweetalert('success', 'Data changed successfully');
			} else {
				$('#showForm').html(data);
        $('#modal-edit').modal('show');

				$('.single-select').select2({
			    theme: 'bootstrap4',
			    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			    placeholder: $(this).data('placeholder'),
			    allowClear: Boolean($(this).data('allow-clear')),
			});
			}
		}
	});
});

// FORM DELETE
$('#tBody').on('click', '.form-delete', function(e){
	e.preventDefault();
	const id = $(this).data('id');
	const name = $(this).data('name');
	const token = $('#setForms').data('token');
	const action = $('#setForms').data('action');

	Swal.fire({
		icon: 'warning',
		title: 'Are you sure?',
		text: `Data ${name} will be deleted.`,
		showCancelButton: true,
		confirmButtonText: 'Sure',
	}).then((result) => {
		if (result.isConfirmed) {
			$.post(`/${action}/${id}`, { "_method": "DELETE", "_token": token, "id": id }, function() {
				readData();
				sweetalert('success', 'Data deleted successfully');
			}); 
		}
	})
});