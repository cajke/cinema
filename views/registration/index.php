<div class="registration">
    <div class="container">
        <h1 class="text-center" style="margin-bottom: 30px;">Registracija</h1>
        <form method="post" action="<?php echo URL; ?>registration/register">
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Ime</label>
                    <span class="mandatory">*</span>
                    <input type="text" name="firstName" class="form-control" placeholder="Ime">
                    <?php if (isset($this->msg['firstName'])) {
                        echo'<p id="errorName" class="errorMessages text-center">'.$this->msg['firstName']. '</p>';
                    } ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Prezime</label>
                    <span class="mandatory">*</span>
                    <input type="text" name="lastName" class="form-control" placeholder="Prezime">
                    <?php if (isset($this->msg['lastName'])) {
                        echo '<p id="errorName" class="errorMessages text-center">'.$this->msg['lastName']. '</p>';
                    } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email</label>
                    <span class="mandatory">*</span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <?php if (isset($this->msg['email'])) {
                        echo '<p id="emailError" class="errorMessages text-center">'.$this->msg['email']. '</p>';
                    } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Lozinka</label>
                    <span class="mandatory">*</span>
                    <input type="password" name="password" class="form-control" placeholder="Lozinka">
                    <?php if (isset($this->msg['password'])) {
                        echo '<p id="passwordError" class="errorMessages text-center">'.$this->msg['password']. '</p>';
                    } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Država</label>
                    <input type="text" name="country" class="form-control" id="inputEmail4" placeholder="Drzava">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Broj telefona</label>
                    <input type="text" name="mobilephone" class="form-control" placeholder="Broj telefona">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <input class="gender-male" type="radio" name="gender" value="male" checked/>
                    <label for="inputEmail4">Muško</label>
                </div>
                <div class="form-group col-md-3">
                    <input class="gender-famlae" type="radio" name="gender" value="male"/>
                    <label for="inputEmail4">Žensko</label>
                </div>
                <div class="form-group col-md-6">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="g-recaptcha" data-sitekey="<?php echo Google_public_key;?>"></div>
                    <?php if (isset($this->msg['reCaptcha'])) {
                        echo '<p id="passwordError" class="errorMessages text-center">'.$this->msg['reCaptcha']. '</p>';
                    } ?>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">POTVRDI</button>
        </form>

    </div>
</div>