<form name="registration" id="registration" action="<?php echo getValue('phpmodule'); ?>" method="post">

    <h1>Registration</h1>


    <br>

    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="username" name="email" placeholder="Email" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Vorname" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nachname" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="passwort" class="col-sm-2 control-label">Passwort</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Passwort" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="passwort2" class="col-sm-2 control-label">Passwort wiederholen</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Passwort wiederholen" required>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">anmelden</button>
            <button type="reset" name="reset" class="btn btn-default">zurücksetzen</button>
        </div>
    </div>
    <br><br>

</form>
