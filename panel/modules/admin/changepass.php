<?php
session_start();
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<root>
<data><![CDATA[
<?php 
require_once('../../../library/common.php');
$page=new core();
$page->setting();
$page->sqlite_create();
$pass = md5($_GET['pass']);
$id = $_GET['id'];
$query = $page->sqlite_query('update admin set password ="'.$pass.'" where id = "'.$id.'"');
if($query == true){
    $success = 'Successfully';
    $java = 'location.reload();';
}else{
    $error = 'Failed';
}
?> 	 
	 ]]>
  </data>
  <java><![CDATA[
    <?php
        echo $java;
        if(sizeof($error) > 0){
            echo 'toastr.error("'.$error.'");';            
        }
        if(isset($success) > 0){
            echo 'toastr.success("'.$success.'");';
        }
    ?>
	  ]]>
  </java>
</root>