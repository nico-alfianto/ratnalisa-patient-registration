<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin RatnaLisa')</title>

    <link href="{{ asset('assets/img/ratnalisa-logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/ratnalisa-logo.png') }}" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{ asset('admin/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/compiled/css/iconly.css') }}">
</head>

<body>

    <script src="{{ asset('admin/assets/static/js/initTheme.js') }}"></script>

    <div id="app">

        @include('layouts.partials.sidebar')

        <div id="main">

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>&copy; {{ date('Y') }} Ratnalisa . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <script src="{{ asset('admin/assets/static/js/components/dark.js') }}"></script>

    <script src="{{ asset('admin/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('admin/assets/compiled/js/app.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#task-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        /**
         * Create an arrow function that will be called when an image is selected.
         */
        const previewImage = (event) => {
            /**
             * Get the selected files.
             */
            const imageFiles = event.target.files;
            /**
             * Count the number of files selected.
             */
            const imageFilesLength = imageFiles.length;
            /**
             * If at least one image is selected, then proceed to display the preview.
             */
            if (imageFilesLength > 0) {
                /**
                 * Get the image path.
                 */
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                /**
                 * Select the image preview element.
                 */
                const imagePreviewElement = document.querySelector("#preview-selected-image");
                /**
                 * Assign the path to the image preview element.
                 */
                imagePreviewElement.src = imageSrc;
                /**
                 * Show the element by changing the display value to "block".
                 */
                imagePreviewElement.style.display = "block";
            }
        };
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    @stack('scripts')

</body>

</html>
