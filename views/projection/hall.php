<div id="mainDiv" class="container">
    <?php

    $busySeats = array();
    foreach($this->reservationListForProjection as $r)
    {
        list($row,$col,$seat) = explode(':',$r['seat']);
        $busySeats[] = $seat;
    }

    $seatCounter = 1;

    if($this->projection['hall'] == '1')
    {
        $row = 10;
        $col = 7;

    } else if($this->projection['hall'] == '2')
    {
        $row = 12;
        $col = 9;
    } else {
        $row = 15;
        $col = 10;
    }

    for($i = 0; $i < $row; $i++)
    {
        //var_dump($i); die();
        echo '<div id="divRow" class="row container">';
        for($j = 0; $j < $col; $j++)
        {
            if(in_array($seatCounter,$busySeats)) {
                echo '<div class="divCol col-md-12" id="busyDiv">' . $seatCounter++ . '</div>';
            } else {
                echo '<a href="' . URL . 'reservation/create/' . $i . ':' . $j . ':' . $seatCounter . ':' . $this->projection['id'] . '"><div class="divCol col-md-12" id="divCol">' . $seatCounter++ . '</div></a>';
            }
        }
        echo '</div>';
    }
    ?>

</div>
