@extends('admin.maindesign')
<base href="/public">
@section('view_doctors')
<div class="d-flex justify-content-center align-items-center"
     style="min-height: 100vh; background: linear-gradient(135deg, #6a11cb, #2575fc);">

    <div class="p-5 shadow-lg"
         style="width: 500px; border-radius: 20px; background: rgba(255,255,255,0.15); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2);">

        <h2 class="text-center mb-4 text-white fw-bold">
            <i class="fas fa-user-md me-2"></i> Update Doctor
        </h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('post_update_doctors', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Doctor's Name -->
            <div class="mb-3">
                <label for="doctors_name" class="form-label text-white">Doctor's Name</label>
                <input type="text" name="doctors_name" id="doctors_name"
                       class="form-control rounded-pill px-3" value="{{ $doctor->doctors_name }}" required>
            </div>

            <!-- Doctor's Phone -->
            <div class="mb-3">
                <label for="doctors_phone" class="form-label text-white">Doctor's Phone</label>
                <input type="text" name="doctors_phone" id="doctors_phone"
                       class="form-control rounded-pill px-3" value="{{ $doctor->doctors_phone }}" required>
            </div>

            <!-- Speciality -->
            <div class="mb-3">
                <label for="speciality" class="form-label text-white">Speciality</label>
                <input type="text" name="speciality" id="speciality"
                       class="form-control rounded-pill px-3" value="{{ $doctor->speciality }}" required>
            </div>

            <!-- Department -->
            <div class="mb-3">
                <label for="department" class="form-label text-white">Department</label>
                <input type="text" name="department" id="department"
                       class="form-control rounded-pill px-3" value="{{ $doctor->department }}" required>
            </div>

            <!-- Room Number -->
            <div class="mb-3">
                <label for="room_number" class="form-label text-white">Room Number</label>
                <input type="text" name="room_number" id="room_number"
                       class="form-control rounded-pill px-3" value="{{ $doctor->room_number }}" required>
            </div>

            <!-- Previous Doctor's Image -->
            <div class="mb-4 text-center">
                <label class="form-label text-white">Previous Image</label>
                <div>
                    <img src="{{ asset('images/' . $doctor->doctors_image) }}"
                         alt="{{ $doctor->doctors_name }}"
                         class="img-fluid rounded shadow" style="max-height: 150px;">
                </div>
            </div>

            <!-- New Doctor's Image -->
            <div class="mb-4">
                <label for="doctors_image" class="form-label text-white">New Doctor's Image</label>
                <input type="file" name="doctors_image" id="doctors_image"
                       class="form-control rounded-pill px-3" accept="image/*">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="btn btn-light w-100 rounded-pill fw-bold">
                Update Doctor
            </button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection
