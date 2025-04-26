@extends('layouts') <!-- Make sure this matches your layout file name -->

@section('content') <!-- Start the section -->
<div class="container-xl py-4">
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <div class="card border-0 shadow-soft">
                <div class="card-header bg-primary py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0 text-white">
                            <i class="bi bi-person-fill me-3"></i>User
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
                                <th scope="col">@lang('ID')</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col" class="d-none d-md-table-cell">@lang('E-mail')</th>
                                <th scope="col" class="d-none d-lg-table-cell">@lang('Password')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="hover-soft-bg">
                                    <td class="text-center fw-bold text-secondary">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-3">
                                                <div class="avatar-initial bg-sky-100 text-sky-600">
                                                    {{ strtoupper(substr($user->first_name,0,10)) }}
                                                </div>
                                            </div>
                                            <span class="text-truncate">{{ $user->last_name }}</span>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell text-muted">{{ $user->email }}</td>
                                    <td class="d-none d-md-table-cell text-muted">{{ $user->password }}</td>


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
