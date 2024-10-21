<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/bootstrap/js/popper.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/daterangepicker/moment.min.js"></script>
<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/custom/js/main.js"></script>
<script src="/custom/js/function.js"></script>
<script src="https://unpkg.com/esri-leaflet/dist/esri-leaflet.js"></script>

<!-- Up Up JS-->
<script src="https://raw.githubusercontent.com/TalAter/UpUp/master/dist/upup.sw.min.js"></script>
<script src="https://raw.githubusercontent.com/TalAter/UpUp/master/dist/upup.min.js"></script>

<script>
UpUp.start({
  'content-url': '<?= base_url()?>',
  'assets': ['./resources/images/logo/icon.png', './vendor/bootstrap/css/bootstrap.min.css', './custom/css/util.css', './custom/css/main.css', './custom/css/style.css', './vendor/jquery/jquery-3.2.1.min.js', './resources/images/bg-05.jpg']
});
</script>


<script>
    //script onchange select
    function cekYa(that) {
        if (that.value == "Ya") {
            document.getElementById("ifYes").style.display = "";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }

    $(document).ready(function() {
        $('#jumlah').on('input', function() {
            var Inputs = '';

            for (var i = 1; i <= $("#jumlah").val(); i++) {
                var Kode = Math.floor(Math.random() * 100);
                Inputs += '<label>Kode RT ' + i + '</label><input name="kode_rt[]" type="text" size="50" value=' + Kode + ' class="form-control" readonly=/>';
            }
            $('#boxquantity').html(Inputs);
        });
    });

    $('#bar').click(function() {
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

    });

    //leaflet
    var mymap = L.map('mapid').setView([1.08, 104.03], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 20,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    L.Control.geocoder().addTo(mymap);
    //display to input field 
    var latInput = document.querySelector("[name=lat]");
    var lngInput = document.querySelector("[name=long]");

    var curLocation = [1.08, 104.03];

    mymap.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation,{
        draggable: 'true',

    });

    marker.on('dragend', function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable: 'true'
        }).bindPopup(position).update();
        $('#lat').val(position.lat);
        $('#long').val(position.lng);
    });
    mymap.addLayer(marker);

    mymap.on("click", function(e){
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if(!marker){
            marker = L.marker(e.latlng).addTo(mymap);
        }else{
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
    });


    //add active class
    $(document).ready(function() {
        $('.nav-link').click(function(event) {
            //remove all pre-existing active classes
            $('.active').removeClass('active');

            //add the active class to the link we clicked
            $(this).addClass('active');

            //Load the content
            //e.g.
            //load the page that the link was pointing to
            //$('#content').load($(this).find(a).attr('href'));      

        });
    });
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "/WilayahAPI/getProvinsi",
            success: function(provinsi) {
                $("select[name=nama_provinsi]").html(provinsi);
            }
        });

        $("select[name=nama_provinsi]").on("change", function() {
            //ambil id_provinsi
            var selected_id = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "/WilayahAPI/getKota",
                data: "id_provinsi=" + selected_id,
                success: function(kota) {
                    $("select[name=nama_kota]").html(kota);
                }
            })
        });

        $("select[name=nama_kota]").on("change", function() {
            //ambil id_kota
            var selected_id = $("option:selected", this).attr("id_kota");
            $.ajax({
                type: "POST",
                url: "/WilayahAPI/getKecamatan",
                data: "id_kota=" + selected_id,
                success: function(kecamatan) {
                    $("select[name=nama_kecamatan]").html(kecamatan);
                }
            })
        });

        $("select[name=nama_kecamatan]").on("change", function() {
            //ambil id_kecamatan
            var selected_id = $("option:selected", this).attr("id_kecamatan");
            $.ajax({
                type: "POST",
                url: "/WilayahAPI/getKelurahan",
                data: "id_kecamatan=" + selected_id,
                success: function(kelurahan) {
                    $("select[name=nama_kelurahan]").html(kelurahan);
                }
            })
        });

    });
</script>

</html>