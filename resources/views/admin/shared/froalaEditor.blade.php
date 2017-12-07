@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.2/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.2/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@stop
@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.2/js/froala_editor.pkgd.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.form-editor').froalaEditor({
                imageUploadURL: '{!! route('admin.medias.store') !!}',
                //toolbarButtons: ['undo', 'redo', 'html', '-', 'fontSize', 'paragraphFormat', 'align', 'quote', '|', 'formatOL', 'formatUL', '|', 'bold', 'italic', 'underline', '|', 'insertLink', 'insertImage', 'insertTable'],
                heightMin: 300,
                imageMove: true,
                imageUploadParam: 'image',
                imageUploadMethod: 'POST',
                imageUploadParams: {
                    location: 'images', // This allows us to distinguish between Froala or a regular file upload.
                    _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
                },
                // URL to get all department images from
                imageManagerLoadURL: '{!! route('admin.medias.index') !!}',
                // Set the delete image request URL.
                imageManagerDeleteURL: '{!! route('admin.medias.destroy') !!}',
                // Set the delete image request type.
                imageManagerDeleteMethod: "DELETE",
                imageManagerDeleteParams: {
                    _token: "{{ csrf_token() }}"
                }
            });
        });
    </script>
@stop