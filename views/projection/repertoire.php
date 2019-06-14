<?php
    require  'models/film_model.php';
?>

<title>Repertoar</title>
<div class="divDate container">
    <div class="row">
    <?php

        for($i = 0; $i < 5; $i++)
        {
            $date = date('Y-m-d',strtotime( '+' . $i .' days'));
            list($year,$month,$day) = explode('-',$date);


            $dayForDate = date('w',mktime(0,0,0,$month,$day,$year)); //mktime - we get timestamp value

            if($dayForDate == 1 ) $dayForDateString = 'Pon';
            else if($dayForDate == 2 ) $dayForDateString = 'Uto';
            else if($dayForDate == 3) $dayForDateString = 'Sre';
            else if($dayForDate == 4 ) $dayForDateString = 'Čet';
            else if($dayForDate == 5) $dayForDateString = 'Pet';
            else if($dayForDate == 6) $dayForDateString = 'Sub';
            else $dayForDateString = 'Ned';

            if($month == '01') $monthString = 'Jan';
            else if($month == '02') $monthString = 'Feb';
            else if($month == '03') $monthString = 'Mar';
            else if($month == '04') $monthString =  'Apr';
            else if($month == '05') $monthString = 'Maj';
            else if($month == '06') $monthString = 'Jun';
            else if($month == '07') $monthString = 'Jul';
            else if($month == '08') $monthString = 'Avg';
            else if($month == '09') $monthString = 'Sep';
            else if($month == '10') $monthString = 'Okt';
            else if($month == '11' ) $monthString ='Nov';
            else $monthString = 'Dec';

            echo  '<a href="' . URL . 'projection/repertoire/' . $date . '"><div class="divDateBtn col-sm-1 " ><i class="far fa-calendar-alt"></i> ' . $dayForDateString . '. / ' . $day . '. ' . $monthString . '</div></a>';

        }


    ?>
    </div>



    <div class="main">
        <?php

        foreach($this->filmListOnRepertoireByDate as $key => $value)
        {
            $f_m = new Film_Model();
            $film = $f_m->filmSingleList($value['filmId']);

            echo '<div class="mainDiv row">';
            echo '<div class="firstDiv col-md-4"><img src="' . URL . $film['path'] . '"/></div>';
            echo '<div class="secondDiv col-md-4">';
            echo '<h2>' . $film['name'] . '</h2>';
            echo '<div class="details">';
            echo '<h6>Reziser: ' . $film['director'] . ' </h6>';
            echo '<h6>Zanr: ' . $film['genre'] . ' </h6>';
            echo '<h6>Trajanje: ' . $film['durationTime'] . ' min  </h6>';
            echo '<h6>Godina proizvodnje: ' . $film['year'] . ' </h6>';
            echo '</div>';
            echo '<a href="' . URL . 'projection/details/'. $value['filmId'] . ':'. $this->date .'"><div class="secondDivDetails text-center">Detaljnije</div></a>';
            echo '</div>';
            echo '<div class="thirdDiv col-md-4">';
            echo '<h2 class="text-center">Rezerviši projekciju</h2>';

            $p_m = new Projection_Model();
            $projections = $p_m->getProjectionsByFilmAndDate($value['filmId'],$this->date);

            foreach($projections as $key => $val)
            {

                list($hourS,$minuteS) = explode(':',$val['start']);

                echo '<div class="projection text-center">';
                $class = (Session::get('role') == 'admin') ? 'thirDivReservationAdmin' : 'thirdDivResevation';
                echo '<a href="' . URL . 'projection/findProjectionAndReservations/' . $val['id'] . '"><div class="'.$class.'">';
                echo '<p> ' . $hourS . ':' . $minuteS . '</p>';
                echo '<p>Sala: ' . $val['hall'] . '</p>';
                echo '<p>Cena karte: ' . $val['price'] . ' din</p>';
                if(Session::get('role') == 'admin') {
                    echo '<a href="' . URL . 'projection/edit/' . $val['id'] . ':' . $val['date'] . '"><div class="thirdDivButtonEdit"><i class="far fa-edit"></i></div></a>';
                    echo '<a href="' . URL . 'projection/deleteProjectionOnRepertoire/' . $val['id'] . ':' . $val['date'] . '"><div class="thirdDivButtonEdit"><i class="far fa-trash-alt"></i></div></a>';
                }
                echo '</div></a>';
                echo '</div>';

            }
            echo '</div>';
            echo '</div>';
        }


        ?>

    </div>
</div>
