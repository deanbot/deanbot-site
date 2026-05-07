#!/bin/bash
# Pushes local commits to GitHub, then triggers git pull on the server.
# Requires .deploy.config at project root — see README for setup.
DIR="$(dirname "$(readlink -f "$0")")"
CONFIG="$DIR/../.deploy.config"

if [ ! -f "$CONFIG" ]; then
  echo "Missing .deploy.config — see README for setup"
  exit 1
fi

source "$CONFIG"

echo "→ Pushing to GitHub..."
git push || exit 1

echo "→ Deploying to $_host..."
ssh -i "$_key" "$_host" "git -C $_path pull"
