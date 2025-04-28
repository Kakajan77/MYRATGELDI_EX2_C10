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
                                Talent Galaxy
                            </h1>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-space mx-2">Available: {{ $freelancers->where('status', 'available')->count() }}</span>
                                <button class="btn btn-sm btn-primary-glow">
                                    <i class="bi bi-funnel-fill me-1"></i> Filter Talent
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0">
                        <div class="table-responsive-xxl">
                            <table class="table table-cosmic align-middle mb-0">
                                <thead class="cosmic-thead">
                                <tr>
                                    <th scope="col" class="ps-4">Freelancer</th>
                                    <th scope="col" class="d-none d-md-table-cell">Contact</th>
                                    <th scope="col">Specialties</th>
                                    <th scope="col" class="text-center">Rating</th>
                                    <th scope="col" class="text-end pe-4">Status</th>
                                    <th scope="col" class="text-end pe-4">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($freelancers as $freelancer)
                                    <tr class="cosmic-row" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-cosmic me-3">
                                                    <div class="avatar-initial bg-talent-gradient">
                                                        {{ strtoupper(substr($freelancer->name, 0, 1)) }}
                                                    </div>
                                                    @if($freelancer->status == 'available')
                                                        <div class="online-indicator"></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-medium">{{ $freelancer->name }}</div>
                                                    <small class="text-muted">{{ $freelancer->years_experience }} yrs experience</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-none d-md-table-cell cosmic-contact">
                                            <a href="mailto:{{ $freelancer->email }}" class="text-decoration-none">{{ $freelancer->email }}</a>
                                            @if($freelancer->phone)
                                                <div class="small text-muted mt-1">{{ $freelancer->phone }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach(array_slice(explode(',', $freelancer->skills), 0, 3) as $skill)
                                                    <span class="badge skill-badge">{{ trim($skill) }}</span>
                                                @endforeach
                                                @if(count(explode(',', $freelancer->skills)) > 3)
                                                    <span class="badge skill-more">+{{ count(explode(',', $freelancer->skills)) - 3 }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="star-rating" data-rating="{{ $freelancer->rating }}">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="bi bi-star-fill {{ $i <= $freelancer->rating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                                <small class="ms-1">{{ number_format($freelancer->rating, 1) }}</small>
                                            </div>
                                        </td>
                                        <td class="text-end pe-4">
                                        <span class="badge status-{{ strtolower($freelancer->status) }}">
                                            {{ ucfirst($freelancer->status) }}
                                        </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex justify-content-end gap-2">
                                                <button class="btn btn-sm btn-primary-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="View Profile">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                                <button class="btn btn-sm btn-success-ghost cosmic-action"
                                                        data-bs-toggle="tooltip" title="Hire Now">
                                                    <i class="bi bi-briefcase-fill"></i>
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
                                Showing <span class="fw-bold">{{ $freelancers->count() }}</span> stellar freelancers
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

        .bg-talent-gradient {
            background: linear-gradient(135deg, #A78BFA, #8B5CF6);
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

        .skill-badge {
            background: rgba(139, 92, 246, 0.15);
            color: #8B5CF6;
            font-size: 0.75rem;
        }

        .skill-more {
            background: rgba(156, 163, 175, 0.15);
            color: #9CA3AF;
            font-size: 0.75rem;
        }

        .status-available {
            background: rgba(52, 211, 153, 0.15);
            color: #34D399;
        }

        .status-occupied {
            background: rgba(251, 191, 36, 0.15);
            color: #FBBF24;
        }

        /* Rating Stars */
        .star-rating {
            display: inline-flex;
            align-items: center;
        }

        .star-rating .bi-star-fill {
            font-size: 1rem;
        }

        .star-rating .text-warning {
            color: #FBBF24 !important;
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

        .btn-success-ghost {
            background: rgba(52, 211, 153, 0.1);
            color: #34D399;
            border: 1px solid rgba(52, 211, 153, 0.3);
        }

        .cosmic-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Special Elements */
        .cosmic-contact {
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
