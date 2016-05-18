<form name="registration" id="registration" action="<?php echo getValue('phpmodule'); ?>" method="post">

    <h1>Registration</h1>
    <div id="errorspace">
    </div>
    <div id="informationspace">
    </div>
    <div class="labels">
        <label for="Benutzername">Benutzername:</label><br>
        <label for="Vorname">Vorname:</label><br>
        <label for="Nachname">Nachname:</label><br>
        <label for="Passwort">Passwort:</label><br>
        <label for="Passwortw">Passwort wiederholen:</label><br>
    </div>
    <div class="inputs">
        <input type="email" name="Benutzername" id="username" required><br>
        <input type="text" name="Vorname" id="firstname" required><br>
        <input type="text" name="Nachname" id="lastname" required><br>
        <input type="password" name="Passwort" id="password" required><br>
        <input type="password" name="Passwortw" id="password2" required><br>

        <button type="submit">senden</button>
        <button type="reset" onclick="Reset();">zurücksetzen</button>
    </div>

</form>
