#!/bin/sh
set -eu
umask 0002

mkdir -p storage/app/public storage/framework/cache/data \
    storage/framework/sessions storage/framework/views storage/logs bootstrap/cache

exec docker-php-entrypoint "$@"
