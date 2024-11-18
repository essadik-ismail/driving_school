@section('title', 'notifications')
@section('description', '')
@extends('layout.app')
@section('content')
    <div class="container mt-5 w-100">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Notifications</h4>

                        <button type="button" class="btn btn-outline-primary btn-icon" data-bs-toggle="modal"
                            data-bs-target="#addNotificationModal">
                            <i class="fas fa-bell"></i> <!-- Font Awesome Bell Icon -->
                            Add Notification
                        </button>

                        <div class="modal fade" id="addNotificationModal" tabindex="-1"
                            aria-labelledby="addNotificationModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNotificationModalLabel">Add New Notification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Add Notification Form -->
                                        <form action="{{ route('notifications.store') }}" method="POST">
                                            @csrf
                                            <!-- Notification Message Input -->
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Notification Message</label>
                                                <input type="text" class="form-control" id="message" name="message"
                                                    required>
                                            </div>

                                            <!-- Notification URL Input -->
                                            <div class="mb-3">
                                                <label for="url" class="form-label">URL</label>
                                                <input type="url" class="form-control" id="url" name="url"
                                                    placeholder="https://example.com" required>
                                            </div>

                                            <!-- Notification URL Input -->
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" />
                                            </div>

                                            <!-- Submit Button inside Modal -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Notification</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Notification URL Input -->
                    <div class="mb-3">
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($notifications as $notification)
                                    <li
                                        class="list-group-item mt-2 {{ $notification->read_at ? '' : 'list-group-item-primary' }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Notification Message and Link -->
                                            <div>
                                                <a href="{{ $notification->data['url'] }}">
                                                    {{ $notification->data['message'] }}
                                                </a>
                                                <br>
                                                <small class="text-muted">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </small>
                                            </div>

                                            <!-- Mark as read (optional) -->
                                            @if (is_null($notification->read_at))
                                                <form action="{{ route('notifications.read', $notification->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Mark as
                                                        Read</button>
                                                </form>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item">No notifications found</li>
                                @endforelse
                            </ul>

                            <div class="mt-4">
                                {{ $notifications->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
