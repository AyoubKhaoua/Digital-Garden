# Digital Garden 🌱

A minimalist, privacy-focused personal knowledge organizer for cultivating ideas, notes, and projects using customizable themes.

**Table of Contents**

- [About](#about)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Requirements](#requirements)
- [Quick Start](#quick-start)
- [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Usage](#usage)
- [Security & Privacy](#security--privacy)
- [Contributing](#contributing)
- [License & Contact](#license--contact)

## About

Digital Garden is a small, opinionated app (originally created by GreenTech Solutions) that helps you collect and organize short notes inside themed, visual categories. It focuses on simplicity, private gardens per user, and quick retrieval through tags and importance levels.

## Features

- Secure user authentication (PHP sessions).
- Private gardens: each user gets their own isolated space.
- Visual themes: color-coded categories with optional tags.
- Notes management: create, edit, and organize notes with importance levels (1–5).
- Advanced filtering and keyword search.
- Minimal, responsive UI using a lightweight CSS framework (Bootstrap or Tailwind).

## Technology Stack

- Backend: PHP (procedural)
- Database: MySQL / MariaDB (SQL)
- Frontend: HTML5, CSS3, JavaScript
- Optional: Bootstrap or Tailwind CSS for fast UI styling

## Requirements

- PHP 7.4+ (recommended PHP 8 for security and performance)
- MySQL or MariaDB
- Web server (Apache/Nginx) with PHP support

## Quick Start (Development)

1. Copy the project into your web server document root.
2. Create a new MySQL database and user (example below).
3. Import the schema provided in `database/schema.sql` (or run the SQL in [Database Setup](#database-setup)).
4. Configure database credentials in `config.php`.
5. Ensure your web server has write access to any uploads/cache directories used.

Example commands (Linux/macOS; adjust for Windows and your environment):

```
mysql -u root -p
CREATE DATABASE digital_garden DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'dg_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON digital_garden.* TO 'dg_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

## Database Setup

Here is a minimal schema example — include this as `database/schema.sql` in your repo:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE themes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  title VARCHAR(150) NOT NULL,
  color VARCHAR(7) DEFAULT '#ffffff',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  theme_id INT NOT NULL,
  title VARCHAR(255),
  content TEXT,
  importance TINYINT DEFAULT 3,
  tags VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (theme_id) REFERENCES themes(id) ON DELETE CASCADE
);
```

## Configuration

Create a `config.php` (or copy `config.example.php`) and set your database credentials and any site-level settings. Keep this file out of version control if it contains secrets.

```php
<?php
// config.php
return [
  'db_host' => '127.0.0.1',
  'db_name' => 'digital_garden',
  'db_user' => 'dg_user',
  'db_pass' => 'secure_password',
];
```

## Usage

- Register a user account and start creating themes.
- Add notes inside themes; set importance (1 = low, 5 = high).
- Use tags and keyword search to filter and find notes quickly.

## Security & Privacy

- Passwords should be stored using a secure hash (password_hash / password_verify in PHP).
- Use prepared statements or an ORM to avoid SQL injection.
- Keep `config.php` and any backups out of public repositories.

## Contributing

- Bug reports and feature requests: open an issue.
- Small improvements: open a PR with a clear description and tests (if applicable).

## License & Contact

This project is MIT-licensed (or choose your preferred license). For questions or attribution requests, contact the original author/maintainers (GreenTech Solutions).

---

If you'd like, I can also:

- add a `database/schema.sql` file with the SQL above,
- create a `config.example.php`, or
- add a screenshot/animated GIF to demonstrate the UI.

Tell me which follow-up you'd like next.
