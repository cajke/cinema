<div class="user-reservation-content-admin">
    <div class="container">
        <h1 class="text-center">Vaše rezervacije</h1>
        <div class="table-responsive">
            <table id="id" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Godina</th>
                    <th>Trajanje</th>
                    <th>Datum projekcije</th>
                    <th>Datum rezervacije</th>
                    <th>Početak projekcije</th>
                    <th>Kraj projekcije</th>
                    <th>Red</th>
                    <th>Kolona</th>
                    <th>Sedište</th>
                    <th>Sala</th>
                    <th>Cena</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                foreach ($this->reservationListForUser as $key => $value) {
                    list($hourS, $minuteS, $secondS) = explode(':', $value['start']);
                    list($hourE, $minuteE, $secondE) = explode(':', $value['end']);
                    list($row, $col, $seat) = explode(':', $value['seat']);

                    echo '<tr>';

                    echo '<td>' . $value['name'] . '</td>';
                    echo '<td>' . $value['year'] . '</td>';
                    echo '<td>' . $value['durationTime'] . '</td>';
                    echo '<td>' . $value['date'] . '</td>';
                    echo '<td>' . $value['reservationDate']. '</td>';
                    echo '<td>' . $hourS . ':' . $minuteS . '</td>';
                    echo '<td>' . $hourE . ':' . $minuteE . '</td>';
                    echo '<td>' . ($row + 1) . '</td>';
                    echo '<td>' . ($col + 1) . '</td>';
                    echo '<td>' . $seat . '</td>';
                    echo '<td>' . $value['hall'] .'</td>';
                    echo '<td>' . $value['price'] . '</td>';
                    echo '<td><a href="' . URL . 'reservation/delete/' . $value['reservationId'] . '"><button class="btn btn-danger btn-sm">
											<i class="far fa-trash-alt"></i> Obriši</button></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

