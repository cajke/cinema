<div class="container" style="background: #011627; color: white">
<div class="aboutUs-content">
    <div class="team-section">
        <h1>O nama</h1>
        <span class="border"></span>
        <div class="ps">
            <a href="#p1"><img src="<?php echo URL ?>web/images/avatars/vita.jpg" alt="Vitomir Has"> </a>
            <a href="#p2"><img src="<?php echo URL ?>web/images/avatars/cajke.jpg" alt="Dusan Cajic"> </a>
            <a href="#p3"><img src="<?php echo URL ?>web/images/avatars/sale.jpg" alt="Sasa Sladic"> </a>
            <a href="#p4"><img src="<?php echo URL ?>web/images/avatars/dare.jpg" alt="Darko Ignjatovic"> </a>
            <a href="#p5"><img src="<?php echo URL ?>web/images/avatars/ravke.jpg" alt="Bojan Ravic"> </a>
        </div>
        <div class="section" id="p1">
            <span class="name">Vitomir Has</span>
            <span class="border"></span>
            <p>
                Web Programming Team 10.
            </p>

        </div>
        <div class="section" id="p2">
            <span class="name">Dusan Cajic</span>
            <span class="border"></span>
            <p>
                Web Programming Team 10.
            </p>

        </div>
        <div class="section" id="p3">
            <span class="name">Sasa Sladic</span>
            <span class="border"></span>
            <p>
                Web Programming Team 10.
            </p>

        </div>
        <div class="section" id="p4">
            <span class="name">Darko Ignjatovic</span>
            <span class="border"></span>
            <p>
                Web Programming Team 10.
            </p>

        </div>
        <div class="section" id="p5">
            <span class="name">Bojan Ravic</span>
            <span class="border"></span>
            <p>
                Web Programming Team 10.
            </p>

        </div>
    </div>
    <div>
        <?php echo $this->aboutUsText['text'];?>
    </div>
    <div class="info">
        <div class="kutija">
            <div class="kutija-kolona">
                <div class="kutija-celija">
        <img src="<?php echo URL; ?>web/images/logo.png"><br><br>
        <strong><p>Alekse Santica 27</p>
        <p>21000 Novi Sad</p>
        <p>Radno vreme: 09:30 - 23:30</p><br>
        <p>Telefon: +381 69 032 992</p>
        <p>e-mail: office@colosseum.com</p>
        <p>Alekse Santica 27</p>
        <p>21000 Novi Sad</p>
        <p>Radno vreme: 09:30 - 23:30</p><br>
        <p>Telefon: +381 69 032 992</p>
        <p>e-mail:<a href="mailto:office@colosseum.com">office@colosseum.com</a> </p>
        </div></strong>
        <div class="kutija-celija">
            <h3>Najnovije vesti</h3>
            <strong><p>Uskoro letnji bioskop</p><br>
            <p>Druzite se sa glumcima</p><br>
            <p>Ucestvujte u nagradnoj igri nedeljom od 16:00</p><br>
            <p>Deadpool 2 uskoro na repertoaru</p><br>
            <p>Johnny Depp ponovo u Srbiji</p>
        </strong>

            </div>

        <div class="kutija-celija">
            <h3> Kako do nas </h3>
        <div id="googleMap" style="height: 300px; width: 350px;"></div>
    </div>
    
</div>
</div>
</div>
        </div>
<script>
    function myMap() {
        var location ={lat:45.264160,lng:19.813827};
        var options= {
            center:new google.maps.LatLng(location),
            zoom:18
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),options);
        var marker = new google.maps.Marker({
            position:location,
            map:map
        });
        var infoWindow = new google.maps.InfoWindow({
           content: '<h2>Modena Cinema</h2>'
        });

        marker.addListener('click',function () {
            infoWindow.open(map,marker);
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6N6-6CIR45OrCfzRnh4hBtiovoMu9m7c&callback=myMap"></script>
