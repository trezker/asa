-- Revert user_agent

BEGIN;

-- XXX Add DDLs here.
DROP TABLE user_agent;

COMMIT;
