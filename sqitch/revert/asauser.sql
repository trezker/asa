-- Revert asauser

BEGIN;

-- XXX Add DDLs here.
DROP USER asa;

COMMIT;
