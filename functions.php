<?php
    function getConnection(){
        return new PDO("mysql:host=localhost;dbname=pfeDb","root","");
    }

    function getAllPfes(){
        $tab=[];
        $conn=getConnection();
        $req=$conn->query("SELECT * FROM pfe 
                            INNER JOIN etudiant ON pfe.etudiant_id=etudiant.id
                            INNER JOIN types ON pfe.pfe_type=types.id
                            INNER JOIN enseignants ON pfe.enseignant_id=enseignants.id");
        $req->setFetchMode(PDO::FETCH_OBJ);
        while($row=$req->fetch()){
            $tab[]=$row;
        }
        return $tab;
    }

    function getAllEns(){
        $tab=[];
        $conn=getConnection();
        $req=$conn->query("SELECT * FROM enseignants");
        $req->setFetchMode(PDO::FETCH_OBJ);
        while($row=$req->fetch()){
            $tab[]=$row;
        }
        return $tab;
    }

    function addEns($ens){
        $conn=getConnection();
        $req=$conn->prepare("INSERT INTO enseignants (nom_enseignant) VALUES (?)");
        $req->bindParam(1,$ens);
        $req->execute();
    }

    function getAllEtudiants(){
        $tab=[];
        $conn=getConnection();
        $req=$conn->query("SELECT * FROM etudiant");
        $req->setFetchMode(PDO::FETCH_OBJ);
        while($row=$req->fetch()){
            $tab[]=$row;
        }
        return $tab;
    }

    function addEtudiant($etudiant){
        $conn=getConnection();
        $req=$conn->prepare("INSERT INTO etudiant (nom_etudiant) VALUES (?)");
        $req->bindParam(1,$etudiant);
        $req->execute();
    }

    function getAllTypes(){
        $tab=[];
        $conn=getConnection();
        $req=$conn->query("SELECT * FROM types");
        $req->setFetchMode(PDO::FETCH_OBJ);
        while($row=$req->fetch()){
            $tab[]=$row;
        }
        return $tab;
    }

    function getPfeByType($t){
        $tab=[];
        $conn=getConnection();
        $req=$conn->prepare("SELECT * FROM pfe 
                            INNER JOIN etudiant ON pfe.etudiant_id=etudiant.id
                            INNER JOIN enseignants ON pfe.enseignant_id=enseignants.id
                            INNER JOIN types ON pfe.pfe_type=types.id
                            WHERE pfe_type = (SELECT id FROM types WHERE nom_type=?)");
        $req->execute([$t]);
        $req->setFetchMode(PDO::FETCH_OBJ);
        while($row=$req->fetch()){
            $tab[]=$row;
        }
        return $tab;
    }


    function deletePfe($id){
        $conn=getConnection();
        $req=$conn->prepare("DELETE FROM pfe WHERE id=?");
        $req->bindParam(1,$id);
        $req->execute([$id]);
    }

    function addPfe($titre,$type,$ens,$etudiant){
        $conn=getConnection();
        $req=$conn->prepare("INSERT INTO pfe (titre,pfe_type,enseignant_id,etudiant_id)
            VALUES (?,?,?,?)");
        $req->bindParam(1,$titre);
        $req->bindParam(2,$type);
        $req->bindParam(3,$ens);
        $req->bindParam(4,$etudiant);
        $req->execute();
    }

   
    function counts(){
        return sizeof(getAllPfes());
    }
    function countsByType($t){
        return sizeof(getPfeByType($t));
    }




?>
