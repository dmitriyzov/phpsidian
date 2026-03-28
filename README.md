# PHPsidian

A small personal Obsidian-like notes application built with plain PHP 8.x and SQLite.

## Functionality
- create note
- view note
- update note
- delete note
- list notes

## Project stack
- PHP 8.x - backend
- PDO - database access interface
- SQLite - database

## Folder structure

```bash
.
├── app
│   ├── Controller
│   │   ├── AbstractController.php
│   │   └── NotesController.php
│   ├── Entity
│   │   └── Note.php
│   └── Repository
│       ├── NoteRepository.php
│       └── PdoNoteRepository.php
├── public
│   └── index.php               # entrypoint
│   └── router.php              # router
├── views
│   ├── form.php
│   ├── list.php
│   └── view.php
├── composer.json
└── README.md
```

### Updating the folder structure

```bash
tree --dirsfirst -I vendor
```

## Data model

### Entities
- Note
    - id (int)
    - title (text)
    - content (text)
    - date_created (datetime)
    - date_modified (datetime)
    - tags (text)

### Tables
- notes

```sql
CREATE TABLE notes ( id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT NOT NULL, content TEXT NOT NULL, date_created DATETIME NOT NULL, date_updated DATETIME NOT NULL, tags TEXT);
```

## Nice-to-have features
- search by title/content
- filter by tag(s)
- preview markdown
- insert links to other notes

## Installation

### Running on an Apple Silicon Mac

```bash
brew install php                # install PHP
php -S localhost:8000 -t public # run using the built-in PHP server

# Optional - reload when files change
browser-sync start --proxy localhost:8000 --files "**/*.php"

```

### Updating the 