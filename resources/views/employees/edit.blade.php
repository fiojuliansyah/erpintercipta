@extends('layouts.master')

@section('title', 'Employee Edit | InterCipta ERP Management')

@section('content')
    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page has-sidebar has-sidebar-expand-xl">
                <!-- .page-inner -->
                <div class="page-inner">
                    <!-- .page-title-bar -->
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="{{ route('users.index') }}"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="page-title"> User Edit</h1>
                    </header><!-- /.page-title-bar -->
                    <!-- .page-section -->
                    <div class="page-section">
                        <div class="d-xl-none">
                            <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i
                                    class="fa fa-th-list"></i></button>
                        </div><!-- .card -->
                        <div id="base-style" class="card">
                            <!-- .card-body -->
                            <div class="card-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- .form -->
                                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['employees.update', $user->id]]) !!}
                                <!-- .fieldset -->
                                <fieldset>
                                    <legend>Add User</legend>
                                    <div class="form-group">
                                        <label for="nik_number">No NIK</label>
                                        {!! Form::text('nik_number', null, ['placeholder' => 'No NIK', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!} <small class="form-text text-muted">We'll never share your
                                            email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm Password</label>
                                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                    </div>
                                    @can('admin-only')
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                        </div>
                                    @endcan
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Edit User</button>
                                    </div>
                                </fieldset><!-- /.fieldset -->
                                {!! Form::close() !!}<!-- /.form -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- /.wrapper -->
    </main>
@endsection
