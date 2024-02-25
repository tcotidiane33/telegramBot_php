<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Ajouter un nouveau client</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="student_add.php">
          <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">Prénom</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="col-sm-3 control-label">Nom de famille</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mot de Passe</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Téléphone</label>

            <div class="col-sm-9">
              <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
          </div>
          <div class="form-group">
            <label for="course" class="col-sm-3 control-label">Cours</label>

            <div class="col-sm-9">
              <select class="form-control" id="course" name="course" required>
                <option value="" selected>- Select -</option>
                <?php
                $sql = "SELECT * FROM course";
                $query = $conn->query($sql);
                while ($row = $query->fetch_array()) {
                  echo "
                              <option value='" . $row['id'] . "'>" . $row['code'] . "</option>
                            ";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Photo</label>

            <div class="col-sm-9">
              <input type="file" id="photo" name="photo">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Modifier Client</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="student_edit.php">
          <input type="hidden" class="studid" name="id">
          <div class="form-group">
            <label for="edit_firstname" class="col-sm-3 control-label">Prénom</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_firstname" name="firstname">
            </div>
          </div>
          <div class="form-group">
            <label for="edit_lastname" class="col-sm-3 control-label">Nom de Famille</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_lastname" name="lastname">
            </div>
          </div>
          <div class="form-group">
            <label for="course" class="col-sm-3 control-label">Cours</label>

            <div class="col-sm-9">
              <select class="form-control" id="course" name="course" required>
                <option value="" selected id="selcourse"></option>
                <?php
                $sql = "SELECT * FROM course";
                $query = $conn->query($sql);
                while ($row = $query->fetch_array()) {
                  echo "
                              <option value='" . $row['id'] . "'>" . $row['code'] . "</option>
                            ";
                }
                ?>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Mise à jour</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Suppression...</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="student_delete.php">
          <input type="hidden" class="studid" name="id">
          <div class="text-center">
            <p>SUPPRIMER UN CLIENT</p>
            <h2 class="del_stu bold"></h2>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class="del_stu"></span></b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="student_edit_photo.php" enctype="multipart/form-data">
          <input type="hidden" class="studid" name="id">
          <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Photo</label>

            <div class="col-sm-9">
              <input type="file" id="photo" name="photo" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
        <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Mise à jour</button>
        </form>
      </div>
    </div>
  </div>
</div>