@extends('layouts')

@section('content')
    <div class="container-xxl py-5" data-aos="zoom-in">
        <div class="row justify-content-center">
            <div class="col-xxl-11">
                <div class="card cosmic-card">
                    <div class="card-header cosmic-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="h2 mb-0 text-primary-light">
                                <i class="bi bi-people-fill fs-1 me-3 pulse-icon"></i>
                                User Galaxy
                            </h1>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-space mx-2">Total: {{ count($users) }}</span>
                                <button class="btn btn-sm btn-primary-glow">
                                    <i class="bi bi-plus-circle me-1"></i> Add User
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0">
                        <div class="table-responsive-xxl">
                            <table class="table table-cosmic align-middle mb-0">
                                <thead class="cosmic-thead">
                                <tr>
                                    <th scope="col" class="ps-4">User ID</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col" class="d-none d-md-table-cell">Email</th>
                                    <th scope="col" class="d-none d-lg-table-cell">Account Type</th>
                                    <th scope="col" class="text-end pe-4">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="cosmic-row" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                        <td class="ps-4 fw-bold cosmic-id">#{{ $user->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-cosmic me-3">
                                                    <div class="avatar-initial bg-user-gradient">
                                                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                                    </div>
                                                    @if($loop->index % 5 == 0)
                                                        <div class="online-indicator"></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-medium">{{ $user->first_name }} {{ $user->last_name }}</div>
{{--                                                    <small class="text-muted">Joined {{ $user->created_at->diffForHumans() }}</small>--}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-none d-md-table-cell cosmic-email">
                                            <a href="mailto:{{ $user->email }}" class="text-decoration-none">{{ $user->email }}</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                        <span class="badge role-badge">
                                            {{ $user->is_admin ? 'Admin' : 'Standard' }}
                                        </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex justify-content-end gap-2">
                                                <button class="btn btn-sm btn-primary-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="View Profile">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="Edit User">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="Delete User">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer cosmic-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Showing <span class="fw-bold">{{ count($users) }}</span> cosmic users
                            </div>
                            <div class="cosmic-pagination">
                                <button class="btn btn-sm btn-space disabled">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <span class="mx-2">Page 1 of 1</span>
                                <button class="btn btn-sm btn-space disabled">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Cosmic Card Styling */
        .cosmic-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(110, 231, 183, 0.15);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .cosmic-header {
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.6), rgba(30, 41, 59, 0.8));
            border-bottom: 1px solid rgba(110, 231, 183, 0.1);
            padding: 1.5rem 2rem;
        }

        .cosmic-footer {
            background: rgba(15, 23, 42, 0.6);
            border-top: 1px solid rgba(110, 231, 183, 0.1);
            padding: 1rem 2rem;
        }

        /* Table Styling */
        .table-cosmic {
            --bs-table-bg: transparent;
            --bs-table-color: #E2E8F0;
            --bs-table-border-color: rgba(110, 231, 183, 0.1);
        }

        .cosmic-thead {
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.7), rgba(30, 41, 59, 0.9));
        }

        .cosmic-thead th {
            font-weight: 600;
            color: var(--primary-light);
            padding: 1rem;
        }

        .cosmic-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(110, 231, 183, 0.05);
        }

        .cosmic-row:hover {
            background: rgba(110, 231, 183, 0.05);
            transform: translateX(5px);
        }

        /* Avatar Styling */
        .avatar-cosmic {
            position: relative;
            width: 40px;
            height: 40px;
        }

        .avatar-initial {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-weight: 600;
            color: white;
        }

        .bg-user-gradient {
            background: linear-gradient(135deg, #8B5CF6, #7C3AED);
        }

        .online-indicator {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 12px;
            height: 12px;
            background: var(--primary);
            border: 2px solid rgba(15, 23, 42, 0.8);
            border-radius: 50%;
        }

        /* Badges */
        .badge {
            font-weight: 500;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
        }

        .bg-space {
            background: rgba(110, 231, 183, 0.15);
            color: var(--primary-light);
        }

        .role-badge {
            background: rgba(245, 158, 11, 0.15);
            color: #F59E0B;
        }

        /* Action Buttons */
        .cosmic-action {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary-ghost {
            background: rgba(110, 231, 183, 0.1);
            color: var(--primary-light);
            border: 1px solid rgba(110, 231, 183, 0.3);
        }

        .btn-warning-ghost {
            background: rgba(245, 158, 11, 0.1);
            color: #F59E0B;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .btn-danger-ghost {
            background: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .cosmic-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Special Elements */
        .cosmic-id {
            color: var(--primary-light);
        }

        .cosmic-email {
            font-size: 0.9rem;
        }

        .pulse-icon {
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
