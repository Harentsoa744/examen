CREATE VIEW vdepartement_employe AS SELECT d.*, e.first_name, e.last_name, e.gender, e.hire_date FROM dept_emp as d
            JOIN employees e ON d.emp_no = e.emp_no;

CREATE VIEW v_Age_employe AS SELECT first_name, last_name, DATEDIFF((CURRENT_DATE), birth_date)/365.25 as age FROM employees LIMIT 10;

CREATE VIEW as v_emp-dept e.*,
DATEDIFF()
SELECT count(emp_no),emp_no from current_dept_emp GROUP BY emp_no ORDER BY count(emp_no) DESC limit 10;

CREATE VIEW v_nombre_homme AS SELECT count(c.emp_no) as nombre_homme ,dept_no FROM current_dept_emp as c JOIN employees as e ON c.emp_no = e.emp_no WHERE gender = 'M' GROUP BY dept_no;
CREATE VIEW v_nombre_femme AS SELECT count(c.emp_no) as nombre_femme ,dept_no FROM current_dept_emp as c JOIN employees as e ON c.emp_no = e.emp_no WHERE gender = 'F' GROUP BY dept_no;

SELECT d.*,AVG(s.salary),COUNT(SELECT * FROM v_nombre_homme WHERE dept_no = 'd009') as nombre_homme, COUNT(SELECT * FROM v_nombre_femme WHERE dept_no = 'd009') as nombre_femme
    from current_dept_emp as c JOIN employees as e ON c.emp_np = e.emp_no 
    JOIN salaries as s ON e.emp_no = s.emp_no
    WHERE dept_no = 'd009';
    SELECT * FROM v_nombre_homme
    WHERE dept_no = 'd009';