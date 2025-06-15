# Mini ERP Laravel - Backend

## Docker Commands

### Start

```bash
./vendor/bin/sail up -d
```

### Stop

```bash
./vendor/bin/sail down
```

### Rebuild

```bash
docker compose down -v
./vendor/bin/sail build --no-cache
```

## Laravel Sail Commands

### Executing Script

```bash
sail php script.php
```

### Executing Composer

```bash
sail composer require laravel/sanctum
```

### Executing Artisan

```bash
sail artisan queue:work
```

### Executing NPM

```bash
sail npm run dev
```

### Executing Migration

```bash
sail artisan migrate
```
