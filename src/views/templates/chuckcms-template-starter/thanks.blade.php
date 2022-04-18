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

@endsection

@section('scripts')
@if(session('order_number'))
{!! ChuckEcommerce::followupScripts(session('order_number')) !!}
@endif
@endsection

@section('content')
	
    @if($pageblocks !== null)
        @foreach($pageblocks as $pageblock)
            {!! $pageblock['body'] !!}
        @endforeach
    @endif
    
    @if(session('order_number'))
    {!! ChuckEcommerce::followupContent(session('order_number')) !!}
	@endif
@endsection