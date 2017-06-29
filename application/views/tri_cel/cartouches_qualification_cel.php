<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * views/template.php
 *
 * Template for the menu Sidebar
 *
 */
?>
<div class="row">
  <?php
      echo validation_errors();
      $attributes = array ('class'=>'form-horizontal');
      echo form_open('Cartouches_Qualification_CEL/new_contenant',$attributes);
  ?>
    <div class="col-lg-6 ">
      <div class="form-group">
          <label class="col-lg-3 control-label">Carton N°</label>

          <div class="col-lg-3">
            <input type="text" name='ctn_number' id="ctn_number" value="{CTN_NUMBER}" autofocus class="form-control">
          </div>
          <label class="col-lg-3 control-label">Nombre total</label>

          <div class="col-lg-3">
            <input type="text" disabled="" name='ctn_number' value="{TOTAL_CONTENANT}" class="form-control">
          </div>
      </div>
    </div>



  <div class="col-lg-6 ">
    <label class="col-lg-3 control-label">FA N°</label>

    <div class="col-lg-3">
      <input type="text" disabled="" name='ctn_number' value="{FA_NUMBER}" class="form-control">
    </div>
  </div>
  <div class='hide'>
   <input type='submit' name='validerHide' value='' />
</div>
</form>
</div>

<br><br><br>


  <div class="row">
    <div class="col-lg-offset-1"></div>
    {tri_cel}
  </div>
