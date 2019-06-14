<div class="home-content">
    <div id="teaser-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#teaser-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#teaser-carousel" data-slide-to="1"></li>
            <li data-target="#teaser-carousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="<?php echo URL; ?>web/images/testg1.jpg" alt="testg1" style="width:100%; height: 92vh;">
                <div class="carousel-caption">
                    <h3 class="avangersfont">AVANGERS: INFINITY WAR</h3>
                    <p class="customfont4">OCEKUJTE NEOCEKIVANO SA SVIM VOLJENIM HEROJIMA OKUPLJENIM NA <br>
                    NOVOM ZADATKU, U FILMSKOM PUTOVANJU BEZ PRESEDANA GDE CE SE SRESTI SVI LIKOVI <br>
                    MARVELOVOG FILMSKOG UNIVERZUMA.</p>
                </div>
            </div>

            <div class="item">
                <img src="<?php echo URL; ?>web/images/thor.jpg" alt="thor" style="width:100%; height: 92vh;">
                <div class="carousel-caption">
                    <h3 class="thorfont">Thor: Ragnarok (2017)</h3>
                    <p class="customfont3">U Marvelovom filmu „Tor - Ragnarok“, Tor je zarobljen s druge strane svemira <br>
                     bez svog mocnog malja i nalazi se u trci s vremenom da se vrati u Asgard i <br>
                     zaustavi Ragnarok - unistenje njegove domovine i kraj asgardijanske civilizacije <br>
                     – od strane svemocne nove prijetnje, nemilosrdne Hele.</p>
                </div>
            </div>

            <div class="item">
                <img src="<?php echo URL; ?>web/images/uskoro1.jpg" alt="uskoro1" style="width:100%; height: 92vh;">
                <div class="carousel-caption">
                    <h3 class="starwarsfont">Solo: A Star Wars Story (2018)</h3>
                    <p class="customfont5">Solo - Star Wars priča ukrcaće nas na Hiljadugodišnjeg sokola i povesti na put <br>
                     kroz kosmos, zajedno sa najomiljenijim otpadnikom svih galaksija.</p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#teaser-carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#teaser-carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="container-fluid">
        <div class="novi-filmovi">
            <h1>Novi filmovi</h1>
            <div class="row"">
            <?php   for($j =0;$j< $this->i ;$j++){ ?>
                <div class="col-md-3">
                    <a href="<?php  echo URL . "/projection/details/". $this->newestFilms[$j]['id'];  ?>"><img src="<?php echo URL .'/' . $this->newestFilms[$j]['path']; ?>" class="img-responsive"></a>
                    <p><?php echo $this->newestFilms[$j]['name']; ?></p>
                </div>

               <?php }; ?>
            </div>
        </div>

        <div class="najpopularniji-filmovi">
            <h1>Najpopularniji filmovi</h1>
            <div class="row">
                <?php   for($m =0;$m< $this->k ;$m++){ ?>
                <div class="col-md-3">
                    <a href="<?php  echo URL . "/projection/details/". $this->popularFilmsSorted[$m]['id'];  ?>"> <img src="<?php echo URL.'/' . $this->popularFilmsSorted[$m]['path']; ?>" class="img-responsive"></a>
                    <div class="caption">
                        <p><?php echo $this->popularFilmsSorted[$m]['name']; ?></p>
                    </div>
                </div>
                <?php }; ?>

            </div>
        </div>
        <div class="news">
            <h1>Vesti</h1>
            <div class="firstNews" style="width: 370px; height: 300px;">
                    <p><?php echo $this->newestFilms[0]['name']; ?></p>
                    <a href="<?php echo URL . "/projection/details/". $this->newestFilms[0]['id']; ?>"> <img src="<?php echo URL .'/' . $this->newestFilms[0]['path']; ?>" class="img-responsive" style="width: 100%; height: 100%;"></a>
                    <p><?php echo $this->firstNews['text']; ?></p>
                </div>
            <div class="secondNews" style="width: 370px; height: 300px;">
                <p><?php echo $this->popularFilmsSorted[0]['name']; ?></p>
                <a href="<?php echo URL . "/projection/details/". $this->popularFilmsSorted[0]['id']; ?>"> <img src="<?php echo URL.'/' . $this->popularFilmsSorted[0]['path']; ?>" class="img-responsive" style="width: 100%; height: 100%;"></a>
                
                <p><?php echo $this->secondNews['text']; ?></p>
            </div>
        </div>
    </div>
</div>
