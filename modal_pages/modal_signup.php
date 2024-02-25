<div class="wrapper">
    <!-- Sign up -->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                    <!-- <span aria-hidden="true">&times;</span></button> -->
                    <h4 class="modal-title p-2"><b>Inscrivez-Vous Ici !</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="signup.php">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="firstname" id="firstname" name="firstname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">Prénom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="lastname" id="lastname" name="lastname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Téléphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="phone" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email Client</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Mot de passe</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="password" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="col-sm-3 control-label">Importer une photo</label>
                            <div class="col-sm-9">
                                <input type="file" id="photo" name="photo">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i>Fermer</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="signup"><i class="fa fa-profil"></i> Créer un Compte</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
</div>