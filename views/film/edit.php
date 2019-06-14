<div class="edit-content">
    <div class="container">
        <h1 class="text-center" style="color: white">Ažuriranje filma</h1>
        <form method="POST" action="<?php echo URL; ?>film/editSave/<?php echo $this->film['id']; ?>" enctype="multipart/form-data" class="form-container upload">
            <div class="form-row">
                <img class="img-responsive img-rounded" src="<?php echo URL .$this->film['path']; ?>"  style="  width: 234px; height: 214.75px; margin: auto;">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="file" name ="file">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block form-control" name="action" value = "Upload" style="width: 120px;margin-top: 77px;">Upload</button>
                </div>
            </div>
        </form>
        <form action="<?php echo URL; ?>film/editSave/<?php echo $this->film['id']; ?>" method="post">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Naziv</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $this->film['name']; ?>" placeholder="Naziv"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Režiser</label>
                    <input class="form-control" type="text"name="director" value="<?php echo $this->film['director']; ?>" placeholder="Režiser"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Ocena</label><br/>
                    <input class="form-control" type="text" name="rating" value="<?php echo $this->film['rating']; ?>" placeholder="Ocena"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Žanr</label>
                    <input class="form-control" type="text" name="genre" value="<?php echo $this->film['genre']; ?>" placeholder="Žanr"/>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Godina proizvodnje</label>
                    <input class="form-control" type="text" name="year" value="<?php echo $this->film['year']; ?>" placeholder="Godina proizvodnje"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Trajanje</label>
                    <input class="form-control" type="text" name="durationTime" value="<?php echo $this->film['durationTime']; ?>" placeholder="Trajanje"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Youtube url</label><br/>
                    <input class="form-control" type="text" name="youtube_url" value="<?php echo $this->film['youtube_url']; ?>" placeholder="Youtube url"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Opis</label><br/>
                    <textarea class="form-control" rows=10 cols="70" name="description" placeholder="Opis"><?php echo $this->film['description']; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-success btn-block form-control">Ažuriraj</button>
            </div>
        </form>
    </div>
</div>
