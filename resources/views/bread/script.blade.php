@push('css')
	<link rel="stylesheet" href="{{ asset('plugins/dataTables.bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/minimal.css') }}">
@endpush

@push('javascripts')
    <script src="{{ asset('plugins/jquery.dataTables.min.js') }}" charset="utf-8"></script>
	<script src="{{ asset('plugins/dataTables.bootstrap.min.js') }}" charset="utf-8"></script>
	<script type="text/javascript">

		function initConfirmFirst() {
			$('a.confirm-first').on('click', function(e) {
				e.preventDefault();
				var a = $(e.delegateTarget);
				var c = confirm(a.data('confirmText'));

				if (c)
					window.location.href = a.attr('href');
			});
		}

		function initICheck() {
			$('input.icheck').iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal',
			});
		}

		function updateICheck() {
			$('input.icheck').iCheck('update');
		}

		$(document).ready(function() {
			$('form').on('reset', function() {
				setTimeout(function() {
					updateICheck();
				}, 250);
			});

			initConfirmFirst();
			initICheck();
		});

	</script>
@endpush
