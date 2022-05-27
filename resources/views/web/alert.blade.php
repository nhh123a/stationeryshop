@if(Session::has('error'))
    <script>
        Swal.fire(
            'Lỗi',
            {{ Session::get('error') }},
            'error'
            )
    </script>
@endif

@if(Session::has('success'))
    <script>
        Swal.fire(
            'Thành công',
            {{ Session::get('success') }},
            'success'
            )
    </script>
@endif

@if(Session::has('notify'))
    <script>
        Swal.fire(
            'Thông báo',
            {{ Session::get('notify') }},
            'warning'
            )
    </script>
@endif

