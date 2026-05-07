#!/bin/bash
# Pushes local commits to GitHub, then triggers git pull on the server.
# Requires .sync/config.src — see .sync/readme.md for setup.
DIR="$(dirname "$(readlink -f "$0")")"
CONFIG="$DIR/../.sync/config.src"

if [ ! -f "$CONFIG" ]; then
  echo "Missing .sync/config.src — see .sync/readme.md for setup"
  exit 1
fi

source "$CONFIG"

# Parse user@host and path from _remote (rsync format: user@host:path/)
_host="${_remote%%:*}"
_path="~/${_remote##*:}"
_path="${_path%/}"

echo "→ Pushing to GitHub..."
git push || exit 1

echo "→ Deploying to $_host..."
ssh -i "$_key" "$_host" "git -C $_path pull"
