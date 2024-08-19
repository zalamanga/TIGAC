<script src="{{ asset('static/js/components/dark.js') }}"></script>
<script src="{{ asset('extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script src="{{ asset('compiled/js/app.js') }}"></script>
{{-- <script src="{{ asset() }}"></script> --}}

<script src="{{ asset('extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('extensions/datatables.net/js/jquery.dataTables.min.js') }}">
    < /> <
    script src = "{{ asset('extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}" >
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="{{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('static/js/pages/form-element-select.js') }}"></script>

<script src="{{ asset('extensions/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/image/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/advlist/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/autolink/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/link/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/lists/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/charmap/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/anchor/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/pagebreake/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/preview/plugin.min.js') }}"></script>
{{-- <script src="https://cloud.tinymce.com/dev/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc"></script> --}}
<script>
    tinymce.init({
        selector: "textarea.richtextarea",
        relative_urls: false,
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        images_upload_url: "/newsletter-upload-image",
        file_picker_types: "image",
        plugins: [
            // "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            // "searchreplace wordcount visualblocks visualchars code fullscreen",
            // "insertdatetime media nonbreaking save table contextmenu directionality",
            // "emoticons template paste textcolor colorpicker textpattern"
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'anchor', 'pagebreak', 'preview'
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "preview media | forecolor backcolor emoticons",
        // override default upload handler to simulate successful upload
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = "blobid" + new Date().getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(",")[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }
    });
</script>
@include('sweetalert::alert')
