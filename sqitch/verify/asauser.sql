-- Verify asauser

BEGIN;

-- XXX Add verifications here.
SELECT sqitch.checkit(COUNT(*), 'User "asa" does not exist')
  FROM mysql.user WHERE user = 'asa';

ROLLBACK;
