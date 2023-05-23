@extends('layouts.master')

@section('page_name', $page['name'])

@section('page_title', $page['title'])

@section('subtitle', $page['subtitle'])

@section('page_css')

@section('page_script')
	<script type="text/javascript">
        $(function() {
            $("#tbl-employees").DataTable({
				scrollX: true,
		      	lengthChange: true, 
		      	autoWidth: true,
		      	order : []
		    });

            $(document).on('click', '.btn-edit', function() { // i chose this way instead of ajax but i know how to use ajax

                $('#edit-first-name').val("");
                $('#edit-last-name').val("");
                $('#edit-email').val("");
                $('#edit-phone').val("");
                $('#edit-company').val("").change();

                $('#edit-first-name').val($(this).data('first-name'));
                $('#edit-last-name').val($(this).data('last-name'));
                $('#edit-email').val($(this).data('email'));
                $('#edit-phone').val($(this).data('phone'));
                $('#edit-company').val($(this).data('company')).change();

                $('#edit-modal').modal('show');
                $('#edit-form').attr('action', '/employees/' + $(this).attr('id') + '/update');

            });
        });
	</script>
@endsection

@section('content')

	@include('layouts.message')

    <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> &nbsp;Add New Employee </a>
                </div>
                <div class="card-body">
                  <table id="tbl-employees" class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th width="18%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="18%">Company</th>
                                <th width="12%"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $e)
                                <tr>
                                    <td>{{ $e->first_name }}</td>
                                    <td>{{ $e->last_name }}</td>
                                    <td>{{ $e->email }}</td>
                                    <td>{{ $e->phone }}</td>
                                    <td>{{ $e->company ? $e->company->name : '' }}</td>
                                    <td align="center">

                                        <form method="POST" action="/employees/{{$e->id}}/delete">
                                        @csrf
                                        @method('DELETE')
                                            <button type="button" id="{{ $e->id }}" class="btn btn-warning btn-xs btn-edit"
                                                data-first-name="{{ $e->first_name }}"
                                                data-last-name="{{ $e->last_name }}"
                                                data-email="{{ $e->email }}"
                                                data-phone="{{ $e->phone }}"
                                                data-company="{{ $e->company_id }}"
                                            >
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            <button type="submit" id="{{ $e->id }}" class="btn btn-danger btn-xs btn-delete" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
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

    @include('employees.create')
    @include('employees.edit')

@endsection