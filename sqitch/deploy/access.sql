-- Deploy Access

BEGIN;

-- XXX Add DDLs here.
CREATE TABLE access (
	id SERIAL PRIMARY KEY,
	name VARCHAR(32)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

COMMIT;
