<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Page Header here')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="{{ url('/') }}">Home</a></li>
        @foreach (request()->segments() as $segment)
            <li class="{{ $loop->last ? 'active' : '' }}"><a href="{{ url(implode('/', array_slice(request()->segments(), 0, $loop->iteration))) }}">{{ ucfirst($segment) }}</a></li>
        @endforeach
    </ol>
</section>
