-- Deploy asauser

BEGIN;

-- XXX Add DDLs here.
CREATE USER 'asa'@'localhost' IDENTIFIED BY '23i5vb23il';

GRANT SELECT, UPDATE, INSERT, DELETE ON asa.* TO 'asa'@'localhost';

COMMIT;
