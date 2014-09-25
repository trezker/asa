-- Verify user

BEGIN;

-- XXX Add verifications here.
SELECT id, name, password, created, updated
  FROM user
 WHERE 0;
 
ROLLBACK;
