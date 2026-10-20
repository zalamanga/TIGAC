<script src="{{ asset('static/js/components/dark.js') }}"></script>
<script src="{{ asset('extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script src="{{ asset('compiled/js/app.js') }}"></script>
{{-- <script src="{{ asset() }}"></script> --}}

<script src="{{ asset('extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

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
<script src="{{ asset('extensions/tinymce/plugins/pagebreak/plugin.min.js') }}"></script>
<script src="{{ asset('extensions/tinymce/plugins/preview/plugin.min.js') }}"></script>
<script>
    tinymce.init({
        selector: "textarea.richtextarea",
        relative_urls: false,
        paste_data_images: true,
        image_title: true,
        automatic_uploads: true,
        images_upload_handler: async function(blobInfo) {
            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            const response = await fetch("{{ route('newsletter-upload-image', [], false) }}", {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            }).catch(function() {
                throw new Error('Image upload failed. Check your connection and try again.');
            });

            if (!response.ok) {
                throw new Error('Image upload failed (HTTP ' + response.status + ').');
            }

            const result = await response.json().catch(function() {
                throw new Error('The image upload response is invalid.');
            });
            if (!result || typeof result.location !== 'string' || !result.location.trim()) {
                throw new Error('The image upload response is missing its location.');
            }

            return result.location;
        },
        file_picker_types: "image",
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'anchor', 'pagebreak', 'preview'
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "preview media | forecolor backcolor emoticons",
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.onchange = function() {
                var file = this.files[0];
                if (!file) {
                    return;
                }

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
