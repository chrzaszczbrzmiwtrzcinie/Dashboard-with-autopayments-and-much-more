<!DOCTYPE html >
<html class="dark">
@extends('layouts.dashboardlayout')

@section('content')
@endsection
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"/>
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
<div class="responsive-border-box">
    <div class="adminpanel">
        <div class="panelname">Admin Panel</div>
        <button class="btn btn-outline-danger btn-primary" id="updateLoginDateBtn" onclick="updateLoginDate()">Update Login Dates</button>

        <table id="myTable" class="display">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Currentdays</th>
                <th>Change Password</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->currentdays }}</td>
                    <td><button class="btn btn-block btn-primary">Change Password</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function copyEmail() {
        var email = document.getElementById("emailToCopy").innerText;
        var textarea = document.createElement("textarea");
        textarea.textContent = email;
        document.body.appendChild(textarea);

        textarea.select();
        try {
            document.execCommand("copy");
            alert("Email copied to clipboard!");
        } catch (err) {
            alert("Error in copying email: " + err);
        }
        document.body.removeChild(textarea);
    }
</script>
<script>
    function updateLoginDate() {
        fetch('/update-logindate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                alert('Login dates updated successfully!');
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "pageLength": 50
        });
    });
</script>
</html>
