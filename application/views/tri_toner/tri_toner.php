<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * views/template.php
 *
 * Template for the menu Sidebar
 *
 */
?>
{tri_toner_build}
<div class=" col-lg-2 spinnerLN">
  <?php
      echo validation_errors();
      $attributes = array ('class'=>'form-horizontal');
      echo form_open('Cartouches_Qualification_Toner',$attributes);
  ?>
   <div class="row">
    <button type="submit" class="btn {BTN_UP_CLASS} dim btn-xlarge" name="{BTN_UP_NAME}" >{LASER_NAME}</button>
   </div>
   <div class="row">
    <input type="text" disabled="" value="{LASER}" class="spinner1"/>
   </div>
   <div class="row">
   <button type="submit" class="btn btn-danger dim btn-xlarge-down btn-down-LN col-lg-6" name="{BTN_DOWN_NAME}">-1</button>
   <button type="button" class="btn btn-success dim btn-xlarge-down btn-down-LN-edit col-lg-6"  data-toggle="modal" data-target="#{MODAL}"><i class="fa fa-pencil"></i></button>
  </form>
</div>
</div>

<div class="modal inmodal" id="{MODAL}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
          <?php
              echo validation_errors();
              $attributes = array ('class'=>'form-horizontal');
              echo form_open('Cartouches_Qualification_Toner',$attributes);
          ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-pencil modal-icon"></i>
                <h4 class="modal-title">Modification {LASER_NAME}</h4>
                <small>Pour retirer une valeur saisir une valeur négative</small>
            </div>
            <div class="modal-body">
               <center>
               <input type="number" name="{INPUT_LASER}" value="0" autofocus class="spinner1"/>
               </center>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"  name="{BTN_UPDT_NAME}">Save changes</button>
            </div>
          </form>
        </div>
    </div>
</div>

{/tri_toner_build}
