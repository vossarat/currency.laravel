@extends('testpage.template') {{-- index for Тестовая страница --}}

@section('content')
<h3>
    <code>#content</code>
    <code class="width-9">.col-md-9</code>
    <code class="width-12">.col-md-12</code></h3>
<div class="btn-group" role="group" aria-label="Controls">
    <button type="button" class="btn btn-default toggle-sidebar">Toggle sidebar</button>
</div>
<p>Index Changes from
    <code>.col-md-9</code> to
    <code>.col-md-12</code> when the sidebar is collapsed, occupying the remaining space.</p>
<pre>#row-main {
    <span class="text-muted">/* necessary to hide collapsed sidebar */</span>
    overflow-x: hidden;
    }

    #content {
    <span class="text-muted">/* for the animation */</span>
    transition: width 0.3s ease;
    }</pre>
<pre>
    <span class="text-muted">/* to toggle the sidebar, just switch the CSS classes */</span>
    $("#sidebar").toggleClass("collapsed");
    $("#content").toggleClass("col-md-12 col-md-9");</pre>


@endsection

@push('scripts')
<script>
    $(document).ready(function () {
            $(".navbar-brand").click(function () {
                    $("#sidebar").toggleClass("collapsed");
                    $("#content").toggleClass("col-xs-12 col-xs-9 col-xs-offset-3");

                    return false;
                });
        });
</script>
@endpush