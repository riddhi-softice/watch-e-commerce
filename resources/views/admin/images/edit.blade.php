@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Image</h1>
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
                        <h5 class="card-title">Edit Image Form</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('images.update', $Image->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image Thumb</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="img_url" name="img_url" onchange="previewImage(this)">
                                    <img id="img_preview" src="{{ asset('storage/app/public/img_url/' . $Image->img_url) }}" alt="Current Thumbnail" class="mt-2" style="max-width: 100px;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
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
        var preview = document.getElementById('img_preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            // Optional fallback if nothing selected
            preview.src = "{{ asset('storage/app/public/img_url/' . $Image->img_url) }}";
        }
    }
</script>