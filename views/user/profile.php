<div class="edit-content" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <form  method="POST" action="<?php echo URL;?>user/editSave" enctype="multipart/form-data" class="form-container upload">
            <div class="form-row">
                <img class="img-responsive img-rounded" src="<?php echo URL .$this->user['path']; ?>"  style="  width: 234px; height: 214.75px; margin: auto;">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 input">
                    <input type="file" name ="file" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block form-control" name="action" value = "Upload" style="width: 120px;margin-top: 77px;">Upload</button>
                </div>
            </div>
        </form>
        <form method="post" action="<?php echo URL;?>user/editSave">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Ime</label>
                    <span class="mandatory">*</span>
                    <input type="text" name="firstName" class="form-control" value="<?php echo $this->user['firstName']; ?>" />
                    <?php if (isset($this->msg['firstName'])) {
                    echo'<p id="errorName" class="errorMessages text-center">'.$this->msg['firstName']. '</p>';
                    } ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Prezime</label>
                    <span class="mandatory">*</span>
                    <input type="text" name="lastName" class="form-control"	 value="<?php echo $this->user['lastName']; ?>" />
                    <?php if (isset($this->msg['lastName'])) {
                    echo '<p id="errorName" class="errorMessages text-center">'.$this->msg['lastName']. '</p>';
                    } ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email</label>
                    <span class="mandatory">*</span>
                    <input type="text" name="email" class="form-control" value="<?php echo $this->user['email']; ?>" />
                    <?php if (isset($this->msg['email'])) {
                        echo '<p id="emailError" class="errorMessages text-center">'.$this->msg['email']. '</p>';
                    } ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Lozinka</label>
                    <span class="mandatory">*</span>
                    <input type="password" class="form-control" name="password" />
                    <?php if (isset($this->msg['password'])) {
                        echo '<p id="passwordError" class="errorMessages text-center">'.$this->msg['password']. '</p>';
                    } ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Država</label>
                    <input type="text" name="country" class="form-control" value="<?php echo $this->user['country']; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mobilni telefon</label>
                    <input type="text" name="mobilePhone" class="form-control" value="<?php echo $this->user['mobilePhone']; ?>" />
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Ažuriraj</button>
        </form>
    </div>
    </div>
