@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-dashboard"></i> Dashboard Ringkasan Data</h2>
</div>

<div class="row">
    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="panel panel-primary" style="margin-bottom: 0;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-video-camera fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 32px; font-weight: bold;">{{ $filmCount }}</div>
                        <div>Total Film</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.films.index') }}" style="color: #337ab7;">
                <div class="panel-footer">
                    <span class="pull-left">Kelola Film</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="panel panel-success" style="margin-bottom: 0;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 32px; font-weight: bold;">{{ $castCount }}</div>
                        <div>Total Cast</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.casts.index') }}" style="color: #3c763d;">
                <div class="panel-footer">
                    <span class="pull-left">Kelola Cast</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="panel panel-info" style="margin-bottom: 0;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 32px; font-weight: bold;">{{ $genreCount }}</div>
                        <div>Total Genre</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.genres.index') }}" style="color: #31708f;">
                <div class="panel-footer">
                    <span class="pull-left">Kelola Genre</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="panel panel-warning" style="margin-bottom: 0;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-id-badge fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 32px; font-weight: bold;">{{ $peranCount }}</div>
                        <div>Total Peran</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.perans.index') }}" style="color: #8a6d3b;">
                <div class="panel-footer">
                    <span class="pull-left">Kelola Peran</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="panel panel-danger" style="margin-bottom: 0;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 32px; font-weight: bold;">{{ $kritikCount }}</div>
                        <div>Total Komentar</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.kritiks.index') }}" style="color: #a94442;">
                <div class="panel-footer">
                    <span class="pull-left">Kelola Komentar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="panel panel-default" style="margin-bottom: 0; border-color: #777;">
            <div class="panel-heading" style="background-color: #777; color: #fff;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 32px; font-weight: bold;">{{ $userCount }}</div>
                        <div>Total User</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.users.index') }}" style="color: #333;">
                <div class="panel-footer">
                    <span class="pull-left">Kelola User</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
