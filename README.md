RMS - Setup Instructions

Follow these steps after cloning the repository to set up the project locally.

## Prerequisites
- PHP (version supported by the project)
- Composer
- A database server (MySQL/MariaDB)

## Setup

1. Clone the repository and change into the project folder:

```bash
git clone <repo-url> rms
cd rms
```

2. Install PHP dependencies:

```bash
composer install
```

3. Copy the example environment file:

```bash
cp .env.example .env
```

On Windows (PowerShell/CMD) use:

```powershell
copy .env.example .env
```

4. Generate the application key:

```bash
php artisan key:generate
```

5. Edit the `.env` file and update database and other options (example keys to set):

```text
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
# set other options as needed (MAIL_, APP_URL, etc.)
```

6. (Optional) Run migrations & seeders if needed:

```bash
php artisan migrate --seed
```

That's it — the project should now be configured. Start the dev server with:

```bash
php artisan serve
```
