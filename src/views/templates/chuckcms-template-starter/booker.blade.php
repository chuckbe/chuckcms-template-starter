@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    {{ $page->title }}
@endsection

@section('meta')
@php 
$lang = \LaravelLocalization::getCurrentLocale();
@endphp
@include('chuckcms::meta.tags', ['page' => $page])
@endsection

@section('css')
{!! ChuckModuleBooker::renderStyles() !!}
@endsection

@section('scripts')
{!! ChuckModuleBooker::renderScripts() !!}
@endsection

@section('content')
{!! ChuckModuleBooker::renderForm() !!}
@endsection