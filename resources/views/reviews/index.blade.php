@extends('layouts')

@section('content')
    <div class="container-xxl py-5" data-aos="zoom-in">
        <div class="row justify-content-center">
            <div class="col-xxl-11">
                <div class="card cosmic-card">
                    <div class="card-header cosmic-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="h2 mb-0 text-primary-light">
                                <i class="bi bi-stars fs-1 me-3 pulse-icon"></i>
                                Performance Reviews
                            </h1>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-space mx-2">Total: {{ count($reviews) }}</span>
                                <button class="btn btn-sm btn-primary-glow">
                                    <i class="bi bi-funnel-fill me-1"></i> Filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 cosmic-card-body">
                        <div class="table-responsive-xxl">
                            <table class="table table-cosmic align-middle mb-0">
                                <thead class="cosmic-thead">
                                <tr>
                                    <th scope="col" class="ps-4">Contract ID</th>
                                    <th scope="col">Reviewer</th>
                                    <th scope="col">Reviewee</th>
                                    <th scope="col" class="text-center">Rating</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Period</th>
                                    <th scope="col" class="text-end pe-4">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr class="cosmic-row hover-glow" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                        <td class="ps-4 fw-bold cosmic-id">
                                            <span class="badge bg-space">#{{ $review->contract_id }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-cosmic me-3">
                                                    <div class="avatar-initial bg-primary-gradient">
                                                        {{ strtoupper(substr($review->reviewer_id, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <span>User #{{ $review->reviewer_id }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-cosmic me-3">
                                                    <div class="avatar-initial bg-teal-gradient">
                                                        {{ strtoupper(substr($review->reviewee_id, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <span>User #{{ $review->reviewee_id }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="star-rating" data-rating="{{ $review->rating }}">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="bi bi-star-fill {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                            </div>
                                        </td>
                                        <td class="cosmic-comment">
                                            <div class="text-truncate" style="max-width: 200px;"
                                                 data-bs-toggle="tooltip" title="{{ $review->comment }}">
                                                {{ $review->comment }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <small class="text-muted">{{ $review->start_date }}</small>
                                                <small class="text-muted">{{ $review->end_date }}</small>
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex justify-content-end gap-2">
                                                <button class="btn btn-sm btn-primary-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="View Details">
                                                    <i class="bi bi-eye-fill"></i>
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
                                Showing <span class="fw-bold">{{ count($reviews) }}</span> reviews
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
            border-bottom-width: 2px;
        }

        .cosmic-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(110, 231, 183, 0.05);
        }

        .cosmic-row:hover {
            background: rgba(110, 231, 183, 0.05);
        }

        /* Avatar Styling */
        .avatar-cosmic {
            position: relative;
            width: 36px;
            height: 36px;
        }

        .avatar-initial {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            color: white;
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, #6EE7B7, #10B981);
        }

        .bg-teal-gradient {
            background: linear-gradient(135deg, #5EEAD4, #0D9488);
        }

        /* Rating Stars */
        .star-rating {
            display: inline-flex;
        }

        .star-rating .bi-star-fill {
            font-size: 1rem;
            margin-right: 2px;
        }

        .star-rating .text-warning {
            color: #FBBF24;
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

        .cosmic-action:hover {
            background: rgba(110, 231, 183, 0.2);
        }

        /* Special Elements */
        .cosmic-id {
            color: var(--primary-light);
        }

        .cosmic-comment {
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
