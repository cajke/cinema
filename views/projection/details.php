<div class="details">
    <div class="container">
        <div class="main">
            <div class="firstDiv row col-md-12">
                <h1 style="color: white"><?php echo $this->film['name'];?></h1>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <p> <?php echo $this->film['rating'];?></p>
                </div>
            </div>
            <div class="secondDiv row col-md-12">
                <p class="time"> <?php echo $this->film['durationTime'] . ' min';?></p>
                <p class="genre"> <?php echo $this->film['genre'];?></p>
                <p class="year"> <?php echo $this->film['year'];?></p>
            </div>

            <div class="thirdDiv row">
                    <div class="slika col-md-4">                
                        <img class="img-responsive" src="<?php echo URL . $this->film['path'];?>">
                    </div>
                    <div class="trailer col-md-8">
                        <?php if(isset($this->film['youtube_url']) && !empty($this->film['youtube_url'])){ ?>
                        <iframe src=<?php echo $this->film['youtube_url'] ?> frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
            </div>
                
            <div class="fourDiv row">
                <div class="description col-md-6">
                    <label >Opis</label>
                    <p ><?php echo $this->film['description'];?></p>
                    <label>Režiser:</label>
                    <p class="director"> <?php echo $this->film['director']; ?></p>
                </div>
                <div class="fifthDiv col-md-6">
                    <h2 class="text-center">Projekcije</h2>
                <?php

                foreach($this->projectionsByFilmAndDate as $key => $val)
                {
                    list($hourS,$minuteS) = explode(':',$val['start']);

                    echo '<div class="projection text-center">';
                    echo '<a href="' . URL . 'projection/findProjectionAndReservations/' . $val['id'] . '"><div class="thirdDivResevation">';
                    echo '<p> ' . $hourS . ':' . $minuteS . '</p>';
                    echo '<p>Sala: ' . $val['hall'] . '</p>';
                    echo '<p>Cena karte: ' . $val['price'] . ' din</p>';
                    echo '</div></a>';
                    echo '</div>';

                }

                ?>
            </div>
            </div>
        </div>
    </div>
</div>