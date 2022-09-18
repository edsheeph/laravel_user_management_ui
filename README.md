# User Management

User management describes the ability for administrators to manage user access to various IT resources like systems, devices, applications, storage systems, networks, SaaS services, and more. ... User management enables admins to control user access and on-board and off-board users to and from IT resources.

## Installation

Windows:

```sh
to be editted
```

OS & Linux:

```sh
to be editted
```

## Development setup

Follow these steps to install the system for development purposes:

1. Make a clone or copy of the repository.

2. Make also a clone or copy of https://github.com/edsheeph/laravel_user_management.

3. Run this command to the terminal of the cloned or forked repository:
	```sh
	composer install
	```
	
4. Make a ``.env`` file using the ``.env.example`` and change your local configuration for DB, APP_URL, APP_API_URL, and DOMAIN.

5. Run the optimize command:
	```sh
	php artisan optimize
	```

6. Generate app key:
	```sh
	php artisan key:generate
	```

7. Run the laravel project:
	```sh
	php artisan serve --port 8001
	```

8. Start the development.
