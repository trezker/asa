-- Revert default_admin

BEGIN;

-- XXX Add DDLs here.
delete from user where name = 'Admin'
delete from access where name = 'Admin'

COMMIT;
