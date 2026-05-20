@if(session('success'))
<script>
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: @json(session('success')),
            timer: 2800,
            showConfirmButton: false
        });
    }
</script>
@endif
@if(session('error'))
<script>
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'error',
            title: 'Hata',
            text: @json(session('error'))
        });
    }
</script>
@endif
