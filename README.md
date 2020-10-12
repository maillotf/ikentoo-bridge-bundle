# Ikentoo-bridge-bundle

[![Software license][ico-license]](LICENSE)
[![Latest stable][ico-version-stable]][link-packagist]
![Packagist PHP Version Support][ico-php-version]

Symfony bundle for Ikentoo which is base on token authentication

## Required configuration

### Modify framework.yaml
```yaml
ikentoo:
    authentication:
        protocol: "http"
        host: "127.0.0.1"
        port: "80"
        token: "TOKEN"
```

### Modify services.yaml
```yaml
services:
    MaillotF\Ikentoo\IkentooBridgeBundle\Service\IkentooService: '@ikentoo.service'
```

##Package instalation with composer

```console
$ composer require maillotf/ikentoo-bridge-bundle
```

## Use in controller:

```php
<?php
//...
use MaillotF\Ikentoo\IkentooBridgeBundle\Service\IkentooService;

class exampleController extends AbstractController
{
	/**
	 * Example
	 * 
	 * @Route("example", name="example", methods={"GET"})
	 * 
	 */
	public function test(IkentooService $is)
	{
		$from = new \DateTime('2020-01-09');
		$to = new \DateTime('2020-10-09');

		$result = $is->financial->getReceiptTransactionsRange("101163659689986", $from, $to, array('staff'), 1000);
		
		$menu = $is->orderAndPayment->loadMenu("101163222689111", 101112359691234, true)
		
		return ($this->json($menu));
	}

}
```

[ico-license]: https://img.shields.io/github/license/maillotf/ikentoo-bridge-bundle.svg
[ico-version-stable]: https://img.shields.io/packagist/v/maillotf/ikentoo-bridge-bundle
[ico-php-version]: https://img.shields.io/packagist/php-v/maillotf/ikentoo-bridge-bundle

[link-packagist]: https://packagist.org/packages/maillotf/ikentoo-bridge-bundle