<?php
session_start();
$labss=$_SESSION['lab'];
include('../includes/header.php');

require_once('../connection/config.php');
require_once('classes/tc_calendar.php');
$changesucess= $_GET['changesucess'];

?>
<style type="text/css">
select {
width: 250;}
</style>	
<script type="text/javascript" src="../includes/validatepassword.js"></script>
<link rel="stylesheet" href="../includes/validation.css" type="text/css" media="screen" />

<script language="javascript" src="calendar.js"></script>
<link type="text/css" href="calendar.css" rel="stylesheet" />	
		<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='addsample.php?catt=' + val ;
}
</script>

		<div  class="section">
		<div class="section-title">CHANGE PASSWORD</div>
		<div class="xtop">
		<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<table>
				  <tr>
					<td style="width:auto" ><div class="error">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo $msg; 
		}
		echo '</div></td>
				  </tr>
				</table>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
		<?php
		if ($changesucess !="")
		{?>
		<table   >
  <tr>
    <td style="width:auto" ><div class="success"><?php 
		
echo  '<strong>'.$changesucess.'</strong>';

?></div></th>
  </tr>
</table><?php
		}
		else
		{
		?>
		  <form id="customForm" name="form1" method="post" action="password2.php" >
		<table border="0" class="data-table">
                                      <tr class="even">
                                        <td  ><img src="../img/red.png" />&nbsp;<strong>Current Password</strong></td>
                                        <td  ><div><input type="password" name="cpassword" id="cpassword"  style="width:210px;" class="text"><span id="cpasswordInfo"></span></div></td>
                                      </tr>
                                      <tr >
                                        <td bgcolor="#F0F3FA"><img src="../img/red.png" />&nbsp;New Password</td>
                                        <td  bgcolor="#F0F3FA" colspan="2">
                                         
                                              <div><input name="password" id="password" type="password" style="width:210px;" class="text"/><span id="passwordInfo"></span></div>
                                         </td>
                                      </tr>
                                      <tr bgcolor="#F0F3FA" >
                                        <td ><img src="../img/red.png" />&nbsp;Confirm Password</td>
                                        <td ><div><input type="password"id="confirm"  name="confirm" size="21"style="width:210px;" class="text"><span id="confirmInfo"></span></div>
                                       </td>
                                      </tr>
                                      <tr bgcolor="#8EAAD1">
                                        <th colspan="2" align="center"> <input type="submit" value="Change Password" name="submit" class="button"></th>
                                      </tr>
                                    </table>
									  </form><?php } ?>
		</div>
		</div>
		
 <?php include('../includes/footer.php');?>