<?php
include("../inc/init.inc.php");
require("../inc/nav.class.php");
require("../inc/jTab.class.php");
require_once('../inc/domaine.class.php');
require_once('../inc/cv.class.php');
if( $_REQUEST["name"] ) {

   $name = $_REQUEST['name'];

 $lesenvoi=new Jointab;
            switch($name){
case '1' :
$resulEnvoi=$lesenvoi->listenvoimail();
break;
case '2' :
$resulEnvoi=$lesenvoi->listenvoimail2();
break;
case '3' :
$resulEnvoi=$lesenvoi->listenvoimail3();
break;
case '4' :
$resulEnvoi=$lesenvoi->listenvoimail4();
break;
default:
$resulEnvoi=$lesenvoi->listenvoi();
break;
}
 

 foreach($resulEnvoi as $key => $value){
 ?>
<tr> <td><div class="creme midlle1"><?php echo $value['id_joint'];?><br><?php echo $value['dateT'];?></div></td>
  <td class="objet"><div class="creme midlle2">
          <a href="<?php echo $value['fichierweb'];?>?etn=<?php echo $value['variable'];?>"><?php echo $value['objet'];?></a>
      </div></td>
  <td><div class="creme five">
      <?php echo $value['variable'];?>
  <br><?php echo $value['slogan1'];?>    
  <br><a href="<?php echo $value['fichiercv'];?>?etn=<?php echo $value['variable'];?>" target="_blank"><?php echo $value['nom'];?></a>      
</div>
  </td>
  <td><div class="creme midlle2"> 
  <?php echo $value['emailcontact'];?></a>
</div>
 </td>
 <td><div class="creme midlle2"><a href="modifC.php?idc=<?php echo $value['id_lemail'];?>&variableC=<?php echo $value['variable'];?>"><?php echo $value['nomcontact'];?> </div>
 </td>
 <td><div class="creme midlle2"><?php echo $value['entreprise'];?></div>
 </td>
 <td><div class="creme five"><?php echo $value['activite'];?></div>
 </td> </tr>
 <?php }
} ?>  
 