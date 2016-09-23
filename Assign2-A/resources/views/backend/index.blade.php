@extends('layouts.master')
@section('title', 'Admin Control Panel')
@section('content')
    <div class="container">
        <div class="row banner">
            <div class="col-md-12">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-person"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-social-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Movies</h4>
                            <a href="/admin/users" class="btn btn-default btn-raised">All Movies</a>
                            <a href="/admin/users" class="btn btn-primary btn-raised">Create Movie</a>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Manage Ticket Information</h4>
                            <a href="/admin/roles" class="btn btn-default btn-raised">Manage</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection