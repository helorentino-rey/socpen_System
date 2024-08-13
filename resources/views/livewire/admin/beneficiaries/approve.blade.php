@extends('layouts.admin')

@section('title', 'Approve')
@section('content')
 <!-- Top Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
        <div class="container-fluid">
            <div class="navbar-brand" style="color: black;">Beneficiary</div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add Beneficiary</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.list') }}" class="nav-link" style="color: black;">List of Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.approve') }}" class="nav-link" style="color: black;">Approve Beneficiaries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
     <!-- Page Content -->
     <div class="container">
        <h1>Approve Beneficiaries</h1>
        
    </div>
@endsection
