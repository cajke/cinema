<div class="edit-content">
    <div class="container">
        <h1 class="text-center" style="color: white">Ažuriranje projekcije</h1>
        <form action="<?php echo URL; ?>projection/editSave/<?php echo $this->projection['id']; ?>" method="post">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>ID projekcije</label>
                    <input class="form-control" type="text" name="id" placeholder="ID projekcije"
                           value="<?php echo $this->projection['id']; ?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Datum</label>
                    <input class="form-control" type="date" name="date" placeholder="Date"
                        value="<?php echo  $this->projection['date']; ?>"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Početak projekcije</label>
                    <input class="form-control" type="time" name="start" placeholder="Start"
                        value="<?php echo  $this->projection['start'] ?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Kraj projekcije</label>
                    <input class="form-control" type="time" name="end" placeholder="End"
                    value="<?php echo $this->projection['end'] ?>"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sala</label>
                    <input class="form-control" type="text" name="hall" placeholder="Hall"
                        value="<?php echo $this->projection['hall'] ?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Cena karte</label>
                    <input class="form-control" type="text" name="price" placeholder="Price"
                        value="<?php echo  $this->projection['price']  ?>"/>
                </div>
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-success btn-block">Ažuriraj</button>
                <br>
            </div>

        </form>
    </div>
</div>