-- Verify Access

BEGIN;

-- XXX Add verifications here.
SELECT id, name
  FROM access
 WHERE 0;

ROLLBACK;
