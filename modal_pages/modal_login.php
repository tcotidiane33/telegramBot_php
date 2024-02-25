<!-- Login -->
<div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Connexion</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="login.php">
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email Client</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" c placeholder="email" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mot de passe</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" c placeholder="password" id="password" name="password" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i>Fermer</button>
        <button type="submit" class="btn btn-primary btn-flat" name="login"><i class="fa fa-sign-in"></i> Connexion</button>
        </form>
      </div>
      <div class="modal-footer">
        <p>Si vous n'avez pas encore de compte chez nous, créer un compte ici : <button><a href='includes/modal_signup.php' data-toggle='modal'><i class='fa fa-profil'></i> CREER UN COMPTE</a></button> </p>
        
      </div>
    </div>
  </div>
</div>