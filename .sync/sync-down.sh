#!/bin/bash
DIR="$(dirname "$(readlink -f "$0")")"

# Exports:
#   - Methods: y_or_n_val
source "$DIR/common.src"

# Exports:
#   - Strings: _key, _remote and _local
source "$DIR/config.src"
exclusions="$DIR/exclusionsdown"

# dry run
dryRun=$(y_or_n_val "Do you want to do a dry run [y/n]: " "y")
if [[ $dryRun =~ ^([yY])$ ]]; then
  sudo rsync --exclude-from=$exclusions -rvzne "ssh -i $_key" \
    $_remote $_local
  echo
fi

# real thing
res=$(y_or_n_val "Do you want to overwrite $_local? [y/n]: " "n")
if [[ $res =~ ^([yY])$ ]]; then
  sudo rsync --exclude-from=$exclusions --progress -rvze "ssh -i $_key" \
    $_remote $_local
fi
