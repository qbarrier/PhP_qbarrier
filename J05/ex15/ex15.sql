SELECT phone_number, REVERSE(TRUNCATE(phone_number, 0)) AS 'enohpelet' FROM `distrib` 
WHERE phone_number LIKE '05%';