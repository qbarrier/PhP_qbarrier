SELECT film.id_genre AS 'id_genre', genre.name AS 'nom_genre', film.id_distrib AS 'id_distrib', distrib.name AS 'nom distrib', film.title AS 'titre film' FROM `film` 
LEFT JOIN genre ON film.id_genre = genre.id_genre
LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
WHERE film.id_genre BETWEEN 4 AND 8;