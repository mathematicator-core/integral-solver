<h1 align="center">
    PHP Math Integral Solver
</h1>

<p align="center">
    <a href="https://mathematicator.com" target="_blank">
        <img src="https://avatars3.githubusercontent.com/u/44620375?s=100&v=4">
    </a>
</p>

[![Integrity check](https://github.com/mathematicator-core/integral-solver/workflows/Integrity%20check/badge.svg)](https://github.com/mathematicator-core/integral-solver/actions?query=workflow%3A%22Integrity+check%22)
[![codecov](https://codecov.io/gh/mathematicator-core/integral-solver/branch/master/graph/badge.svg)](https://codecov.io/gh/mathematicator-core/integral-solver)
[![License: MIT](https://img.shields.io/badge/License-MIT-brightgreen.svg)](./LICENSE)
[![PHPStan Enabled](https://img.shields.io/badge/PHPStan-enabled%20L8-brightgreen.svg?style=flat)](https://phpstan.org/)


## Installation

```
composer require mathematicator-core/calculator
```

## Usage
Get instance of `IntegralSolver` and compute:

```php
$solver = new IntegralSolver(/* some dependencies */);

// Process simple input:
$solver->process('1 + x');
```

All results can be renderer as LaTeX or returned as array of tokens for future computation.

All dependencies you can get by [Package manager](https://github.com/baraja-core/package-manager).

Fully compatible with `Nette 3.0` and `PHP 7.2`.

## Contribution

### Tests

All new contributions should have its unit tests in `/tests` directory.

Before you send a PR, please, check all tests pass.

This package uses [Nette Tester](https://tester.nette.org/). You can run tests via command:
```bash
composer test
````

Before PR, please run complete code check via command:
```bash
composer cs:install # only first time
composer fix # otherwise pre-commit hook can fail
````
