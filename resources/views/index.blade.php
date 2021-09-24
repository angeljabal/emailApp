@extends('base')

@section('content')
<div class="jumbotron mt-5">
    <h1 class="display-4">IPT SYSTEMS</h1>
    <p>Developed by: Angel Jabal</p>
    <hr class="my-4">
    <p> This is a Laravel 8 project with the following requirements:</p>
    <p>
        <ul>
            <li>A nice enough landing page</li>
            <li>A registration page for registering new users</li>
            <li>After a successful registration process, the system can perform the following:</li>
                <ul>
                    <li>Send a text message to notify the user of their successful registration</li>
                    <li>Send a verification email bearing a mechanism (link) to verify the email used by the user upon registration.</li>
                </ul>
            <li>Perform validation of a new account upon successful email verification</li>
            <li>A login page that only allows login to validated accounts (that is accounts that have undergone the verification process).</li>
        </ul>
    </p>
  </div>
@endsection