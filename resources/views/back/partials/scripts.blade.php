<script src="{{ asset('back/assets') }}/js/vendors/jquery-3.6.0.min.js"></script>
<script src="{{ asset('back/assets') }}/js/vendors/bootstrap.bundle.min.js"></script>
<script src="{{ asset('back/assets') }}/js/vendors/select2.min.js"></script>
<script src="{{ asset('back/assets') }}/js/vendors/perfect-scrollbar.js"></script>
<script src="{{ asset('back/assets') }}/js/vendors/jquery.fullscreen.min.js"></script>
<script src="{{ asset('back/assets') }}/js/vendors/chart.js"></script>
<!-- Main Script -->
<script src="{{ asset('back/assets') }}/js/main.js" type="text/javascript"></script>
<script src="{{ asset('back/assets') }}/js/custom-chart.js" type="text/javascript"></script>
<!-- Quill Editor JS -->
{{--<script src="{{ asset('back/assets') }}/js/quill/quill.min.js"></script>--}}

{{--<!-- Internal Quill JS -->--}}
{{--<script src="{{ asset('back/assets') }}/js/quill-editor.js"></script>--}}
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" ></script>
