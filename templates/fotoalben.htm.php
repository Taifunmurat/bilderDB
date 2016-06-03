<form name="fotoalben" id="fotoalben" action="<?php echo getValue('phpmodule'); ?>" method="post">

  <table cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <h2>Fotoalben</h2>
      </td>
    </tr>
    <tr>
      <td>
        <table class="table" cellpadding="0" cellspacing="0">
          <thead>
          <tr>
            <th>Alben:</th>
            <th>Album öffnen:</th>
          </tr>
          </thead>
          <tbody>
          <tr>

            <?php

              $fotoalben = getValue('fotoalben');

              for ($x = 0; $x < count($fotoalben); ++$x){
                  echo "<td>".$fotoalben[$x]['name']." </td><td>$fotoalben[$x]['aid']</td></tr><tr>";
              }



            ?>

          </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</form>
