# Plumbok bundle #

This library is implementation of Plumbok (PHP version of lombok) as Symfony bundle

Library allows to use java like annotations which will allow user to provide more readable
and cleaner code.

**Requirements:**
* PHP 7.1
* Symfony 4.0 <

**Installation**

```composer require mjkruszewski/plumbok-bundle```

Create config in Symfony:

```%Symfony.Project.Path%/config/packages/plumbok.yaml```

Add entries to it as:

```yaml
plumbok:
    dir: '%kernel.cache_dir%/plumbok'
    namespaces: [
      'App\Entity',
      'App\Exceptions',
      'App\Controller\Dto'
      ]
```

Change configuration for doctrine entries:
```yaml
doctrine:
    orm:
        auto_generate_proxy_classes: true
        naming_strategy: doctrine.orm.naming_strategy.underscore
        auto_mapping: true
        mappings:
            App:
                is_bundle: false
                type: annotation
                #CHANGE BELOW PATH TO CACHE DIR
                dir: '%kernel.cache_dir%/plumbok'
                #########
                prefix: 'App\Entity'
                alias: App

```

* Dir field is not required
* Namespaces from src/* catalogue under symfony project

## Project Maintainers
* Maciej Kruszewski

## Related Libraries
* [MJKruszewski/plumbok](https://github.com/MJKruszewski/plumbok)
* [plumbok/plumbok](https://github.com/plumbok/plumbok)

## Annotations 

* Property Annotations
    * @ToString
    * @Getter
    * @Setter

* Class Annotations
    * @AllArgsConstructor
    * @RequiredArgsConstructor
    * @NoArgsConstructor
    * @Data
    * @Value
    * @EqualTo
