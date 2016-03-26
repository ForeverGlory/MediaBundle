MediaBundle
===========

Introduction
------------

### Composer

Add to `composer.json` in your project to `require` section:

```json
{
    "foreverglory/media-bundle": "~0.1"
}
```
### Add this bundle to your application's kernel

```php
//app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Glory\Bundle\MediaBundle\GloryMediaBundle(),
        // ...
    );
}
```

### Conﬁgure service in your YAML configuration
```yaml
#app/conﬁg/conﬁg.yml
glory_media:
    packages:
        public:
            dir: %kernel.root_dir%/web/files
            uri: files
```

twig use
```twig
{{ media('public://logo.png') }}  {# generate url 'files/logo.png', use asset('files/logo.png') #}
```