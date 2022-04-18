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
{!! ChuckModuleBooker::renderSubscriptionStyles() !!}
@endsection

@section('scripts')
{!! ChuckModuleBooker::renderSubscriptionScripts() !!}
@endsection

@section('content')
{!! ChuckModuleBooker::renderSubscriptionForm() !!}
@endsection