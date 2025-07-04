INSERT INTO ft_table(login, date_de_creation, groupe)
SELECT last_name, birthdate, 'other' FROM user_card 
WHERE LENGTH(last_name) < 9 AND last_name LIKE '%a%' 
ORDER BY last_name ASC LIMIT 10;