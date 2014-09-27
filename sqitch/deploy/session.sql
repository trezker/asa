-- Deploy session

BEGIN;

-- XXX Add DDLs here.
CREATE TABLE session (
	id SERIAL PRIMARY KEY,
	user_id BIGINT UNSIGNED,
    user_agent_id BIGINT UNSIGNED NOT NULL,
    session_id VARCHAR(40) NOT NULL UNIQUE,
    ip_address VARCHAR(40) NOT NULL,
    user_data TEXT NOT NULL,
    created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    last_activity DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE RESTRICT,
	FOREIGN KEY (user_agent_id) REFERENCES user_agent(id) ON DELETE CASCADE
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

COMMIT;

