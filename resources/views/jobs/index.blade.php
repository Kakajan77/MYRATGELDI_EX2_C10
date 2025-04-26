@extends('layouts.app') <!-- Make sure this matches your layout file name -->

@section('content') <!-- Start the section -->
<div class="container-xl py-4">
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <div class="card border-0 shadow-soft">
                <div class="card-header bg-primary py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0 text-white">
                            <i class="bi bi-person-fill me-3"></i>Jobs
                        </h1>
                    </div>
                </div>

                <div class="card-body px-0">
                    <div class="table-responsive-xl rounded-bottom">
                        <table class="table table-hover align-middle mb-0 bg-white">
                            <caption class="visually-hidden">
                                @lang('List of jobs with details')
                            </caption>
                            <thead class="bg-snow">
                            <tr>
                                <th scope="col">@lang('User ID')</th>
                                <th scope="col">@lang('Title')</th>
                                <th scope="col" class="d-none d-md-table-cell">@lang('Skills')</th>
                                <th scope="col" class="d-none d-lg-table-cell">@lang('Description')</th>
                                <th scope="col" class="text-end pe-4">@lang('Budget')</th>
                                <th scope="col" class="text-end pe-4">@lang('Status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr class="hover-soft-bg">
                                    <td class="text-center fw-bold text-secondary">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-3">
                                                <div class="avatar-initial bg-sky-100 text-sky-600">
                                                    {{ strtoupper(substr($job->user_id, 0, 1)) }}
                                                </div>
                                            </div>
                                            <span class="text-truncate">{{ $job->title }}</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell text-muted">{{ $job->skills }}</td>
                                    <td class="d-none d-lg-table-cell text-muted">{{ $job->description }}</td>
                                    <td class="text-end text-secondary">{{ $job->budget }}</td>
                                    <td class="text-end text-secondary">{{ $job->status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-2 pe-3">
                                            <!-- Action buttons here -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Properly closes the section -->
