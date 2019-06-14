<div class="reservation-content-admin">
    <div class="container" style="margin-top: 50px;">
        <h1 class="text-center">Lista rezervacija</h1>
        <button class="btn btn-warning" style="margin-bottom: 10px;">
            <a href="<?php echo URL; ?>reservation/deleteExpiredReservations" style="color: white;"><i class="fas fa-ban"></i> Obriši istekle rezervacije</a>
        </button>
        <div class="table-responsive">


            <table id="id2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID Rezervacije</th>
                    <th>ID Projekcije</th>
                    <th>ID Filma</th>
                    <th>Naziv</th>
                    <th>Godina</th>
                    <th>Trajanje</th>
                    <th>Datum projekcije</th>
                    <th>Početak projekcije</th>
                    <th>Kraj projekcije</th>
                    <th>ID Korisnika</th>
                    <th>E-mail</th>
                    <th>Datum rezervacije</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                foreach ($this->reservationList as $key => $value) {
                   // var_dump($value['reservationId']);
                    list($hourS, $minuteS, $secondS) = explode(':', $value['start']);
                    list($hourE, $minuteE, $secondE) = explode(':', $value['end']);

                    echo '<tr>';
                    echo '<td>' . $value['reservationId'] . '</td>';
                    echo '<td>' . $value['projectionId'] . '</td>';
                    echo '<td>' . $value['filmId'] . '</td>';
                    echo '<td>' . $value['name'] . '</td>';
                    echo '<td>' . $value['year'] . '</td>';
                    echo '<td>' . $value['durationTime'] . '</td>';
                    echo '<td>' . $value['date'] . '</td>';
                    echo '<td>' . $hourS . ':' . $minuteS . '</td>';
                    echo '<td>' . $hourE . ':' . $minuteE . '</td>';
                    echo '<td>' . $value['userId'] . '</td>';
                    echo '<td>' . $value['email'] .'</td>';
                    echo '<td>' . $value['reservationDate'] . '</td>';
                    echo '<td class="cell">
                              <a href="' . URL . 'reservation/delete/' . $value['reservationId'] . '"><button class="btn btn-danger btn-sm">
                                                <i class="far fa-trash-alt"></i> Obriši</button></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

