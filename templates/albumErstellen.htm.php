<form name="albumErstellen" id="albumErstellen" action="<?php echo getValue('phpmodule'); ?>" method="post">

    <h2>Fotoalbum erstellen</h2>
    <br>

    <div class="form-group">
        <label for="albumName" class="col-sm-2 control-label">Albumname</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="albumName" name="albumName" placeholder="Albumname" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
    <br><br>
</form>