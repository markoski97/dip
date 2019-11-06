@section('_googlemaps')
    <div class="container" id="mapa">
        <div class="col-md-12 col-sm-18">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="1003" height="432" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=mark%20dekorativ&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                <style>.mapouter {
                        position: relative;
                        text-align: right;
                        height: 432px;
                        width: 1003px;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 432px;
                        width: 1050px;
                    }</style>
            </div>
        </div>
        </div>
    </div>
@endsection