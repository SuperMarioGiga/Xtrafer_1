@extends('layouts.app')

@section('title', 'Estrutura')

@section('css')
<link rel="stylesheet" href="{!! asset('css/plugins/dataTables/datatables.min.css') !!}" />
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Lista de Estrutura</h2>
    <ol class="breadcrumb">
      <li>
        <a href="{{ url('/admin') }}">Home</a>
      </li>
      <li>
        <a href="{{ url('/admin/construction') }}">Estrutura</a>
      </li>
      <li class="active">
        <strong>Listar Ambientes</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-11"></div>
    <div class="col-lg-1" style="padding-bottom: 10px;">
      <a href="{{ url('/admin/construction/insert') }}">
        <button class="btn btn-primary"><i class="fa fa-plus"></i> Novo</button>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Ambientes da unidade escolar </h5>
        </div>
        <div class="ibox-content">

          <div class="table-responsive">
            @include('admin._components.dataTables')
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
