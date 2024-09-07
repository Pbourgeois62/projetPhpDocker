<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <?php require_once '../../navbar.php'; ?>

    <div class="bloc-texte">
    <h1>Commandes de base pour la gestion des données (CRUD)</h1>
    <ul>
        <li><strong>SELECT</strong> : Récupérer des données depuis une table. 
            <p>Exemple :</p>
            <p>SELECT * FROM table_name;</p>
            <p>SELECT column1, column2 FROM table_name WHERE condition;</p>
        </li>
        <li><strong>INSERT INTO</strong> : Insérer de nouvelles données dans une table. 
            <p>Exemple :</p>
            <p>INSERT INTO table_name (column1, column2) VALUES (value1, value2);</p>
        </li>
        <li><strong>UPDATE</strong> : Mettre à jour des données existantes dans une table. 
            <p>Exemple :</p>
            <p>UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition;</p>
        </li>
        <li><strong>DELETE FROM</strong> : Supprimer des données d'une table. 
            <p>Exemple :</p>
            <p>DELETE FROM table_name WHERE condition;</p>
        </li>
    </ul>

    <h1>Commandes de gestion des tables</h1>
    <ul>
        <li><strong>CREATE TABLE</strong> : Créer une nouvelle table. 
            <p>Exemple :</p>
            <p>CREATE TABLE table_name (column1 datatype, column2 datatype, ...);</p>
        </li>
        <li><strong>ALTER TABLE</strong> : Modifier la structure d'une table existante. 
            <p>Ajouter une colonne :</p>
            <p>ALTER TABLE table_name ADD column_name datatype;</p>
            <p>Supprimer une colonne :</p>
            <p>ALTER TABLE table_name DROP COLUMN column_name;</p>
        </li>
        <li><strong>DROP TABLE</strong> : Supprimer une table. 
            <p>Exemple :</p>
            <p>DROP TABLE table_name;</p>
        </li>
        <li><strong>TRUNCATE TABLE</strong> : Supprimer toutes les données d'une table sans supprimer la table elle-même. 
            <p>Exemple :</p>
            <p>TRUNCATE TABLE table_name;</p>
        </li>
    </ul>

    <h1>Commandes pour les requêtes complexes</h1>
    <ul>
        <li><strong>JOIN</strong> : Combiner des lignes de deux ou plusieurs tables, basées sur une colonne commune. 
            <p><em>INNER JOIN</em> : Récupère les lignes qui ont des correspondances dans les deux tables.</p>
            <p>Exemple :</p>
            <p>SELECT columns FROM table1 INNER JOIN table2 ON table1.column = table2.column;</p>
            <p><em>LEFT JOIN</em> (ou LEFT OUTER JOIN) : Récupère toutes les lignes de la table de gauche, et les lignes correspondantes de la table de droite.</p>
            <p>Exemple :</p>
            <p>SELECT columns FROM table1 LEFT JOIN table2 ON table1.column = table2.column;</p>
            <p><em>RIGHT JOIN</em> (ou RIGHT OUTER JOIN) : Récupère toutes les lignes de la table de droite, et les lignes correspondantes de la table de gauche.</p>
            <p>Exemple :</p>
            <p>SELECT columns FROM table1 RIGHT JOIN table2 ON table1.column = table2.column;</p>
        </li>
        <li><strong>GROUP BY</strong> : Grouper les résultats par une ou plusieurs colonnes. 
            <p>Exemple :</p>
            <p>SELECT column, COUNT(*) FROM table_name GROUP BY column;</p>
        </li>
        <li><strong>HAVING</strong> : Filtrer les groupes de résultats après un <code>GROUP BY</code>. 
            <p>Exemple :</p>
            <p>SELECT column, COUNT(*) FROM table_name GROUP BY column HAVING COUNT(*) > 1;</p>
        </li>
        <li><strong>ORDER BY</strong> : Trier les résultats d'une requête. 
            <p>Exemple :</p>
            <p>SELECT * FROM table_name ORDER BY column ASC;</p>
            <p>SELECT * FROM table_name ORDER BY column DESC;</p>
        </li>
        <li><strong>LIMIT</strong> : Limiter le nombre de résultats retournés par une requête. 
            <p>Exemple :</p>
            <p>SELECT * FROM table_name LIMIT 10;</p>
        </li>
        <li><strong>DISTINCT</strong> : Récupérer uniquement les valeurs distinctes. 
            <p>Exemple :</p>
            <p>SELECT DISTINCT column FROM table_name;</p>
        </li>
    </ul>

    <h1>Commandes pour les sous-requêtes</h1>
    <ul>
        <li><strong>EXISTS</strong> : Vérifier l'existence d'une sous-requête. 
            <p>Exemple :</p>
            <p>SELECT column1 FROM table_name WHERE EXISTS (SELECT 1 FROM table_name2 WHERE condition);</p>
        </li>
        <li><strong>IN</strong> : Filtrer les résultats en fonction d'une liste de valeurs ou d'une sous-requête. 
            <p>Exemple :</p>
            <p>SELECT column1 FROM table_name WHERE column2 IN (value1, value2, ...);</p>
            <p>SELECT column1 FROM table_name WHERE column2 IN (SELECT column3 FROM table_name2 WHERE condition);</p>
        </li>
        <li><strong>ANY</strong> et <strong>ALL</strong> : Comparer une valeur à toutes les valeurs renvoyées par une sous-requête. 
            <p>Exemple :</p>
            <p>SELECT column1 FROM table_name WHERE column2 > ANY (SELECT column3 FROM table_name2 WHERE condition);</p>
            <p>SELECT column1 FROM table_name WHERE column2 > ALL (SELECT column3 FROM table_name2 WHERE condition);</p>
        </li>
    </ul>

    <h1>Commandes pour la gestion des transactions</h1>
    <ul>
        <li><strong>START TRANSACTION</strong> ou <strong>BEGIN</strong> : Démarrer une transaction. 
            <p>Exemple :</p>
            <p>START TRANSACTION;</p>
        </li>
        <li><strong>COMMIT</strong> : Valider une transaction. 
            <p>Exemple :</p>
            <p>COMMIT;</p>
        </li>
        <li><strong>ROLLBACK</strong> : Annuler une transaction. 
            <p>Exemple :</p>
            <p>ROLLBACK;</p>
        </li>
    </ul>
    </div>
</body>
</html>