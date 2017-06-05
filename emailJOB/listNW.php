 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="5%" align="center" bgcolor="#333333" class="tttab">Id</td>
    <td width="30%" align="center" bgcolor="#333333" class="tttab">Email 
    </td>
    <td width="37%" align="center" bgcolor="#666666" class="tttab">Mode 
      </td>
    <td width="11%" align="center" bgcolor="#333333" class="tttab">Envoi invites</td>
    
  </tr>
  <?php


  do {?>
  <tr <?php $enw=$val2['envoi_nw']; if($enw=="N"){?>style="background-color:#ff0000;"<?php }else{echo"";}?> >
    <td> 
      <input type="hidden" name="id_lien[]" value="<?php echo $val2['id_cv'];?>"><?php echo $val2['id_cv'];?>
    </td>
    <td align="center"> 
      <?php echo stripslashes ($val2['email_cv']); ?>
    </td>
    <td align="center" style="border-left: 1px solid black;"> 
      <?php echo $val2['mod_cv']; ?>
    </td>
    <td align="center" style="border-left: 1px solid black;"> 
      <select name="aff_lien[]">
        <option value="Y" <?php if (!(strcmp("Y", $val2['envoi_nw']))) {echo "SELECTED";} ?>>Oui</option>
        <option value="N" <?php if (!(strcmp("N", $val2['envoi_nw']))) {echo "SELECTED";} ?>>Non</option>
      </select>
    </td>
    
  </tr>
  <tr> 
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC" >&nbsp;</td>
    <td bgcolor="#CCCCCC" style="border-left: 1px solid black;">&nbsp;</td>
    <td bgcolor="#CCCCCC" style="border-left: 1px solid black;">&nbsp;</td>
   
  </tr>
  <?php }while ($val2 = mysqli_fetch_assoc($query2)); ?>
  <tr> 
    <td style="border-top: 1px solid black;">&nbsp;</td>
    <td style="border-top: 1px solid black;">&nbsp;</td>
    <td style="border-top: 1px solid black;">&nbsp;</td>
    <td style="border-top: 1px solid black;">&nbsp;</td>
   
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td> 
      <input type="submit" name="Submit" value="Enregister les modifications">
      <input name="ajoutP" type="hidden"  value="okajoutP">
      <input name="idM1B" type="hidden"  value="<?php echo $ideve;?>">
    </td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
</table>
