# deanbot-site

[Kirby](https://getkirby.com/docs/guide) blog and [memex](https://en.wikipedia.org/wiki/Memex).

## Requirements

Kirby ([v4](https://getkirby.com/docs/guide/updates/update-to-v4#:~:text=Kirby%204%20requires%20PHP%208.1%2C%208.2%20or%208.3.,PHP%208.0.%2A%2C%20you%20need%20to%20update%20your%20server.)) runs on PHP 8.1+, Apache or Nginx. 

Dev tooling uses node v20.17.

## Kirby Dependencies

- [tobimori/kirby-seo](https://github.com/tobimori/kirby-seo.git) (`site/plugins/seo`): meta/search tags, sitemap, robots
- [bnomei/kirby3-feed](https://github.com/bnomei/kirby3-feed) (`site/plugins/kirby3-feed`): RSS feed
- [thathoff/kirby-git-content](https://github.com/thathoff/kirby-git-content) (`site/plugins/kirby-git-content`): panel edits auto-commit and push to GitHub

## Develop

Vite is set up for sass & js compilation. Serve the site via XAMPP with a vhost pointing at this directory (`deanbot.local`).

### Setup

#### Kirby CMS and Plugins

- install: `composer install`
- update kirby to latest: `./tools/update.sh`

#### Web Server

1. Install [xampp](www.apachefriends.org/index.html)
2. Clone project into `/Applications/XAMPP/xampfiles/htdocs`, e.g., as `deanbot.local`
  - to clone with submodules include `--recurse-submodules -j8`
3. Edit `/Applications/XAMPP/xampfiles/etc/httpd.conf`.
  - Update User/Group as indicated below or you get cannot write error during panel installation. User is the name of your home directory.
  - `httpd.conf` configuration: 
    - change: `User daemon /n Group daemon`
    - to: `User your_username /n Group staff`
4. Configure vhosts
  - Edit `/private/etc/hosts` and add line: `127.0.0.1 deanbot.local` (requires `sudo`)
  - Edit files in `/Applications/XAMPP/xampfiles/`
    - Edit `etc/extra/httpd-vhosts.conf` and add configuration below.
    - Edit `etc/httpd.conf` and uncomment line following `# Virtual hosts`
5. Restart apache server in xammpp (manager-osx).

`httpd-vhosts.conf` configuration:
```.conf
<VirtualHost *:80>
  ServerName localhost
  DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs"
</VirtualHost>

<VirtualHost *:80>
  ServerName bluemooncommunityfarm.local
  DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/bluemooncommunityfarm.local"
  ErrorLog "logs/bluemooncommunityfarm.local-error_log"
  CustomLog "logs/bluemooncommunityfarm.local-access_log" common
</VirtualHost>
```

#### JS tooling

- Node
  - install/update [nvm](https://github.com/nvm-sh/nvm?tab=readme-ov-file#installing-and-updating)
  - install latest lts `nvm install --lts` and use it `nvm use --lts`
- PNPM
  - install [pnpm](https://pnpm.io/installation#on-posix-systems)

### Scripts

* `pnpm run build` - create prod build of css and js in `assets/builds`
* `pnpm run start` - launch Vite dev server with HMR

## Deploy

`./tools/deploy.sh` — pushes to GitHub then pulls on the server.

Requires `.deploy.config` at the project root (gitignored):

```sh
_key='/path/to/ssh/private/key'
_host='user@host'
_path='~/path/to/site'
```

## Mentions

* Icon svgs are from [Remix Icon](http://remixicon.com/)
