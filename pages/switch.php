<?php
 $link = $_GET['id'];
 
 switch($link) 
 {
 	case 2 :
	include "pages/inputProject.php";
	break;
	case 3 :
	include "pages/prosesInputProject.php";
	break;
	case 4 :
	include "pages/viewProject.php";
	break;
	case 5 :
	include "pages/inputFunctionPoint.php";
	break;
	case 6 :
	include "pages/editFunctionPoint.php";
	break;
	case 7 :
	include "pages/viewCurrentProject.php";
	break;
	case 8 :
	include "pages/viewDoneProject.php";
	break;

	case 9 :
	include "pages/inputEvm.php";
	break;
	case 10 :
	include "pages/viewEvm.php";
	break;

	case 11 :
	include "pages/viewDetailProject.php";
	break;
	case 13 :
	include "pages/viewJadwalProject.php";
	break;
	case 14 :
	include "pages/inputJadwalProject.php";
	break;
	case 15 :
	include "pages/editJadwalProject.php";
	break;

	case 16 :
	include "pages/editEvm.php";
	break;
}
?>