#LazyRestApiUiBundle

User interface for LazyRestApiBundle

##Installation

Edit your `composer.json`:

```json
"require": {
    "virhi/lazy-rest-api-ui-bundle" : "master"
}
```

And run Composer:

    php composer.phar update virhi/lazy-rest-api-ui-bundle

Enable your bundle in your `AppKernel.php`:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Virhi\LazyRestApiBundle\VirhiLazyRestApiUiBundle(),
    );
}
```

Edit your config

```yaml
virhi_lazy_rest_api_ui:
    api_url: http://hostname/
```