<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * views/template.php
 *
 * Template for the menu Sidebar
 *
 */
?>
<div class="ibox-content">
    <!--<form method="get" class="form-horizontal">-->
    <?php
        echo validation_errors();
        $attributes = array ('class'=>'form-horizontal');
        echo form_open('Cartouches_Reception',$attributes);
    ?>
        <div class="form-group"><label class="col-sm-2 control-label">Numéro FA </label>

            <div class="col-sm-10"><input type="text" class="form-control" name="form_num_fa"></div>
        </div>
        <div class="hr-line-dashed"></div>
        {bdd_data}
        <br>

        <table>
          <tr>
            {crn}
          </tr>
        </table>



        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
        </div>
    </form>

</div>
