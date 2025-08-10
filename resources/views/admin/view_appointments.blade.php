@extends('admin.maindesign')

@section('view_appointments')

<!-- Bootstrap CSS (remove if already in main layout) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5 bg-dark min-vh-100">
    <h2 class="text-primary fw-bold text-center mb-4 text-uppercase">Appointments</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow rounded bg-white">
        <table class="table table-striped table-hover align-middle text-center mb-0">
            <thead class="table-primary text-uppercase">
                <tr>
                    <th scope="col" class="text-start">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Department</th>
                    <th scope="col">Number</th>
                    <th scope="col" class="text-start">Message</th>
                    <th scope="col" style="min-width: 140px;">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $statusColors = [
                        'pending' => 'warning',
                        'approved' => 'success',
                        'cancelled' => 'danger',
                    ];
                @endphp

                @foreach ($appointments as $appointment)
                    @php
                        $currentStatus = $appointment->status;
                        $badgeColor = $statusColors[$currentStatus] ?? 'secondary';
                    @endphp
                    <tr>
                        <td class="text-start fw-semibold">{{ $appointment->full_name }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->submission_date)->format('d M, Y') }}</td>
                        <td>{{ $appointment->department }}</td>
                        <td>{{ $appointment->number }}</td>
                        <td class="text-start" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis;" title="{{ $appointment->message }}">
                            {{ $appointment->message }}
                        </td>
                        <td>
                            <span
                                class="btn btn-{{ $badgeColor }} fw-semibold"
                                style="min-width: 110px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#editStatusModal"
                                data-appointment-id="{{ $appointment->id }}"
                                data-current-status="{{ $currentStatus }}"
                            >
                                {{ ucfirst($currentStatus) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form id="edit-status-form" method="POST" style="width: 100%;">
      @csrf
      @method('PATCH')
      <input type="hidden" name="status" id="modal-status-input">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editStatusModalLabel">Edit Appointment Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="status-select" class="form-label">Select Status</label>
          <select class="form-select" id="status-select" aria-label="Select appointment status" required>
            <option value="pending">Pending</option>
            <option value="approved">Approved</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Status</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS Bundle with Popper (remove if already included in main layout) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const editStatusModal = document.getElementById('editStatusModal');
  const statusSelect = document.getElementById('status-select');
  const modalStatusInput = document.getElementById('modal-status-input');
  const editStatusForm = document.getElementById('edit-status-form');

  // When modal opens, populate current status and set form action dynamically
  editStatusModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget; // The clicked badge
    const appointmentId = button.getAttribute('data-appointment-id');
    const currentStatus = button.getAttribute('data-current-status');

    statusSelect.value = currentStatus;

    // Set the form action URL dynamically
    editStatusForm.action = `/changestatus/${appointmentId}`;
  });

  // On submit, update hidden input and submit form
  editStatusForm.addEventListener('submit', event => {
    event.preventDefault();

    modalStatusInput.value = statusSelect.value;

    editStatusForm.submit();
  });
</script>

@endsection
