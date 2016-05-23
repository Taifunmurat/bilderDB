<form name="registration" id="registration" action="<?php echo getValue('phpmodule'); ?>" method="post">

    <h1>Registration</h1>
    <div id="errorspace">
    </div>
    <div id="informationspace">
    </div>

    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="username" placeholder="Email">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="firstname" placeholder="Vorname">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="lastname" placeholder="Nachname">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="passwort" class="col-sm-2 control-label">Passwort</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="password" placeholder="Passwort">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="passwort2" class="col-sm-2 control-label">Passwort wiederholen</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="password2" placeholder="Passwort wiederholen">
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">anmelden</button>
            <button type="reset"  class="btn btn-default">zurücksetzen</button>
        </div>
    </div>
    <br><br>

</form>
