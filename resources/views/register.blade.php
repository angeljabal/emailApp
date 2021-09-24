@extends('base')

@section('content')

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card mt-3">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">User Registration</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/register')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="sample@email.com">
                            </div>
                            <div class="mb-3">
                                <label for="phonenum">Mobile Number</label>
                                <input type="tel" name="phonenum" id="phonenum" pattern="[\+]\d{12}"
                                class="form-control" placeholder="+639123456789">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop