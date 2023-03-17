-- Requete A

SELECT titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), "%H:%i") as duree_film, nom, prenom
FROM film f
INNER JOIN realisateur r on f.id_realisateur = r.id_realisateur
INNER JOIN personne p on r.id_personne = p.id_personne
WHERE id_film = 1

-- Requete B

SELECT titre, TIME_FORMAT(SEC_TO_TIME(duree*60), "%H:%i") as duree_film
FROM film f
INNER JOIN realisateur r on f.id_realisateur = r.id_realisateur
INNER JOIN personne p on r.id_personne = p.id_personne
WHERE duree > 135
ORDER BY duree_film DESC;

-- Requete C

SELECT nom, prenom, titre, annee_sortie
from film f
INNER JOIN realisateur r on f.id_realisateur  = r.id_realisateur
INNER JOIN personne p on r.id_personne = p.id_personne
WHERE id_realisateur = 1;

-- Requete D

SELECT nom_genre, COUNT(a.id_genre) as nb_genre
from appartenir a
INNER JOIN genre g on a.id_genre = g.id_genre
GROUP BY g.id_genre
ORDER by nb_genre DESC;

-- Requete E 

SELECT nom, prenom, COUNT(f.id_realisateur) as nb_film
from film f 
INNER JOIN realisateur r on f.id_realisateur = r.id_realisateur
INNER JOIN personne p on r.id_personne = p.id_personne
GROUP BY p.id_personne
ORDER BY nb_film DESC;

-- Requete F

SELECT CONCAT(p.nom, p.prenom) as acteur, r.role
from casting c
INNER JOIN role r on c.id_role = r.id_role
INNER JOIN acteur a on c.id_acteur = a.id_acteur
INNER JOIN personne p on a.id_personne = p.id_personne
INNER JOIN film f on c.id_film = f.id_film


-- Requete G

SELECT titre, nom_role, annee_sortie
from casting c
INNER JOIN acteur a on c.id_acteur = a.id_acteur
INNER JOIN personne p on a.id_personne = p.id_personne
INNER JOIN film f on c.id_film = f.id_film
INNER JOIN role ro on c.id_role = ro.id_role
WHERE a.id_acteur= 1;

-- Requete H

SELECT nom, prenom
FROM personne p
WHERE p.id_personne IN (SELECT a.id_personne FROM acteur a)
AND p.id_personne IN (SELECT r.id_personne FROM realisateur r);

-- Requete I

SELECT titre
FROM film
WHERE annee_sortie > YEAR(DATE_SUB(NOW(), INTERVAL 5 YEAR))
ORDER BY annee_sortie DESC;

-- REQUETE J

SELECT sexe, COUNT(sexe) AS nb_genre 
FROM personne p
WHERE p.id_personne IN (SELECT a.id_personne FROM acteur a)
GROUP BY sexe;

-- REQUETE K 

SELECT nom, prenom, FLOOR(DATEDIFF(CURDATE(), date_naissance) / 365) AS age_revolu, 
CONCAT(FLOOR(DATEDIFF(NOW(), date_naissance) / 365), ' ans, ', FLOOR(MOD(DATEDIFF(NOW(), date_naissance), 365) / 30), ' mois') AS age_non_revolu
FROM personne p 
WHERE DATEDIFF(CURDATE(), date_naissance) / 365 > 50
AND p.id_personne IN (SELECT a.id_personne FROM acteur a);

-- REQUETE L

SELECT CONCAT(p.prenom," ",p.nom) as acteur, COUNT(c.id_acteur) as nb_films
from personne p 
INNER JOIN acteur a on p.id_personne = a.id_personne
INNER JOIN casting c on a.id_acteur = c.id_acteur
WHERE p.id_personne IN (SELECT a.id_personne FROM acteur a)
GROUP BY c.id_acteur
HAVING nb_films >= 3;


