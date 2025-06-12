@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Images</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('images.index') }}">Images</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Image Form</h5>

                        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="img_url" name="img_url" onchange="previewImage(this)" required>
                                    <img id="img_preview" class="mt-2" style="max-width: 100px; display: none;" alt="Image Preview">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@yield('javascript')
<script>
    function previewImage(input) {
        const preview = document.getElementById('img_preview');
        const file = input.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block'; // Show preview
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
            alert('Please select a valid image file.');
        }
    }
</script>
