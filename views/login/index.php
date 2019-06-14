<div class="login">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>web/images/icon.ico" />
    <div class="container">
        <img src="<?php echo URL; ?>web/images/logo-without-text.png" class="img-responsive" style="margin: 35px auto 40px auto;">
                <form action="<?php echo URL; ?>login/run" method="post" class="form-container">

                    <h1 class="text-center">Prijava</h1>
                    <div class="form-row">
                        <?php if (isset($this->msg['incorrect']) && !empty($this->msg['incorrect'])) {
                            echo '<p id="emailError" class="errorMessages text-center">'. $this->msg['incorrect']. '</p>';
                        } ?>
                        <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <?php if (isset($this->msg['email']) && !empty($this->msg['email'])) {
                                echo '<p id="emailError" class="errorMessages text-center">'. $this->msg['email']. '</p>';
                            } ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputPassword1">Lozinka</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Lozinka">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Prijavi se</button><br>
                    <div class="form-row">
                        <p class="form-group col-md-12">Još uvek nemate nalog? <a href="<?php echo URL ;?>registration">Registrujte novi.</a></p>
                    </div>
                </form>
        </div>
    </div>
</div>