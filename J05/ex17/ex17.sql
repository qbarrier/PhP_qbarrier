SELECT COUNT(*) AS 'nb_abo', TRUNCATE(AVG(price), 0) AS 'moy_abo', (SUM(duration_sub) % 42) AS 'ft' 
FROM `subscription`;