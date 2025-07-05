SELECT floor_number AS etage, SUM(nb_seats) AS sieges
FROM `cinema`
GROUP BY floor_number
ORDER BY sieges DESC;