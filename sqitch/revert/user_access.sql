-- Revert user_access

BEGIN;

-- XXX Add DDLs here.
DROP TABLE user_access;

COMMIT;
