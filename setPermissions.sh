#!/bin/bash
sudo find . -type f -exec chmod 664 {} +
sudo find . -type d -exec chmod 775 {} +