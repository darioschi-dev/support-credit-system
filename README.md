# HelpQuota

Sistema di ticketing con pacchetti ore acquistabili via PayPal.

## Servizi inclusi

- HelpDesk Dario (basato su FreeScout, branding rimosso)
- Symfony 6.4 LTS (backend gestione crediti ore)
- MariaDB (database condiviso)

## Avvio rapido

```bash
git clone <questa-repo>
cd helpquota
docker-compose -f docker-compose.yaml -f docker-compose.prod.yaml up -d --build
```

- HelpDesk Dario (ex-Freescout) → http://localhost:8080
- Symfony `/buy` → http://localhost:3000/buy

## Configurazione

1. Modifica `.env` nella root del progetto per DB:
```
DB_NAME=freescout
DB_USER=freescout
DB_PASS=freescoutpass
DB_HOST=freescout-db
```

2. Modifica `.env` in `payment-backend/` per configurare PayPal:
```
PAYPAL_CLIENT_ID=...
PAYPAL_CLIENT_SECRET=...
```

3. (Opzionale) Modifica `APPLICATION_NAME`, `ADMIN_EMAIL`, `ADMIN_PASS` nel `docker-compose.yaml` per personalizzare l’istanza.
