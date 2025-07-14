<?php

function getManager($conn, $dept_no) {
    $sql = "SELECT e.first_name, e.last_name
            FROM dept_manager m
            JOIN employees e ON m.emp_no = e.emp_no
            WHERE m.dept_no = '$dept_no'
            ORDER BY to_date DESC
            LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        return $row['first_name'] . " " . $row['last_name'];
    }
    return "Aucun";
}

function get_nombre_employe($conn,$dept_no){
    $sql = "SELECT count('emp_no') as nombre_employe, dept_no FROM current_dept_emp WHERE dept_no = '$dept_no';";
    return mysqli_query($conn, $sql);
}

function get_employee_info($conn,$dept_no){
    $sql = "SELECT e.*,d.dept_no FROM employees as e
    JOIN dept_emp as d
    ON d.emp_no = e.emp_no
    WHERE e.emp_no = '$dept_no';";
    return mysqli_query($conn, $sql);
}
function get_list_dept($conn){
    $sql = "SELECT *  from departments ORDER BY dept_no;";
    return mysqli_query($conn, $sql);    
}

function get_history_salary($conn,$emp_no){
    $sql = "SELECT *  from salaries WHERE emp_no = '$emp_no';";
    return mysqli_query($conn, $sql);    
}
function get_history_departement($conn,$emp_no){
    $sql = "SELECT *  from dept_emp WHERE emp_no = '$emp_no';";
    return mysqli_query($conn, $sql);
}
function get_longuest_employee($conn,$emp_no){
    $sql = "SELECT *  from dept_emp WHERE emp_no = '$emp_no' order by DATEDIFF(to_date,from_date);";
    return mysqli_query($conn, $sql);
}
function get_info_employee($conn,$emp_no){
    $sql = "SELECT *  from dept_emp WHERE emp_no = '$emp_no' order by DATEDIFF(to_date,from_date);";
    return mysqli_query($conn, $sql);
}
function get_info_departement($conn,$dept_no){
    $sql = "SELECT * FROM v_nombre_homme
    WHERE dept_no = '$dept_no';";
    return mysqli_query($conn, $sql);
}
function getEmployesParDepartement($conn, $dept_no) {
    $dept = mysqli_real_escape_string($conn, $dept_no);
    $sql = "SELECT e.emp_no, e.first_name, e.last_name, e.gender, e.hire_date
            FROM dept_emp as d
            JOIN employees e ON d.emp_no = e.emp_no
            WHERE d.dept_no = '$dept'
            ORDER BY e.last_name";
    return mysqli_query($conn, $sql);
}

function getEmployesParDepartementsearch($conn, $dept_no,$filtre,$search,$debut) {
    $sql = "SELECT emp_no, first_name, last_name, gender, hire_date
            FROM vdepartement_employe
            WHERE dept_no = '$dept_no'
            AND $filtre LIKE '$search%'
            LIMIT $debut, 20";
    return mysqli_query($conn, $sql);
}
function get_nombre_resultat($conn, $dept_no,$filtre,$search){
    
}
?>
