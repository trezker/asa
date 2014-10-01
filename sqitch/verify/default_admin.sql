-- Verify default_admin

BEGIN;

-- XXX Add verifications here.
SELECT sqitch.checkit(COUNT(*), 'Admin does not exist')
FROM user_access ua
join user u on u.id = ua.user_id
join access a on a.id = ua.access_id
WHERE a.name = 'Admin';

ROLLBACK;
