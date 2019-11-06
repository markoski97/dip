<!DOCTYPE html>
<html>
@include ('html-parts._head')<!-- pred body so se pisuva skripti mipti inkludoj -->
<body>
@include('html-parts._nav')<!-- navigacija -->

@yield('_acordion')

@yield('_klasinaotpornost')

@include('html-parts._messages')<!-- OVA E ZA SESSIONS ZA PRI CREATE DA DAVA USPESNO ILI NEUSPESNO VNESUVAJNE VO BAZA-->

@yield('create-content')

@yield('_googlemaps')

@yield('_podgooglemaps')

<hr class="my-4">

@include('html-parts._nadfooter')<!-- Nadfooter -->

<hr class="my-4">

@yield ('_vozilo')

@include('html-parts._pozadina') <!-- pozadina-->

@yield('_cards')

@include('html-parts.connect')

@include('html-parts._footer')<!--Footer -->

@include('html-parts._js')<!-- javaskritipi od main za template za main page-->

</body>

</html>
