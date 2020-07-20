#!/bin/sh
sudo find . -type d \( -name plugins \) -prune -o \
  -type f -exec chmod 664 {} +
sudo find . -type d \( -name plugins \) -prune -o \
  -type d -exec chmod 775 {} +