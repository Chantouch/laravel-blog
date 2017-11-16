<script src="{!! asset('plugins/summernote/dist/summernote-bs4.js') !!}"></script>
<script>
    $(document).ready(function () {
        $('.form-editor').summernote({
            height: 600,                 // set editor height
            minHeight: 500,             // set minimum height of editor
            maxHeight: 1200,             // set maximum height of editor
            focus: false,                  // set focus to editable area after initializing summernote
            dialogsFade: true,
        });
    });
</script>