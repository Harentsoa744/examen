<section>
    <header>
        <h2>Accueil</h2>
    </header>
    <table class="table table-striped" style="border: 2px solid black;">
            <tr>
                <th>Code</th>
                <th>Nom du Département</th>
                <th>Manager Actuel</th>
                <th>Action</th>
                <th>Nombre d' employees</th>
            </tr>
            <?php
            $sql = "SELECT * FROM departments";
            $res = mysqli_query($conn, $sql);
            ?>
            <?php while ($row = mysqli_fetch_assoc($res)) { 
                $rus = get_nombre_employe($conn,$row['dept_no']);
                $pers_dep = mysqli_fetch_assoc($rus);
                ?>
                <tr>
                    <td><a href="?p=nb_salaire&dept=<?= $row['dept_no'];?>"><?= $row['dept_no'] ?></a></td>
                    <td><?= $row['dept_name'] ?></td>
                    <td><?= getManager($conn, $row['dept_no']) ?></td>
                    <td>
                        <a href="?p=employes&dept=<?= $row['dept_no'] ?>" class="btn">
                            Voir les employés
                        </a>
                    </td>
                    <td><?= $pers_dep['nombre_employe'] ?></td>
                </tr>
            <?php } ?>
    </table>
</section>
