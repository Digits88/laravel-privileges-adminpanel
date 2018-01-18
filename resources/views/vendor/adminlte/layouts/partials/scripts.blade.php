<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-notify.min.js') }}" charset="utf-8"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script type="text/javascript">
    function notify(type, message) {
        $.notify({message: message, icon: 'fa fa-info-circle'}, {type: type});
    }

    $(document).ready(function() {
        @if (session('notifyInfo'))
            notify('info', '{{ session('notifyInfo') }}');
        @endif
    });
</script>
