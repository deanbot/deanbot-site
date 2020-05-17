# Spirited Refactor

[Kirby](https://getkirby.com/docs/guide) blog and [memex](https://en.wikipedia.org/wiki/Memex).

## Requirements

Kirby runs on PHP 7.1+, Apache or Nginx. Dev tooling uses node v10.16.

## Develop

Webpack tooling is set up for sass & js compiliation, but it assumes you're already serving the site via xampp/mamp/etc w/ a vhost address of spiritedrefactor.localhost.

### Setup

1. Run locally using xampp/mamp/etc w/ a vhost address of `spiritedrefactor.localhost`
2. Install node (latest tested runtime: node v10.16.3)
3. Install pnpm (optional, i.e. substitue w/ npm, yarn, etc...)
4. Install node dependencies: `pnpm install`

### Scripts

* `pnpm run build` - create prod build of css and js in `assets/builds`
* `pnpm run start` - launch dev build with webpack + browser-sync
