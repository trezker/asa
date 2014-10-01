-- Verify user_access

BEGIN;

-- XXX Add verifications here.
SELECT id, user_id, access_id
  FROM user_access
 WHERE 0;

ROLLBACK;
