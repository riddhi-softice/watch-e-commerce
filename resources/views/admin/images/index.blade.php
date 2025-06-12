@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Image</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Images</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Image List</h5>
                            <div>
                                <a href="{{ route('images.create') }}" class="btn btn-primary">Add Image</a>
                            </div>
                        </div>

                        <table class="table datatable text-capitalize ">
                            <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>Image</th>
                                    <th>Videos</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $key=>$value)
                                    <tr>
                                        <td>{{ $key + 1}}</td> 
                                        <td>
                                            @if ($value->img_url)
                                                <a href="{{ asset('storage/app/public/img_url/' . $value->img_url) }}" target="_blank">
                                                    <img src="{{ asset('storage/app/public/img_url/' . $value->img_url) }}" alt="{{ $value->img_url }}" width="50" height="50">
                                                </a>
                                            @else
                                                No image
                                            @endif
                                        </td>
                                        <td><a href="{{ route('videos_get', $value->id) }}" class="btn btn-sm">{{ $value->videos_count }}  videos</a> <a href="{{ route('video_create', $value->id) }}" class="btn btn-sm btn-secondary">Add New</a></td>
                                        <td>{{ $value->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('images.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <button 
                                                class="btn btn-danger btn-sm deleteData" 
                                                data-id="{{ $value->id }}" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#confirmDeleteModal">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

@yield('javascript')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let deleteId = null;

    // When delete button is clicked, get the ID
    document.querySelectorAll('.deleteData').forEach(function(button) {
        button.addEventListener('click', function () {
            deleteId = this.getAttribute('data-id');
            console.log('Delete ID:', deleteId);
        });
    });

    // When confirm delete is clicked
    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (!deleteId) return;

        fetch(`image_delete/${deleteId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                console.log('Deleted successfully');
                location.reload();
            } else {
                return response.json().then(data => {
                    console.error('Error:', data);
                });
            }
        })
        .catch(err => {
            console.error('Network error:', err);
        });
    });
});
</script>

