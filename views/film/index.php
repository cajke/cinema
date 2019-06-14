<div class="film-content">
    <div class="container">
        <h1 class="text-center">Lista filmova</h1>

        <div class="browseMovies">

            <form action="<?php URL; ?>film/browseFilm" method="get">

                <div class="form-row">
                    <div class="form-group col-md-6 genre">
                        <label>Žanr</label>
                        <?php

                            $genres = array('Action','Adventure','Animation','Biography','Comedy','Crime','Documentary','Drama',
                                            'Family','Fantasy','Film-Noir','Game-Show','History','Horror','Music','Musical','Mystery',
                                            'News','Reality-TV','Romance','Sci-Fi','Sport','Talk-Show','Thriller','War','Western');


                           $select_genre = '<select class="form-control" name="genre"><option value="0">All</option>';
                           for($i = 0; $i < sizeof($genres); $i++)
                           {
                               $select_genre .= '<option value="'.$genres["$i"].'">'.$genres["$i"].'</option>';
                           }
                           $select_genre .= '</select>';

                            echo $select_genre;
                        ?>
                    </div>
                        <div class="form-group col-md-6 rating">
                            <label>Rejting</label>
                        <?php

                            $select_rating = '<select class="form-control"name="rating"><option value="0">All</option>';
                            for($i = 9; $i > 0; $i--)
                            {
                                $select_rating .= '<option value="' . $i . '">' . $i . '+</option>';
                            }
                            $select_rating .= '</select>';

                            echo $select_rating;
                        ?>
                        </div>


                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary btn-block form-control">Pretraži</button>
                    </div>
                </div>

            </form>

        </div>


        <div class="create">
                <button onclick="document.getElementById('film-form').style.display='block'" style="width:auto;"
                        class="btn btn-success"><i class="fa fa-user-plus"></i> Kreiraj novi film
                </button>
                <div id="film-form" class="modal">
                    <form class="modal-content animate" style="background-color: #555555;" action="<?php echo URL; ?>film/create" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <span onclick="document.getElementById('film-form').style.display='none'" class="close"
                                      title="Close Modal" style="position: absolute; right: 10px; color: white;">&times;</span>
                            </div>
                        </div>
                        <h3 class="text-center">Kreiraj film</h3>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="file" name ="file">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Naziv</label>
                                <input class="form-control" type="text" name="name" placeholder="Naziv"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                        <label>Režiser</label>
                        <input class="form-control" type="text"name="director" placeholder="Režiser"/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Ocena</label><br/>
                                <input class="form-control" type="text" name="rating"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Žanr</label>
                                <input class="form-control" type="text" name="genre" placeholder="Žanr"/>
                            </div>
                        </div>
                        

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Godina proizvodnje</label>
                                <input class="form-control" type="text" name="year" placeholder="Godina proizvodnje"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Trajanje</label>
                                <input class="form-control" type="text" name="durationTime" placeholder="Trajanje"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Youtube url</label><br/>
                                <input class="form-control" type="text" name="youtube_url" placeholder="Youtube url"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Opis</label><br/>
                                <textarea style="height: 51px;" class="form-control" rows=10 cols="70" name="description" placeholder="Opis"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                                <button type="submit" class="btn btn-success btn-block form-control">Kreiraj</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive" >
                    <table id="film-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Godina premijere</th>
                            <th>Režiser</th>
                            <th>Žanr</th>
                            <th>Ocena</th>
                            <th>Trajanje</th>
                            <th>Opis</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($this->filmList as $key => $value) {
                            /* list($hourS,$minuteS,$secondS) = explode(':',$value['start']);
                             list($hourE,$minuteE,$secondE) = explode(':',$value['end']);*/
                            echo '<tr>';
                            echo '<td>' . $value['id'] . '</td>';
                            echo '<td>' . $value['name'] . '</td>';
                            echo '<td>' . $value['year'] . '</td>';
                            echo '<td>' . $value['director'] . '</td>';
                            echo '<td>' . $value['genre'] . '</td>';
                            echo '<td>' . $value['rating'] . '</td>';
                            echo '<td>' . $value['durationTime'] . '</td>';
                            echo '<td>' . $value['description'] . '</td>';
                            /*  echo '<td>' . $value['date'] . '</td>';
                              echo '<td>' . $hourS . ':' . $minuteS . '</td>';
                              echo '<td>' . $hourE . ':' . $minuteE . '</td>';*/
                            echo    '<td class="proba"> 
                                        <a href="' . URL . 'film/edit/' . $value['id'] . '"><button class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i> Izmeni</button></a>

                                        <a href="' . URL . 'film/delete/' . $value['id'] . '"><button class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i> Obriši</button></a>
                                        
                                        <a href="'.URL.'projection/index/' . $value['id'] .'"><button class="btn btn-success btn-block" style="margin-top: 3px">
                                        <i class="fas fa-plus"> Dodaj projekciju</i></button></a>
                                    </td>';
                            echo '</tr>';
                        }

                        ?>
                    </table>
                </div>
        </div>
    </div>
</div>
