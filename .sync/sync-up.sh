#!/bin/bash
DIR="$(dirname "$(readlink -f "$0")")"

# Exports:
#   - Methods: y_or_n_val
source "$DIR/common.src"

# Exports:
#   - Strings: _key, _remote and _local
source "$DIR/config.src"
exclusions="$DIR/exclusions"

# dry run
dryRun=$(y_or_n_val "Do you want to do a dry run [y/n]: " "y")
if [[ $dryRun =~ ^([yY])$ ]]; then
  sudo rsync --exclude-from=$exclusions -avzn --delete -e "ssh -i $_key" \
    $_local $_remote
  echo
fi

# real thing
res=$(y_or_n_val "Do you want to overwrite $_remote? [y/n]: " "n")
if [[ $res =~ ^([yY])$ ]]; then
  sudo rsync --exclude-from=$exclusions --progress --delete -avz -e "ssh -i $_key" \
    $_local $_remote
fi
