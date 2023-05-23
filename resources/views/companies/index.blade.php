@extends('layouts.master')

@section('page_name', $page['name'])

@section('page_title', $page['title'])

@section('subtitle', $page['subtitle'])

@section('page_css')

@endsection

@section('page_script')
	<script type="text/javascript" src="/js/company.js"></script>
@endsection

@section('content')

	@include('layouts.message')

    <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add-modal">
                            <i class="fa fa-plus"></i> &nbsp;Add New Company
                    </button>
                </div>
                <div class="card-body">
                  <table id="tbl-companies" class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th width="7%">Logo</th>
                                <th>Company Name</th>
                                <th width="20%">Email</th>
                                <th width="23%">Website URL</th>
                                <th width="12%"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $c)
                                <tr>
                                    <td align="center">
                                        @if($c->logo)
                                            <img src="{{ asset('/storage/'.$c->logo) }}" width="28" height="28">
                                        @endif
                                    </td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->website_url }}</td>
                                    <td align="center">
                                        <form method="POST" action="/companies/{{$c->id}}/delete">
                                        @csrf
                                        @method('DELETE')
                                            <button type="button" id="{{ $c->id }}" class="btn btn-warning btn-xs btn-edit"
                                                data-name="{{$c->name}}"
                                                data-email="{{$c->email}}"
                                                data-website-url="{{$c->website_url}}"
                                            >
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
          </div>
        </div>
    </div>

    @include('companies.create')
    @include('companies.edit')

@endsection