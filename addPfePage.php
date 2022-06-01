<?php
    session_start();
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap4/css//bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                    include_once("top.php");
                    ?>
            </div>
            <div class="row">
                <?php
                    include_once("middle.php");
                    ?>
            </div>
            <div class="row">
                <?php
                    include_once("left.php");
                    ?>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            Ajout d'un PFE
                        </div>
                        <div class="card-body">
                            <form method="get" action="add.php">
                                <div class="form-group">
                                    <label for="titre">Saisir le titre</label>
                                    <input type="text" class="form-control" name="titre"  placeholder="le titre...">
                                </div>
                                <div class="form-group">
                                    <label for="type">Choisir le type</label>
                                    <select type="text" class="form-control" name="type" placeholder="type">
                                    <?php 
                                        $type = getAllTypes();
                                        foreach($type as $key=>$v) {
                                            echo '<option value="';
                                            echo $v->id_type;
                                            echo '">';
                                            echo $v->nom_type;
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="enseignant">Choisir l'enseignant</label>
                                    <select type="text" class="form-control" name="enseignant" placeholder="enseignant">
                                    <?php 
                                        $ens = getAllEns();
                                        foreach($ens as $key=>$v) {
                                            echo '<option value="';
                                            echo $v->id_ens;
                                            echo '">';
                                            echo $v->nom_enseignant;
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    </select>
                                    <label for="etudiant">Choisir l'etudiant</label>
                                    <select type="text" class="form-control" name="etudiant" placeholder="etudiant">
                                    <?php 
                                        $etudiant = getAllEtudiants();
                                        foreach($etudiant as $key=>$v) {
                                            echo '<option value="';
                                            echo $v->id_etd;
                                            echo '">';
                                            echo $v->nom_etudiant;
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Ajout d'un Enseignant
                        </div>
                        <div class="card-body">
                            <form method="get" action="addEns.php">
                                <div class="form-group">
                                    <label for="nom_ens">Saisir le nom:</label>
                                    <input type="text" class="form-control" name="nom_ens"  placeholder="nom d'enseignant...">
                                    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-header">
                                    Ajout d'un etudiant
                                </div>
                                <div class="card-body">
                                    <form method="get" action="addEtud.php">
                                        <div class="form-group">
                                            <label for="nom_etud">Saisir le nom:</label>
                                            <input type="text" class="form-control" name="nom_etud"  placeholder="nom d'etudiant...">
                                            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
