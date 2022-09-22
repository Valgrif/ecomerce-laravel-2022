@props(['cart'])

<x-layout-public.header />
<x-layout-public.cart :cart="$cart"/>
<div class="container mt-4">
    {{ $slot }}
</div>
<x-layout-public.footer />
