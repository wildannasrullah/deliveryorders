<?php
if ($_GET['p']=='dashboard'){
    include "modul/dashboard.php";
}
if ($_GET['p']=='input-sjm'){
    include "modul/tes.php";
}
if ($_GET['p']=='report-sjm'){
    include "modul/laporan.php";
}
if ($_GET['p']=='report-sjm-detail'){
    include "modul/laporan_detail.php";
}
if ($_GET['p']=='report-detail'){
    include "modul/report_detail/report_detail.php";
}
if ($_GET['p']=='edit_sjm'){
    include "modul/edit-tes.php";
}
if ($_GET['p']=='del'){
    include "modul/del.php";
}
if ($_GET['p']=='edit-password'){
    include "modul/edit-password.php";
}
if ($_GET['p']=='user'){
    include "modul/user.php";
}
if ($_GET['p']=='approval'){
    include "modul/approval.php";
}
if ($_GET['p']=='departemen'){
    include "modul/departemen.php";
}
if ($_GET['p']=='input-sjm-test'){
    include "modul/tes-rachmad.php";
}
if ($_GET['p']=='report-sjm-cari'){
       include "modul/laporan_cari.php";
}
?>