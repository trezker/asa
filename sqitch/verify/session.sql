-- Verify session

BEGIN;

-- XXX Add verifications here.
SELECT id, user_id, user_agent_id, session_id, ip_address, created, last_activity
  FROM session
 WHERE 0;

ROLLBACK;
