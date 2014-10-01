-- Deploy default_admin
-- requires: user_access

BEGIN;

-- XXX Add DDLs here.
insert into access(name) values('Admin');
insert into user(name) values('Admin');
insert into user_access (user_id, access_id)
select u.id, a.id 
from user u join access a on u.name = a.name
where u.name = 'Admin';

COMMIT;
