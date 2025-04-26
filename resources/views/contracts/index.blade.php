@extends('layouts')

@section('content')
    <div class="container-xxl py-5" data-aos="zoom-in">
        <div class="row justify-content-center">
            <div class="col-xxl-11">
                <div class="card cosmic-card">
                    <div class="card-header cosmic-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="h2 mb-0 text-primary-light">
                                <i class="bi bi-file-earmark-contract fs-1 me-3 pulse-icon"></i>
                                Contract Management Hub
                            </h1>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-space mx-2">Active: {{ $contracts->where('status', 'active')->count() }}</span>
                                <button class="btn btn-sm btn-primary-glow">
                                    <i class="bi bi-funnel-fill me-1"></i> Filter Contracts
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 cosmic-card-body">
                        <div class="table-responsive-xxl">
                            <table class="table table-cosmic align-middle mb-0">
                                <thead class="cosmic-thead">
                                <tr>
                                    <th scope="col" class="ps-4">Job ID</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Freelancer</th>
                                    <th scope="col">Contract Period</th>
                                    <th scope="col" class="text-end">Amount</th>
                                    <th scope="col" class="text-end pe-4">Status</th>
                                    <th scope="col" class="text-end pe-4">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contracts as $contract)
                                    <tr class="cosmic-row hover-glow" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                        <td class="ps-4 fw-bold cosmic-id">
                                            <span class="badge bg-space">#{{ $contract->job_id }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-cosmic me-3">
                                                    <div class="avatar-initial bg-client-gradient">
                                                        {{ strtoupper(substr($contract->user_id, 0, 1)) }}
                                                    </div>
                                                    @if($loop->index % 4 == 0)
                                                        <div class="online-indicator"></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-medium">Client #{{ $contract->user_id }}</div>
                                                    <small class="text-muted">@client</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-cosmic me-3">
                                                    <div class="avatar-initial bg-freelancer-gradient">
                                                        {{ strtoupper(substr($contract->freelancer_id, 0, 1)) }}
                                                    </div>
                                                    @if($loop->index % 3 == 0)
                                                        <div class="online-indicator"></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-medium">Freelancer #{{ $contract->freelancer_id }}</div>
                                                    <small class="text-muted">@freelancer</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <small class="text-muted">{{ $contract->start_date }}</small>
                                                <small class="text-muted">{{ $contract->end_date }}</small>
                                            </div>
                                        </td>
                                        <td class="text-end cosmic-amount">
                                            ${{ number_format($contract->amount, 2) }}
                                        </td>
                                        <td class="text-end pe-4">
                                            <span class="badge status-{{ strtolower($contract->status) }}">
                                                {{ $contract->status }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex justify-content-end gap-2">
                                                <button class="btn btn-sm btn-primary-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="View Details">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                                <button class="btn btn-sm btn-success-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="Manage Contract">
                                                    <i class="bi bi-pencil-square"></i>
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
                                Showing <span class="fw-bold">{{ count($contracts) }}</span> contracts
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
            transition: all 0.5s ease;
        }

        .cosmic-card:hover {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
            border-color: rgba(110, 231, 183, 0.3);
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
            letter-spacing: 0.5px;
            color: var(--primary-light);
            padding: 1rem;
            border-bottom-width: 2px;
        }

        .cosmic-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(110, 231, 183, 0.05);
        }

        .cosmic-row:hover {
            background: rgba(110, 231, 183, 0.05) !important;
            transform: translateX(5px);
        }

        .cosmic-row td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
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
            font-size: 1.1rem;
            color: white;
        }

        .bg-client-gradient {
            background: linear-gradient(135deg, #60A5FA, #3B82F6);
        }

        .bg-freelancer-gradient {
            background: linear-gradient(135deg, #A7F3D0, #6EE7B7);
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

        /* Status Badges */
        .badge {
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
        }

        .bg-space {
            background: rgba(110, 231, 183, 0.15);
            color: var(--primary-light);
        }

        .status-active {
            background: rgba(52, 211, 153, 0.15);
            color: #34D399;
        }

        .status-completed {
            background: rgba(139, 92, 246, 0.15);
            color: #8B5CF6;
        }

        .status-terminated {
            background: rgba(248, 113, 113, 0.15);
            color: #F87171;
        }

        /* Action Buttons */
        .cosmic-action {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .btn-primary-ghost {
            background: rgba(110, 231, 183, 0.1);
            color: var(--primary-light);
            border-color: rgba(110, 231, 183, 0.3);
        }

        .btn-success-ghost {
            background: rgba(52, 211, 153, 0.1);
            color: #34D399;
            border-color: rgba(52, 211, 153, 0.3);
        }

        .cosmic-action:hover {
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Special Elements */
        .cosmic-id {
            color: var(--primary-light);
        }

        .cosmic-amount {
            font-weight: 600;
            color: white;
        }

        .pulse-icon {
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.8; text-shadow: 0 0 5px var(--primary); }
            100% { opacity: 1; text-shadow: 0 0 15px var(--primary); }
        }

        .cosmic-pagination .btn-space {
            background: rgba(110, 231, 183, 0.1);
            color: var(--primary-light);
            border: 1px solid rgba(110, 231, 183, 0.3);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .cosmic-pagination .btn-space:hover {
            background: rgba(110, 231, 183, 0.2);
            transform: translateY(-2px);
        }
    </style>

    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    placement: 'top',
                    trigger: 'hover'
                });
            });
        });
    </script>
@endsection
