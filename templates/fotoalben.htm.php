<form name="fotoalben" id="fotoalben" action="<?php echo getValue('phpmodule'); ?>" method="post">

  <h2>Fotoalben</h2>
  
  <table cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <table class="table" cellpadding="0" cellspacing="0">
          <thead>
          <tr>
            <th>Alben:</th>

          </tr>
          </thead>
          <tbody>
          <tr>
            <?php

              $fotoalben = getValue('fotoalben');

              if ($fotoalben != ""){

                for ($x = 0; $x < count($fotoalben); ++$x){
                  echo "<td>".$fotoalben[$x]['name']." </td></tr><tr>";
                }

              }
            ?>
          </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</form>
