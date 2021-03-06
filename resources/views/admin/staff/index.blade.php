@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Staff
            <small>All Staff</small>
        </h1>
        {{-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                {{-- @if (Auth::user()->role->id==1||Auth::user()->role->id==2) --}}
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <span class="fa fa-plus"></span> Add Staff
                </button>
                {{-- @endif --}}
                <br>

                <div class="row">
                    <div class="col-md-12">

                        {{-- for messages --}}
                        {{-- @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                        @endif --}}

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                          

                                            <th>Edit</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staffs as $staff)
                                        {{-- @if((Auth::user()->id==$staff->id||Auth::user()->role->id==2||Auth::user()->role->id==1)) --}}

                                        <tr>

                                            <td>{{$staff->lastname}}</td>
                                            <td>{{$staff->firstname}}</td>
                                           

                                            <td>{{$staff->email}}</td>
                                            <td>{{$staff->phone}}</td>
                                            <td>{{$staff->created_at->diffForHumans()}}</td>
                                            

                                            <td style="text-align: center">


                                                <a href="{{ route('staff.edit',$staff->id) }}"><span
                                                        class="fa fa-edit fa-2x text-primary"></span></a>

                                            </td>

                                           
                                        </tr>

                                        
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                          

                                            <th>Edit</th>

                                            

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>


                {{-- Data input modal area --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">

                        <form action="{{ route('staff.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><span class="fa fa-user"></span> Add Staff
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input id="lastname" type="text"
                                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                            name="lastname" value="{{ old('lastname') }}" required autofocus
                                            placeholder="Last Name">

                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="firstname" type="text"
                                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                            name="firstname" value="{{ old('firstname') }}" required autofocus
                                            placeholder="First Name">

                                        @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <input id="phone" type="tel"
                                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" value="{{ old('phone') }}" required placeholder="Phone"
                                            maxlength="11">

                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>



                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required autofocus
                                            placeholder="Email">

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    



                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="Password">

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required placeholder="Repeat Password">
                                    </div>

                                    <input type="hidden" name="role_id" value="2">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->

                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            {{-- <section class="col-lg-5 connectedSortable"> --}}


            {{-- </section> --}}
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection