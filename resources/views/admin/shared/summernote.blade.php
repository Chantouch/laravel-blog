@section('css')
    <link rel="stylesheet" href="{!! asset('plugins/summernote/dist/summernote-bs4.css') !!}">
@stop
@section('js')
    <script src="{!! asset('plugins/summernote/dist/summernote-bs4.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('.form-editor').summernote({
                height: 600,
                minHeight: 500,
                maxHeight: 1200,
                focus: false,
                dialogsFade: true,
            });
        });
    </script>
@stop