
<?php
    include("database.php");
    $id = $_POST["id"];
    $table = $_POST["table"];
    if($table == 'hod_details'){
        $sql="delete from `$table` where h_id = '$id'";
        print($sql);
        $rs = $cn->query($sql);
        header("Location: principal.php");
    }
    if($table == 'faculty_details'){
        $sql="delete from `$table` where f_id = '$id'";
        print($sql);
        $rs = $cn->query($sql);
        header("Location: hod.php");
    }
    if($table == 'student_details'){
        $s_branch = $_POST["s_branch"];
        $s_sem = $_POST["s_sem"];
        $s_sem_new = $_POST["s_sem_new"];
        $change_sem = $_POST["change_sem"];
        $delete = $_POST["delete"];
        if($delete){
            $sql2="delete from `feedback_details` where s_id in (select s_id from `$table` where s_branch = '$s_branch' and s_sem = '$s_sem')";
            $rs2 = $cn->query($sql2);
            $sql="delete from `$table` where s_branch = '$s_branch' and s_sem = '$s_sem'";
            $rs = $cn->query($sql);
            $del_path='student_csv/'.$s_branch.' '.$s_sem.'.csv';
            unlink($del_path);
        }
        if($change_sem){
            $sql2="update `student_details` set s_sem = '$s_sem_new' where s_branch = '$s_branch' and s_sem = '$s_sem'";
            $rs2 = $cn->query($sql2);
        }
        header("Location: hod.php");
    }
?>