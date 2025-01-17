<?php
require_once('../connection/config.php');
include('../includes/header.php');

//Find the Lab to be updated
$labid = $_GET['labid'];
$query = "SELECT * FROM labs WHERE ID = {$labid} LIMIT 1";
$result = mysql_query($query);
$lab = mysql_fetch_array($result);

//Get form entries
$id = $_POST['id'];
$name = $_POST['name'];
$initial = $_POST['initials'];
$email = $_POST['email'];
$priority = $_POST['priority'];
$withresult = $_POST['withresult'];
$description = $_POST['description'];


//Success holding variable
$success = $_GET['p'];
//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

//save the lab details
if ($_REQUEST['update']) {
    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    } else {
        $updatedlab = Updatelab($id, $name, $initial, $email, $withresult, $priority, $description);
        if ($updatedlab) { //check if all records are entered
            $st = "Lab: " . $name . ", " . "has been updated.";
            echo '<script type="text/javascript">';
            echo "window.location.href='labslist.php?p=$st'";
            echo '</script>';
        } else {
            $st = "Update Lab Failed, please try again.";
        }
    }
}
//end of saving user details
?>
<script type="text/javascript" src="../includes/validatelabs.js"></script>
<link rel="stylesheet" href="../includes/validation.css" type="text/css" media="screen" />

<div>
    <div class="section-title">UPDATE LAB</div>
    <div class="xtop">
        <?php
        //validation errors
        if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
            echo '<table><tr><td style="width:auto" ><div class="error">';
            foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                echo '<strong>' . $msg . '</strong>';
            }
            echo '</div></td></tr></table>';
            unset($_SESSION['ERRMSG_ARR']);
        }
        ?>
        <!--display the save message -->
        <?php
        if ($success != "") {
            ?> 
            <table>
                <tr>
                    <td style="width:auto" >
                        <div class="success">
                            <?php echo '<strong>' . ' <font color="#666600">' . $success . '</strong>' . ' </font>'; ?>
                        </div>
                    </td>
                </tr>
            </table>
        <?php } ?>
        <?php
        if ($st != "") {
            ?> 
            <table>
                <tr>
                    <td style="width:auto" >
                        <div class="error">
                            <?php echo '<strong>' . ' <font color="#666600">' . $st . '</strong>' . ' </font>'; ?></div>
                    </td>
                </tr>
            </table>
        <?php } ?>
        <!-- end display the save message -->
    </div>
    <div>
        <span><a style="color: blue; font-weight: bold; padding-left: 5px;" href="labslist.php">Show Lab List</a></span>
    </div>
    <!--The form starts here-->
    <form id="customForm" method="post" action="updatelab.php">
        <input type="hidden" name="id" value="<?php echo $lab['ID']; ?>"/>
        <table>
            <tr>
                <td width="444">The fields indicated asterisk (<span class="mandatory">*</span>) are mandatory.</td>
            </tr>
        </table>
        <div>
            <table border="0" class="data-table">
                <tr>
                    <th colspan="2">Lab Information</th>
                </tr>
                <tr class="even">
                    <td><img src="../img/red.png" />&nbsp;Name</td>
                    <td>
                        <div>
                            <input type="text" name="name" size="30" id="name" class="text" value="<?php echo $lab['name']; ?>" />
                            <span id='nameInfo'></span>
                        </div>
                    </td>
                </tr>
                <tr class="even">
                    <td>&nbsp;Initials</td>
                    <td>
                        <div>
                            <input type="text" name="initials" size="7" id="initials" class="text" value="<?php echo $lab['initials']; ?>" />
                            <span id='initInfo'></span>
                        </div>
                    </td>
                </tr>
                <tr class="even">
                    <td><img src="../img/red.png" />&nbsp;Email</td>
                    <td>
                        <div>
                            <input type="text" name="email" size="40" id="email" class="text" value="<?php echo $lab['email']; ?>" />
                            <span id='emailInfo'></span>
                        </div>
                    </td>
                </tr>
                <tr class="even">
                    <td><img src="../img/red.png" />&nbsp;With Result?</td>
                    <td>
                        <div>
                            Yes:&nbsp;<input type="radio" <?php if ($lab['withresult'] == '1') echo "checked='checked'"; ?> name="withresult" id="withresultyes" value="1"/>
                            No:&nbsp;<input type="radio" <?php if ($lab['withresult'] == '0') echo "checked='checked'"; ?> name="withresult" id="withresultno" value="0"/>
                            <span id='withResultInfo'></span>
                        </div>
                    </td>
                </tr>
                <tr class="even">
                    <td><img src="../img/red.png" />&nbsp;Priority</td>
                    <td>
                        <div>
                            <select name="priority" id="priority">
                                <option value="">--Select Priority--</option>
                                <?php
                                $query = "SELECT COUNT(*) as 'count' FROM labs";
                                $result = mysql_query($query);
                                while ($row = mysql_fetch_array($result)) {
                                    for ($i = 1; $i <= $row['count']; $i++) {
                                        echo "<option value='{$i}'";
                                        if ($lab['priority'] == $i)
                                            echo "selected = 'selected'";
                                        echo ">{$i}</option>";
                                    }
                                }
                                ?>
                            </select>
                            <span id='priorityInfo'></span>
                        </div>
                    </td>
                </tr>
                <tr class="even">
                    <td>Description</td>
                    <td>
                        <textarea name="description" rows="3" cols="44"><?php echo $lab['description']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <input name="update" type="submit" class="button" value="Update Lab" />
                        <input name="reset" type="submit" class="button" value="Reset" />
                    </th>
                </tr>
            </table>
        </div>
    </form>
</div>
<?php include('../includes/footer.php'); ?>