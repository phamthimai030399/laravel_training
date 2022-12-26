@if (Session::has('message'))
    <?php $message = Session::get('message'); ?>
    <script type="text/javascript">
        @switch($message['type'])
            @case('success')
            toastr.success("{{ $message['content'] }}");
            @break

            @case('error')
            toastr.error("{{ $message['content'] }}");
            @break

            @case('warning')
            toastr.warning("{{ $message['content'] }}");
            @break

            @default
            toastr.info("{{ $message['content'] }}");
        @endswitch
    </script>
@endif

