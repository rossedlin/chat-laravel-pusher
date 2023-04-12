#!/usr/bin/env bash

docker compose down
docker container prune -f
docker compose up -d
