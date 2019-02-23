# PlainCommandsBundle

Integrates [alexeyshockov/plain-commands](https://github.com/alexeyshockov/plain-commands) into a Symfony application.

## Configuration and usage

The bundle has no configuration. Just register your classes in the DI container and mark them with `plain_commands.set` 
tag. For example, add everything from `src/Command` directory in your `config/services.yaml`:

```php
services:
    App\Command\:
        resource: '../src/Command'
        tags: ['plain_commands.set']
```
