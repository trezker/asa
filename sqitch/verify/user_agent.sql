-- Verify user_agent

BEGIN;

-- XXX Add verifications here.
SELECT id, user_agent, created, updated
  FROM user_agent
 WHERE 0;

ROLLBACK;
