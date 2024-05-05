CREATE TABLE users (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  email       VARCHAR(255) NOT NULL,
  password    VARCHAR(255) NOT NULL,
  active      BOOLEAN DEFAULT true,
  created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  deleted_at  TIMESTAMP,

  INDEX idx_email (email)
)