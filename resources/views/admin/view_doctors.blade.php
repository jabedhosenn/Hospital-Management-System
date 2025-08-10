@extends('admin.maindesign')
@section('view_doctors')
    <style>
        .headline {
            font-weight: 800;
            font-size: 2.5rem;
            color: #2575fc;
            text-align: center;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Optional: vibrant header row */
        thead tr {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
        }

        tbody tr:hover {
            background-color: rgba(37, 117, 252, 0.1);
        }
    </style>

    <h2 class="headline mt-5">Doctors</h2>

    {{-- Add Doctor Button --}}
    <div class="mb-4 text-center">
        <a href="{{ route('add_doctors') }}" class="btn btn-primary btn-lg">
            + Add Doctor
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Department</th>
                    <th>Room</th>
                    <th class="text-center" style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td style="width: 100px;">
                            <img src="{{ asset('images/' . ($doctor->doctors_image ?? 'default.png')) }}"
                                alt="Dr. {{ $doctor->doctors_name }}"
                                style="height: 70px; width: 70px; object-fit: cover; border-radius: 50%;">
                        </td>
                        <td>{{ $doctor->doctors_name }}</td>
                        <td>{{ $doctor->doctors_phone }}</td>
                        <td>{{ $doctor->speciality }}</td>
                        <td>{{ $doctor->department }}</td>
                        <td>{{ $doctor->room_number }}</td>
                        <td class="text-center">
                            <a href="{{ route('update_doctors', $doctor->id) }}"
                                class="btn btn-sm btn-light flex-fill">Update</a>

                            <a href="{{ route('delete_doctors', $doctor->id) }}"
                                onclick="return confirm('Are you sure you want to delete {{ addslashes($doctor->doctors_name) }}?');"
                                class="btn btn-sm btn-danger flex-fill">
                                Delete
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
