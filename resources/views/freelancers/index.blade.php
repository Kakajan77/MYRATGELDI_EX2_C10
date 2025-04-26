@extends('layouts')

@section('content')
    <div class="container-xl py-4">
        <div class="row justify-content-center">
            <div class="col-xxl-10">

                <div class="card border-0 shadow-soft">
                    <div class="card-header bg-primary py-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="h3 mb-0 text-white">
                                <i class=" bi-person-fill me-3">
                                    Freelancers </i>
                            </h1>

                        </div>
                    </div>

                    <div class="card-body px-0">
                        <div class="table-responsive-xl rounded-bottom">
                            <table class="table table-hover align-middle mb-0 bg-white">
                                <caption class="visually-hidden">
                                    @lang('List of registered teachers with contact information')
                                </caption>
                                <thead class="bg-snow">
                                <tr>
                                    <th scope="col">@lang('Name')</th>
                                    <th scope="col" class="d-none d-md-table-cell">@lang('Email')</th>
                                    <th scope="col" class="d-none d-lg-table-cell">@lang('Skills')</th>
                                    <th scope="col">@lang('Rating')</th>
                                    <th scope="col" class="text-end pe-4">@lang('Status')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($freelancers as $freelancer)
                                    <tr class="hover-soft-bg">
                                        <td class="text-center fw-bold text-secondary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    <div class="avatar-initial bg-sky-100 text-sky-600">
                                                        {{ strtoupper(substr($freelancer->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <span class="text-truncate">{{ $freelancer->email }}</span>
                                            </div>
                                        </td>
                                        <td class="d-none d-md-table-cell text-muted">{{ $freelancer->skills }}</td>

                                        <td class="d-none d-lg-table-cell text-truncate text-secondary">{{ $freelancer->rating }}</td>
                                        <td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-2 pe-3">

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
@endsection
