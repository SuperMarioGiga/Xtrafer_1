@extends('layouts.app')

@section('title', 'Matrículas')

@section('css')
<link rel="stylesheet" href="{!! asset('css/plugins/dataTables/datatables.min.css') !!}" />
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Lista de Matrículas</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ url('/admin') }}">Home</a>
      </li>
      <li>
        <a href="{{ url('/admin/registration' ) }}">Matrículas </a>
      </li>
      <li class="active">
        <strong>Listar Matrículas</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2" style="padding-top: 30px; text-align: right">
    {{-- <a href="{{ url('/admin/student/insert') }}">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Novo</button>
    </a> --}}
  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Matriculas  <small>Lista de todas as Inscrição já feita.</small></h5>
        </div>
        <div class="ibox-content">

          <div class="table-responsive">
            @include('admin.components.old.dataTables')
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
