-- Active: 1709178536510@@127.0.0.1@3306@ghorerbazar
-- DROP Table information;
-- SELECT *
-- FROM information
-- insert into
--     information (
--         ProductName, price, quantity, img
--     )
-- VALUES ('chal', 2, 3, 'no')
-- DELETE FROM information
-- WHERE
--     id = 3;

SELECT * FROM information;

UPDATE information
set
    ProductName = 'rice',
    price = 120,
    quantity = 5
WHERE
    id = 2;

f_number = 10;

l_number = 15;

SELECT SUM(price) FROM information;

SELECT price FROM information WHERE id = 4;

SELECT sum(quantity + 20) FROM information WHERE id = 4;

SELECT (6 + 3);

SELECT quantity FROM information WHERE id = 4;

UPDATE information SET quantity = 550 WHERE id = 4;

SELECT (3 + 5)