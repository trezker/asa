-- Deploy user_access
-- requires: user
-- requires: access

BEGIN;

-- XXX Add DDLs here.
CREATE TABLE user_access (
	id SERIAL PRIMARY KEY,
	user_id BIGINT UNSIGNED UNIQUE,
	access_id BIGINT UNSIGNED UNIQUE,
	FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
	FOREIGN KEY (access_id) REFERENCES access(id) ON DELETE CASCADE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

COMMIT;
