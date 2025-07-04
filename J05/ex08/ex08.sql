SELECT last_name, first_name, DATE(birthdate) AS date_de_naissance FROM user_card
WHERE DATE_FORMAT(birthdate, "%Y") LIKE '1989'
ORDER BY last_name ASC;