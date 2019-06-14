<div class="user-content">
    <div class="container">
        <h1 class="text-center">Lista korisnika</h1>
        <div class="create">
            <button onclick="document.getElementById('user-form').style.display='block'" style="width:auto;"
                    class="btn btn-success"><i class="fa fa-user-plus"></i> Kreiraj novog korisnika
            </button>
            <?php if (isset($this->msg) && !empty($this->msg)) {
                echo '<p class="errorMessages text-center">' . $this->msg['email'] . '</p>';
            }; ?>
            <div id="user-form" class="modal">
                <form class="modal-content animate" method="post" action="<?php echo URL; ?>user/create"
                      style="background-color: #555555;" onsubmit="return validateForm()" name="createUserForm">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <span onclick="document.getElementById('user-form').style.display='none'" class="close"
                                  title="Close Modal">&times;</span>
                        </div>
                    </div>
                    <h3 class="text-center">Kreiraj korisnika</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="First name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last name</label>
                            <input type="text" name="lastName" class="form-control" placeholder="Last name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Type email">
                            <p id="emailError" class="errorMessages text-center" style="display: none">Invalid email
                                format, please repeat!</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Pasword</label>
                            <input type="password" name="password" class="form-control" placeholder="Pasword">
                            <p id="passwordError" class="errorMessages text-center" style="display: none">Password must
                                be longer then 4 characters!</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Country</label>
                            <input type="text" name="country" class="form-control" id="inputEmail4"
                                   placeholder="Country">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile phone</label>
                            <input type="text" name="mobilephone" class="form-control" placeholder="Mobile phone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input class="gender-male" type="radio" name="gender" value="male" checked/>
                            <label for="inputEmail4">Musko</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="gender-famlae" type="radio" name="gender" value="female"/>
                            <label for="inputEmail4">Zensko</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Role</label>
                            <select name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-success btn-block">Kreiraj</button>
                        <br>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table id="id" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Pol</th>
                        <th>Država</th>
                        <th>Mobilni telefon</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($this->userList as $key => $value) {
                        echo '<tr>';
                        echo '<td>' . $value['id'] . '</td>';
                        echo '<td>' . $value['firstName'] . '</td>';
                        echo '<td>' . $value['lastName'] . '</td>';
                        echo '<td>' . $value['email'] . '</td>';
                        echo '<td>' . $value['role'] . '</td>';
                        echo '<td>' . $value['gender'] . '</td>';
                        echo '<td>' . $value['country'] . '</td>';
                        echo '<td>' . $value['mobilePhone'] . '</td>';
                        echo '<td class="cell">
											<a href="' . URL . 'user/edit/' . $value['id'] . '"><button class="btn btn-primary btn-sm">
												<i class="far fa-edit"></i> Izmeni</button></a>

											<a href="' . URL . 'user/delete/' . $value['id'] . '"><button class="btn btn-danger btn-sm">
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

