# syncing scripts

## create config

create config.src, i.e.

_key='/home/[user]/.ssh/[key]'
_remote='[user]@[host]:[dir]/'
_local='/opt/lampp/htdocs/[dir]/'

## Create symbolic links

i.e.

ln -s /opt/lampp/htdocs/[dir]/.sync/sync-up.sh /home/[user]/bin/sync-up.[name]
ln -s /opt/lampp/htdocs/[dir]/.sync/sync-down.sh /home/[user]/bin/sync-down.[name]
