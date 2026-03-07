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
│   ├── Note.php                # Note entity
│   ├── NoteRepository.php      # Repository interface
│   └── PdoNoteRepository.php   # SQLite implementation
├── public
│   └── index.php               # entrypoint
├── views
│   ├── form.php
│   ├── list.php
│   └── view.php
└── README.md
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

## Nice-to-have features
- search by title/content
- filter by tag(s)
- preview markdown
- insert links to other notes