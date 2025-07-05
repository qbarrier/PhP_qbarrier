SELECT title AS 'Titre', summary AS 'Resume', prod_year FROM film
INNER JOIN genre ON film.id_genre = genre.id_genre
WHERE genre.name = 'erotic';
