#!/bin/bash

set -e

echo "🔁 Fermo e rimuovo i container con volumi associati..."
docker compose down -v

echo "🧹 Rimuovo dati persistenti..."
rm -rf ./data/freescout/*
rm -rf ./data/mysql/*

echo "🚧 Ricostruisco e avvio i container in modalità devops..."
docker compose -f docker-compose.yaml -f docker-compose.dev.yaml up -d --build

echo "✅ Sistema ripristinato e in fase di avvio. Attendi ~2 minuti prima di accedere su:"
echo "🔗 http://localhost:8080"
