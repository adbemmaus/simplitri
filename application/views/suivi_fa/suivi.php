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
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Basic Data Tables example with responsive plugin</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th rowspan="2">N° Contenant</th>
            <th rowspan="2">N° FA</th>
            <th rowspan="2">Date de réception</th>
            <th rowspan="2">Date de clôture</th>
            <th rowspan="2">Présence CEL</th>
            <th colspan="5" class="center">Toner</th>
            <th colspan="5" class="center">CEL</th>
        </tr>
        <tr>
            <th>N</th>
            <th>NE</th>
            <th>Choix 1</th>
            <th>Choix 2</th>
            <th>Choix 3</th>
            <th>N</th>
            <th>NE</th>
            <th>Choix 1</th>
            <th>Choix 2</th>
            <th>Choix 3</th>
        </tr>
        </thead>
        <tbody>
          {table_data}
        <!--<tr class="gradeX">
            <td>Trident</td>
            <td>Trident</td>
            <td>Trident</td>
            <td>Trident</td>
            <td>Trident</td>
            <td class="center">X</td>
            <td class="center">X</td>
            <td class="center">4</td>
            <td class="center">X</td>
            <td class="center">X</td>
            <td class="center">X</td>
            <td class="center">X</td>
            <td class="center">X</td>
            <td class="center">X</td>
            <td class="center">X</td>
        </tr>-->
        </tbody>
        <!--<tfoot>
          <tr>
              <th rowspan="2">N° Contenant</th>
              <th rowspan="2">N° FA</th>
              <th rowspan="2">Date de réception</th>
              <th rowspan="2">Date de clôture</th>
              <th rowspan="2">Présence CEL</th>
              <th colspan="5">Toner</th>
              <th colspan="5">CEL</th>
          </tr>
          <tr>
              <th>N</th>
              <th>NE</th>
              <th>Choix 1</th>
              <th>Choix 2</th>
              <th>Choix 3</th>
              <th>N</th>
              <th>NE</th>
              <th>Choix 1</th>
              <th>Choix 2</th>
              <th>Choix 3</th>
          </tr>
        </tfoot>-->
        </table>
            </div>

        </div>
    </div>
</div>
</div>
