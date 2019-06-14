<div class="projection-content">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Projekcije</h1>
            <button class="btn btn-warning" style="float: right;margin-right: -30px;">
                <a href="<?php echo URL; ?>projection/deleteExpiredProjections" style="color: white"><i class="fas fa-ban"></i> Obriši istekle projekcije</a>
            </button>
            <div class="create">
                <button onclick="document.getElementById('user-form').style.display='block'" style="width:auto;"
                        class="btn btn-success"><i class="fa fa-user-plus"></i> Kreiraj novu projekciju
                </button>
                <div id="user-form" class="modal">
                    <form class="modal-content animate" action="<?php echo URL; ?>projection/create" method="post"
                          value="<?php echo $this->filmId ?>"style="background-color: #555555;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <span onclick="document.getElementById('user-form').style.display='none'" class="close"
                                  title="Close Modal">&times;</span>
                            </div>
                        </div>
                        <h3 class="text-center">Kreiraj projekciju</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Film ID</label>
                                <input class="form-control" type="text" name="filmId" placeholder="Film ID" value="<?php echo $this->filmId; ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Datum</label>
                                <input class="form-control" type="date" name="date" placeholder="Date"/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Početak projekcije</label>
                                <input class="form-control" type="time" name="start" placeholder="Start"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kraj projekcije</label>
                                <input class="form-control" type="time" name="end" placeholder="End"/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Sala</label>
                                <input class="form-control" type="text" name="hall" placeholder="Hall"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cena karte</label>
                                <input class="form-control" type="text" name="price" placeholder="Price"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-success btn-block">Kreiraj</button>
                            <br>
                        </div>
                    </form>
                </div>
                <div class="table-responsive" style="width: 1200px;">
                    <table id="projection-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID projekcije</th>
                            <th>ID filma</th>
                            <th>Naziv</th>
                            <th>Godina</th>
                            <th>Datum projekcije</th>
                            <th>Početak projekcije</th>
                            <th>Kraj projekcije</th>
                            <th>Sala</th>
                            <th>Cena karte</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($this->projectionList as $key => $value) {
                            list($hourS, $minuteS) = explode(':', $value['start']);
                            list($hourE, $minuteE) = explode(':', $value['end']);
                            echo '<tr>';
                            echo '<td>' . $value['id'] . '</td>';
                            echo '<td>' . $value['filmId'] . '</td>';
                            echo '<td>' . $value['name'] . '</td>';
                            echo '<td>' . $value['year'] . '</td>';
                            echo '<td>' . $value['date'] . '</td>';
                            echo '<td>' . $hourS . ':' . $minuteS . '</td>';
                            echo '<td>' . $hourE . ':' . $minuteE . '</td>';
                            echo '<td>' . $value['hall'] . '</td>';
                            echo '<td>' . $value['price'] . ' din</td>';
                            echo '<td style="width: 146px">
                        <a href="' . URL . 'projection/edit/' . $value['id'] . '"><button class="btn btn-primary btn-sm">
                            <i class="far fa-edit"></i> Izmeni</button></a>

                        <a href="' . URL . 'projection/delete/' . $value['id'] . '"><button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i> Obriši</button></a>

                    </td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
